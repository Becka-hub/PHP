<?php
session_start();
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
                  <div id="message">

                  </div>
                  <div class="row mt-2 pb-3">
                      <?php
                      require('model/Produit.php');
                      $produit=new Produit();
                      $res=$produit->Affiche();
                      foreach($res as $resultat){
                        ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                            <div class="card-deck">
                                <div class="card p-2 border-secondary mb-2">
                                <img src="data:image;base64,<?php echo $resultat['image']; ?>" class="card-img-top" height="200"/>
                                <div class="card-body p-1">
                                 <h4 class="card-title text-center text-info"><?php echo $resultat['name']; ?></h4>
                                 <h5 class="card-text text-center text-danger"><?php echo number_format($resultat['price'],2);?> Ar</h5>
                                </div>
                                <div class="card-footer p-1">
                                    <form action="" class="form-submit">
                                        <input type="hidden" class="id" value="<?php echo $resultat['id']; ?>">
                                        <input type="hidden" class="name" value="<?php echo $resultat['name']; ?>">
                                        <input type="hidden" class="price" value="<?php echo $resultat['price']; ?>">
                                        <input type="hidden" class="image" value="<?php echo $resultat['image']; ?>">
                                        <input type="hidden" class="code" value="<?php echo $resultat['code']; ?>">
                                        <button class="btn btn-info btn-block addItem"><i class="fa fa-cart-plus"></i>&nbsp; Add to car</button>
                                    </form>

                                </div>
                                </div>
                            </div>
                        </div>
                       <?php
                      }
                      ?>
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
      $('.addItem').click(function(e){
         e.preventDefault();
         var $from=$(this).closest(".form-submit");
         var id=$from.find('.id').val();
         var name=$from.find('.name').val();
         var price=$from.find('.price').val();
         var image=$from.find('.image').val();
         var code=$from.find('.code').val();
         $.ajax({
            url:'Affiche.php',
            method:'POST',
            data:{
                id:id,name:name,price:price,image:image,code:code
            },
            success:function(response){
             $("#message").html(response);
             window.scrollTo(0,0);
             affiche();
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