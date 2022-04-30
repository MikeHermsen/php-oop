<?php


class CD extends Product {
    public $artiest;
    public $aantal_songs;
    public $label;

    /**
     * Class constructor.
     */
    public function __construct(
        string  $artiest                    , 
        int     $aantal_songs               , 
        string  $label                      ,

        int     $itemnr                     , 
        string  $naam                       , 
        int     $minimumVoorraad            , 
        int     $aantalInVoorraad           , 
        float   $prijs                      , 
        bool    $actief             = false )
        {
            $this->artiest          = $artiest; 
            $this->aantal_songs     = $aantal_songs; 
            $this->label            = $label; 
            parent::__construct($itemnr, $naam, $minimumVoorraad, $aantalInVoorraad, $prijs, $actief);
        }
    

}

