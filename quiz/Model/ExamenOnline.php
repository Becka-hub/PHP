<?php
require('Database.php');
class ExamenOnline{
    protected $id_examOnline;
    protected $id_admin;
    protected $exam_title;
    protected $exam_datetime;
    protected $exam_duration;
    protected $total_question;
    protected $right_answer;
    protected $wrong_answer;
    protected $exam_create;
    protected $exam_status;
    protected $exam_code;
    function __construct()
    {
        $this->id_examOnline=0;
        $this->id_admin=0;
        $this->exam_title="";
        $this->exam_datetime="";
        $this->exam_duration="";
        $this->total_question=0;
        $this->right_answer="";
        $this->wrong_answer="";
        $this->exam_create="";
        $this->exam_status="";
        $this->exam_code="";
    }
    function getId_examOnline(){
        return $this->id_examOnline;
    }
    function setId_examOnline($id_examOnline){
        $this->id_examOnline=$id_examOnline;
    }
    function getId_admin(){
        return $this->id_admin;
    }
    function setId_admin($id_admin){
        $this->id_admin=$id_admin;
    }
    function getExam_title(){
        return $this->exam_title;
    }
    function setExam_title($exam_title){
        $this->exam_title=$exam_title;
    }
    function getExam_datetime(){
        return $this->exam_datetime;
    }
    function setExam_datetime($exam_datetime){
        $this->exam_datetime=$exam_datetime;
    }
    function getExam_duration(){
        return $this->exam_duration;
    }
    function setExam_duration($exam_duration){
        $this->exam_duration=$exam_duration;
    }
    function getTotal_question(){
        return $this->total_question;
    }
    function setTotal_question($total_question){
        $this->total_question=$total_question;
    }
    function getRight_answer(){
        return $this->right_answer;
    }
    function setRight_answer($right_answer){
        $this->right_answer=$right_answer;
    }
    function getWrong_answer(){
        return $this->wrong_answer;
    }
    function setWrong_answer($wrong_answer){
        $this->wrong_answer=$wrong_answer;
    }
    function getExam_create(){
        return $this->exam_create;
    }
    function setExam_create($exam_create){
        $this->exam_create=$exam_create;
    }
    function getExam_status(){
        return $this->exam_status;
    }
    function setExam_status($exam_status){
        $this->exam_status=$exam_status;
    }
    function getExam_code(){
        return $this->exam_code;
    }
    function setExam_code($exam_code){
        $this->exam_code=$exam_code;
    }
    function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO online_exam_table VALUES(null,:id_admin,:exam_title,:exam_datetime,:exam_duration,:total_question,:right_answer,:wrong_answer,sysdate(),:exam_status,:exam_code)");
        $query->execute(array('id_admin'=>$this->id_admin,
                              'exam_title'=>$this->exam_title,
                               'exam_datetime'=>$this->exam_datetime,
                               'exam_duration'=>$this->exam_duration,
                               'total_question'=>$this->total_question,
                               'right_answer'=>$this->right_answer,
                               'wrong_answer'=>$this->wrong_answer,
                               'exam_status'=>$this->exam_status,
                               'exam_code'=>$this->exam_code,
                                ));
    }

    function Affiche()
    {
        global $con;
        $query = $con->prepare("SELECT * FROM online_exam_table");
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

     function AfficheExame($id){
        global $con;
        $query=$con->prepare("SELECT * FROM online_exam_table WHERE id_admin =:id");
        $query->execute(array(
            'id'=>$id,
            
        ));
        $res=$query->fetchAll();
        return $res;
    }

    
    function AfficheExameId($id){
        global $con;
        $query=$con->prepare("SELECT * FROM online_exam_table WHERE id_examOnline=:id");
        $query->execute(array(
            'id'=>$id,
            
        ));
        $res=$query->fetchAll();
        return $res;
    }

     function AfficheRight($id)
    {
        global $con;
        $query = $con->prepare("SELECT right_answer FROM online_exam_table WHERE id_examOnline=:id");
        $query->execute(array(
            'id' => $id,

        ));
        $res = $query->fetchAll();
        return $res;
    }

    function AfficheWrong($id)
    {
        global $con;
        $query = $con->prepare("SELECT wrong_answer FROM online_exam_table WHERE id_examOnline=:id");
        $query->execute(array(
            'id' => $id,

        ));
        $res = $query->fetchAll();
        return $res;
    }

    function updateExam($titre,$date,$duration,$total,$right,$wrong,$id){
        global $con;
        $query=$con->prepare("UPDATE  online_exam_table set exam_title=:exam_title,exam_datetime=:exam_datetime,exam_duration=:exam_duration,total_question=:total_question,right_answer=:right_answer,wrong_answer=:wrong_answer where id_examOnline=:id");
        $query->execute(array(
          'exam_title'=>$titre,
          'exam_datetime'=>$date,
          'exam_duration'=>$duration,
          'total_question'=>$total,
          'right_answer'=>$right,
          'wrong_answer'=>$wrong,
          'id'=>$id
        ));
    
    }

    function deleteExamen($id)
    {
        global $con;
        $query = $con->prepare("DELETE FROM online_exam_table WHERE id_examOnline=:id");
        $query->execute(array(
            'id' => $id
        ));
        $query->closeCursor();
    }


    
    function AfficheExameIdCode($id)
    {
        global $con;
        $query = $con->prepare("SELECT id_examOnline FROM online_exam_table WHERE exam_code=:id");
        $query->execute(array(
            'id' => $id,

        ));
        $res = $query->fetchAll();
        return $res;
    }

    function AfficheExameDateDuration($id)
    {
        global $con;
        $query = $con->prepare("SELECT * FROM online_exam_table WHERE id_examOnline=:id");
        $query->execute(array(
            'id' => $id,

        ));
        $res = $query->fetchAll();
        return $res;
    }


    
}
?>