<?php
require('Database.php');
class Question{
    protected $question_id;
    protected $id_examOnline;
    protected $question_titre;
    protected $answer_option;
    public function __construct(){
        $this->question_id=0;
        $this->id_examOnline=0;
        $this->question_titre="";
        $this->answer_option="";
    }
    public function getQuestion_id(){
        return $this->question_id;
    }
    public function setQuestion_id($question_id){
        $this->question_id=$question_id;
    }
    public function getId_examOnline(){
        return $this->id_examOnline;
    }
    public function setId_examOnline($id_examOnline){
        $this->id_examOnline=$id_examOnline;
    }
    public function getQuestion_titre(){
        return $this->question_titre;
    }
    public function setQuestion_titre($question_titre){
        $this->question_titre=$question_titre;
    }
    public function getAnswer_option(){
        return $this->answer_option;
    }
    public function setAnswer_option($answer_option){
        $this->answer_option=$answer_option;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO question VALUES(null,:id_examOnline,:question_titre,:answer_option)");
        $query->execute(array('id_examOnline'=>$this->id_examOnline,
                              'question_titre'=>$this->question_titre,
                               'answer_option'=>$this->answer_option,
                                ));
    }


 function AfficheQuestion($id){
    global $con;
    $query=$con->prepare("SELECT * FROM question WHERE id_examOnline=:id ORDER BY question_id ASC LIMIT 1");
    $query->execute(array(
        'id'=>$id
    ));
   $res=$query->fetchAll();
   return $res;
  }

    function AfficheQuestionEgaliter($id,$id_exam)
    {
        global $con;
        $query = $con->prepare("SELECT question_id FROM question WHERE question_id < :id AND id_examOnline=:id_exam ORDER BY question_id DESC LIMIT 1");
        $query->execute(array(
            'id'=>$id,
            'id_exam'=>$id_exam
        ));
        $res = $query->fetchAll();
        return $res;
    }

    function AfficheQuestionEgaliter2($id,$id_exam)
    {
        global $con;
        $query = $con->prepare("SELECT question_id FROM question WHERE question_id > :id AND id_examOnline=:id_exam ORDER BY question_id ASC LIMIT 1");
        $query->execute(array(
            'id'=> $id,
            'id_exam'=>$id_exam
        ));
        $res = $query->fetchAll();
        return $res;
    }



    function AfficheIdQuestion($id)
    {
        global $con;
        $query = $con->prepare("SELECT question_id FROM question WHERE id_examOnline=:id");
        $query->execute(array(
            'id'=>$id
        ));
        $res = $query->fetchAll();
        return $res;
    }


    function AfficheIdQuestionASC($id)
    {
        global $con;
        $query = $con->prepare("SELECT question_id FROM question WHERE id_examOnline=:id ORDER BY question_id ASC");
        $query->execute(array(
            'id' => $id
        ));
        $res = $query->fetchAll();
        return $res;
    }

    function AfficheAutre($id)
    {
        global $con;
        $query = $con->prepare("SELECT * FROM question WHERE question_id=:id");
        $query->execute(array(
            'id' => $id
        ));
        $res = $query->fetchAll();
        return $res;
    }

    function AfficheOriginaleAnswer($id)
    {
        global $con;
        $query = $con->prepare("SELECT answer_option FROM question WHERE question_id=:id");
        $query->execute(array(
            'id' => $id
        ));
        $res = $query->fetchAll();
        return $res;
    }

    function AfficheCountQuestion($idexam)
    {
        global $con;
        $query = $con->prepare("SELECT count(question_id) as total FROM question WHERE id_examOnline=:id");
        $query->execute(array(
            'id' => $idexam
        ));
        $res = $query->fetchAll();
        return $res;
    }

    function Affiche($id)
    {
        global $con;
        $query = $con->prepare("SELECT * FROM question WHERE id_examOnline=:id");
        $query->execute(array(
            'id'=>$id
        ));
        $res = $query->fetchAll();
        return $res;
    }

    function AfficheResultat($id,$userId)
    {
        global $con;
        $query = $con->prepare("SELECT * FROM question INNER JOIN user_exam_question ON user_exam_question.question_id=question.question_id WHERE question.id_examOnline=:id AND user_exam_question.user_id=:userId");
        $query->execute(array(
            'id' => $id,
            'userId'=>$userId
        ));
        $res = $query->fetchAll();
        return $res;
    }


    function deleteQuestion($id)
    {
        global $con;
        $query = $con->prepare("DELETE FROM question WHERE question_id=:id");
        $query->execute(array(
            'id' => $id
        ));
        $query->closeCursor();
    }


}
?>