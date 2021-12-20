<?php
session_start();
include_once "bddMythologie/bddManager.php"; 
include_once "bddMythologie/eval-mythologie-bdd.php";
$idarticle = $_GET['id'];
$data = selectArticle($idarticle, $db);
$delete = deleteArticle($idarticle,$db);
unlink('images/' . $data[0]->img_article);
header("Location: index.php");