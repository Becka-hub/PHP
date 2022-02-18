<?php
require_once('../class/pdf.php');
require_once('../Model/ExamenOnline.php');
require_once('../Model/UserExamQuestion.php');
require_once('../Model/User.php');
require_once('../Model/Question.php');
require_once('../Model/UserExam.php');
$exam=new ExamenOnline();
$userExam=new UserExamQuestion();
$ExamUser=new UserExam();
if(isset($_GET['code'])){
    $id_examen;
    $examen_id=$exam->AfficheExameIdCode($_GET['code']);
 
    foreach($examen_id as $row){
        $id_examen=$row['id_examOnline'];
    }
    $total_result=$userExam->TotalResultExam($id_examen);
   $output='
    <h2 align="center">RESULTAT D\'EXAMENS E-MEDIA</h2>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
       <th>Rang</th>
       <th>Image</th>
       <th>User_name</th>
       <th>Attendance Status</th>
       <th>Points</th>
    ';
    $count= 1;
    foreach($total_result as $res){
        $status=$ExamUser->afficheAttendanceStatut($res['user_id'], $id_examen);
        $Attendance="";
        foreach($status as $rows){
            $Attendance=$rows['attendance_status'];
        }

        $output .='
        <tr>
        <td>'.$count.'</td>
        <td><img src="../Controleur/'.$res['user_image'].'" width="75"/></td>
        <td>'.$res["user_name"].'</td>
        <td>'.$Attendance.'</td>
        <td>'.$res['total_mark'].'</td>
        </tr>
        ';

        $count=$count + 1;

    }

    $output .='</table>';

    $pdf=new pdf();
    $pdf->set_paper('letter','landscape');
    $file_name='Resultat total.pdf';
    $pdf->loadHtml($output);
    $pdf->render();
    $pdf->stream($file_name, array("Attachment" => false));
    exit(0);

    

}

?>