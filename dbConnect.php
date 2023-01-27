<?php 
    try 
    {
        $bdd = new PDO("mysql:host=localhost;dbname=bibliotheque;charset=utf8", "root", "");//connexion à la base de donnée//
        
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
 
    }
?>