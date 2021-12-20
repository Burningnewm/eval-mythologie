<?php 
session_start();
include_once "bddMythologie/bddManager.php"; 
include_once "bddMythologie/eval-mythologie-bdd.php";
if (!empty($_GET['error'])) {
    $error = explode("-", $_GET['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Eval Mythologie</title>
</head>
<body>
<?php 
    include_once "eval-mythologie-view-header.html.php"; 
?>
 <form method="POST" action="eval-mythologie-article-ajouter.php" enctype="multipart/form-data" class="mt-7 containerConnexion">
            <div class="form-group mb-3">
                <label for="title_article">Titre de l'article</label>
                <input type="text" class="form-control" id="title_article" placeholder="Titre de l'article" required name="title_article">
            </div>
            <div class="form-group mb-3">
                <label for="desc_article">Description de l'article</label>
                <input type="text" class="form-control" placeholder="Description de l'article" required name="desc_article">
            </div>
            <div class="form-group mb-3">
                <label for="contenus_article">Contenus de l'article</label>
                <textarea class="form-control" id="contenus_article" name="contenus_article" rows="3"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="article_img">Upload image de l'article (format jpg/png)</label>
                <input type="file" class="form-control" placeholder="Image de l'article" required name="article_img">
            </div>

            <button type="submit" class="btn btn-dark">Créer l'article</button>
            <?php if (!empty($error)) {

            ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo "<p>";
                    foreach ($error as $error) {
                        if ($error == "format") {
                            echo " La photo doit être au format jpg ou png. </br> ";
                        } else if ($error == "size") {
                            echo " Le fichier ne doit pas dépasser les 3 Mo. </br> ";
                        }
                        else if ($error == "exist") {
                            echo " L'article que vous avez rentré existe déjà.";
                        }
                        else if ($error == "specialC") {
                            echo " Caractères spéciaux interdit sur le titre de l'article.";
                        }
                        else if ($error == "length"){
                            echo "Le contenus de l'article est trop court, minimum 100 caractères.";
                        }
                        else if ($error == "desc"){
                            echo "Le contenus de la description est trop longue, maximum 250 caractères.";
                        }
                    }
                    echo "</p>";
                    ?>
                </div>
            <?php
            } else if (!empty($_GET['add'])) {
            ?>
                <div class="alert alert-success" role="alert">
                    <p>Article ajouté avec succès</p>
                </div>
            <?php
            }
            ?>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>