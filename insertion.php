<?php
 //Connecte and add data in the database
 require_once "dbConnect.php";

$nom = $_POST['nom'];
$email = $_POST['email'];
$cnib = $_POST['refCNIB'];
$phone = $_POST['phone'];
$profession = $_POST['profession'];
//$photo = $_POST['photo'];

 if(empty($nom || $email || $cnib ||$phone || $profession || $photo)){
     echo "Enter a data";
 }else{
    try{

        
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO abonne (nom,email,refCNIB,phone,profession,photo) VALUES('$nom','$email','$cnib','$phone','$profession','$photo');";
        echo"inserted";
       
        $bdd->exec($sql);
        header('Location:afficherAbonne.php');
        
    }catch(PDOException $e){
        echo $sql,"<br>",$e->getMessage();
    }
}
    $bdd = null;


?>

