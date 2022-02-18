<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gestion stagiaires</title>
    <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" href="bootstrap-3.3.7/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="css/modal.css">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/main.js">
  </script>
  </head>
  <body>
<div class="container">
  <div class="row">
    <div class="col-sm-8"style="position: absolute;justyfy-content:center;">
      <form  action='controls/indexControleur.php?action=login' method="post">
         <label for="text">Utilisateur:</label>
           <div class="form-group input-group">
             <span class="input-group-addon">
             <span class="glyphicon glyphicon-user"></span>
             </span>
             <input type="text" class="form-control" name="nom" required>
          </div>
         <label for="password">mot de passe:</label>
           <div class="form-group input-group">
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
                </span>
                <input type="password" class="form-control" name="pass" required><br/>
          </div>
          <div class="form-group input-group">
          <input type="submit" class="btn btn-success" value="Connecter">
          </div>
      </form>
      <a href="vue/Formulaire.php">Creer un conte</a>
      <?php
       ?>
    </div>
  </div>
  <br/>
</div>
  
</body>
</html>
