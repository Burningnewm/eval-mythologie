<?php 
session_start();
if (isset($_GET['error'])) {
	$error = $_GET['error'];
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
<form method="POST" action="eval-mythologie-inscription.php"  class="mt-7 containerConnexion">
  <div class=" mb-3">
    <label for="username">Pseudo</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Entrez" name="username" required>
  </div>
  <div class=" mb-3">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
 required>
 <small>Au moins 8 caractères, une majuscule, une minuscule et un chiffre</small>
  </div>
  <div class=" mb-3">
    <label for="passwordConfirm">Confirmez votre Password</label>
    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="Password Confirmation" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
 required>
  </div>
  <?php
  if (!empty($error) && $error == "notSamePass") {
            ?> <small class="text-danger">Vous avez rentré deux mots de passes différents</small>
            <?php
            }
            ?>
  <button type="submit" class="btn btn-dark mb-3" name="submit">Submit</button><br>
  <?php
        if (!empty($error) && $error == "allField") {
        ?> <small class="text-danger">Vous n'avez pas rentré tout les champs</small>
        <?php
        }
        ?>
</form>
<?php if (!empty($error) && $error == "dbError") {
    ?>
        <div class="alert alert-danger" role="alert">
            <p>Echec de la création de compte</p>
        </div>
    <?php
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>