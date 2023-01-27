<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>liste abonne</title>
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
                    <input class="form-control me-2" type="search" onkeyup="" placeholder="Search" aria-label="Search">
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
                            <form action="insertion.php" method="POST">
                                <h2 class="text-center">Ajouter un abonne</h2><br><br> 
                                <div class="container">
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control" placeholder="nom" required="required" autocomplete="">
                                    </div><br><br>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="email" required="required" autocomplete="">
                                    </div><br><br>
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" required="required" autocomplete="">
                                    </div><br><br>
                                    <div class="form-group">
                                        <input type="text" name="refCNIB" class="form-control" placeholder="CNIB" required="required" autocomplete="">
                                    </div><br><br>
                                    <div class="form-group">
                                        <!-- <input type="text" name="field" class="form-control" placeholder="field" required="required" autocomplete=""> -->
                                        <select name="profession" id="" class="form-group">
                                            <option value="etudiant" name="field">etudiant</option>
                                            <option value="medecin" name="field">medecin</option>
                                            <option value="informaticien" name="field">informaticien</option>
                                        </select>
                                    </div><br><br>
                                    <div class="form-group">
                                        <input type="file" name="photo" class="form-control" placeholder="" required="required" autocomplete="">
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

        <?php 
    require_once "dbConnect.php";

    try{

         $bdd-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT * FROM abonne";
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
                
            </table>
        </div>
    </div>

    <script>
        function searchData(resp){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function(){
                document.getElementById("demo").innerHTML  = this.responseText;
            }
        xhttp.open("GET", "ajaxReqest.php?valeur="+resp,true);
        xhttp.send();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>