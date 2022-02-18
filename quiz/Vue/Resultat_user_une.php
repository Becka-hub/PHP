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
$totalQuestion = '';
$countQuestion = '';


if (isset($_SESSION['codeExam'])) {
    $rows = $exam->AfficheExameIdCode($_SESSION['codeExam']);
    foreach ($rows as $res) {
        $exam_id = $res['id_examOnline'];
    }

    $row = $exam->AfficheExameDateDuration($exam_id);
    foreach ($row as $resultat) {
        $totalQuestion = $resultat['total_question'];
    }

    $row = $question->AfficheCountQuestion($exam_id);
    foreach ($row as $rows) {
        $countQuestion = $rows['total'];
    }
} else {
    header('location:user_acceuil.php');
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

    <?php
    if ($totalQuestion == $countQuestion) {
        /*select tous dans le question userExamAnswer */
        $resultat = $question->AfficheResultat($exam_id, $_GET['id']);
    }
    ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">Résultat d'axamens de <?php echo $_GET['user_name']; ?></div>
                <div class="col-md-4" align="right">
                    <a href="pdf_exam_result.php?code=<?php echo $_SESSION['codeExam']; ?>" class="btn btn-danger btn-sm" target="_blank">Télécharger PDF</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Questions</th>
                        <th>Option 1</th>
                        <th>Option 2</th>
                        <th>Option 3</th>
                        <th>Option 4</th>
                        <th>Option 5</th>
                        <th>Votre Réponse</th>
                        <th>Bonne Réponse</th>
                        <th>Resultat</th>
                        <th>Points</th>
                    </tr>


                    <?php
                    $total_mark = 0;
                    foreach ($resultat as $row) {

                        /*select tous dans le option a partir de queston_id */
                        $sub_result = $option->AfficheResultOption($row['question_id']);
                        $user_answer = '';
                        $original_answer = '';
                        $question_result = '';


                        if ($row['marks'] == '0') {
                            $question_result = '<h4 class="badge badge-dark">Tres Mauvaise!!!</h4>';
                        }
                        if ($row['marks'] > '0') {
                            $question_result = '<h4 class="badge badge-success">Bon!!!</h4>';
                        }

                        if ($row['marks'] < '0') {
                            $question_result = '<h4 class="badge badge-success">Mauvaise!!!</h4>';
                        }


                        echo '
                    <tr>
                    <td>' . $row['question_titre'] . '</td>
                  
                    ';

                        /*affiche le resultat*/
                        foreach ($sub_result as $sub_row) {
                            echo '<td>' . $sub_row['option_title'] . '</td>';
                            if ($sub_row['option_number'] == $row['user_answer_option']) {
                                $user_answer = $sub_row['option_title'];
                            }
                            if ($sub_row['option_number'] == $row['answer_option']) {
                                $original_answer = $sub_row['option_title'];
                            }
                        }

                        echo '
                    <td>' . $user_answer . '</td>
                    <td>' . $original_answer . '</td>
                    <td>' . $question_result . '</td>
                    <td>' . $row['marks'] . '</td>
                    </tr>
                    ';

                        $SumMarks = $userExamQuestion->SumMarks($_GET['id'], $exam_id);

                        $totalPoints = '';

                        foreach ($SumMarks as $rows) {
                            $totalPoints = $rows['total_marks'];
                    ?>



                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="8" align="right">Total Points</td>
                        <td align="right" colspan="2"><?php echo $totalPoints; ?> Points</td>
                    </tr>
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