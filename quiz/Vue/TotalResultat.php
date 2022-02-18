<?php
session_start();
require_once('../Model/Admin.php');
require_once('../Model/ExamenOnline.php');
require_once('../Model/Question.php');
require_once('../Model/Option.php');
require_once('../Model/User.php');
require_once('../Model/UserExam.php');
require_once('../Model/UserExamQuestion.php');
$questionExam = new Question();
$admin = new Admin();
$examen = new ExamenOnline();
$option = new Option();
$user = new User();
$user_exam = new UserExam();
$userExamQuestion = new UserExamQuestion();
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


    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#">Examination En Ligne</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Admin_acceui.php">Examens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Controleur/Deconnexion.php">Logout</a>
                </li>
        </div>
    </nav>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="panel-title">RESULTAT D'EXAMEN</h3>
                </div>
                <div class="col-md-3" align="right">
                    <a href="pdf_total_exam_result.php?code=<?php echo $_GET['code']; ?>" target="_blank" class="btn btn-danger btn-sm">PDF</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="result_table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Total Points</th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($_GET['code'])) {
                        $resultId = $examen->AfficheExameIdCode($_GET['code']);
                        $examenId;
                        foreach ($resultId as $row) {
                            $examenId = $row['id_examOnline'];
                        }
                        $totalResultatExamen = $userExamQuestion->TotalResultExam($examenId);

                        foreach ($totalResultatExamen as $res) {
                            $attendance = $user_exam->afficheAttendanceStatut($res['user_id'], $examenId);
                            foreach ($attendance as $rows) {
                                $status = $rows['attendance_status'];
                            }
                        }
                    ?>

                        <tbody>
                            <td><img src="../Controleur/<?php echo $res["user_image"]; ?>" class="img-thumbnail" width="75" /></td>
                            <td><?php echo $res['user_name']; ?></td>
                            <td><?php echo $status; ?></td>
                            <td><?php echo  $res['total_mark']; ?></td>

                        </tbody>
                    <?php
                    }
                    ?>

                </table>

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