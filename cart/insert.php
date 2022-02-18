<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
 <div class="container">
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name :</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="photo">Photo :</label>
    <input type="file" class="form-control" name="photo" id="exampleInputPassword1">
  </div>
  <label for="price">Price :</label>
    <input type="text" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp">
    <label for="price">Code :</label>
    <input type="text" class="form-control" name="code" id="exampleInputEmail1" aria-describedby="emailHelp">
  <input type="submit" class="btn btn-primary mt-2" name="upload" value="Ajouter">
  <a href="index.php">Panier</a>
    </form>
   
</div>
<script type="text/javascript" src="jquery/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="jquery/popper.min.js"></script>
<script type="text/javascript" src="bootstrap-4.3.1/js/bootstrap.min.js"></script>  
<?php
require('model/Produit.php');
$pro=new Produit();
if(isset($_POST['upload'])){
    if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['photo']['tmp_name'])) {
    $file=file_get_contents($_FILES["photo"]["tmp_name"]);
    $image=base64_encode($file);
    if(!empty($image)){
    $pro->setName($_POST['name']);
    $pro->setImage($image);
    $pro->setPrice($_POST['price']);
    $pro->setCode($_POST['code']);
    $pro->Insert();
} else{
    echo" veuillez selectionez un image";
}
}
}
}
?>
</body>
</html>