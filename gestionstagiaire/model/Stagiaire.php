<?php
require('Database.php');
class Stagiaire{
  protected $idStagiaire;
  protected $idEntreprise;
  protected $idDomaine;
  protected $nomStagiaire;
  protected $adresseStagiaire;
  protected $photo;
  protected $dateDebut;
  protected $dateFin;
  public function __construct(){
    $this->idStagiaire=0;
    $this->idEntreprise=0;
    $this->idDomaine=0;
    $this->nomStagiaire="";
    $this->adresseStagiaire="";
    $this->photo="";
    $this->dateDebut="";
    $this->dateFin="";
  }
  public function getIdStagiaire(){
    return $this->idStagiaire;
  }
  public function setIdStagiaire($idStagiaire){
    $this->idStagiaire=$idStagiaire;
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
  public function getNomStagiaire(){
    return $this->nomStagiaire;
  }
  public function setNomStagiaire($nomStagiaire){
    $this->nomStagiaire=$nomStagiaire;
  }
  public function getAdresseStagiaire(){
    return $this->adresseStagiaire;
  }
  public function setAdresseStagiaire($adresseStagiaire){
    $this->adresseStagiaire=$adresseStagiaire;
  }
  public function getPhoto(){
    return $this->photo;
  }
  public function setPhoto($photo){
    $this->photo=$photo;
  }
  public function getDateDebut(){
    return $this->dateDebut;
  }
  public function setDateDebut($dateDebut){
    $this->dateDebut=$dateDebut;
  }
  public function getDateFin(){
    return $this->dateFin;
  }
  public function setDateFin($dateFin){
    $this->dateFin=$dateFin;
  }
  public function create(){
    global $con;
    $query=$con->prepare("INSERT INTO stagiaire VALUES(null,:IDENTREPRISE,:NOMSTAGIAIRE,:ADRESSESTAGIAIRE,:PHOTO,:DATEDEBUT,:DATEFIN,:IDDOMAINE)");
    $query->execute(array('IDENTREPRISE'=>$this->idEntreprise,
                          'NOMSTAGIAIRE'=>$this->nomStagiaire,
                           'ADRESSESTAGIAIRE'=>$this->adresseStagiaire,
                            'PHOTO'=>$this->photo,
                             'DATEDEBUT'=>$this->dateDebut,
                               'DATEFIN'=>$this->dateFin,
                              'IDDOMAINE'=>$this->idDomaine));
  }
  public function readID($nomSta,$adres){
    global $con;
    $query=$con->prepare("SELECT IDSTAGIAIRE FROM stagiaire WHERE NOMSTAGIAIRE=:NOMSTAGIAIRE AND ADRESSESTAGIAIRE=:ADRESSESTAGIAIRE");
    $query->execute(array('NOMSTAGIAIRE'=>$nomSta,
                           'ADRESSESTAGIAIRE'=>$adres));
    $res=$query->fetchAll();
    return $res;
  }
  public function readAll($entreprise){
    global $con;
    $query=$con->prepare("SELECT * FROM stagiaire WHERE IDENTREPRISE=:IDENTREPRISE");
    $query->execute(array('IDENTREPRISE'=>$entreprise));
    $res=$query->fetchAll();
    return $res;
  }


}


 ?>
