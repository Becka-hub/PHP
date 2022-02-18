<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="jquery/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>
<body>
<div class="login-container d-flex align-items-center justify-content-center">
    <form action="Controleur/Controleur.php" method="post" class="login-form text-center" >
      <h1 class="mb-5 font-weight-light text-uppercase">Login</h1>
      <div class="form-group">
        <input type="text" name="prenom" class="form-control rounded-pill form-control-lg" placeholder="Prenom...">
      </div>
      <div class="form-group">
        <input type="password" name="mdp" class="form-control rounded-pill form-control-lg" placeholder="Mot de passe...">
      </div>
       <input type="hidden" name="login">
      <input type="submit" class="btn mt-5 btn-primary btn-custom btn-block text-uppercase rounded-pill btn-lg" value="Login">
      <p class="mt-3 font-weight-normal">Don't have an account<a href="#" data-toggle="modal" data-target="#exampleModal"><strong class="ml-2">Register Now</strong></a></p>
    </form>

  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INSCRIRE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Controleur/Controleur.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control" name="nom" id="recipient-name" placeholder="nom">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="prenom" id="recipient-name" placeholder="prenom">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="diplome" id="recipient-name" placeholder="diplome">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="filiere" id="recipient-name" placeholder="filiere">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="vague" id="recipient-name" placeholder="vague">
          </div>
          <div class="form-group">
            <input type="file" class="form-control" name="photo" id="recipient-name" placeholder="photo">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="mdp" id="recipient-name" placeholder="mdp">
          </div>
          <div class="modal-footer d-flex justify-content-center">
             <input type="submit" class="btn btn-primary" value="Ajouter">
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript" src="jquery/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="jquery/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.2.1.js"></script>
    <script src="jquery/owl.carousel/owl.carousel.min.js"></script>
   
</body>
</html>