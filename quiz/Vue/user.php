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
        <h1 class="text-center">PAGE USER</h1>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="../Controleur/controleur.php" method="post">
                            <div class="form-group">
                                <input type="text" name="user_login_mail" placeholder="E-mail..." required class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="user_login_pwd" placeholder="Password..." class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_login">
                                <input type="submit" value="Login" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Registration</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" id="user_registre_form" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="user_mail_adress" id="user_mail_adress" class="form-control" placeholder="E-mail..." required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Mot de passe..." required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Name..." required>
                            </div>
                            <div class="form-group">
                                <select name="user_gender" id="user_gender" class="form-control" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="user_adresse" id="user_adresse" class="form-control" placeholder="Adresse..." required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="user_mobile" id="user_mobile" class="form-control" placeholder="Mobile..." required>
                            </div>
                            <div class="form-group">
                                <input type="file" name="user_image" id="user_image" class="form-control" required>
                            </div>
                            <input type="hidden" name="user_reg" id="user_reg">
                            <div class="form-group">
                                <input type="submit" id="user_registre" name="user_registre" class="btn btn-info" value="Registre">
                            </div>
                        </form>
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
        $(document).ready(function() {


            $('#user_registre_form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "../Controleur/controleur.php",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        alert("Enregistrement avec success!!!");
                        $('#user_registre_form')[0].reset();
                    }
                });

            });

        });
    </script>
</body>

</html>