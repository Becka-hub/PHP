<?php
session_start();
$_SESSION['login'] = "true";
if (!isset($_SESSION['login'])) {
    header('location:user.php');
}
require_once('../Model/ExamenOnline.php');
$exam = new ExamenOnline();
$row = $exam->Affiche();
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
    <!--Disable bacc button in broser-->
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();

        }
        setTimeout("preventBack()", 0);
        window.onload = function() {
            null
        }
    </script>
    <div class="container">
        <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>" />
        <input type="hidden" name="name_user" id="name_user" value="<?php echo $_SESSION['user_name']; ?>" />
        <input type="hidden" name="code_user" id="code_user" value="<?php echo $_SESSION['user_code']; ?>" />


        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="#">Examination en ligne</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Examens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php?id_user=<?php echo $_SESSION['id_user']; ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Controleur/Deconnexion.php">Logout</a>
                    </li>
            </div>
        </nav>
        <div class="row mt-5">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <select name="exam_list" id="exam_list" class="form-control input-lg" required>
                    <option value="">Select Exam</option>
                    <?php
                    foreach ($row as $res) {
                    ?>
                        <option value="<?php echo $res['id_examOnline']; ?>"><?php echo $res['exam_title']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br />
                <span id="exam_details"></span>
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
        $(document).ready(function() {

            var exam_id = '';
            $('#exam_list').change(function() {
                exam_id = $('#exam_list').val();

                $.ajax({
                    url: "../Controleur/controleur.php",
                    method: "POST",
                    data: {
                        exam_id_list: exam_id,
                    },
                    success: function(data) {
                        $('#exam_details').html(data);
                    }
                });
            });

            $(document).on('click', '#enroll_button', function() {
                exam_id = $('#enroll_button').data('exam_id');
                $.ajax({
                    url: "../Controleur/controleur.php",
                    method: "POST",
                    data: {
                        exam_id: exam_id,
                        action_enroll_exam: "action_enroll_exam"
                    },
                    beforeSend: function() {
                        $('#enroll_button').attr('disabled', 'disabled');
                        $('#enroll_button').text('please wait');
                    },
                    success: function(data) {
                        $('#enroll_button').attr('disabled', false);
                        $('#enroll_button').removeClass('btn btn-warning');
                        $('#enroll_button').addClass('btn-success');
                        $('#enroll_button').text('Enroll success');
                        $('#btn_view').removeClass('button_view');
                        $('#btn_view').addClass('button_view_okey');
                    }
                });
            });

        });
    </script>
</body>

</html>