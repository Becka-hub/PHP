<?php
session_start();
require('model/Panier.php');
require('model/Ordre.php');
$order=new Ordre();
$panier=new Panier();
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_POST['image'];
    $code=$_POST['code'];
    $qty=1;
    $panier=new Panier();
    $res=$panier->AfficheCode($code);
    $pcode="";
    foreach($res as $resultat){
    $pcode=$resultat['code'];
    }
    if(!$pcode){
       $panier->setName($name);
       $panier->setPrice($price);
       $panier->setImage($image);
       $panier->setQty($qty);
       $panier->setCode($code);
       $panier->setTotal($price);
       $panier->Insert();
       echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Item addes to your cart!</strong>
       </div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Item already addes to your cart!</strong>
       </div>';
    }
}
$rows="";
if(isset($_GET['cartItem']) && isset($_GET['cartItem'])=='cart_item'){
     $res=$panier->AfficheCount();
     foreach($res as $resultat){
        $rows=$resultat['total'];
     }
     echo $rows;
     
}
if(isset($_GET['remove'])){
   $id=$_GET['remove'];
   $panier->Delete($id);
   $_SESSION['showAlert']='block';
   $_SESSION['message']='Produit effacer!';
   header('location:cart.php');
}
if(isset($_GET['clear'])){
   $panier->DeleteTous();
   $_SESSION['showAlert']='block';
   $_SESSION['message']='Panier vide!';
   header('location:cart.php');
}
if(isset($_POST['qty'])){
   $qty=$_POST['qty'];
   $pid=$_POST['pid'];
   $pprice=$_POST['pprice'];
   $Total_price=$qty*$pprice;
   $panier->Modifier($qty,$Total_price,$pid);
}
if(isset($_POST['action']) && isset($_POST['action'])=='order'){
   $name=$_POST['nom'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $adresse=$_POST['adresse'];
   $pmode=$_POST['pmode'];
   $produits=$_POST['produits'];
   $grand_total=$_POST['grand_total'];
   $order->setName($name);
   $order->setEmail($email);
   $order->setPhone($phone);
   $order->setAdresse($adresse);
   $order->setProduit($produits);
   $order->setMontant($grand_total);
   $order->Insert();
   $data='';
   $data.='
      <div class="text-center">
      <h1 class="display-4 mt-2 text-danger">Merci Pour votre Achat</h1>
      <h2 class="text-success">Paymant avec succéss!</h2>
      <h4 class="bg-danger text-light rounded p-2">Produits: '.$produits.'</h4>
      <h4>Votre nom: '.$name.'</h4>
      <h4>Votre email: '.$email.'</h4>
      <h4>Votre phone: '.$phone.'</h4>
      <h4>Votre adresse: '.$adresse.'</h4>
      <h4><b>Total de paymant:</b> '.number_format($grand_total,2).'</h4>
      <h4>Mode de paymant: '.$pmode.'</h4>
      </div>
   ';
   echo $data;
}
?>