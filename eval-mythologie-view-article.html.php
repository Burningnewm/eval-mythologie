<?php
session_start();
include_once "bddMythologie/bddManager.php"; 
include_once "bddMythologie/eval-mythologie-bdd.php";
$article = $_GET['id'];
$data = selectArticle($article, $db);
$author = addArticleAuthor($article, $db);
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
<?php include_once "eval-mythologie-view-header.html.php";?>

<div class="card mb-3 center">
    <img class="card-img-top center sm-w-100"  src="images/<?= $data[0]->img_article?>" alt="<?=htmlspecialchars($data[0]->title_article) ?>" style="max-width: 400px; min-width:200px; max-height: 500px; min-height:250px">
    <div class="card-body">
        <h5 class="card-title"><?=htmlspecialchars($data[0]->title_article);  ?></h5>
        <p class="card-text"><?=htmlspecialchars($data[0]->contenus_article) ?></p>
        <p class="card-text"><small class="text-muted">Auteur : <?=$author->user_pseudo?></small></p>
        <p class="card-text"><small class="text-muted">Date de publication: <?=$data[0]->date_article?></small></p>
        <?php 
            if (isset($_SESSION['role']) && $_SESSION['role'] == 1){
        ?>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalSupprimer">
            Supprimer l'article
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalSupprimer" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Suppression de l'article</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment supprimer l'article concernant <?=htmlspecialchars($data[0]->title_article);  ?> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <a href="eval-mythologie-delete-article.php?id=<?= $article ?>" type="button" class="btn btn-danger">Supprimer</a>
                </div>
                </div>
            </div>
            </div>
        <?php 
        
        }?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>