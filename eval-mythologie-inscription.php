<?php
session_start();
include_once "bddMythologie/bddManager.php"; 
include_once "bddMythologie/eval-mythologie-bdd.php";
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm'])) {
    $role = 0;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dataUser = selectUser($username, $db);
    if ($dataUser) {
        $error = "alreadyExist";
        header("Location: eval-mythologie-view_inscription.html.php?error=" . $error);
    } else {
        if ($password != $_POST['passwordConfirm']) {
            $error = "notSamePass";
            header("Location: eval-mythologie-view_inscription.html.php?error=".$error);
        }else{
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $result = addUser($username,$hash,$role,$db);
            if($result){
                $userId = $db->lastInsertId();
                $_SESSION['id']=$userId;
                $_SESSION['pseudo']=$username;
                $_SESSION['role']=$role;
                header("Location: index.php?connexion=ok");
            }
            else{
                $error = "dbError";
                header("Location: eval-mythologie-view_inscription.html.php?error=".$error);
            }
        }
    }
}else{
    $error = "allField";
    header("Location: eval-mythologie-view_inscription.html.php?error=".$error);
}
?>