<?php
session_start();
require_once('../Model/ExamenOnline.php');
require_once('../Model/Question.php');
require_once('../Model/UserExam.php');
require_once('../Model/Option.php');
require_once('../Model/UserExamQuestion.php');
$exam = new ExamenOnline();
$question = new Question();
$userExam = new UserExam();
$option = new Option();
$userExamQuestion = new UserExamQuestion();



$exam_id;
$exam_status = '';
$remaining_minutes = '';
$totalQuestion = '';
$countQuestion = '';


if (isset($_GET['code'])) {
    $rows = $exam->AfficheExameIdCode($_GET['code']);
    foreach ($rows as $res) {
        $exam_id = $res['id_examOnline'];
        $_SESSION['codeExam'] = $_GET['code'];
    }

    $row = $exam->AfficheExameDateDuration($exam_id);
    foreach ($row as $resultat) {
        $totalQuestion = $resultat['total_question'];
        $exam_start_time = $resultat['exam_datetime'];
        $duration = $resultat['exam_duration'] . ' minute';
        $exam_end_time = strtotime($duration);
        $exam_end_time = date('H:i:s', $exam_end_time);
        $remaining_minutes = strtotime($exam_end_time) - time();
    }
    $row = $question->AfficheCountQuestion($exam_id);
    foreach ($row as $rows) {
        $countQuestion = $rows['total'];
    }
} else {
    header('location:user_acceuil.php');
}
?>
<?php
if ($totalQuestion == $countQuestion) {
    $user_id = $_SESSION['id_user'];
    $attendance = 'Present';
    $userExam->updateUserExam($user_id, $exam_id, $attendance);
}
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
        <div class="row change_resultat" id="change_resultat">
            <div class="col-md-8">
                <div class="card-header">Online Exam</div>
                <div class="card-body">
                    <div id="single_question_area">

                    </div>
                </div>
                <br />
                <div id="question_navigation_area">
                </div>
            </div>
            <div class="col-md-4">
                <br />
                <div align="center">
                    <div id="exam_timer" data-timer="<?php echo $remaining_minutes; ?>" style="max-width:400px; width:100%;  height:200px;">
                    </div>
                </div>
                <br />
                <div id="user_details_area">

                </div>
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

            /*Disable F5*/
            $(document).on("keydown", function(e) {
                if (e.key == "F5" || e.key == "F11" ||
                    (e.ctrlKey == true && (e.key == 'r' || e.key == 'R')) ||
                    e.keyCode == 116 || e.keyCode == 82) {

                    e.preventDefault();
                }
            });


            var exam_id = "<?php echo $exam_id; ?>";
            load_question();
            question_navigation();
            /*affichage de question*/
            function load_question(question_id = '') {
                $.ajax({
                    url: "../Controleur/controleur.php",
                    method: "POST",
                    data: {
                        exam_id: exam_id,
                        question_id: question_id,
                        view_exam: 'view_exam',
                        action: 'load_question'
                    },
                    success: function(data) {
                        $('#single_question_area').html(data);
                    }
                });
            }
            /*Tapitra affichage de question*/

            /*affichage Next et Previous*/
            $(document).on('click', '.next', function() {
                var question_id = $(this).attr('id');
                load_question(question_id);
            });
            $(document).on('click', '.previous', function() {
                var question_id = $(this).attr('id');
                load_question(question_id);
            });

            /*tapitra affichage Next et Previous*/




            /*affichage de navigation*/
            function question_navigation() {
                $.ajax({
                    url: "../Controleur/controleur.php",
                    method: "POST",
                    data: {
                        exam_id: exam_id,
                        page: 'view_exam',
                        question_navigation: 'question_navigation'
                    },
                    success: function(data) {
                        $('#question_navigation_area').html(data);
                    }
                });
            }
            /* tapitra affichage de navigation*/



            /*affichage par navigation*/
            $(document).on('click', '.question_navigation', function() {
                var question_id = $(this).data('question_id');
                load_question(question_id);
            });
            /*tapitra affichage pa navigation*/




            /*affichage Timer*/
            $("#exam_timer").TimeCircles({
                time: {
                    Days: {
                        show: false
                    },
                    Hours: {
                        show: false
                    }
                }
            });

            setInterval(function() {
                var remaining_second = $("#exam_timer").TimeCircles().getTime();
                if (remaining_second < 1) {
                    window.location.replace('resultExam.php');

                }
            }, 1000);





            /*Tapitra affichage timer*/
            load_user_details();


            /*affichage a propos de l'utilisateur*/
            function load_user_details() {
                $.ajax({
                    url: "../Controleur/controleur.php",
                    method: "POST",
                    data: {
                        page: 'view_exam',
                        user_detail: 'user_detail'
                    },
                    success: function(data) {
                        $('#user_details_area').html(data);
                    }
                });
            }

            /*Tapitra affichage a propos de l'utilisateur*/

            $(document).on('click', '.answer_option', function() {
                var question_id = $(this).data('question_id');
                var answer_option = $(this).data('id');

                $.ajax({
                    url: "../Controleur/controleur.php",
                    method: "POST",
                    data: {
                        question_id: question_id,
                        answer_option: answer_option,
                        exam_id: exam_id,
                        page: 'view_exam',
                        answer: 'answer',
                    },
                    success: function(data) {}
                });
            });

        });
    </script>
</body>

</html>