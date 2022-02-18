<?php
session_start();
$_SESSION['login'] = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/document.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="jquery/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="css/owl.theme.default.min.css">

</head>

<body>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top pr-3" style="animation-delay:0.5">
            <div class="container">
                <img src="image/2 (9).jpg" class="image_profil " width="3%" alt="">
                <p class="nom_utilisateur " style="animation-delay: 2s"><?php echo $_SESSION['PRENOM']; ?>/TIC/S1/V1</p>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item " style="animation-delay: 2.6s">
                            <a class="nav-link" href="#">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li class="nav-item " style="animation-delay: 3s">
                            <a class="nav-link" href="#">
                                <i class="fa fa-file-archive-o"></i>
                            </a>
                        </li>
                        <li class="nav-item " style="animation-delay: 3.6s">
                            <a class="nav-link" href="#">
                                <i class="fa fa-comments"></i>
                            </a>
                        </li>
                        <li class="nav-item " style="animation-delay: 4s">
                            <a class="nav-link" href="#">
                                <i class="fa fa-bell"></i>
                            </a>
                        </li>
                        <li class="nav-item " style="animation-delay: 4.6s">
                            <a class="nav-link" href="Forum/forum.php">
                                <i class="fa fa-users"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown " style="animation-delay: 5s">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="#"> <i class="fa fa-picture-o mr-2"></i>Changer profile</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="../Controleur/deconnection.php"><i class="fa fa-power-off mr-2"></i>Déconnexion</a>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row header">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                <div class="row">
                    <div class="col-5 col-sm-5 col-md-5 col-lg-5">
                        <img src="image/teacher.png" class="image_teacher animated fadeInRight" style="animation-delay: 2s" width="110%" height="70%" alt="">
                    </div>
                    <div class="col-7 col-sm-7  col-md-7 col-lg-7">
                        <div class="methode">
                            <h2 class="text-center description animated bounceInDown" style="animation-delay: 3s">BIENVENUE</h2>
                            <h2 class="text-center emedia animated bounceInDown" style="animation-delay: 4s">E-Media En Ligne</h2>
                            <div class="paragraphe animated bounceInDown" style="animation-delay: 5s">
                                <span class="text-center">Vous avez 3 cours par mois et des explication videos avec /Des exercices avec des videos explications/Examen par moi/Examen finale</span>
                            </div>
                            <a href="#special-items" id="bar" class="btn header-link primary-color animated rotateInDownRight" style="animation-delay: 6s"><span class="fa fa-arrow-down"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 p-0">
                <img src="image/cesar.png" class="image_cesar animated fadeInRight" width="100%" height="68%" style="animation-delay: 1s" alt="">
            </div>
        </div>

    </div>

    <!--tapitra ny header-->
    <div class="container">
        <section id="prof" class="prof" data-aos="fade-up">
            <div class="container1">
                <div class=" owl-carousel administration_owl mt-5 d-flex justify-content-center">
                    <div class="info-box">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="image/2 (9).jpg" width="100%" alt="">
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-center">Mr Rojo</h3>
                                <p class="card-text_filiere text-center">Mathématique</p>
                            </div>
                        </div>
                    </div>


                    <div class="info-box">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="image/2 (9).jpg" width="100%" alt="">
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-center">Mr Beckas</h3>
                                <p class="card-text_filiere text-center">HTML</p>
                            </div>
                        </div>
                    </div>


                    <div class="info-box">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="image/2 (9).jpg" width="100%" alt="">
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-center">Mr Tsiory</h3>
                                <p class="card-text_filiere text-center">EPS</p>
                            </div>
                        </div>
                    </div>


                    <div class="info-box">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="image/2 (9).jpg" width="100%" alt="">
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-center">Mr Tahina</h3>
                                <p class="card-text_filiere text-center">CSS</p>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
    <!--tapitra ny professeur-->
    <input type="hidden" id="idetudiant" value="<?php echo $_SESSION['IDETUDIANT']; ?>">
    <input type="hidden" id="vague" value="<?php echo $_SESSION['VAGUE']; ?>">
    <input type="hidden" id="filiere" value="<?php echo $_SESSION['FILIERE']; ?>">
    <input type="hidden" id="diplome" value="<?php echo $_SESSION['DIPLOME']; ?>">
    <div class="container-fluid">
        <div class="row cours">
            <div class="col-12 col-md-2 verticales">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active mt-3" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-cours" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-file-text"></i>COURS</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-exercices" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-filter"></i>EXERCICES</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-examens" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-edit"></i>EXAMENS</a>

                </div>
                <img src="image/sarymes.png" width="100%" height="40%" class="image_verticale" alt="">
            </div>
            <div class="col-12 col-md-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-cours" role="tabpanel" aria-labelledby="v-pills-home-tab">

                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-print"></i>DOCUMENTS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-video-camera"></i>VIDEOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#autre" role="tab" aria-controls="autre" aria-selected="false"><i class="fa fa-file"></i>AUTRES</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row courDoc pl-2 pr-2 pt-4 d-flex justify-content-center">

                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row courVid pl-2 pr-2 pt-4  d-flex justify-content-center">

                                </div>


                            </div>
                            <div class="tab-pane fade" id="autre" role="tabpanel" aria-labelledby="profile-tab">autre</div>
                        </div>

                    </div>




                    <div class="tab-pane fade" id="v-pills-exercices" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#ExerciceDoc" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-print fa-1x"></i>DOCUMENTS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ExerciceVid" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-video-camera fa-1x"></i>VIDEOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#autres" role="tab" aria-controls="autres" aria-selected="false"><i class="fa fa-file fa-1x"></i>AUTRES</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="ExerciceDoc" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row ExeDoc pl-2 pr-2 pt-4 d-flex justify-content-center">

                                </div>


                            </div>
                            <div class="tab-pane fade" id="ExerciceVid" role="tabpanel" aria-labelledby="profile-tab">

                                <div class="row ExeVid pl-2 pr-2 pt-4 d-flex justify-content-center">

                                </div>


                            </div>
                            <div class="tab-pane fade" id="autres" role="tabpanel" aria-labelledby="profile-tab">autre</div>
                        </div>


                    </div>





                    <div class="tab-pane fade" id="v-pills-examens" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#ExamDoc" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-print fa-1x"></i>DOCUMENTS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ExamVid" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-video-camera fa-1x"></i>VIDEOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ExamAutres" role="tab" aria-controls="autres" aria-selected="false"><i class="fa fa-file fa-1x"></i>AUTRES</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="ExamDoc" role="tabpanel" aria-labelledby="home-tab">DOCUMENTS</div>
                            <div class="tab-pane fade" id="ExamVid" role="tabpanel" aria-labelledby="profile-tab">VIDEOS</div>
                            <div class="tab-pane fade" id="ExamAutres" role="tabpanel" aria-labelledby="profile-tab">AUTRES</div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--tapitra ny matiere-->
    <section id="message">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 com-md-7 col-lg-7 mt-5">
                    <!-- <img src="image/sarymes.png" width="100%" height="100%" alt="">-->
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex justify-content-center">
                    <div class="corp_message ">
                        <div class="header_message pl-3 pt-2 ">
                            <div class="row">
                                <div class="image">
                                    <img src="image/2 (9).jpg" width="3%" alt="" class="profil">
                                </div>
                                <div class="prenom">
                                    <p class="mt-2 ml-1 profil_nom">Andrianasolo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="body_message overflow-auto mt-2">
                                <div class="response">

                                </div>
                            </div>
                            <form class="login-form text-center mt-2" id="form" method="post">
                                <div class="input_message">
                                    <div class="form-group">
                                        <input type="text" name="message" class="form-control" id="messageContenu" placeholder="Message..." required />
                                    </div>
                                </div>
                                <div class="button_message">
                                    <input type="submit" id="MessageAjouter" class="p-1 m-0 btn-login" value="Envoyer" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--tapitra ny message-->
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="jquery/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.2.1.js"></script>
    <script src="jquery/owl.carousel/owl.carousel.min.js"></script>
    <script>
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

        $(document).ready(function() {
            readCoursDocument();
            setInterval(readCoursDocument, 1000);

            readCoursVideo();
            setInterval(readCoursVideo, 1000);

            readExeDoc();
            setInterval(readExeDoc, 1000);

            readExeVid();
            setInterval(readExeVid, 1000);

            readMessage();
            setInterval(readMessage, 1000);
        });
        readCoursDocument();

        function readCoursDocument() {
            var diplome = $('#diplome').val();
            var filiere = $('#filiere').val();
            var vague = $('#vague').val();
            var categorie = "COURS";
            var type = "DOCUMENT";
            $.ajax({
                url: "Controleur/Affiche.php",
                method: "POST",
                data: {
                    diplome: diplome,
                    filiere: filiere,
                    vague: vague,
                    categorie: categorie,
                    type: type
                },
                success: function(data) {
                    $('.courDoc').html(data);
                }
            });
        }

        readCoursVideo();

        function readCoursVideo() {
            var diplome = $('#diplome').val();
            var filiere = $('#filiere').val();
            var vague = $('#vague').val();
            var categorie = "COURS";
            var type = "VIDEO";
            $.ajax({
                url: "Controleur/Affiche.php",
                method: "POST",
                data: {
                    diplome: diplome,
                    filiere: filiere,
                    vague: vague,
                    categorie: categorie,
                    type: type
                },
                success: function(data) {
                    $('.courVid').html(data);
                }
            });
        }

        readExeDoc();

        function readExeDoc() {
            var diplome = $('#diplome').val();
            var filiere = $('#filiere').val();
            var vague = $('#vague').val();
            var categorie = "EXERCICES";
            var type = "DOCUMENT";
            $.ajax({
                url: "Controleur/Affiche.php",
                method: "POST",
                data: {
                    diplome: diplome,
                    filiere: filiere,
                    vague: vague,
                    categorie: categorie,
                    type: type
                },
                success: function(data) {
                    $('.ExeDoc').html(data);
                }
            });
        }

        readExeVid();

        function readExeVid() {
            var diplome = $('#diplome').val();
            var filiere = $('#filiere').val();
            var vague = $('#vague').val();
            var categorie = "EXERCICES";
            var type = "VIDEO";
            $.ajax({
                url: "Controleur/Affiche.php",
                method: "POST",
                data: {
                    diplome: diplome,
                    filiere: filiere,
                    vague: vague,
                    categorie: categorie,
                    type: type
                },
                success: function(data) {
                    $('.ExeVid').html(data);
                }
            });
        }




















        $(document).on("click", "#MessageAjouter", function(e) {
            e.preventDefault();
            var idetudiant = $('#idetudiant').val();
            var diplomeEtudiant = $('#diplome').val();
            var filiereEtudiant = $('#filiere').val();
            var vagueEtudiant = $('#vague').val();
            var message = $('#messageContenu').val();
            $.ajax({
                url: "Controleur/Affiche.php",
                type: "post",
                data: {
                    id: idetudiant,
                    message: message,
                    diplomeEtudiant: diplomeEtudiant,
                    filiereEtudiant: filiereEtudiant,
                    vagueEtudiant: vagueEtudiant
                },
                success: function(data) {
                    $('#messageContenu').val("");
                }
            });
        });

        readMessage();

        function readMessage() {
            var idetudiant = $('#idetudiant').val();
            var readMessage = "readMessage";
            $.ajax({
                url: "Controleur/Affiche.php",
                method: "POST",
                data: {
                    idetudiant: idetudiant,
                    readMessage: readMessage
                },
                success: function(data) {
                    $('.response').html(data);
                }
            });
        }
    </script>
</body>

</html>