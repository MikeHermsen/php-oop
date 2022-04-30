<?php

class DVD extends Product {

public $lengteInMinuten;
public $jaarUitgifte;
public $filmStudio;

/**
 * Class constructor.
 */
public function __construct(
    int     $lengteInMinuten            , 
    float   $jaarUitgifte               , 
    string  $filmStudio                 ,
    
    int     $itemnr                     , 
    string  $naam                       , 
    int     $minimumVoorraad            , 
    int     $aantalInVoorraad           , 
    float   $prijs                      , 
    bool    $actief             = false )
    {
        $this->lengteInMinuten  = $lengteInMinuten;
        $this->jaarUitgifte     = $jaarUitgifte;
        $this->filmStudio       = $filmStudio;
        parent::__construct($itemnr, $naam, $minimumVoorraad, $aantalInVoorraad, $prijs, $actief);
    }

public function totalWorthDvd()
{
    return parent::getTotalWorth() * 1.05;
}

public function calcTime() 
{
    $rawTimeInMinutes   = strval($this->lengteInMinuten / 60);
    return str_replace(".", ":", $rawTimeInMinutes);

    

}

}

