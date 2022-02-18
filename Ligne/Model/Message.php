<?php
require('Database.php');
class Message{
    protected $IDMESSAGE;
    protected $MESSAGE;
    protected $REPONSE;
    protected $IDPERSONNE;
    protected $DIPLOME;
    protected $FILIERE;
    protected $VAGUE;
    
    public function __construct(){
        $this->IDMESSAGE=0;
        $this->MESSAGE="";
        $this->REPONSE="";
        $this->IDPERSONNE=0;
        $this->DIPLOME="";
        $this->FILIERE="";
        $this->VAGUE="";
    }
    public function getIDMESSAGE(){
        return $this->IDMESSAGE;
    }
    public function setIDMESSAGE($IDMESSAGE){
        $this->IDMESSAGE=$IDMESSAGE;
    }
    public function getMESSAGE(){
        return $this->MESSAGE;
    }
    public function setMESSAGE($MESSAGE){
        $this->MESSAGE=$MESSAGE;
    }
    public function getREPONSE(){
        return $this->REPONSE;
    }
    public function setREPONSE($REPONSE){
        $this->REPONSE=$REPONSE;
    }
    public function getIDPERSONNE(){
        return $this->IDPERSONNE;
    }
    public function setIDPERSONNE($IDPERSONNE){
        $this->IDPERSONNE=$IDPERSONNE;
    }
    public function getDIPLOME(){
        return $this->DIPLOME;
    }
    public function setDIPLOME($DIPLOME){
        $this->DIPLOME=$DIPLOME;
    }
    public function getFILIERE(){
        return $this->FILIERE;
    }
    public function setFILIERE($FILIERE){
        $this->FILIERE=$FILIERE;
    }
    public function getVAGUE(){
        return $this->VAGUE;
    }
    public function setVAGUE($VAGUE){
        $this->VAGUE=$VAGUE;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO message VALUES(null,:message,:reponse,:idpersonne,:diplome,:filiere,:vague)");
        $query->execute(array('message'=>$this->MESSAGE,
                              'reponse'=>$this->REPONSE,
                                'idpersonne'=>$this->IDPERSONNE,
                                 'diplome'=>$this->DIPLOME,
                                 'filiere'=>$this->FILIERE,
                                  'vague'=>$this->VAGUE,
                                 ));
    }



 function Affiche(){
    global $con;
    $query=$con->prepare("SELECT * FROM message");
    $query->execute();
   $res=$query->fetchAll();
   return $res;
  }


 function AfficheId($id){
    global $con;
    $query=$con->prepare("SELECT * FROM message where IDPERSONNE=:id");
    $query->execute(array(
     'id'=>$id
    ));
   $res=$query->fetchAll();
   return $res;
  }


  function AfficheIdOne($id){
    global $con;
    $query=$con->prepare("SELECT * FROM message where IDMESSAGE=:id");
    $query->execute(array(
     'id'=>$id
    ));
   $res=$query->fetchAll();
   return $res;
  }


    function update($reponse,$idM){
    global $con;
    $query=$con->prepare("UPDATE  message set REPONSE=:reponse  where IDMESSAGE=:idM");
    $query->execute(array(
      'reponse'=>$reponse,
      'idM'=>$idM,
    ));

}


}
?>