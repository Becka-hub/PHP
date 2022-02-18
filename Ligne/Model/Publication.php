<?php
require('Database.php');
class Publication{
    protected $IDP;
    protected $IDETUDIANT;
    protected $PUBLICATION;
    protected $DATEPUBLICATION;
    protected $DIPLOME;
    protected $FILIERE;
    protected $VAGUE;
    protected $PRENOM;
    public function __construct()
    {
        $this->IDP=0;
        $this->IDETUDIANT=0;
        $this->PUBLICATION="";
        $this->DATEPUBLICATION="";
        $this->DIPLOME="";
        $this->FILIERE="";
        $this->VAGUE="";
        $this->PRENOM="";
    }
    function getIDP(){
        return $this->IDP;
    }
    function setIDP($IDP){
        $this->IDP=$IDP;
    }
    function getIDETUDIANT(){
        return $this->IDETUDIANT;
    }
    function setIDETUDIANT($IDETUDIANT){
        $this->IDETUDIANT=$IDETUDIANT;
    }
    function getPUBLICATION(){
        return $this->PUBLICATION;
    }
    function setPUBLICATION($PUBLICATION){
        $this->PUBLICATION=$PUBLICATION;
    }
    function getDATEPUBLICATION(){
        return $this->DATEPUBLICATION;
    }
    function setDATEPUBLICATION($DATEPUBLICATION){
        $this->DATEPUBLICATION=$DATEPUBLICATION;
    }
    function getDIPLOME(){
        return $this->DIPLOME;
    }
    function setDIPLOME($DIPLOME){
        $this->DIPLOME=$DIPLOME;
    }
    function getFILIERE(){
        return $this->FILIERE;
    }
    function setFILIERE($FILIERE){
        $this->FILIERE=$FILIERE;
    }
    function getVAGUE(){
        return $this->VAGUE;
    }
    function setVAGUE($VAGUE){
        $this->VAGUE=$VAGUE;
    }
    function getPRENOM(){
        return $this->PRENOM;
    }
    function setPRENOM($PRENOM){
        $this->PRENOM=$PRENOM;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO publication VALUES(null,:idetudiant,:publication,sysdate(),:diplome,:filiere,:vague,:prenom)");
        $query->execute(array('idetudiant'=>$this->IDETUDIANT,
                              'publication'=>$this->PUBLICATION,
                                 'diplome'=>$this->DIPLOME,
                                 'filiere'=>$this->FILIERE,
                                  'vague'=>$this->VAGUE,
                                  'prenom'=>$this->PRENOM,
                                 ));
    }
 
    function AfficheId($diplome,$filiere,$vague){
        global $con;
        $query=$con->prepare("SELECT * FROM publication where DIPLOME=:diplome,FILIERE=:filiere,VAGUE=:vague");
        $query->execute(array(
         'diplome'=>$diplome,
         'filiere'=>$filiere,
         'vague'=>$vague,
        ));
       $res=$query->fetchAll();
       return $res;
      }
    

}
?>