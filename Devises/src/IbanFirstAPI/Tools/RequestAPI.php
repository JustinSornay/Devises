<?php

// --+ Strict Typing Mode
declare(strict_types = 1);

class RequestAPI {
    private static string $urlBase;

    /*
    *   Initialise la connexion (RequestAPI::class)
    *
    **/
    private final function __construct() 
    {   self::$urlBase = "https://api.ibanfirst.com/PublicAPI/";   }

    /*
    *   Récupération de l'instance de la classe permettant la consommation de l'API
    *
    *   Retourne : l'instance de la classe "RequestAPI"
    *
    **/
    public static function getInstance() : RequestAPI
    {
        static $instance;
        $requestAPI = RequestAPI::class;
      
        if (!$instance instanceof $requestAPI) 
        {   $instance = new $requestAPI;   }
      
        return $instance;
    }

    /*
    *   Récupération de la base de l'url
    *
    *   Retourne : l'attribut "urlBase"
    *
    **/
    public static function getURLBase() : string 
    {   return self::$urlBase;   }

    /*
    *   Envoie une requête à l'API
    *
    *   Paramètre : Extension de l'url de base "urlBase" indiquant à l'API l'élément ciblé
    *   Retourne  : La liste des informations recherchées renvoyé par l'API
    *
    **/
    public static function sendRequest(string $urlArgs) : ?array {
        $requestAPI = self::getInstance();
        $urlBase    = $requestAPI->getURLBase();
        $url        = $urlBase.$urlArgs;
        $res        = file_get_contents($url);
        $response   = json_decode($res, true);

        return $response;
    }
}

?>