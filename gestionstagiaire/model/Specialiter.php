<?php
require('Database.php');
class Specialiter{
  protected $idSpecialiter;
  protected $nomSpecialiter;
  public function __construct(){
    $this->idSpecialiter=0;
    $this->nomSpecialiter="";
  }
  public function getIdSpecialiter(){
    return $this->idSpecialiter;
  }
  public function setIdSpecialiter($idSpecialiter){
    $this->idSpecialiter=$idSpecialiter;
  }
  public function getNomSpecialiter(){
    return $this->nomSpecialiter;
  }
  public function setNomSpecialiter($nomSpecialiter){
    $this->nomSpecialiter=$nomSpecialiter;
  }
  public function create(){
    global $con;
    $query=$con->prepare("INSERT INTO specialiter VALUES(null,:NOMSPECIALITER)");
    $query->execute(array('NOMSPECIALITER'=>$this->nomSpecialiter));
  }
  public function readID($nomSp){
    global $con;
    $query=$con->prepare("SELECT IDSPECIALITER FROM specialiter WHERE NOMSPECIALITER=:NOMSPECIALITER");
    $query->execute(array('NOMSPECIALITER'=>$nomSp));
    $res=$query->fetchAll();
    return $res;
  }
  public function readNom($idsp){
    global $con;
    $query=$con->prepare("SELECT NOMSPECIALITER FROM specialiter WHERE IDSPECIALITER=:IDSPECIALITER");
    $query->execute(array('IDSPECIALITER'=>$idsp));
    $res=$query->fetchAll();
    return $res;
  }
  
}


 ?>
