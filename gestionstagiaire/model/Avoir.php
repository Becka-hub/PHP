<?php
require('Database.php');
class Avoir{
  protected $idStagiaire;
  protected $idSpecialiter;
  public function __construct(){
    $this->idStagiaire=0;
    $this->idSpecialiter=0;
  }
  public function getIdStagiaire(){
    return $this->idStagiaire;
  }
  public function setIdStagiaire($idStagiaire){
    $this->idStagiaire=$idStagiaire;
  }
  public function getIdSpecialiter(){
    return $this->idSpecialiter;
  }
  public function setIdSpecialiter($idSpecialiter){
    $this->idSpecialiter=$idSpecialiter;
  }
  public function create(){
    global $con;
    $query=$con->prepare("INSERT INTO avoir VALUES(:IDSTAGIAIRE,:IDSPECIALITER)");
    $query->execute(array('IDSTAGIAIRE'=>$this->idStagiaire,
                          'IDSPECIALITER'=>$this->idSpecialiter));
  }
}

 ?>
