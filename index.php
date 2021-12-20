<?php session_start();
include_once "bddMythologie/bddManager.php"; 
include_once "bddMythologie/eval-mythologie-bdd.php";
$data = allArticles($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/logoMythologie.png">
    <title>Eval Mythologie</title>
</head>
<body>
    <?php include_once "eval-mythologie-view-header.html.php";?>
    <div class="containerArticles">
    <?php foreach ($data as $value) {
    ?>
    <div class="card" style="width: 18rem;">
        <a href="eval-mythologie-view-article.html.php?id=<?=$value->id_article?>" style="text-decoration: none; color: black">
            <div class="card-body">
            <h5 class="card-title"><?=htmlspecialchars($value->title_article);  ?></h5>
            <p class="card-text"><?=htmlspecialchars($value->desc_article);  ?>.</p>
            </div>
            <div class="card-footer mt-auto">
                <a href="eval-mythologie-view-article.html.php?id=<?=$value->id_article?>" class="btn btn-dark">Consulter l'article</a>
            </div>
            </a>
        </div>
    <?php 
    }
    ?>
    </div>
    <div></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>