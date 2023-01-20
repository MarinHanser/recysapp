<?php 

try { 
    // $db = new PDO("mysql:host=project.thijskamphuis.nl;dbname=recycleapp","projectAdm","DA82uA*(u327u*YU");
    $db = new PDO("mysql:host=localhost;dbname=recycleapp","root","");

    //$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    
} 
catch(PDOException $melding) {
    
    echo $melding ->getmessage();  
}

?>