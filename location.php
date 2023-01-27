<?php
 //Connecte and add data in the database
 require_once "dbConnect.php";

$idLivre = $_POST['idLivre'];
$idAbonne = $_POST['idAbonne'];
$dateLocation= $_POST['dateLocation'];
$dateRemise = $_POST['dateRemise'];
$amende= $_POST['amende'];
$etatLivre= $_POST['etatLivre'];
$etatRemise= $_POST['etatRemise'];
 if(empty($idLivre || $idAbonne || $dateLocation  || $dateRemise || $amende || $etatLivre || $etatRemise)){
     echo "Enter a data";
 }else{
    try{
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO louer (idLivre,idAbonne,dateLocation,dateRemise,amende,etatLivre,etatRemise) VALUES('$idLivre','$idAbonne','$dateLocation','$dateRemise','$amende','$etatLivre','$etatRemise');";
        echo"inserted";
       
        $bdd->exec($sql);
        header('Location:locateTreatment.php');
        
    }catch(PDOException $e){
        echo $sql,"<br>",$e->getMessage();
    }
}
    $bdd = null;


?>

