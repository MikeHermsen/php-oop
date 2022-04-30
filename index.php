<?php
function my_autoloader($class) {
    include $class.".php";
}

spl_autoload_register('my_autoloader');


function make_model(string $file_name) 
{

    $open = fopen("./".$file_name.".csv", "r");
    $data = fgetcsv($open, 1000, ",");
    $total_list = array();


    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
    {
        if ( $file_name == "Product" ) {

            $list_item = new Product(
                $itemnr             = count($total_list), 
                $naam               = $data[0], 
                $minimumVoorraad    = (int) $data[1], 
                $aantalInVoorraad   = (int) $data[2], 
                $prijs              = (float) $data[3], 
                $actief             = (bool) $data[4]);
        
        }

        if ( $file_name == "DVD" ) {

            $list_item = new DVD(
                $lengteInMinuten  = $data[0],
                $jaarUitgifte     = (int) $data[1],
                $filmStudio       = $data[2],

                $itemnr             = count($data), 
                $naam               = $data[3], 
                $minimumVoorraad    = (int) $data[5], 
                $aantalInVoorraad   = (int) $data[4], 
                $prijs              = (float) $data[6], 
                $actief             = (bool) $data[7] 

            );
        }

        if ( $file_name == "CD" ) {
            $list_item = new CD(
                $artiest         = $data[0],
                $aantal_songs    = (int) $data[1],
                $label           = $data[2],
            
                $itemnr             = count($data), 
                $naam               = $data[3], 
                $minimumVoorraad    = (int) $data[4], 
                $aantalInVoorraad   = (int) $data[5], 
                $prijs              = (float) $data[6], 
                $actief             = (bool) $data[7] 
            );
        }
        
        array_push($total_list, $list_item);

    }
        
    fclose($open);
    
    return $total_list;
}



$products   =make_model("Product");
$dvds       =make_model("DVD");
$cds        =make_model("CD");


// TEST CODE
foreach ($products as $product) {
    echo "product   : " . $product->__get('naam') . "<br />";
}

foreach ($dvds as $dvd) {
    echo "dvd       : " . $dvd->__get('filmStudio') . "<br />";
}

foreach ($cds as $cd) {
    echo "cd       : " . $cd->__get('label') . "<br />";
}

echo "Nieuwe naam voor 2 items <br />";
foreach ($products as $product) {
    echo "product       : " . $product->__get('label') . "<br />";
    $product->__set("naam", "Nieuwe naam");
}

foreach ($cds as $cd) {
    echo "cd       : " . $cd->__get('label') . "<br />";
    $cd->__set("label", "metaalmoeheid");
}


?>
