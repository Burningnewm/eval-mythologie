<?php
session_start();
include_once "bddMythologie/bddManager.php"; 
include_once "bddMythologie/eval-mythologie-bdd.php";
$article = $_POST['title_article'];
$data = selectArticle($article, $db);
if (!empty($data)) {
    header("Location: eval-mythologie-view-article-ajouter.html.php?error=exist");
} else {
    $checkCarac = str_replace(["é","è","à"],["e","e","a"],$_POST['title_article']);
    if(preg_match('/\W+/', $checkCarac)){
        $error = "specialC";
        header("Location: eval-mythologie-view-article-ajouter.html.php?error=" . $error);exit;
    }
    if (!empty($_FILES['article_img'])) {
        $info = pathinfo($_FILES['article_img']['name']);

        $_FILES['article_img']['name'] = $_POST['title_article'] . "." . $info['extension'];

        $error = null;
        if ($_FILES['article_img']['size'] > 1000000) {
            $error = "size";
        }
        if ($info['extension'] != "jpg" && $info['extension'] != "png") {
            $error .= "-format";
        }
        if(strlen($_POST['contenus_article']) < 100 ){
            $error .= "-length";
        }
        if(strlen($_POST['desc_article']) > 250){
            $error .= "-desc";
        }
        if ($error == null) {
            move_uploaded_file($_FILES['article_img']['tmp_name'], "images/" . $_FILES['article_img']['name']);
            $result = addArticle($_POST['title_article'],$_POST['contenus_article'],$_FILES['article_img']['name'], $_POST['desc_article'], $_SESSION['id'], $db);
        }
        else{
            header("Location: eval-mythologie-view-article-ajouter.html.php?error=" . $error);
        }   
    } 
    if($result) {
        header("Location: eval-mythologie-view-article-ajouter.html.php?add=success");
    }
}
