<?php
require('Database.php');
class Domaine{
  //prorieter
  protected $idDomaine;
  protected $nomDomaine;
  //constructeur
  public function __construct(){
    $this->idDomaine=0;
    $this->nomDomaine="";
  }
  //get set
  public function getIdDomaine(){
    return $this->idDomaine;
  }
  public function setIdDomaine($idDomaine){
    $this->idDomaine=$idDomaine;
  }
  public function getNomDomaine(){
    return $this->nomDomaine;
  }
  public function setNomDomaine($nomDomaine){
    $this->nomDomaine=$nomDomaine;
  }
  //CRUD
  public function create(){
    global $con;
    $query=$con->prepare("INSERT INTO domaine VALUES(null,:NOMDOMAINE)");
    $query->execute(array('NOMDOMAINE'=>$this->nomDomaine));
  }
  public function readId($nomD){
    global $con;
    $query=$con->prepare("SELECT IDDOMAINE FROM domaine where NOMDOMAINE=:NOMDOMAINE");
    $query->execute(array('NOMDOMAINE'=>$nomD));
    $res=$query->fetchAll();
    return $res;
  }
  public function readDomaine(){
    global $con;
    $query=$con->prepare("SELECT * FROM domaine");
    $query->execute();
    $res=$query->fetchAll();
    return $res;
  }
  public function readNomd($idDo){
    global $con;
    $query=$con->prepare("SELECT NOMDOMAINE FROM domaine WHERE IDDOMAINE=:IDDOMAINE");
    $query->execute(array('IDDOMAINE'=>$idDo));
    $res=$query->fetchAll();
    return $res;
   }
  
}
 ?>
