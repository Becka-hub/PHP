<head>
  <meta charset="utf-8">
  <title>Gestion stagiaires</title>
  <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" href="bootstrap-3.3.7/js/bootstrap.min.js">
  </script>
  <link rel="stylesheet" href="css/modal.css">
  <script src="js/jquery-3.4.1.js"></script>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/main.js">
</script>
</head>
<div class="container">
  <h2>Formulaire</h2>
  <form action='../controls/indexControleur.php?action=ajouterEntreprise' method="post">
    <div class="form-group">
      <label for="nom">Nom d'entreprise:</label>
      <input type="text" class="form-control" name="nomEntreprise" placeholder="Entreprise">
    </div>
    <div class="form-group">
      <label for="adresse">Adresse:</label>
      <input type="text" class="form-control" name="AdresseEntreprise" placeholder="Adresse">
    </div>
    <div class="form-group">
      <label for="nomU">Nom d'utilisateur:</label>
      <input type="text" class="form-control" name="nomUtilisateur" placeholder="utilisateur">
    </div>
   <div class="form-group">
      <label for="pwd">Mot de passe :</label>
      <input type="password" class="form-control" name="pwd" placeholder="Mot de passe">
    </div>
    <div class="form-group">
       <label for="pwd">Confirme mot de passe :</label>
       <input type="password" class="form-control" name="Cpwd" placeholder="Mot de passe">
     </div>
  <input type="submit"  value="Ajouter" class="btn btn-success">
  </form>
</div>
