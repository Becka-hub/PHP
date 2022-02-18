<?php
session_start();
$_SESSION['login']=true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/forum.css">
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../jquery/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light ">
<div class="container">
<img src="../image/2 (9).jpg" class="image_profil "  width="3%" alt="">
<p class="nom_utilisateur " style="animation-delay: 2s"><?php echo $_SESSION['PRENOM']; ?>/TIC/S1/V1</p>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ml-auto">
                      <li class="nav-item " style="animation-delay: 2.6s">
                      <a class="nav-link" href="../page.php">
                      <i class="fa fa-home"></i>
                      </a>
                      </li>
                      <li class="nav-item " style="animation-delay: 2.6s">
                      <a class="nav-link" href="../Controleur/deconnection.php"><i class="fa fa-power-off mr-2"></i>Déconnexion</a>
                      </li>
                      </ul>
                    </div>
</nav>
<input type="hidden" id="idetudiant" value="<?php echo $_SESSION['IDETUDIANT']; ?>">
    <input type="hidden" id="vague" value="<?php echo $_SESSION['VAGUE']; ?>">
    <input type="hidden" id="filiere" value="<?php echo $_SESSION['FILIERE']; ?>">
    <input type="hidden" id="diplome" value="<?php echo $_SESSION['DIPLOME'];?>">
    <input type="hidden" id="prenom" value="<?php echo $_SESSION['PRENOM'];?>">
    <div class="container">
        <section id="prof" class="prof" data-aos="fade-up">
          <div class="row p-0">
            <div class="col-2 col-sm-2 col-md-2 col-lg-2">
             <h6><i class="fa fa-users membre"></i> TIC/S1/V1+</h6>
          </div>
          <div class="col-10 col-sm-10 col-md-10 col-lg-10">
            <div class="container">
                <div class=" owl-carousel administration_owl mt-2 d-flex justify-content-center">
                    <div class="info-box">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="../image/2 (9).jpg" width="100%" class="image_actif" alt="">
                                <div class="point"></div>
                            </div>
                            <div class="col-md-7">
                                <h3 class="text-center nom_actif">Rojo</h3>
                            </div>
                        </div>
                    </div>


                    <div class="info-box">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="../image/2 (9).jpg" width="100%" class="image_actif" alt="">
                            </div>
                            <div class="col-md-7">
                                <h3 class="text-center nom_actif">Beckas</h3>
                            </div>
                        </div>
                    </div>


                    <div class="info-box">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="../image/2 (9).jpg" width="100%" class="image_actif" alt="">
                            </div>
                            <div class="col-md-7">
                                <h3 class="text-center nom_actif">Tsiory</h3>
                            </div>
                        </div>
                    </div>


                    <div class="info-box">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="../image/2 (9).jpg" width="100%" class="image_actif" alt="">
                            </div>
                            <div class="col-md-7">
                                <h3 class="text-center nom_actif">Tahina</h3>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
          </div>

            </div>
        </section>
    </div>
    <section>
    <div class="Corps d-flex justify-content-center">
        <div class="forum p-3">
            <div class="header_forum">
                <div class="row head_forum">
                <i class="fa fa-comments"></i>
                <h6 class="mt-2">Message Groupés</h6>
                </div>
            </div>
            <div class="corp-groups overflow-auto">

            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
    <div class="row input-header-message">
    <div class="col-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text"  class="form-control" id="message_groups" style="width:100%"  placeholder="Votre message...">
    </div>
    <div class="col-12 col-sm-12 col-md-2 col-lg-2">
         <input type="submit" name="but" class="form-control" id="ajoute_message">  
    </div>
    </div>
    </div>
    </section>


    </div>

<script type="text/javascript" src="../jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../jquery/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="../jquery/popper.min.js"></script>
    <script type="text/javascript" src="../bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script  type="text/javascript" src="../jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../jquery/owl.carousel/owl.carousel.min.js"></script> 
    <script>
            $(document).ready(function(){
                readPublication();
            setInterval(readPublication,1000);

        });
              $(".administration_owl").owlCarousel({
            autoplay: true,
            dots: true,
            loop: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                576: {
                    items: 3
                },
                768: {
                    items: 4
                },
                900: {
                    items: 5
                }
            }
        });

        $(document).on("click","#ajoute_message",function(e){
         e.preventDefault();
         var message=$('#message_groups').val();
         var diplomeEtudiant=$('#diplome').val();
         var idEtudiant=$('#idetudiant').val();
         var filiere=$('#filiere').val();
         var vague=$('#vague').val();
         var prenom=$('#prenom').val();
         var message_groupée="message_groupée";
       $.ajax({
           url:"../Controleur/Affiche.php",
           type:"post",
           data:{idEtu:idEtudiant,messageEtu:message,diplomeEtu:diplomeEtudiant,filiereEtu:filiere,vagueEtu:vague,prenomEtu:prenom,message_groupée:message_groupée},
           success:function(data){
           }
         });
        });
        readPublication();

        function readPublication(){
        var diplome=$('#diplome').val();
        var filiere=$('#filiere').val();
        var vague=$('#vague').val();
        var AffichePub="AffichePub";
        $.ajax({
             url:"../Controleur/Affiche.php",
             method:"POST",
             data:{diplome:diplome,filiere:filiere,vague:vague,AffichePub:AffichePub},
             success:function(data){
               $('.corp-groups').html(data);
             }
           });
        }

    </script>
</body>
</html>