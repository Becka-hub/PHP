<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="jquery/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="jquery/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery-3.2.1.js"></script>
    <script src="jquery/jquery-3.4.1.js"></script>
    <script src="jquery/jquery-3.1.1 ajax.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center">AJAX</h1>
<div class="row mt-5">
<div class="col-sm-12 col-md-6 align-items-center">
<form method="post" class="formulaire text-center">
    <div class="return"></div>
  <div class="form-group">
    <input type="text" class="nom" placeholder="Votre nom" name="nom" id="" aria-describedby="emailHelp">
  </div>
  <span class="error_nom"></span>
  <div class="form-group">
   <textarea name="message" placeholder="Votre message" class="message" id="" cols="20" rows="2"></textarea>
  </div>
  <input type="submit" value="Envoyer" class="btn btn-primary large"></input>
</form>
</div>
<div class="col-sm-12 col-md-6">
<div class="affiche overflow-auto p-5"></div>
</div>
</div>
</div>
<script src="ajax/script.js"></script>
</body>
</html>