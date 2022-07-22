<?php

    try{
        $bd = new PDO('mysql:host=localhost;dbname=bbh', 'root', ''); 
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e){
        die ('Erreur :'.$e->getMessage());
        
    }

?>

