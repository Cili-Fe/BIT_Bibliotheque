<?php 
    require_once "dbConnec.php";

    $valeur = $_GET['valeur'];

    try{

         $bdd-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT * FROM abonne WHERE nom LIKE '%$valeur%' || phone LIKE  '%$valeur%' || profession LIKE '%$valeur%'";
         $result=$bdd->prepare($sql);
         $result->execute();
         $etudiants=$result->fetchAll(PDO::FETCH_OBJ);
?>
        <table class=" table table-hover mt-5">
                <thead class="bg-secondary text-center text-white">
                    <tr>
                        <th>nom</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>Ref CNIB</th>
                        <th>Profession</th>
                        <th>supprimer</th>
                        <th>modifier</th>
                    </tr>
                </thead> 
                <?php
                foreach($etudiants as $etudiant) {
                ?>
                    <tr class="">
                        <td><?= $etudiant->nom?></td>
                        <td><?= $etudiant->email?></td>
                        <td><?= $etudiant->phone ?></td>
                        <td><?= $etudiant->refCNIB?></td>
                        <td><?= $etudiant->profession?></td>
                    </tr> 
                <?php
                } ?>
            </table>
       <?php  
     }catch(PDOException $e){
         echo $sql,"<br>",$e->getMessage();
     }
?>