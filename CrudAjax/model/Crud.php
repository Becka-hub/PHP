<?php
require('Database.php');
class Crud{
    protected $id;
    protected $fname;
    protected $lname;
    protected $email;
    protected $telephone;
    public function __construct(){
        $this->id=0;
        $this->fname="";
        $this->lname="";
        $this->email="";
        $this->telephone="";
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getFname(){
        return $this->fname;
    }
    public function setFname($fname){
        $this->fname=$fname;
    }
    public function getLname(){
        return $this->lname;
    }
    public function setLname($lname){
        $this->lname=$lname;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getTelephone(){
        return $this->telephone;
    }
    public function setTelephone($telephone){
        $this->telephone=$telephone;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO ajax VALUES(null,:fname,:lname,:email,:telephone)");
        $query->execute(array('fname'=>$this->fname,
                              'lname'=>$this->lname,
                               'email'=>$this->email,
                                'telephone'=>$this->telephone));
    }
    public function Affiche(){
        global $con;
        $query=$con->prepare("SELECT * FROM ajax ORDER BY id DESC");
        $query->execute();
        $res=$query->fetchAll();
        return $res;
    }
    function delete($id){
        global $con;
         $query=$con->prepare("DELETE FROM ajax WHERE id=:id");
        $query->execute(array(
         'id'=>$id
        ));
        $query->closeCursor();
 }
 function AfficheId($id){
    global $con;
    $query=$con->prepare("SELECT * FROM ajax where id=:id");
    $query->execute(array(
     'id'=>$id
    ));
   $res=$query->fetchAll();
   return $res;
  }

  function update($id,$fname,$lname,$email,$telephone){
    global $con;
    $query=$con->prepare("UPDATE  ajax set fname=:fname,lname=:lname,email=:email,Telephone=:telephone where id=:id");
    $query->execute(array(
      'fname'=>$fname,
      'lname'=>$lname,
      'email'=>$email,
      'telephone'=>$telephone,
      'id'=>$id
    ));

}
}
?>