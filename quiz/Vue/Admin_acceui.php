<?php
session_start();
$_SESSION['login'] = true;
if($_SESSION['login'] = false){
  header('location:../index.php');
}else{
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
  <input type="hidden" id="id_admine" value="<?php echo $_SESSION['id_admin']; ?>" />
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="#">Examination En Ligne</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../Controleur/Deconnexion.php">Déconnexion</a>
        </li>

      </ul>

    </div>
  </nav>

  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-9">
          <h4>Listes des éxamens</h4>

        </div>
        <div class="col-md-3" align="right">
          <button type="button" id="add_button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalScrollable">Ajouter Examens</button>
        </div>
      </div>
    </div>
    <span id="message_operation"></span>

    <div class="card-body" id="content">




      </table>
    </div>
  </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="modal_question" tabindex="-1" role="dialog" aria-labelledby="" edit_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">AJOUTER QUESTIONS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="post" id="question_form">
          <div class="modal-body suscces_modifier">

            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Questions<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <input type="text" name="question_title" id="question_title" class="form-control" autocomplete="off" required />
                </div>
              </div>

            </div>

            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Option 1<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <input type="text" name="option_title_1" id="option_title_1" class="form-control" autocomplete="off" required />
                </div>
              </div>

            </div>

            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Option 2<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <input type="text" name="option_title_2" id="option_title_2" class="form-control" autocomplete="off" required />
                </div>
              </div>

            </div>



            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Option 3<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <input type="text" name="option_title_3" id="option_title_3" class="form-control" autocomplete="off" required />
                </div>
              </div>

            </div>

            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Option 4<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <input type="text" name="option_title_4" id="option_title_4" class="form-control" autocomplete="off" required />
                </div>
              </div>

            </div>

            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Option 5<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <input type="text" name="option_title_5" id="option_title_5" class="form-control" autocomplete="off" required />
                </div>
              </div>

            </div>

            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Bonne réponse<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <select name="bonne_reponse_question" id="bonne_reponse_question" class="form-control" required>
                    <option value="">Select</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="4">Option 4</option>
                    <option value="5">Option 5</option>
                  </select>
                </div>
              </div>

            </div>


          </div>

          <div class="modal-footer">
            <input type="hidden" name="id_examen_Question" id="id_examen_Question" />
            <input type="submit" name="question_buttn_action" id="question_buttn_action" class="btn btn-success" value="ADD" />
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Question tapitra -->




  <!-- Modal -->
  <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="" edit_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Examen modifier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body suscces_modifier">



          <div class="form-group">

            <div class="row">
              <label class="col-md-6 text-right">
                Exam Title<span class="text-danger">*</span>
              </label>
              <div class="col-md-6">
                <input type="text" name="online_exam_title" id="online_exam_title_modifier" class="form-control" placeholder="Titre examen" required />
              </div>
            </div>

          </div>

          <div class="form-group">

            <div class="row">
              <label class="col-md-6 text-right">
                Date & Time Examen<span class="text-danger">*</span>
              </label>
              <div class="col-md-6">
                <input type="text" name="online_exam_date" id="online_exam_date_modifier" class="form-control" placeholder="Date & Time Examen" required />
              </div>
            </div>

          </div>

          <div class="form-group">

            <div class="row">
              <label class="col-md-6 text-right">
                Duration Examen<span class="text-danger">*</span>
              </label>
              <div class="col-md-6">
                <select name="online_exam_duration" id="online_exam_duration_modifier" class="form-control" required>
                  <option value="">Select Duration</option>
                  <option value="5">5 Minute</option>
                  <option value="15">15 Minute</option>
                  <option value="30">30 Minute</option>
                  <option value="45">45 Minute</option>
                  <option value="60">1 Heure</option>
                  <option value="120">2 Heures</option>
                  <option value="180">3 Heures</option>
                </select>
              </div>
            </div>

          </div>


          <div class="form-group">

            <div class="row">
              <label class="col-md-6 text-right">
                Total Question<span class="text-danger">*</span>
              </label>
              <div class="col-md-6">
                <select name="total_question" id="total_question_modifier" class="form-control" required>
                  <option value="">Total Question</option>
                  <option value="5">5</option>
                  <option value="10">10</option>
                  <option value="20">20</option>
                  <option value="30">30</option>
                  <option value="40">40</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
              </div>
            </div>

          </div>


          <div class="form-group">

            <div class="row">
              <label class="col-md-6 text-right">
                Bonne Réponse<span class="text-danger">*</span>
              </label>
              <div class="col-md-6">
                <select name="bonne_reponse" id="bonne_reponse_modifier" class="form-control" required>
                  <option value="">Bonne Réponse</option>
                  <option value="1">+1 points</option>
                  <option value="2">+2 points</option>
                  <option value="3">+3 points</option>
                  <option value="4">+4 points</option>
                  <option value="5">+5 points</option>
                </select>
              </div>
            </div>

          </div>




          <div class="form-group">

            <div class="row">
              <label class="col-md-6 text-right">
                Mauvaise Réponse<span class="text-danger">*</span>
              </label>
              <div class="col-md-6">
                <select name="mauvaise_reponse" id="mauvaise_reponse_modifier" class="form-control" required>
                  <option value="">Mauvaise Réponse</option>
                  <option value="1">-1 points</option>
                  <option value="1.25">-1.25 points</option>
                  <option value="1.50">-1.50 points</option>
                  <option value="2">-2 points</option>
                </select>
              </div>
            </div>

          </div>


        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_examen" id="id_examen" />
          <button type="button" class="btn btn-primary" onclick="updateExamen()">UPDATE</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal edit tapitra -->



  <!--Modal-->
  <div class="modal fade formModal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <form method="post" id="exam_form">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle ">Ajouter Examens</h5>
            <h5 class="success_ajoute"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Examen Title<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <input type="text" name="online_exam_title" id="online_exam_title" class="form-control" placeholder="Titre examen" required />
                </div>
              </div>

            </div>

            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Date & Time <span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <input type="text" name="online_exam_date" id="online_exam_date" class="form-control" placeholder="Date & Time Examen" required />
                </div>
              </div>

            </div>

            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Duration Examen<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <select name="online_exam_duration" id="online_exam_duration" class="form-control" required>
                    <option value="">Select Duration</option>
                    <option value="5">5 Minute</option>
                    <option value="15">15 Minute</option>
                    <option value="30">30 Minute</option>
                    <option value="45">45 Minute</option>
                    <option value="60">1 Heure</option>
                    <option value="120">2 Heures</option>
                    <option value="180">3 Heures</option>
                  </select>
                </div>
              </div>

            </div>


            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Total Question<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <select name="total_question" id="total_question" class="form-control" required>
                    <option value="">Total Question</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>

            </div>


            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Bonne Réponse<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <select name="bonne_reponse" id="bonne_reponse" class="form-control" required>
                    <option value="">Bonne Réponse</option>
                    <option value="1">+1 points</option>
                    <option value="2">+2 points</option>
                    <option value="3">+3 points</option>
                    <option value="4">+4 points</option>
                    <option value="5">+5 points</option>
                  </select>
                </div>
              </div>

            </div>




            <div class="form-group">

              <div class="row">
                <label class="col-md-6 text-right">
                  Mauvaise Réponse <span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                  <select name="mauvaise_reponse" id="mauvaise_reponse" class="form-control" required>
                    <option value="">Mauvaise Réponse</option>
                    <option value="1">-1 points</option>
                    <option value="1.25">-1.25 points</option>
                    <option value="1.50">-1.50 points</option>
                    <option value="2">-2 points</option>
                  </select>
                </div>
              </div>

            </div>



          </div>
          <div class="modal-footer">
            <input type="hidden" name="id_admine" id="id_admin" value="<?php echo $_SESSION['id_admin']; ?>" />
            <input type="hidden" name="Examenajouter" id="Examenajouter" />

            <input type="hidden" name="action" value="add" id="action" />
            <input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="ADD" />
          </div>
      </form>
    </div>
  </div>



  <!--tapitra ny modal-->


  <!-- Modal edit -->

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



      var date = new Date();

      date.setDate(date.getDate());

      $('#online_exam_date').datetimepicker({
        startDate: date,
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true
      });





      $('#button_action').on('click', function(event) {
        event.preventDefault();
        var id = $('#id_admin').val();
        var titre = $('#online_exam_title').val();
        var date = $('#online_exam_date').val();
        var duration = $('#online_exam_duration').val();
        var total = $('#total_question').val();
        var bonne = $('#bonne_reponse').val();
        var mauvaise = $('#mauvaise_reponse').val();
        var exam = $('#Examenajouter').val();
        $.ajax({
          url: "../Controleur/controleur.php",
          method: "POST",
          data: {
            id: id,
            titre: titre,
            date: date,
            duration: duration,
            total: total,
            bonne: bonne,
            mauvaise: mauvaise,
            exam: exam
          },
          success: function(data) {
            alert(data);
            $('#exam_form')[0].reset();
          }
        });

      });



      $('#question_buttn_action').on('click', function(event) {
        event.preventDefault();
        var question_title = $('#question_title').val();
        var option1 = $('#option_title_1').val();
        var option2 = $('#option_title_2').val();
        var option3 = $('#option_title_3').val();
        var option4 = $('#option_title_4').val();
        var option5 = $('#option_title_5').val();
        var bonne_reponse = $('#bonne_reponse_question').val();
        var idexam_question = $('#id_examen_Question').val();

        $.ajax({
          url: "../Controleur/controleur.php",
          method: "POST",
          data: {
            question_title: question_title,
            option1: option1,
            option2: option2,
            option3: option3,
            option4: option4,
            option5: option5,
            bonne_reponse: bonne_reponse,
            idexam_question: idexam_question,
            ajouter_question: "ajouter_question"
          },
          success: function(data) {
            alert(data);
            $('#question_form')[0].reset();
          }
        });

      });


    });





    function readData() {
      var read = "read";
      var id_admin = $("#id_admine").val();
      $.ajax({
        url: "../Controleur/controleur.php",
        method: "POST",
        data: {
          read: read,
          id_admin: id_admin
        },
        success: function(data) {
          $('#content').html(data);
        }
      });
    }


    function GetUser(idExam) {
      $('#id_examen').val(idExam);
      $.post("../Controleur/controleur.php", {
          idExam: idExam,
          modifier_exam: "modifier_exam"
        },
        function(data) {
          var exam = JSON.parse(data);
          $('#online_exam_title_modifier').val(exam.exam_title);
          $('#online_exam_date_modifier').val(exam.exam_datetime);
          $('#online_exam_duration_modifier').val(exam.exam_duration);
          $('#total_question_modifier').val(exam.total_question);
          $('#bonne_reponse_modifier').val(exam.right_answer);
          $('#mauvaise_reponse_modifier').val(exam.wrong_answer);
        }
      );
    }


    function updateExamen() {
      var id_exameModifier = $('#id_examen').val();
      var exam_titleModifier = $('#online_exam_title_modifier').val();
      var exam_durationModifier = $('#online_exam_duration_modifier').val();
      var exam_dateModifier = $('#online_exam_date_modifier').val();
      var Total_Modifier = $('#total_question_modifier').val();
      var bonne_Modifier = $('#bonne_reponse_modifier').val();
      var mauvaise_Modifier = $('#mauvaise_reponse_modifier').val();
      $.post("../Controleur/controleur.php", {
        id_exam_modifier: id_exameModifier,
        exam_titleModifier: exam_titleModifier,
        exam_durationModifier: exam_durationModifier,
        exam_dateModifier: exam_dateModifier,
        total_question_modifier: Total_Modifier,
        bonne_reponse_modifier: bonne_Modifier,
        mauvaise_reponse_modifier: mauvaise_Modifier
      }, function(data) {
        alert(data);
        readData();
      });
    }

    function Delete(deleteExam) {
      var conf = confirm("Vous êtes sur de le suprimer?");
      if (conf == true) {
        $.ajax({
          url: "../Controleur/controleur.php",
          method: "POST",
          data: {
            deleteExam: deleteExam
          },
          success: function(data) {
            alert(data);
            readData();
          }
        });
      }
    }


    function GetQuestion($id_exam) {
      $('#id_examen_Question').val($id_exam);
    }
  </script>
</body>

</html>