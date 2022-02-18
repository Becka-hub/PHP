<?php
require('model/Crud.php');
$crud=new Crud();
if(isset($_POST['read'])){
    $table='<table class="table table-border-danger table-striped">
       <tr>
       <th>Id</th>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Email</th>
       <th>Telephone</th>
       <th>Edit</th>
       <th>Delete</th>
       </tr> 
    ';
    $res=$crud->Affiche();
    $number=1;
    foreach($res as $resultat){
        $table .='
         <tr class="">
         <td>'.$number.'</td>
         <td>'.$resultat['fname'].'</td>
         <td>'.$resultat['lname'].'</td>
         <td>'.$resultat['email'].'</td>
         <td>'.$resultat['Telephone'].'</td>
         <td> <button class="btn  btn-outline-success" data-toggle="modal" data-target="#Updata" onclick="GetUser('.$resultat['id'].')"> EDIT</button> </td>
         <td> <button class="btn btn-outline-danger" onclick="Delete('.$resultat['id'].')"> DELETE</button> </td>
         </tr>
        ';
        $number++;
    }
    $table .='</table>';
    echo $table;
}

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['telephone'])){
    $crud->setFname($_POST['fname']);
    $crud->setLname($_POST['lname']);
    $crud->setEmail($_POST['email']);
    $crud->setTelephone($_POST['telephone']);
    $crud->Insert();
    echo "INSERTION AVEC SUCCES";
}

if(isset($_POST['deleteid'])){
    $userId=$_POST['deleteid'];
    $crud->delete($userId);
    echo "Supression avec succes";
}


if(isset($_POST['Upid']) && isset($_POST['Upid'])!=""){
    $upID=$_POST['Upid'];
    $res=$crud->AfficheId($upID);
    $row=array();
    foreach($res as $resultat){
        $row=$resultat;
        
    }
    echo json_encode($row);
}


if(isset($_POST['idUser'])){
    $id=$_POST['idUser'];
    $firstname=$_POST['Fname'];
    $lastname=$_POST['Lname'];
    $email=$_POST['Email'];
    $telephone=$_POST['Telephone'];
    $crud->update($id,$firstname,$lastname,$email,$telephone);
    echo "Update avec succes";
}

?>