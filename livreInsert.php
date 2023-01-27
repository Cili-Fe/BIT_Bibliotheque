<?php
 //Connecte and add data in the database
 require_once "dbConnect.php";

$titre = $_POST['titre'];
$auteur = $_POST['auteur'];
$categorie= $_POST['categorie'];
$publication = $_POST['publication'];
$edit= $_POST['edit'];
 if(empty($titre || $auteur || $categorie  || $publication || $edit)){
     echo "Enter a data";
 }else{
    try{

        
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO livre (titre,auteur,categorie,publication,edit) VALUES('$titre','$auteur','$categorie','$publication','$edit');";
        echo"inserted";
       
        $bdd->exec($sql);
        header('Location:afficherLivre.php');
        
    }catch(PDOException $e){
        echo $sql,"<br>",$e->getMessage();
    }
}
    $bdd = null;


?>

