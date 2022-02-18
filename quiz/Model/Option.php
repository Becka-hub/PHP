<?php
require('Database.php');
class Option{
    protected $option_id;
    protected $question_id;
    protected $option_number;
    protected $option_title;
    public function __construct(){
        $this->option_id=0;
        $this->question_id=0;
        $this->option_number=0;
        $this->option_title="";
    }
    public function getOption_id(){
        return $this->option_id;
    }
    public function setOption_id($option_id){
        $this->option_id=$option_id;
    }
    public function getQuestion_id(){
        return $this->question_id;
    }
    public function setQuestion_id($question_id){
        $this->question_id=$question_id;
    }
    public function getOption_number(){
        return $this->option_number;
    }
    public function setOption_number($option_number){
        $this->option_number=$option_number;
    }
    public function getOption_title(){
        return $this->option_title;
    }
    public function setOption_title($option_title){
        $this->option_title=$option_title;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO options VALUES(null,:question_id,:option_number,:option_title)");
        $query->execute(array('question_id'=>$this->question_id,
                              'option_number'=>$this->option_number,
                               'option_title'=>$this->option_title,
                                ));
    }
    public function Insert5()
    {
        global $con;
        $query = $con->prepare("INSERT INTO options VALUES(null,:question_id,:option_number,:option_title)");
        $query->execute(array(
            'question_id' => $this->question_id,
            'option_number' => $this->option_number,
            'option_title' => $this->option_title,
        ));
    }
    public function Insert1()
    {
        global $con;
        $query = $con->prepare("INSERT INTO options VALUES(null,:question_id,:option_number,:option_title)");
        $query->execute(array(
            'question_id' => $this->question_id,
            'option_number' => $this->option_number,
            'option_title' => $this->option_title,
        ));
    }
    public function Insert2()
    {
        global $con;
        $query = $con->prepare("INSERT INTO options VALUES(null,:question_id,:option_number,:option_title)");
        $query->execute(array(
            'question_id' => $this->question_id,
            'option_number' => $this->option_number,
            'option_title' => $this->option_title,
        ));
    }
    public function Insert3()
    {
        global $con;
        $query = $con->prepare("INSERT INTO options VALUES(null,:question_id,:option_number,:option_title)");
        $query->execute(array(
            'question_id' => $this->question_id,
            'option_number' => $this->option_number,
            'option_title' => $this->option_title,
        ));
    }
    public function Insert4()
    {
        global $con;
        $query = $con->prepare("INSERT INTO options VALUES(null,:question_id,:option_number,:option_title)");
        $query->execute(array(
            'question_id' => $this->question_id,
            'option_number' => $this->option_number,
            'option_title' => $this->option_title,
        ));
    }


 function AfficheId(){
    global $con;
    $query=$con->prepare("SELECT * FROM options");
    $query->execute();
   $res=$query->fetchAll();
   return $res;
  }


    function AfficheOption($id)
    {
        global $con;
        $query = $con->prepare("SELECT * FROM options WHERE question_id=:id");
        $query->execute(array(
            'id'=>$id
        ));
        $res = $query->fetchAll();
        return $res;
    }

    function deleteOption($id)
    {
        global $con;
        $query = $con->prepare("DELETE FROM options WHERE question_id=:id");
        $query->execute(array(
            'id' => $id
        ));
        $query->closeCursor();
    }

    function AfficheResultOption($id)
    {
        global $con;
        $query = $con->prepare("SELECT * FROM options WHERE question_id=:id");
        $query->execute(array(
            'id' => $id
        ));
        $res = $query->fetchAll();
        return $res;
    }


}
?>