<?php
require('Database.php');
class UserExamQuestion{
    protected $user_exam_question_id;
    protected $user_id;
    protected $id_examOnline;
    protected $question_id;
    protected $user_answer_option;
    protected $marks;
    public function __construct(){
        $this->user_exam_question_id=0;
        $this->user_id=0;
        $this->id_examOnline=0;
        $this->question_id=0;
        $this->user_answer_option="";
        $this->marks="";
    }
    public function getUser_exam_question_id(){
        return $this->user_exam_question_id;
    }
    public function setUser_exam_question_id($user_exam_question_id){
        $this->user_exam_question_id=$user_exam_question_id;
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
    public function getQuestion_id(){
        return $this->question_id;
    }
    public function setQuestion_id($question_id){
        $this->question_id=$question_id;
    }
    public function getUser_answer_option(){
        return $this->User_answer_option;
    }
    public function setUser_answer_option($user_answer_option){
        $this->user_answer_option=$user_answer_option;
    }
    public function getMarks(){
        return $this->marks;
    }
    public function setMarks($marks){
        $this->marks=$marks;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO user_exam_question VALUES(null,:user_id,:id_examOnline,:question_id,:user_answer_option,:marks)");
        $query->execute(array('user_id'=>$this->user_id,
                              'id_examOnline'=>$this->id_examOnline,
                               'question_id'=>$this->question_id,
                               'user_answer_option'=>$this->user_answer_option,
                               'marks'=>$this->marks,
                                ));
    }


 function AfficheId(){
    global $con;
    $query=$con->prepare("SELECT * FROM user_exam_question");
    $query->execute();
    $res=$query->fetchAll();
    return $res;
  }

    function updateUserExamAnswer($user_answer, $marks, $user_id, $examId, $questionId)
    {
        global $con;
        $query = $con->prepare("UPDATE  user_exam_question set user_answer_option=:user_answer_option,marks=:marks where user_id=:user_id AND id_examOnline=:id_examOnline AND question_id=:question_id");
        $query->execute(array(
            'user_answer_option' => $user_answer,
            'marks' => $marks,
            'user_id' => $user_id,
            'id_examOnline'=>$examId,
            'question_id'=>$questionId
        ));
    }


    function SumMarks($userId,$idExam){
            global $con;
            $query = $con->prepare("SELECT SUM(marks) as total_marks FROM user_exam_question WHERE user_id=:id_user AND id_examOnline=:id_exam");
            $query->execute(array(
            'id_user' => $userId,
            'id_exam' =>$idExam
            ));
            $res = $query->fetchAll();
            return $res;
        
    }

    function TotalResultExam($idExam){
        global $con;
        $query = $con->prepare("SELECT user_table.user_image, user_table.user_name,user_table.user_id, sum(user_exam_question.marks) as total_mark FROM user_exam_question INNER JOIN user_table ON user_table.user_id = user_exam_question.user_id WHERE user_exam_question.id_examOnline =:id_examen GROUP BY user_exam_question.user_id ORDER BY total_mark DESC");
        $query->execute(array(
            'id_examen' => $idExam,
        ));
        $res = $query->fetchAll();
        return $res;
    }

}
?>