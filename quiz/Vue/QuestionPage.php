<?php
session_start();
$_SESSION['login'] = true;
if ($_SESSION['login'] = false) {
    header('location:../index.php');
} else {
    $_SESSION['login'] = true;
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
    <input type="hidden" id="code_exam" value="<?php echo $_GET['code']; ?>" />
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#">Liste des questions</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Admin_acceui.php">Liste des éxamens</a>
                </li>

            </ul>

        </div>
    </nav>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="reponse_table_question">

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
            readData();
            setInterval(readData, 1000);
        });

        function readData() {
            var list_question = "list_question";
            var code_exam = $("#code_exam").val();
            $.ajax({
                url: "../Controleur/controleur.php",
                method: "POST",
                data: {
                    list_question: list_question,
                    code_exam: code_exam
                },
                success: function(data) {
                    $('.reponse_table_question').html(data);
                }
            });
        }

        function DeleteQuestion(idQuestion) {

            var conf = confirm("Vous êtes sur de le suprimer?");
            if (conf == true) {
                $.ajax({
                    url: "../Controleur/controleur.php",
                    method: "POST",
                    data: {
                        idQuestion: idQuestion,
                        id_suprimer_question: "id_suprimer_question"
                    },
                    success: function(data) {
                        alert(data);
                        readData();
                    }
                });
            }

        }
    </script>
</body>

</html>