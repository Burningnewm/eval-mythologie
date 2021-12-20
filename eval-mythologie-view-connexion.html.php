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
<form method="POST" action="eval-mythologie-connexion.php" class="mt-7 containerConnexion">
    <div class=" mb-3">
        <label for="username">Pseudo</label>
        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Entrez votre pseudo" name="username" required>
    </div>
    <?php if (!empty($error) && $error == "dontExist") {
			?> <small class="text-danger">Utilisateur inexistant</small>
			<?php
			}
			?>
    <div class=" mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
    </div>
    <?php if (!empty($error) && $error == "password") {

    ?> <small class="text-danger">Mot de passe incorrect</small>
    <?php
    }
    ?>
    <?php if (!empty($error) && $error == "allField") {
		?>
			<div class="alert alert-danger" role="alert">
				<p>Vous n'avez pas remplis tout les champs</p>
			</div>
		<?php
		}
		?>
    <div class=" mb-3">
        <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
        <label class="form-check-label" for="checkbox">rester connecté</label>
    </div>
    <button type="submit" class="btn btn-dark mb-3">Submit</button><br>
    <a href="eval-mythologie-view-inscription.html.php" style="color:black;">Pas encore inscris? Inscivez-vous</a>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>