<?php
require('Database.php');
class UserExam{
    protected $user_exam_id;
    protected $user_id;
    protected $id_examOnline;
    protected $attendance_status;
    public function __construct(){
        $this->user_exam_id=0;
        $this->user_id=0;
        $this->id_examOnline=0;
        $this->attendance_status="";
    }
    public function getUser_exam_id(){
        return $this->user_exam_id;
    }
    public function setUser_exam_id($user_exam_id){
        $this->user_exam_id=$user_exam_id;
    }
    public function getUser_id(){
        return $this->user_id;
    }
    public function setUser_id($user_id){
        $this->user_id=$user_id;
    }
    public function getId_examOnline(){
        return $this->id_examOnline;
    }
    public function setId_examOnline($id_examOnline){
        $this->id_examOnline=$id_examOnline;
    }
    public function getAttendance_status(){
        return $this->attendance_status;
    }
    public function setAttendance_status($attendance_status){
        $this->attendance_status=$attendance_status;
    }
    function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO user_exam VALUES (null,:user_id,:id_examOnline,:attendance_status)");
        $query->execute(array('user_id'=>$this->user_id,
                              'id_examOnline'=>$this->id_examOnline,
                              'attendance_status'=>$this->attendance_status
                                ));
    }


 function AfficheId(){
    global $con;
    $query=$con->prepare("SELECT * FROM user_exam");
    $query->execute();
   $res=$query->fetchAll();
   return $res;
  }

    public function AfficheDetails($user_id,$idExam)
    {
        global $con;
        $query = $con->prepare("SELECT * FROM user_exam WHERE user_id =:id AND id_examOnline=:idexam");
        $query->execute(array(
            'id' => $user_id,
            'idexam'=>$idExam
        ));
        $res = $query->fetchAll();
        return $res;
    }


    function updateUserExam($user_id, $exam_id, $attendance)
    {
        global $con;
        $query = $con->prepare("UPDATE  user_exam set attendance_status=:attendance WHERE user_id=:user_id AND id_examOnline=:id_exam");
        $query->execute(array(
            'attendance' => $attendance,
            'user_id' => $user_id,
            'id_exam' => $exam_id
        ));
    }


    function afficheUserExam($exam_id){
        global $con;
        $query = $con->prepare("SELECT * FROM user_exam INNER JOIN user_table ON user_table.user_id=user_exam.user_id WHERE user_exam.id_examOnline=:id");
        $query->execute(array(
            'id' => $exam_id,
        ));
        $res = $query->fetchAll();
        return $res;
    }

    function afficheAttendanceStatut($user_id,$exam_id){
        global $con;
        $query = $con->prepare("SELECT attendance_status FROM user_exam WHERE user_id=:user_id AND id_examOnline=:idExam");
        $query->execute(
            array(
                'user_id'=>$user_id,
                'idExam'=>$exam_id
            )
        );
        $res = $query->fetchAll();
        return $res;
    }
}
?>