<?php
session_start();
require('../Model/Admin.php');
require('../Model/ExamenOnline.php');
require('../Model/Question.php');
require('../Model/Option.php');
require('../Model/User.php');
require('../Model/UserExam.php');
require('../Model/UserExamQuestion.php');
$questionExam=new Question();
$admin=new Admin();
$examen=new ExamenOnline();
$option=new Option();
$user=new User();
$user_exam=new UserExam();
$userExamQuestion=new UserExamQuestion();
extract($_POST);
/*Admin*/ 

/*registre systeme*/ 
if(isset($page)){
    if($page=='register'){
        $mail=$admin_mail;
        $admin_type='sub_master';
       $pwd=md5($admin_password);
       $admin->setMail_admin($mail);
       $admin->setPassword_admin($pwd);
       $admin->setType_admin($admin_type);
       $admin->Insert();
       header('location:../Vue/admin.php');
    }
}
/*tapitra registre systeme*/ 

   /*login systeme*/ 
if(isset($action)){
    if($action=='login'){
        $pwd=md5($admin_login_password);
       if($row=$admin->Affiche($admin_login_mail,$pwd)){
           foreach ($row as $resultat) {
               $_SESSION['id_admin']=$resultat['id_admin'];
               $_SESSION['login']=true;
           }
        header('location:../Vue/Admin_acceui.php');
       }else{
        header('location:../Vue/admin.php'); 
       }
       
    }
}

/*Tapitra login systeme*/ 

if(isset($read) && isset($id_admin)){
    $row=$examen->AfficheExame($id_admin);
    $table= '<div class="table-responsive">
    <table id="exam_data_table" class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
    <th>Titre</th>
    <th>Date & Time</th>
    <th>Duration</th>
    <th>Total Question</th>
    <th>Bonne réponse</th>
    <th>Mauvaise réponse</th>
    <th>Questions</th>
    <th>Ajoute Questions</th>
    <th>Etudiants</th>
    <th>Résultat</th>
    <th>Action</th>
    </tr>
    </thead>
 ';
 
   $duration_minute='';
   $button_view='';
    foreach($row as $resultat){


        /*Duration*/
        $duration_minute = '';
    if($resultat['exam_duration']=="5" || $resultat['exam_duration']=="15" || $resultat['exam_duration']=="30" || $resultat['exam_duration']=="45"){
            $duration_minute=$resultat['exam_duration']." "."Minutes";
         }elseif($resultat['exam_duration']=="60"){
            $duration_minute="1 Heures";
         }elseif($resultat['exam_duration']=="120"){
            $duration_minute="2 Heures";
         }else{
            $duration_minute="3 Heures";
         }
       /*Duration tapitra*/ 


         /*Count question*/ 
        $contQuestion=$questionExam->AfficheCountQuestion($resultat['id_examOnline']);
        $count='';
        foreach($contQuestion as $row){
           $count=$row['total'];
        }
        /*Tapitra Count question*/ 


        
        /*button ajoute question*/ 

        $button_ajoute='';
        if($count==$resultat['total_question']){
         $button_ajoute='<span class=" badge badge-success p-2 text-white rounded">Completed !!!</span>';
        }else{
            $button_ajoute = '<button class="btn  btn-outline-success" data-toggle="modal" data-target="#modal_question" onclick="GetQuestion(' . $resultat['id_examOnline'] . ')">Ajouter</button>';
        }
        /*tapitra ajoute question*/ 


        $table .='
        <tbody>
        <tr>
        <td>'.$resultat['exam_title'].'</td>
        <td>'.$resultat['exam_datetime'].'</td>
        <td>'.$duration_minute.'</td>
        <td>'.$resultat['total_question'].'</td>
        <td>'.$resultat['right_answer']." "."Points".'</td>
        <td>'.$resultat['wrong_answer']." "."Points".'</td>
        <td><a href="../Vue/QuestionPage.php?code=' . $resultat['exam_code'] . '" class="btn btn-warning btn-sm">Voir<span class="badge badge-danger ml-2">'.$count. '</span></a></td>
        <td>'.$button_ajoute.'</td>
        <td><a href="userExamList.php?code='. $resultat['exam_code'].'" class="btn btn-secondary btn-sm">Etudiants</a></td>
        <td><a href="TotalResultat.php?code='. $resultat['exam_code'].'" class="btn btn-danger">Résultats</a></td>
        <td><button class="btn  btn-outline-info" data-toggle="modal" data-target="#edit_modal" onclick="GetUser(' . $resultat['id_examOnline'] . ')">Modifier</button><br/>
        <button class="btn btn-outline-danger mt-1" onclick="Delete(' . $resultat['id_examOnline'] . ')">Suprimer</button></td>
        </tr>
        </tbody>
       ';
    }
    $table .='</table> 
    <div class="table-responsive">';
    echo $table;
}



