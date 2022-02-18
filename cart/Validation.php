<?php 
require('model/Panier.php');
$grand_total=0;
$allItems='';
$items=array();
$panier=new Panier();
$res=$panier->AfficheValide();
foreach($res as $resultat){
    $grand_total+=$resultat['total'];
    $items[]=$resultat['ItemQty'];
}
$allItems=implode(",",$items);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
<div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="Index.php">Choping</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                          <a class="nav-link active" href="index.php">Produit <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Categories</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="Checkout.php">Checkout</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="cart.php"><i class=" fa fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                        </li>
                      </ul>
                    </div>
                  </nav>
                 <div class="row justify-content-center">
                     <div class="col-lg-6 px-4 pb-4" id="order">
                       <h4 class="text-center text-info p-2">
                         Remplir les Formulaires
                       </h4>
                       <div class="jumbotron p-3 mb-2 text-center">
                          <h6 class="lead"><b>Produits: </b><?php echo $allItems; ?></h6>
                          <h6 class="lead"><b>Tous ces produit coûtes</b></h6>
                          <h5><b>Total: </b><?php echo number_format($grand_total,2)." Ar"; ?></h5>
                       </div>
                       <form action="" method="post" id="placeOrder">
                          <input type="hidden" name="produits" value="<?php echo $allItems; ?>">
                          <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
                          <div class="form-group">
                              <input type="text" name="nom" placeholder="Entre votre nom..." class="form-control" required>
                          </div>
                          <div class="form-group">
                              <input type="email" name="email" placeholder="Entre votre email..." class="form-control" required>
                          </div>
                          <div class="form-group">
                              <input type="tel" name="phone" placeholder="Entre votre telephone..." class="form-control" required>
                          </div>
                          <div class="form-group">
                             <textarea name="adresse" class="form-control" rows="2" cols="10" placeholder="Entrer votre adresse..." required></textarea>
                          </div>
                          <h6 class="text-center lead">
                             Selectionner le mode de paymant
                          </h6>
                          <div class="form-group">
                              <select name="pmode" class="form-control" >
                                  <option value="" selected disabled> Paymant mode :</option>
                                  <option value="paypal">Paypal</option>
                                  <option value="banking">Banking</option>
                                  <option value="card">Operateurs</option>
                                  <option value="livraison">Livraison</option>
                              </select>
                          </div>
                          <div class="form_group">
                              <input type="submit" class="btn btn-danger btn-block" value="Envoyer" >
                          </div>
                       </form>
                     </div>
                 </div>

    </div>



   
<script type="text/javascript" src="jquery/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="jquery/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery-3.2.1.js"></script>
    <script src="jquery/jquery-3.4.1.js"></script>
    <script src="jquery/jquery.min.js"></script> 
    <script>
    $(document).ready(function(){
        $('#placeOrder').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:'Affiche.php',
            method:'POST',
            data:$('form').serialize()+"&action=order",
            success:function(response){
            $('#order').html(response);
            }
         });
        });
      affiche();
      setInterval(affiche,1000);
      function affiche(){
          $.ajax({
              url:'Affiche.php',
              method:'get',
              data:{cartItem:"cart_item"},
              success:function(response){
               $("#cart-item").html(response);
              }
          });
      }
    });
    </script> 
</body>
</html>