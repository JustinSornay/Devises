<?php

// --+ Strict Typing Mode
declare(strict_types = 1);

// --+ Importation
require_once(__ROOT__."/src/IbanFirstAPI/Items/Devise.php");

class DeviseManager {
    private static array $listDevise;

    /*
    *   Initialise le manager des devises (DeviseManager::class)
    *
    **/
    private final function __construct() 
    {   $this::$listDevise = array();   }

    /*
    *   Récupération de l'instance de la classe permettant la gestion des devises
    *
    *   Retourne : l'instance de la classe "DeviseManager"
    *
    **/
    public static function getInstance() : DeviseManager
    {
        static $instance;
        $deviseManager = DeviseManager::class;
      
        if (!$instance instanceof $deviseManager) 
        {   $instance = new $deviseManager;   }
      
        return $instance;
    }

    /*
    *   Récupère la liste des devises
    *
    *   Retourne : la liste des devises
    *
    **/
    public static function getListDevise() : array 
    {   return self::$listDevise;   }

    /*
    *   Ajoute une devise
    *
    *   Paramètre : une devise
    *
    **/
    public static function add(Devise $devise) 
    {   self::$listDevise[] = $devise;   }

    /*
    *   Ajoute une liste de devises
    *
    *   Paramètre : une liste de devises
    *
    **/
    public static function hydrate(array $devises) {
        foreach ($devises as $key => $devise) 
        {   self::add($devise);   }
        self::save();
    }

    /*
    *   Sauvegarde la liste des devises
    *
    **/
    public static function save() 
    {   $_SESSION["devises"] = self::$listDevise;   }

    /*
    *   Récupère les devises dont la date est égale ou supérieur à la date renseignée
    *
    *   Paramètre : date la plus anciennes des devises recherchées
    *
    **/
    public static function getDevisesAfterDate(string $type, DateTime $dateSearch) : array {
        $listDeviseSearched = array();
        foreach (self::$listDevise as $key => $devise) {
            if ($devise->getDate() >= $dateSearch && $devise->getInstrument() == $type)
            {   $listDeviseSearched[] = $devise;   }
        }
        return $listDeviseSearched;
    }
}

?>