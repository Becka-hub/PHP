<?php
require('Database.php');
class Entreprise{
  protected $idEntreprise;
  protected $nomEntreprise;
  protected $adresse;
  public function __construct(){
    $this->idEntreprise=0;
    $this->nomEntreprise="";
    $this->adresse="";
  }
  public function getIdEntreprise(){
    return $this->idEntreprise;
  }
  public function setIdEntreprise($idEntreprise){
    $this->idEntreprise=$idEntreprise;
  }
  public function getNomEntreprise(){
    return $this->nomEntreprise;
  }
  public function setNomEntreprise($nomEntreprise){
    $this->nomEntreprise=$nomEntreprise;
  }
  public function getAdresse(){
    return $this->adresse;
  }
  public function setAdresse($adresse){
    $this->adresse=$adresse;
  }
 function create(){
    global $con;
    $query=$con->prepare("INSERT INTO entreprise VALUES(null,:NOMENTREPRISE,:ADRESSE)");
    $query->execute(array('NOMENTREPRISE'=>$this->nomEntreprise,
                         'ADRESSE'=>$this->adresse));
  }
  function readAll(){
    global $con;
    $query=$con->prepare("SELECT * FROM entreprise");
    $query->execute();
    $res=$query->fetchAll();
    return $res;
  }
  function readIdEntreprise($nomEntreprise,$adresse){
    global $con;
    $query=$con->prepare("SELECT IDENTREPRISE FROM entreprise WHERE NOMENTREPRISE=:NOMENTREPRISE AND ADRESSE=:ADRESSE");
    $query->execute(array('NOMENTREPRISE'=>$nomEntreprise,
                          'ADRESSE'=>$adresse));
    $res=$query->fetchAll();
    return $res;
  }
}


 ?>