/*Insertion exam*/ 
if(isset($_POST['exam'])){

   $id=$_POST['id'];
    $examTitle=$_POST['titre'];
    $examDateTime=$_POST['date'];
    $examDuration=$_POST['duration'];
    $totalQuestion=$_POST['total'];
    $right=$_POST['bonne'];
    $wrong=$_POST['mauvaise'];
    $status='Pending';
    $examCode=md5(rand());

    $examen->setId_admin($id);
    $examen->setExam_title($examTitle);
    $examen->setExam_datetime($examDateTime);
    $examen->setExam_duration($examDuration);
    $examen->setTotal_question($totalQuestion);
    $examen->setRight_answer($right);
    $examen->setWrong_answer($wrong);
    $examen->setExam_status($status);
    $examen->setExam_code($examCode);
    $examen->Insert();
   echo"Insertion avec success!";
}

/*tapitra exam insertion*/ 


/*recuperation exam modifier*/ 
if(isset($_POST['modifier_exam'])){
   
        $id_exam=$_POST['idExam'];
        $res=$examen->AfficheExameId($id_exam);
        $row=array();
        foreach($res as $resultat){
            $row=$resultat;
            
        }
        echo json_encode($row);
    
}
/*tapitra recuperation exam modifier*/ 

/*exam modifier*/ 
if(isset($_POST['id_exam_modifier'])){
    $id=$_POST['id_exam_modifier'];
    $titre=$_POST['exam_titleModifier'];
    $date=$_POST['exam_dateModifier'];
    $duration=$_POST['exam_durationModifier'];
    $total=$_POST['total_question_modifier'];
    $right=$_POST['bonne_reponse_modifier'];
    $wrong=$_POST['mauvaise_reponse_modifier'];
    $examen->updateExam($titre,$date,$duration,$total,$right,$wrong,$id);
    echo "Update avec succes!";
}

/*tapitra exam modifier*/ 

/*Suprimer exam*/ 
if(isset($_POST['deleteExam'])){
    $idExamDelete = $_POST['deleteExam'];
    $examen->deleteExamen($idExamDelete);
    echo "Supression avec succes";
}
/*Tapitra suprimer exam*/ 


