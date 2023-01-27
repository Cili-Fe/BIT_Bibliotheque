<?php
    require_once "dbConnect.php";
    try{
        $sql = "SELECT idAbonne,nom FROM abonne";
        $result=$bdd->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
       }catch(PDOException $e){
        echo $sql,"<br>",$e->getMessage();
    }
    try{
        $sql1 = "SELECT idLivre,titre FROM livre WHERE disponible = 1";
        $result1=$bdd->prepare($sql1);
        $result1->execute();
        $result1->setFetchMode(PDO::FETCH_ASSOC);
       }catch(PDOException $e){
        echo $sql,"<br>",$e->getMessage();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>location</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar mt navbar-expand-lg navbar-light text-white bg-secondary">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white"  href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="afficherAbonne.php">Abonne</a>
        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="afficherlivre.php">Livre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="locateTreatment.php">Location</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
        <div class="container"><br><br>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Ajouter</button>
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">		
                        <div class="modal-body">
                            <div class="container">
                                <form action="location.php" method="POST">
                                    <h2 class="text-center">Location d'un livre</h2><br><br> 
                                    <div class="container">
                                        <div class="form-group">
                                            <input type="hidden" name="idAbonne" value="" class="form-control" placeholder="date de location" required="required" autocomplete="">
                                        </div><br><br>
                                        <div class="form-group">
                                            <label for="">Select un abonne</label>
                                            <?php
                                                echo '<select name="idAbonne" id="" class="form-control">';
                                                    while($data = $result->fetch()){
                                                        echo '<option value="'.$data['idAbonne'].'">'.$data['nom'].'</option>';
                                                    }
                                                echo '</select>';    
                                            ?>
                                        </div><br><br>
                                        <div class="form-group">
                                        <label for="">Select un livre</label>
                                            <?php
                                                echo '<select name="idLivre" id="idLivre" class="form-control">';
                                                    while($data1 = $result1->fetch()){
                                                        echo '<option value="'.$data1['idLivre'].'">'.$data1['titre'].'</option>';
                                                    }
                                                echo '</select>'; 
                                            ?>
                                        </div><br><br>
                                        <div class="form-group">
                                            <input type="date" name="dateLocation" class="form-control" placeholder="date de location" required="required" autocomplete="">
                                        </div><br><br>
                                        <div class="form-group">
                                            <input type="date" name="dateRemise" class="form-control" placeholder="date de remise" required="required" autocomplete="">
                                        </div><br><br>
                                        <div class="form-group">
                                            <input type="text" name="amende" class="form-control" placeholder="Amende" required="required" autocomplete="">
                                        </div><br><br> 
                                        <div class="form-group">
                                            <label for="" class="w-5">Etat du livre pendant la location</label>
                                            <select name="etatLivre" id="" class="form-control">
                                                <option value="neuf">neuf</option>
                                                <option value="moyen">moyen</option>
                                                <option value="vieux">vieux</option>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label for="">Etat du livre a la remise</label>
                                            <select name="etatRemise" id="" class="form-control">
                                                <option value="neuf">neuf</option>
                                                <option value="moyen">moyen</option>
                                                <option value="vieux">vieux</option>
                                            </select>
                                        </div><br><br>
                                        <div class="formGroup">
                                            <button type="submit" class="btn btn-danger btn-block">Add</button>
                                        </div>  
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-danger" data-bs-dismiss="modal">close</button>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        <div class="container">
        <?php
                  require_once "dbConnect.php";
                  try{
                    
                    $bdd-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM louer";
                    $result=$bdd->prepare($sql);
                    $result->execute();
                    $etudiants=$result->fetchAll(PDO::FETCH_OBJ);
                   
                  ?>
                <?php
                ?>
      
                  <table class=" table table-hover mt-5">
                <thead class="bg-secondary text-center text-white">
                    <tr>
                        <th>Livre</th>
                        <th>Abonne</th>
                        <th>Date de location</th>
                        <th>Date de remise</th>
                        <th>Amende</th>
                        <th>Etat du livre</th>
                        <th>Etat remise</th>
                    </tr>
                </thead> 
                <?php
                foreach($etudiants as $etudiant) {
                ?>
                    <tr class="">
                        <td>
                            <?php
                                try{
                                    $sql4="SELECT titre FROM livre WHERE idLivre=$etudiant->idLivre";
                                    $recupData=$bdd->prepare($sql4);
                                    $recupData->execute();
                                    $book =$recupData->fetch(PDO::FETCH_OBJ);
                                }catch(PDOException $e){
                                    echo $sql4,"<br>",$e->getMessage();
                                }
                            ?>
                            <?= $book->titre?>
                        </td>

                        <td>
                            <?php
                                try{
                                    $sql3="SELECT nom FROM abonne WHERE idAbonne=$etudiant->idAbonne";
                                    $recupData=$bdd->prepare($sql3);
                                    $recupData->execute();
                                    $abonne =$recupData->fetch(PDO::FETCH_OBJ);
                                }catch(PDOException $e){
                                    echo $sql3,"<br>",$e->getMessage();
                                }
                            ?>
                            <?=$abonne->nom?>
                        </td>
                        <td><?= $etudiant->dateLocation?></td>
                        <td><?= $etudiant->dateRemise?></td>
                        <td><?= $etudiant->amende?></td>
                        <td><?= $etudiant->etatLivre?></td>
                        <td><?= $etudiant->etatRemise?></td>
                    </tr> 
                <?php
                } ?>
            </table>
            <?php  
     }catch(PDOException $e){
         echo $sql,"<br>",$e->getMessage();
     }
      ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>