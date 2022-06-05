<?php

// --+ Strict Typing Mode
declare(strict_types = 1);

class Devise {
    private string $instrument;
    private float $rate;
    private DateTime $date;

    /*
    *   Initialise la devise (Devise::class)
    *
    **/
    public function __construct(string $instrument, float $rate, DateTime $date) {
        $this->instrument = $instrument;
        $this->rate       = $rate;
        $this->date       = $date;
    }

    /*
    *   Récupération de l'instrument
    *
    *   Retourne : l'attribut "instrument"
    *
    **/
    public function getInstrument() : string 
    {   return $this->instrument;   }

    /*
    *   Récupération de la valeur
    *
    *   Retourne : l'attribut "rate"
    *
    **/
    public function getRate() : float 
    {   return $this->rate;   }

    /*
    *   Récupération de la date
    *
    *   Retourne : l'attribut "date"
    *
    **/
    public function getDate() : DateTime 
    {   return $this->date;   }
}

?>