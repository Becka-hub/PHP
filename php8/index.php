<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    
</head>
<body>
<div class="container">
<h1 class="text-primary text-uppercase text-center">AJAX CRUD</h1>
<div class=" d-flex justify-content-end">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
  Insert
</button>
</div>
<div class="row mt-5 ">
<div class="col-sm-12 col-md-12 table overflow-auto">
<div id="content">

</div>
</div>
</div>
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center ">
        <h5 class="modal-title text-capitalize" id="exampleModalLabel">BECKAS</h5>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="fname" class="col-form-label">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname">
          </div>
          <div class="form-group">
            <label for="lname" class="col-form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="telephone" class="col-form-label">Telephone</label>
            <input type="text" class="form-control" id="telephone" name="telephone">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="response"></span>
        <button type="button" class="btn btn-primary" onclick="addData()">SAVE</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!modal update>

<div class="modal fade" id="Updata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center ">
        <h5 class="modal-title text-capitalize" id="exampleModalLabel">BECKAS</h5>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="update_fname" class="col-form-label"> Update First Name</label>
            <input type="text" class="form-control" id="update_fname" >
          </div>
          <div class="form-group">
            <label for="update_lname" class="col-form-label">Update Last Name</label>
            <input type="text" class="form-control" id="update_lname">
          </div>
          <div class="form-group">
            <label for="update_email" class="col-form-label">Update Email</label>
            <input type="email" class="form-control" id="update_email" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Update Telephone</label>
            <input type="update_telephone" class="form-control" id="update_telephone" >
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="updateUser()">UPDATE</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="" id="hiddenID">
      </div>
    </div>
  </div>
</div>

</div>
<script type="text/javascript" src="jquery/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="jquery/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery-3.2.1.js"></script>
    <script src="jquery/jquery-3.4.1.js"></script>
    <script src="jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            readData();
        });
       function readData(){
           var read = "read";
           $.ajax({
             url:"insert.php",
             method:"POST",
             data:{read:read},
             success:function(data){
               $('#content').html(data);
             }
           });
        }
          function addData(){
              var fname=$('#fname').val();
              var lname=$('#lname').val();
              var email=$('#email').val();
              var telephone=$('#telephone').val();
              if($('#fname').val()==''||$('#lname').val()==''||$('#email').val()==''||$('#telephone').val()==''){
                alert("Veuiller remplir tous les champs");
              }else{
              $.ajax({
                 url:"insert.php",
                 method:"POST",
                 data:{fname:fname,lname:lname,email:email,telephone:telephone},
                 success:function(data){
                    $('.response').html(data).fadeIn();
                    $('#fname').val('');
                    $('#lname').val('');
                    $('#email').val('');
                    $('#telephone').val('');
                    setTimeout(function(){
                     $('.response').fadeOut('slow');
                    },2000);
                     readData();
                 }

              });
              }
          }

          function Delete(deleteid){
             var conf=confirm("Vous êtes sur de le suprimer?");
             if(conf==true){
               $.ajax({
                 url:"insert.php",
                 method:"POST",
                 data:{deleteid:deleteid},
                 success:function(data){
                   alert(data);
                  readData();
                 }
               });
             }
          }

          function GetUser(Upid){
             $('#hiddenID').val(Upid);
             $.post("insert.php",{Upid:Upid},
             function(data){
               var user=JSON.parse(data);
               $('#update_fname').val(user.fname);
               $('#update_lname').val(user.lname);
               $('#update_email').val(user.email);
               $('#update_telephone').val(user.Telephone);
             }
              
             );
          }


          function updateUser(){
            var idUser=$('#hiddenID').val();
            var Fname=$('#update_fname').val();
            var Lname=$('#update_lname').val();
            var Email=$('#update_email').val();
            var Telephone=$('#update_telephone').val();
            $.post("insert.php",{
              idUser:idUser,
              Fname:Fname,
              Lname:Lname,
              Email:Email,
              Telephone:Telephone
            },function(data){
              alert(data);
              readData();
            }
            );
          }
    </script>
</body>
</html>