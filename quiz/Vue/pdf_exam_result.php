<?php
session_start();
require_once('../Model/ExamenOnline.php');
require_once('../Model/Question.php');
require_once('../Model/Option.php');
require_once('../Model/UserExamQuestion.php');
require_once('../class/pdf.php');
$examen=new ExamenOnline();
$question=new Question();
$option=new Option();
$userExamQuestion=new UserExamQuestion();
if(isset($_GET['code'])){
    $exam=$examen->AfficheExameIdCode($_GET['code']);
    $examId;
      foreach($exam as $res){
          $examId=$res['id_examOnline'];
      }
    $resultat=$question->AfficheResultat($examId,$_SESSION['id_user']);
     $output= '
     <center><h1 style="color:blue;">UNIVERSITE EN LIGNE E-MEDIA</h1></center>
     <h3 align="center">RESULTAT D\'EXAMENS</h3>
     <table width="100%" border="1" cellpadding="5" cellspacing="0">
     <tr>
     <th>Question</th>
     <th>Votre réponse</th>
     <th>Bonne réponse</th>
     <th>Résultat</th>
     <th>Points</th>
     </tr>
     
     ';

     $total_mark=0;
     foreach($resultat as $row){
         $sub_result=$option->AfficheResultOption($row['question_id']);
         $user_answer='';
         $original_answer='';
         $question_result='';

         if($row['marks']=='0'){
             $question_result='Tres Mauvaise !!!';
         }

        if ($row['marks'] > 0) {
            $question_result = 'Bon !!!';
        }


        if ($row['marks'] < 0) {
            $question_result = 'Mauvaise !!!';
        }

        $output .='
        <tr>
        <td>'.$row['question_titre'].'</td>
        ';
          
        foreach($sub_result as $sub_row){
            if($sub_row['option_number']==$row['user_answer_option']){
                $user_answer=$sub_row['option_title'];
            }

            if ($sub_row['option_number'] == $row['answer_option']) {
                $original_answer=$sub_row['option_title'];
            }
        }

        $output .= '
        <td>'.$user_answer.'</td>
        <td>'.$original_answer.'</td>
        <td>'.$question_result.'</td>
        <td>'.$row['marks'].'</td>
        </tr>
        ';


     }

     $sum_marks=$userExamQuestion->SumMarks($_SESSION['id_user'],$examId);

    $sum='';
     foreach($sum_marks as $res){
         $sum=$res['total_marks'];
     }

    $output .= '
        <tr>
        <td colspan="4" align="right">Points Total :</td>
        <td align="right">'.$sum.'</td>
        </tr>
        ';
    }  

    $output .='</table>';

    $pdf=new Pdf();
    $pdf->set_paper('letter','landscape');
    $file_name='EXAMEN E-MEDIA.pdf';
    $pdf->loadHtml($output);
    $pdf->render();
    $pdf->stream($file_name,array("Attachment"=>false));
    exit(0);

?>