/*ajouter question*/
if(isset($_POST['ajouter_question'])){
    $question_titre=$_POST['question_title'];
    $bonne_reponse=$_POST['bonne_reponse'];
    $id_examen_question=$_POST['idexam_question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $option5 = $_POST['option5'];
    $questionExam->setId_examOnline($id_examen_question);
    $questionExam->setQuestion_titre($question_titre);
    $questionExam->setAnswer_option($bonne_reponse);
    $questionExam->Insert();


    $id_examen_option=$questionExam->AfficheIdQuestion($id_examen_question);
    $id_question='';
    $option1_number=1;
    $option2_number = 2;
    $option3_number = 3;
    $option4_number = 4;
    $option5_number = 5;
    foreach($id_examen_option as $row){
        $id_question=$row['question_id'];
    }
     $option->setQuestion_id($id_question);
     $option->setOption_number($option1_number);
     $option->setOption_title($option1);
     $option->Insert1();

    $option->setQuestion_id($id_question);
    $option->setOption_number($option2_number);
    $option->setOption_title($option2);
    $option->Insert2();

    $option->setQuestion_id($id_question);
    $option->setOption_number($option3_number);
    $option->setOption_title($option3);
    $option->Insert3();

    $option->setQuestion_id($id_question);
    $option->setOption_number($option4_number);
    $option->setOption_title($option4);
    $option->Insert4();

    $option->setQuestion_id($id_question);
    $option->setOption_number($option5_number);
    $option->setOption_title($option5);
    $option->Insert5();

    echo "Insertion de question OK!!!";
}
/*Tapitra ajouter question*/


/*select list question*/
if(isset($_POST['list_question'])){
 $code=$_POST['code_exam'];
 $id_exam_questionList=$examen->AfficheExameIdCode($code);
 $examId='';
 foreach($id_exam_questionList as $row){
     $examId=$row['id_examOnline'];
 }

    $table = '<div class="table-responsive">
    <table id="exam_data_table" class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
    <th>Questions</th>
    <th>Bonne réponse</th>
    <th>Suprimer</th>
    </tr>
    </thead>
 ';
 $rows=$questionExam->Affiche($examId);
 foreach($rows as $resultat){
        $table .= '
        <tbody>
        <tr>
        <td>' . $resultat['question_titre'] . '</td>
        <td>OPTION ' . $resultat['answer_option'] . '</td>
        <td><button class="btn btn-outline-danger mt-1" onclick="DeleteQuestion(' . $resultat['question_id'] . ')">Suprimer</button></td>
        </tr>
        </tbody>
       ';
 }
    $table .= '</table> 
    <div class="table-responsive">';
    echo $table;


}

/*Tapitra select list question*/


if(isset($_POST['id_suprimer_question'])){
    $id_question_suprimer=$_POST['idQuestion'];
    $option->deleteOption($id_question_suprimer);
    $questionExam->deleteQuestion($id_question_suprimer);
    echo "supression avec success!!!";
}

/*Afficher user list examen */
if(isset($_POST['enroll'])){
$examenId=$examen->AfficheExameIdCode($_POST['code']);
    $examen_id;
foreach($examenId as $resultat){
    $examen_id=$resultat['id_examOnline'];
}

$userExamList=$user_exam->afficheUserExam($examen_id);
$output= ' <div class="table-responsive">
                <table id="enroll_table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Mobile</th>
                            <th>Adresse</th>
                            <th>Email</th>
                            <th>Resultat</th>
                        </tr>

                    </thead>';
    $resultButton='';

    
foreach($userExamList as $res){
        if ($res["attendance_status"]=="Present") {
            $_SESSION['codeExam']= $_POST['code'];
          $resultButton= '<a href="Resultat_user_une.php?id='.$res["user_id"].'&user_name='.$res["user_name"].'" class="btn btn-info btn-sm" target="_blank">Resultat</a>';
        }
$output .='
      <tbody>
      <tr>
      <td><img src="../Controleur/'.$res["user_image"].'" class="img-thumbnail" width="75"/></td>
      <td>'.$res["user_name"].'</td>
      <td>'.$res["user_gender"].'</td>
      <td>'.$res["user_mobile"].'</td>
      <td>'. $res["user_adresse"]. '</td>
      <td>' . $res["user_mail"] . '</td>
      <td>'.$resultButton.'</td>
      </>
      </tbody>
';

}

$output .='
</div>
</table>
';
echo $output;
}

/*tapitra user list examen */



/*Admin*/ 








/*utilisateur*/ 
/*registre user*/ 
if(isset($_POST['user_reg'])){
 $user_verification_code=md5(rand());
 $mail=$_POST['user_mail_adress'];
 $mdp=$_POST['user_password'];
 $name=$_POST['user_name'];
 $gender=$_POST['user_gender'];
 $adresse=$_POST['user_adresse'];
 $mobile=$_POST['user_mobile'];

    if ($_FILES["user_image"]["error"] > 0)
    $user_image =  "Return Code: " . $_FILES["user_image"]["error"] . "<br>";
    else {
        if (file_exists("uploadFile/" . $_FILES["user_image"]["name"]))
        $user_image = "uploadFile/" . $_FILES["user_image"]["name"] ."fichier existe.";
        else {
            move_uploaded_file(
                $_FILES["user_image"]["tmp_name"],
                "uploadFile/" . $_FILES["user_image"]["name"]
            );

            $user_image = "uploadFile/" . $_FILES["user_image"]["name"];
        }
    }

 $user->setUser_mail($mail);
 $user->setUser_password($mdp);
 $user->setUser_v_code($user_verification_code);
 $user->setUser_name($name);
 $user->setUser_gender($gender);
 $user->setUser_adresse($adresse);
 $user->setUser_mobile($mobile);
 $user->setUser_image($user_image);
 $user->Insert();
 echo "Insertion avec success!!!";
}
/*tapitra registre user*/ 


/*login user*/ 
if(isset($_POST['user_login'])){
    $user_login_mail=$_POST['user_login_mail'];
    $user_login_pwd=$_POST['user_login_pwd'];

    if($row=$user->AfficheMailUser($user_login_mail, $user_login_pwd)){
         foreach($row as $res){
             $_SESSION['id_user']=$res['user_id'];
             $_SESSION['user_name']=$res['user_name'];
             $_SESSION['user_code']=$res['user_v_code'];
             $_SESSION['login']="true";
         }
        header('location:../Vue/user_acceuil.php');
    }else{
        header('location:../Vue/user.php');
    }
}
/*tapitra login user*/ 

/*afficher exam list*/ 
if(isset($_POST['exam_id_list'])){
$id_exam_listDetails=$_POST['exam_id_list'];
$row=$examen->AfficheExameId($id_exam_listDetails);

    $output = '
     <div class="card">
     <div class="card-header">
     Examens Details
     </div>
     <div class="card-body">
     <table class="table table-striped table-hover table-bordered">
     </div>
     </div>
    ';
foreach($row as $res){
        $duration_minute = '';
        if ($res['exam_duration'] == "5" || $res['exam_duration'] == "15" || $res['exam_duration'] == "30" || $res['exam_duration'] == "45") {
            $duration_minute = $res['exam_duration'] . " " . "Minutes";
        } elseif ($res['exam_duration'] == "60") {
            $duration_minute = "1 Heures";
        } elseif ($res['exam_duration'] == "120") {
            $duration_minute = "2 Heures";
        } else {
            $duration_minute = "3 Heures";
        }
    $output .= '
    <tr>
    <td><b>Examen Title</b></td>
    <td>'.$res['exam_title'].'</td>
    </tr>

    <tr>
    <td><b>Examen Date & Time</b></td>
    <td>'.$res['exam_datetime'].'</td>
    </tr>

    <tr>
    <td><b>Examen Duration</b></td>
    <td>'.$duration_minute.'</td>
    </tr>

    <tr>
    <td><b>Examen Total Question</b></td>
    <td>'.$res['total_question'].'</td>
    </tr>
   

      <tr>
    <td><b>Right answer</b></td>
    <td>'.$res['right_answer'].' Points</td>
    </tr>

    <tr>
    <td><b>Wrong answer</b></td>
    <td>'.$res['wrong_answer']. ' Points</td>
    </tr>
    ';
        $enroll_button='';

    if($view=$user_exam->AfficheDetails($_SESSION['id_user'], $id_exam_listDetails)){
         foreach ($view as $result) {
     if ($result['attendance_status'] == 'Present') {
        $enroll_button = '
        <tr>
        <td colspan="2" align="center">
        <button type="button" name="enroll_button" class="btn btn-info">Completed</button>
        <a href="#" class="btn btn-success">Aller Vers l\'Universite</a>
        </td>
        </tr>
        ';
                }
            }
 
    }else{
        $enroll_button= '
        <tr>
        <td colspan="1" align="center">
        <button type="button" name="enroll_button" id="enroll_button" class="btn btn-warning btn-sm" data-exam_id="'.$res['id_examOnline']. '">Accepter</button>
        </td>
        <td colspan="1" align="center" id="btn_view" class="button_view">
        <a href="view_exam.php?code=' . $res['exam_code'] . '" class="btn btn-info btn-sm">View Exam</a>
        </td>
        </tr>
        ';
          

    }
    $output .=$enroll_button;
    
}
$output .='</table>';
    echo $output;
}
/*tapitra afficher exam list*/ 

/*Enroll exam*/ 
if(isset($_POST['action_enroll_exam'])){
    $exam_id=$_POST['exam_id'];
    $user_exam->setUser_id($_SESSION['id_user']);
    $user_exam->setId_examOnline($exam_id);
    $user_exam->setAttendance_status('');
    $user_exam->Insert();

    $row=$questionExam->AfficheIdQuestion($exam_id);
    $user_answer_option = '0';
    $mark = '0';
    $id_question;
    foreach($row as $res){
    $id_question=$res['question_id'];
        $userExamQuestion->setUser_id($_SESSION['id_user']);
        $userExamQuestion->setId_examOnline($exam_id);
        $userExamQuestion->setQuestion_id($id_question);
        $userExamQuestion->setUser_answer_option($user_answer_option);
        $userExamQuestion->setMarks($mark);
        $userExamQuestion->Insert();
    }



}
/*tapitra Enroll exam*/ 

/*Affiche question*/ 
if(isset($_POST['view_exam'])){
    if($_POST['action']=='load_question'){
        if($_POST['question_id']==''){
           $row=$questionExam->AfficheQuestion($_POST['exam_id']);
        }else{
           $row=$questionExam->AfficheAutre($_POST['question_id']);
        }
         
        $output='';
        foreach($row as $resultat){
            $output .='
            <h1>'.$resultat["question_titre"].'</h1>
            <hr>
            <br/>
            <div class="row">
            ';
            $rows=$option->AfficheOption($resultat['question_id']);
            $count=1;
            foreach($rows as $list_option){
                   $output .='
                   <div class="col-md-6" style="margin-bottom:32px;">
                          <div class="radio">
                          <label><h4><input type="radio" name="option_1" class="answer_option" data-question_id="'.$list_option['question_id'].'" data-id="'.$count.'"/> '.$list_option['option_title'].'</h4></label>
                          </div>
                   </div>
                   ';
                   $count=$count + 1;
            } 

            $output .='</div>';
            
            $previousList=$questionExam->AfficheQuestionEgaliter($resultat['question_id'], $_POST['exam_id']);
            $previous_id='';
            $next_id='';
            foreach($previousList as $previous_row){
                $previous_id=$previous_row['question_id'];
            }
            $nextList = $questionExam->AfficheQuestionEgaliter2($resultat['question_id'], $_POST['exam_id']);
            foreach($nextList as $next_row){
                $next_id=$next_row['question_id'];
            }

            $if_previousList_disable='';
            $if_nextList_disable='';

            if($previous_id==''){
                $if_previousList_disable='disabled';
            }
            
            if($next_id==''){
                $if_nextList_disable='disabled';
            }
            $output .= '
             <br/><br/>
             <div align="center">
             <button type="button" name="previous" class="btn btn-info btn-lg previous" id="'.$previous_id.'" '.$if_previousList_disable.'>Previous</button>
             <button type="button" name="next" class="btn btn-warning btn-lg next" id="'.$next_id.'" '.$if_nextList_disable.'>Next</button>
             </div>
             <br/><br/>
            ';
            if ($next_id == '') {
                $output .= '
                <a href="resultExam.php" class="btn btn-danger">Enregistrer</a>
                ';
            }

        }

        echo $output;
    }
}
/*tapitra Affiche question*/ 



/* Affiche question navigation*/ 


if(isset($_POST['question_navigation'])){
    $ascQuestionId=$questionExam->AfficheIdQuestionASC($_POST['exam_id']);
    $output ='
    <div class="card-header">Question navigation</div>
    <div class="card-body">
    <div class="row">
    ';
    $count=1;
    foreach($ascQuestionId as $res){
        $output .='
         <div class="col-md-2" stype="margin-bottom:24px;">
         <button type="button" class="btn btn-primary btn-lg question_navigation" data-question_id="'.$res['question_id'].'">'.$count.'</button>
         </div>
        ';
        $count=$count + 1;
    }
    $output .='
     </div>
     </div>
     </div>
    ';

    echo $output;
}

/*tapitra Affiche question navigation*/ 



/*affiche user_details*/ 
if(isset($_POST['user_detail'])){
    $user_details=$user->AfficheUser($_SESSION['id_user']);
    $output='
    <div class="card">
    <div class="card-header">User Details</div>
    <div class="card-body">
    <div class="row">
    ';
      
    foreach($user_details as $res){
        $output .= '
        <div class="col-md-3">
         <center> <img src="../Controleur/'.$res['user_image']. '" alt="" class="img-fluid"></center>
        </div>
        <div class="col-md-9">
            <table class="table table-bordered">
            <tr>
             <th>Name</th>
             <td>'.$res['user_name'].'</td>
            </tr>
            <tr>
             <th>Email ID</th>
             <td>'.$res['user_mail'].'</td>
            </tr>

            <tr>
             <th>Gendar</th>
             <td>'.$res['user_gender'].'</td>
            </tr>
            </table>
        </div>
        ';
    }

    $output .='
     </div> </div> </div>
    ';

    echo $output;

}
/*tapitra affiche user_details*/ 

/*Submit radio*/ 
if(isset($_POST['answer'])){
    $bonne_question=$examen->AfficheRight($_POST['exam_id']);
    foreach($bonne_question as $res){
          $right=$res['right_answer'];
    }

    $mauvaise_question=$examen->AfficheWrong($_POST['exam_id']);
    foreach($mauvaise_question as $resultat){
        $wrong=$resultat['wrong_answer'];
    }

    $original_answer=$questionExam->AfficheOriginaleAnswer($_POST['question_id']);
    foreach($original_answer as $rows){
        $right_answer=$rows['answer_option'];
    }
    $points=0;
    if($right_answer==$_POST['answer_option']){
        $points='+'.$right;
    }else{
        $points='-'.$wrong;

    }

    $userId= $_SESSION['id_user'];
    $userAnswerOption=$_POST['answer_option'];
    $marks=$points;
    $examId=$_POST['exam_id'];
    $questionId=$_POST['question_id'];

    $userExamQuestion->updateUserExamAnswer($userAnswerOption,$marks,$userId,$examId,$questionId);

}
/*Tapitra ny submit radio */

/*tapitra ny utilisateur*/ 


?>