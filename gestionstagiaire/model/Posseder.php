<?php
require('Database.php');
class Posseder{
  protected $idEncadreur;
  protected $idEntreprise;
  protected $idDomaine;
  public function __construct(){
    $this->idEncadreur=0;
    $this->idEntreprise=0;
    $this->idDomaine=0;
  }
  public function getIdEncadreur(){
    return $this->idEncadreur;
  }
  public function setIdEncadreur($idEncadreur){
    $this->idEncadreur=$idEncadreur;
  }
  public function getIdEntreprise(){
    return $this->idEntreprise;
  }
  public function setIdEntreprise($idEntreprise){
    $this->idEntreprise=$idEntreprise;
  }
  public function getIdDomaine(){
    return $this->idDomaine;
  }
  public function setIdDomaine($idDomaine){
    $this->idDomaine=$idDomaine;
  }
  public function create(){
    global $con;
    $query=$con->prepare("INSERT INTO posseder VALUES(:IDENCADREUR,:IDDOMAINE,:IDENTREPRISE)");
    $query->execute(array('IDENCADREUR'=>$this->idEncadreur,
                          'IDDOMAINE'=>$this->idDomaine,
                          'IDENTREPRISE'=>$this->idEntreprise));

  }
  public function readAll(){
    global $con;
    $query=$con->prepare("SELECT * FROM encadreur natural join entreprise natural join domaine");
    $query->execute;
    $res=$query->featchAll();
    return $res;
  }
}

 ?>
