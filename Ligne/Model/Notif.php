<?php
require('Database.php');
class Notif{
	protected $ID;
	protected $NOTIF;
  protected $TYPE;
  protected $CATEGORIE;
  protected $VAGUE;
  protected $DIPLOME;
  protected $FILIERE;
    public function __construct(){
        $this->ID=0;
        $this->IDDOCUMENT="";
        $this->NOTIF="";
        $this->TYPE="";
        $this->VAGUE="";
        $this->DIPLOME="";
        $this->FILIERE="";
    }

    function getID(){
    	return $this->ID;
    }
    function setID($ID){
    	$this->ID=$ID;
    }
    function getNOTIF(){
    	return $this->NOTIF;
    }
    function setNOTIF($NOTIF){
    	$this->NOTIF=$NOTIF;
    }
    function getTYPE(){
    	return $this->TYPE;
    }
    function setTYPE($TYPE){
    	$this->TYPE=$TYPE;
    }

    function getCATEGORIE(){
    	return $this->CATEGORIE;
    }
    function setCATEGORIE($CATEGORIE){
    	$this->CATEGORIE=$CATEGORIE;
    }
    function getVAGUE(){
    	return $this->VAGUE;
    }
    function setVAGUE($VAGUE){
    	$this->VAGUE=$VAGUE;
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
     function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO tif VALUES(null,:notif,:type,:categorie,:vague,:diplome,:filiere)");
        $query->execute(array('notif'=>$this->NOTIF,
                                'type'=>$this->TYPE,
                                'categorie'=>$this->CATEGORIE,
                                 'vague'=>$this->VAGUE,
                                  'diplome'=>$this->DIPLOME,
                                  'filiere'=>$this->FILIERE,
                                 ));
    }

   function Affiche(){
    global $con;
    $query=$con->prepare("SELECT * FROM tif");
    $query->execute();
   $res=$query->fetchAll();
   return $res;
  }


}
?>