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
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="jquery/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="css/owl.theme.default.min.css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
  <a class="navbar-brand" href="#">Administration</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="login.php">LOGIN<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</div>
</nav>

<div class="row">
<div class="col-md-4">
 

<form action="Controleur/Controleur.php" method="post" enctype="multipart/form-data">

    <label>DIPLOME:</label>
    <select  class="form-control" name="diplome" id="">
      <option value="MASTER">MASTER</option>
      <option value="LICENCE">LICENCE</option>
    </select>


   <label>VAGUE:</label>
    <select  class="form-control" name="vague" id="">
      <option value="V1">V1</option>
      <option value="V2">V2</option>
    </select>


   <label>FILIERE:</label>
    <select  class="form-control" name="filiere" id="">
      <option value="TIC">TIC</option>
      <option value="CAN">CAN</option>
      <option value="MPJ">MPJ</option>
      <option value="MANAGEMENT">MANAGEMENT</option>
      <option value="DROIT">DROIT</option>
    </select>

   <label>TYPE:</label>
    <select  class="form-control" name="type" id="">
      <option value="DOCUMENT">DOCUMENT</option>
      <option value="VIDEO">VIDEO</option>
      <option value="AUDIO">AUDIO</option>
    </select>

    <label>CATEGORIE:</label>
    <select  class="form-control" name="categorie" id="">
      <option value="COURS">COURS</option>
      <option value="EXERCICES">EXERCICES</option>
      <option value="EXAMEN">EXAMENS</option>
    </select>

  <div class="form-group">
    <label>TITRE:</label>
    <input type="text" name="titre" class="form-control"  placeholder="Entrer son titre">
  </div>

 <div class="form-group">
  <div class="custom-file">
    <input type="file"  name="couverture" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Couverture...</label>
  </div>
</div>

 <div class="form-group">
  <div class="custom-file">
    <input type="file"  name="contenu" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">contenu...</label>
  </div>
</div>

  <input type="submit" class="btn btn-primary" value="Ajouter">
</form>



</div>




<div class="col-md-8">
<h2 class="text-center">Message</h2>
<div class="table_message">

</div>

</div>

</div>


<!modal update>

<div class="modal fade" id="Updata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-capitalize" id="exampleModalLabel">Reponse</h5>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message</label>
            <textarea name="reponse" id="reponse" class="form-control"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      <input type="hidden" id="update_ID">
        <button type="button" class="btn btn-primary" onclick="updateUser()">Envoyer</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="" id="hiddenID">
      </div>
    </div>
  </div>
</div>
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="jquery/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.2.1.js"></script>
    <script src="jquery/owl.carousel/owl.carousel.min.js"></script>
    <script>
      $(document).ready(function(){
        readMessage();
            setInterval(readMessage,1000);
      });
      

      function readMessage(){

        var messTous="messTous";
        $.ajax({
             url:"Controleur/Affiche.php",
             method:"POST",
             data:{messTous:messTous},
             success:function(data){
               $('.table_message').html(data);
             }
           });
        }

        function GetUser(Upid){
             $('#hiddenID').val(Upid);
             $.post("Controleur/Affiche.php",{Upid:Upid},
             function(data){
               var message=JSON.parse(data);
               $('#update_ID').val(message.IDMESSAGE);
             }
              
             );
          }
        
          function updateUser(){
            var idM=$('#hiddenID').val();
            var reponse=$('#reponse').val();
            $.post("Controleur/Affiche.php",{
              idM:idM,
              reponse:reponse,
            },function(data){
              alert(data);
              readMessage();
              $('#reponse').val("");
            }
            );
          }
    </script>
</body>

</html>