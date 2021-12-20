<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <h1> <a class="navbar-brand" href="index.php"><img src="images/logoMythologie.png" alt="Logo Mythologie" style="width:5rem;"></a></h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
          </li>
          <?php 
          if (!isset($_SESSION['id'])){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="eval-mythologie-view-connexion.html.php">Connexion/Inscription</a>
          </li>
          <?php 
          }
          ?>
          <?php 
          if (isset($_SESSION['role']) && $_SESSION['role'] == 1){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="eval-mythologie-view-article-ajouter.html.php">Ajouter un article</a>
          </li>
          <?php 
          }
          ?>
          <?php 
          if (isset($_SESSION['id'])){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="eval-mythologie-deconnexion.php?deco=ok">Déconnexion</a>
          </li>
          <?php 
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>