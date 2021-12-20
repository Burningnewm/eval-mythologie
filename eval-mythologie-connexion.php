<?php
session_start();
include_once "bddMythologie/bddManager.php"; 
include_once "bddMythologie/eval-mythologie-bdd.php";
if(!empty($_POST['username'])&& !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dataUser = selectUser($username, $db);
    if(!$dataUser){
        $error = "dontExist";
        header("Location: eval-mythologie-view-connexion.html.php?error=".$error);
    }
    else{
        if(password_verify($_POST['password'],$dataUser->user_password)){
            echo 'passOK';
            $_SESSION['id']= $dataUser->user_id;
            $_SESSION['pseudo']= $dataUser->user_pseudo;
            $_SESSION['role']= $dataUser->user_role;
            if(!empty($_POST['checkbox'])){
                setcookie('id',$dataUser->user_id,time()+31556926,null,null,true,true);
                setcookie('pseudo',$dataUser->user_pseudo,time()+31556926,null,null,true,true);
                setcookie('role',$dataUser->user_role,time()+31556926,null,null,true,true);
            }
            header("Location: index.php?connexion=ok");
        }else{
            $error = "password";
            header("Location: eval-mythologie-view-connexion.html.php?error=".$error);
        }
    }
}else{
    $error = "allField";
    header("Location: eval-mythologie-view-connexion.html.php?error=".$error);
}
?>  