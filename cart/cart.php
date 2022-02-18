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
                          <a class="nav-link" href="index.php">Produit</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Categories</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="Checkout.php">Checkout</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="cart.php"><i class=" fa fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                        </li>
                      </ul>
                    </div>
                  </nav>
                 <div class="row justify-content-center">
                        <div class="col-lg-10">

                        <div style="display:<?php if(isset($_SESSION['showAlert']))
                        {
                            echo $_SESSION['showAlert'];
                        }else{
                          echo 'none'; 
                        }
                        unset($_SESSION['showAlert']);
                         ?> ;" class="alert alert-success alert-dismissible mt-2">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?php if(isset($_SESSION['message']))
                        {
                            echo $_SESSION['message'];
                            unset($_SESSION['showAlert']);
                        } ?></strong>
                        </div>
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered table-striped text-center">
                               <thead>
                               <tr>
                                    <td colspan="7">
                                        <h4 class="text-center text-info m-0">Votre produit dans le panier</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Quantiter</th>
                                    <th>Total prix</th>
                                    <th>
                                        <a href="Affiche.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Vous êtes sur de suprimer tous?');"> <i class="fa fa-trash"></i> Effacer Tous</a>
                                    </th>
                                </tr>
                               </thead>
                               <tbody>
                                   <?php
                                   require('model/Panier.php');
                                   $panier=new Panier();
                                   $res=$panier->Affiche();
                                   $grand_total=0;
                                   foreach($res as $resultat){
                                       ?>
                                       <tr>
                                        <input type="hidden" class="pid" value="<?php echo $resultat['id']; ?>">
                                       <td><?php echo $resultat['id']; ?></td>
                                       <td><img src="data:image;base64,<?php echo $resultat['image']; ?>" class="card-img-top" style="width:50px;height:50px;"/></td>
                                       <td><?php echo $resultat['name']; ?></td>
                                       <td><?php echo number_format($resultat['price'],2)." Ar"; ?></td>
                                       <input type="hidden" class="pprice" value="<?php echo $resultat['price']; ?>">
                                       <td class="justify-content-center">
                                           <input type="number" class="form-control itemQty" value="<?php echo $resultat['qty']; ?>" style="width: 80px;">
                                        </td>
                                       <td><?php echo number_format($resultat['total'],2)." Ar"; ?></td>
                                       <td>
                                           <a href="Affiche.php?remove=<?php echo $resultat['id']; ?>" class="text-danger lead" onclick="return confirm('Vous êtes sur de suprimer ce produit?');"><i class="fa fa-trash"></i></a>
                                       </td>
                                       </tr>
                                       <?php $grand_total += $resultat['total']; ?>s
                                       <?php
                                   }
                                   ?>
                                       <tr>
                                           <td colspan="3">
                                              <a href="index.php" class="btn btn-success"><i class="fa fa-cart-plus"></i> Continuer l'achat</a>
                                           </td>
                                           <td colspan="2"><b>Grand Total</b></td>
                                           <td><b><?php echo number_format($grand_total,2)." Ar"; ?></b></td>
                                           <td>
                                               <a href="Validation.php" class="btn btn-info"> <i class="fa fa-credit-card"></i> Validation</a>
                                           </td>
                                       </tr>
                               </tbody>
                                </table>
                            </div>
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
        $('.itemQty').on('change',function(){
           var $el=$(this).closest('tr');
           var pid=$el.find('.pid').val();
           var pprice=$el.find('.pprice').val();
           var qty=$el.find('.itemQty').val();
           location.reload(true);
           $.ajax({
            url:'Affiche.php',
            method:'POST',
            cache:false,
            data:{qty:qty,pid:pid,pprice:pprice},
            success:function(response){

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