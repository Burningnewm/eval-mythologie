<?php

function selectUser($user, $db)
{

    $sql = "SELECT DISTINCT * from utilisateurs WHERE user_pseudo = :user";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":user" => $user
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
    
}

function selectArticle($idarticle, $db)
{
    $sql = "SELECT * from articles WHERE id_article = :idarticle";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":idarticle" => $idarticle
    ]);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function allArticles($db)
{
    // JE stock ma requête
    $sql = "SELECT * FROM articles";

    // J'envoi la requête et stock la reponse
    $req = $db->query($sql);
    // Je traite la reponse et stock les données
    // fetchAll crée un tableau avec toutes les reponses, si vous utilisez fetch, cela renvoi le premier résultat et il faut boucler pour avoir la suite
    $data = $req->fetchAll(PDO::FETCH_OBJ);

    return $data;
}

function deleteArticle($idarticle,$db){
    $sql = "DELETE FROM articles WHERE  id_article = :idarticle";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":idarticle"=>$idarticle
    ]);
    return $result;
}

function addArticle($titleArticle,$contenusArticle,$ImageArticle, $desc_article, $userId, $db){
    $sql = "insert into articles (title_article, contenus_article, img_article, desc_article, user_id) VALUES (:title, :contenus, :image, :desc, :userid)";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":title" => ucfirst($titleArticle),
        ":contenus" => ucfirst($contenusArticle),
        "image" => $ImageArticle,
        ":desc" => ucfirst($desc_article),
        ":userid"=>$userId 
    ]);
    return $result;
}
function addUser($pseudo,$password,$role,$db){
    $sql = "insert into utilisateurs (user_pseudo,user_password,user_role) VALUES (:pseudo, :password, :role)";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":pseudo" => $pseudo,
        ":password" => $password,
        "role" => $role
    ]);
    return $result;
}
function addArticleAuthor($idarticle, $db){
    $sql = "select utilisateurs.user_pseudo FROM utilisateurs INNER JOIN articles on utilisateurs.user_id = articles.user_id WHERE id_article = :idarticle";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":idarticle" => $idarticle
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}
