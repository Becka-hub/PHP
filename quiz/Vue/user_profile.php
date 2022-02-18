<?php
session_start();
$_SESSION['login'] = "true";
if (!isset($_SESSION['login'])) {
    header('location:user.php');
}
require_once('../Model/User.php');
$user = new User();
$row = $user->AfficheUser($_GET['id_user']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="../css/TimeCircles.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../jquery/owl.carousel/assets/owl.carousel.min.css">

</head>

<body>
    <div class="container">
        <input type="hidden" name="id_user" id="id_user" value="<?php echo $_GET['id_user']; ?>" />



        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="#">Examination en ligne</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="user_acceuil.php">Examens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Controleur/Deconnexion.php">Logout</a>
                    </li>
            </div>
        </nav>

        <div class="card">
            <div class="card-header bg-info">
                <h1 class="text-center text-white">User Profile</h1>
            </div>
            <div class="card-body">
                <?php
                foreach ($row as $res) {
                ?>
                    <h4 class="text-center"> Nom : <?php echo $res['user_name']; ?></h4>
                    <h4 class="text-center"> E-mail : <?php echo $res['user_mail']; ?></h4>
                    <h4 class="text-center"> Gender : <?php echo $res['user_gender']; ?></h4>
                    <h4 class="text-center"> Adresse : <?php echo $res['user_adresse']; ?></h4>
                    <h4 class="text-center"> Mobile : <?php echo $res['user_mobile']; ?></h4>
                   <center> <img src="../Controleur/<?php echo $res['user_image']; ?>" alt="" class="img-thumbnail" width="250"></center>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript " src="../jquery/jquery-3.3.1.slim.min.js "></script>
    <script type="text/javascript " src="../jquery/popper.min.js "></script>
    <script type="text/javascript " src="../bootstrap-4.3.1/js/bootstrap.min.js "></script>
    <script src="../jquery/jquery.min.js"></script>
    <script src="../jquery/jquery-3.1.1.min.js "></script>
    <script src="../jquery/jquery-3.2.1.js "></script>
    <script src="../Jquery/jquery-3.4.1.js"></script>
    <script src="../jquery/TimeCircles.js"></script>
    <script src="../jquery/bootstrap-datetimepicker.js"></script>
    <script>
    </script>
</body>

</html>