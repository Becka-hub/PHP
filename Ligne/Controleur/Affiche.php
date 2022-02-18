<?php
session_start();
$_SESSION['login']=true;
require('../Model/Document.php');
require('../Model/Message.php');
require('../Model/Notif.php');
require('../Model/Etudiant.php');
require('../Model/Publication.php');
$document=new Document();
$message=new Message();
$notif=new Notif();
$etudiant=new Etudiant();
$publication=new Publication();
if(isset($_POST['diplome']) && isset($_POST['filiere']) && isset($_POST['categorie']) && isset($_POST['type'])){
    $diplome=$_POST['diplome'];
    $filiere=$_POST['filiere'];
    $vague=$_POST['vague'];
    $categorie=$_POST['categorie'];
    $type=$_POST['type'];
$res=$document->Affiche($diplome,$filiere,$vague,$categorie,$type);
foreach($res as $resultat){
    $card='<div class="col-md-3 mt-2">
    <div class="card">
      <div class="img-card">
        <img src="Controleur/'.$resultat['COUVERTURE'].'" height="130px" width="100%">
      </div>
      <div class="card-body text-center">
        <h5 class="card-title text-center">'.$resultat['TITRE'].'</h5>
        <a href="#" id="voir" value="'.$resultat['IDDOCUMENT'].'" class="btn btn-primary">Regarder</a>
      </div>
    </div>
    </div>';
    echo $card;
}

}


if(isset($_POST['message']) && isset($_POST['id'])){
  $message->setMESSAGE($_POST['message']);
  $message->setIDPERSONNE($_POST['id']);
  $message->setDIPLOME($_POST['diplomeEtudiant']);
  $message->setFILIERE($_POST['filiereEtudiant']);
  $message->setVAGUE($_POST['vagueEtudiant']);
  $message->Insert();
}



  if(isset($_POST['idetudiant']) && isset($_POST['readMessage'])){
  $idEtudiant=$_POST['idetudiant'];
  $rows=$message->AfficheId($idEtudiant);
     foreach($rows as $resultat){
         $message ='
        <div class="col-sm-12 col-md-12 col-lg-12 mb-1 mt-2">
         <div class="message_envoyer">
         <div class="col-sm-12 col-md-12">
        <span class="text">'.$resultat['MESSAGE'].'</span>
        </div>
        </div>
        </div>
      ';
      if($resultat['MESSAGE'] !="" && $resultat['REPONSE'] !=""){
          $message .='
          <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
          <div class="reponse">
          <img src="image/logoE-media.png" width="50px" class="docteur" height="30px"/>
          <span class="text">'.$resultat['REPONSE'].'</span>
          </div>
          </div>
          ';
      }
      else{
          $message .='<p class="text-center ">....</p>';  
      }
      echo $message; 
      }
      
   }




   if(isset($_POST['messTous'])){
     $table='<table class="table table-border-danger table-striped">
     <tr>
     <th>Diplome</th>
     <th>Filiere</th>
     <th>Vague</th>
     <th>Message</th>
     <th>Reponse</th>
     <th>Repondre</th>
     </tr> 
  ';
      $res=$message->Affiche();
     foreach($res as $resultat){
       if($resultat['REPONSE']==""){
         $table .='
          <tr class="">
          <td>'.$resultat['DIPLOME'].'</td>
          <td>'.$resultat['FILIERE'].'</td>
          <td>'.$resultat['VAGUE'].'</td>
          <td>'.$resultat['MESSAGE'].'</td>
          <td>'.$resultat['REPONSE'].'</td>
          <td> <button class="btn  btn-outline-success" data-toggle="modal" data-target="#Updata" onclick="GetUser('.$resultat['IDMESSAGE'].')">Repondre</button> </td>
          </tr>
         ';
        }
       }
       $table .='</table>';
       echo $table;
     }
   

    
     if(isset($_POST['Upid']) && isset($_POST['Upid'])!=""){
      $upID=$_POST['Upid'];
      $res=$message->AfficheIdOne($upID);
      $row=array();
      foreach($res as $resultat){
          $row=$resultat;
          
      }
      echo json_encode($row);
  }
  


  if(isset($_POST['idM']) && isset($_POST['reponse'])){
    $idM=$_POST['idM'];
    $reponse=$_POST['reponse'];
    $message->update($reponse,$idM);
    echo "Reponse avec succes";
}











if(isset($_POST['message_groupée'])){
$publication->setDIPLOME($_POST['diplomeEtu']);
$publication->setFILIERE($_POST['filiereEtu']);
$publication->setIDETUDIANT($_POST['idEtu']);
$publication->setPRENOM($_POST['prenomEtu']);
$publication->setVAGUE($_POST['vagueEtu']);
$publication->setPUBLICATION($_POST['messageEtu']);
$publication->Insert();
}

if(isset($_POST['AffichePub'])){
  $messageGroups="";
  $row=$publication->AfficheId($_POST['diplome'],$_POST['filiere'],$_POST['vague']);
  foreach($row as $resultat){

  if($_SESSION['login']=true){
    $messageGroups ='
      <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
      <div class="reponse ml-5">
      <span class="text">'.$resultat['PUBLICATION'].'</span>
      </div>
      </div>
      ';
  }
  else{
    $messageGroups ='
    <div class="col-sm-12 col-md-12 col-lg-12 mb-1 mt-2">
     <div class="message_envoyer mr-5">
     <div class="col-sm-12 col-md-12">
     <img src="../image/logoE-media.png" width="50px" class="docteur" height="30px"/>
    <span class="text">'.$resultat['PUBLICATION'].'</span>
    </div>
    </div>
    </div>
  '; 
  }
  echo $messageGroups; 
  }
 
}


?>