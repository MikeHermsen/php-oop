<?php

class Product {

    public $itemnr;
    public $naam;
    public $aantalInVoorraad;
    public $minimumVoorraad;
    public $prijs;
    public $actief;

    public function __construct(
        int     $itemnr                     , 
        string  $naam                       , 
        int     $minimumVoorraad            , 
        int     $aantalInVoorraad           , 
        float   $prijs                      , 
        bool    $actief             = false ) 
        {      
            $this->itemnr           = $itemnr;
            $this->naam             = $naam;
            $this->minimumVoorraad  = $minimumVoorraad;
            $this->aantalInVoorraad = $aantalInVoorraad;
            $this->prijs            = $prijs;
            $this->actief           = $actief;
        }   // END Class constructor


    public function downerStock($aantal) {
        $stockSizeAfterAction = $this->aantalInVoorraad - $aantal;
        
        if ( $stockSizeAfterAction > $this->minimumVoorraad ) 
        {
            $this->aantalInVoorraad = $stockSizeAfterAction;
        }

    }

    public function getTotalWorth() 
    {
        return ($this->prijs * $this->aantalInVoorraad);
    }

    public function upperStock($aantal) {
        if ( $this->actief ) 
        {    
            // Kijkt of het nummer niet lager dan 0 is 
            if ( $aantal > 0 ) 
            {
                $this->aantalInVoorraad += $aantal;
            }
        }

    }


    //  GETTERS & SETTERS
    public function __get($key)
    {
        if( isset($this->$key) )
        {
            return $this->$key;
        }
    }

    public function tostring($key)
    {
        if( isset($this->$key) )
        {
            return strval($this->$key);
        }
    }

    public function __set($key,$val)
    {
        $this->change($key,$val);
    }

    private function change($key,$val)
    {
        if( isset($this->$key) )
        {
            $this->$key = $val;
        }
    }

    /**
     * Class constructor.
     */
    
}