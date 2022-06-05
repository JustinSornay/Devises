<?php

// --+ Strict Typing Mode
declare(strict_types = 1);

// --+ Importations
require_once(__ROOT__."/src/IbanFirstAPI/Tools/RequestAPI.php");
require_once(__ROOT__."/src/IbanFirstAPI/Items/DeviseManager.php");
require_once(__ROOT__."/src/IbanFirstAPI/Items/Devise.php");

class DevisesHistoryController {

    /*
    *   Initialise le controller de l'historique des devises (DevisesHistoryController::class)
    *
    **/
    private final function __construct() {}

    /*
    *   Récupération de l'instance de la classe gérant la logique de l'historique des devises
    *
    *   Retourne : l'instance de la classe "DevisesHistoryController"
    *
    **/
    public static function getInstance() : DevisesHistoryController
    {
        static $instance;
        $devisesHistoryController = DevisesHistoryController::class;
      
        if (!$instance instanceof $devisesHistoryController) 
        {   $instance = new $devisesHistoryController;   }
      
        return $instance;
    }

    /*
    *   Récupération des types de devises
    *
    *   Retourne : la liste des types de devises
    *
    **/
    public static function getAllTypesDevises() : array {
        $requestAPI     = RequestAPI::getInstance();
        $response       = $requestAPI::sendRequest("Cross");
        $listTypeDevise = $response["crossList"];

        return $listTypeDevise;
    }

    /*
    *   Génère toutes les devises existantes
    *
    **/
    public static function generateAllDevises() {
        $listDevise = array();

        if (!isset($_SESSION["devises"])) {
            $deviseManager  = DeviseManager::getInstance();
            $requestAPI     = RequestAPI::getInstance();
            $listTypeDevise = self::getAllTypesDevises();
            
            foreach ($listTypeDevise as $key => $typeDevise) {
                $urlArgs  = "RateHistory/".$typeDevise["instrument"];
                $response = $requestAPI::sendRequest($urlArgs);
    
                foreach ($response["rateHistory"] as $key => $devise) {
                    $instrument   = $devise["instrument"];
                    $rate         = $devise["rate"];
                    $date         = new DateTime(date("Y-m-d h:m:s", (int) $devise["date"]));
                    $newDevise    = new Devise($instrument, $rate, $date);
                    $listDevise[] = $newDevise;
                }
            }
        }
        else {   $listDevise = $_SESSION["devises"];   }
        
        $deviseManager::hydrate($listDevise);
    }

    /*
    *   Récupération des devises du dernier mois
    *
    *   Retourne : la liste des devises datant de d'une mois ou moins
    *
    **/
    public static function getDevisesLastMonth($typeDevise) : ?array {
        $deviseManager    = DeviseManager::getInstance();
        $lastMonth        = date('m')-1;
        $lastDateWork     = date("Y-m-d h:m:s", strtotime(date('Y').'-'.$lastMonth.'-'.date('d').' '.date('h').':'.date('m').':'.date('s')));
        $lastDate         = new DateTime($lastDateWork);
        $devisesLastMonth = $deviseManager::getDevisesAfterDate($typeDevise, $lastDate);

        return $devisesLastMonth;
    }

    /*
    *   Récupération des devises des 3 derniers mois
    *
    *   Retourne : la liste des devises datant de 3 mois ou moins
    *
    **/
    public static function getDevisesLast3Month($typeDevise) : ?array {
        $deviseManager    = DeviseManager::getInstance();
        $lastMonth        = date('m')-3;
        $lastDateWork     = date("Y-m-d h:m:s", strtotime(date('Y').'-'.$lastMonth.'-'.date('d').' '.date('h').':'.date('m').':'.date('s')));
        $lastDate         = new DateTime($lastDateWork);
        $devisesLastMonth = $deviseManager::getDevisesAfterDate($typeDevise, $lastDate);

        return $devisesLastMonth;
    }
}

?>