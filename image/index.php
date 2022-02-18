<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="jquery/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="jquery/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery-3.2.1.js"></script>
    <script src="jquery/jquery-3.4.1.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-lg-6 d-flex align-items-center j">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Photo</label>
            <input type="file" class="form-control" name="photo" id="image" aria-describedby="emailHelp">
          </div>
           <div class="form-group">
              <label for="exampleInputPassword1">Libeler</label>
              <textarea class="form-control" name="text" id="text"></textarea>
           </div>
           <div class="form-group">
            <input type="submit" class="btn btn-success" id="inserer" name="upload" value="Upload">
          </div>
        </form>
        </div>
        <div class="col-lg-6 overflow-auto tableau mt-5 ">
        <table class="table ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Libeler</th>
    </tr>
  </thead>
  <tbody>
   
        <?php
        require('model/Image.php');
        $img=new Image();
        if(isset($_POST['upload'])){
            if(count($_FILES) > 0) {
        if(is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $file=file_get_contents($_FILES["photo"]["tmp_name"]);
            $image=base64_encode($file);
            if(!empty($image)){
            $img->setImage($image);
            $img->setText($_POST['text']);
            $img->Insert();
        } else{
            echo" veuillez selectionez un image";
        }
        }
    }
      }
        $res=$img->Affiche();
       foreach($res as $resultat){
        ?> 
     <tr>
         <td> <?php echo $resultat['id'] ;?></td>
         <td><?php echo '<img src="data:image;base64,'.$resultat["image"].'" alt="" style="width:50px; height:50px;"/>'; ?></td>
         <td> <?php echo $resultat['text']; ?></td>
    </tr>
     
     <?php
     
    }
    ?> 
  </tbody>
   </table>
   </div>
      </div> 
    </div>
</body>
</html>