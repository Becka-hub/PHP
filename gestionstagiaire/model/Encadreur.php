<?php
require('Database.php');
class Encadreur{
  protected $idEncadreur;
  protected $nomEncadreur;
  public function __construct(){
    $this->idEncadreur=0;
    $this->nomEncadreur="";
  }
  public function getIdEncadreur(){
    return $this->idEncadreur;
  }
  public function setIdEncadreur($idEncadreur){
    $this->idEncadreur=$idEncadreur;
  }
  public function getNomEncadreur(){
    return $this->nomEncadreur;
  }
  public function setNomEncadreur($nomEncadreur){
    $this->nomEncadreur=$nomEncadreur;
  }

  public function create(){
      global $con;
      $query=$con->prepare("INSERT INTO encadreur VALUES(null,:NOMENCADREUR)");
      $query->execute(array('NOMENCADREUR'=>$this->nomEncadreur));
  }
  public function readIdE($nomE){
    global $con;
    $query=$con->prepare("SELECT IDENCADREUR FROM encadreur WHERE NOMENCADREUR=:nomE");
    $query->execute(array('nomE'=>$nomE));
    $res=$query->fetchAll();
    return $res;
  }
}

 ?>
