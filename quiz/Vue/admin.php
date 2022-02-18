
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
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../jquery/owl.carousel/assets/owl.carousel.min.css">

</head>
<body>
<div class="container">

<h1 class="text-center mt-2">ADMINISTRATION</h1>
<div class="row mt-5">
<div class="col-md-6">
    <div class="card">
      <div class="card-header">Admin Registration</div>
      <div class="card-body">

         <form method="post" action="../Controleur/controleur.php">
         <div class="form-group">
            <label>Entrer votre adresse mail</label>
            <input type="text" name="admin_mail" id="admin_mail" class="form-control"/>
         </div>

         <div class="form-group">
            <label>Entrer votre mot de passe</label>
            <input type="password" name="admin_password" id="admin_password" class="form-control"/>
         </div>


         <div class="form-group">
         <input type="hidden" name="page" value="register"/>
         <input type="hidden" name="action" value="register"/>
         <input type="submit" id="admin_register" class="btn btn-info" value="Register"/>
         </div>

         </form>
       </div>
       </div>
      </div>
   <div class="col-md-6">
   <div class="card">
      <div class="card-header">Login Registration</div>
      <div class="card-body">

         <form method="post" action="../Controleur/controleur.php">
         <div class="form-group">
            <label>Entrer votre adresse mail</label>
            <input type="text" name="admin_login_mail"  class="form-control"/>
         </div>

         <div class="form-group">
            <label>Entrer votre mot de passe</label>
            <input type="password" name="admin_login_password"  class="form-control"/>
         </div>


         <div class="form-group">
         <input type="hidden" name="action" value="login"/>
         <input type="submit" class="btn btn-info" value="Login"/>
         </div>

         </form>
       </div>
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
   
    <script>
    $(document).ready(function(){
       
    });
    </script>
</body>

</html>