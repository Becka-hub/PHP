<?php
require('Database.php');
class Utilisateur{
   protected $idUtilisateur;
   protected $idEntreprise;
   protected $nomUtilisateur;
   protected $mdpUtilisateur;
   public function __construct(){
     $this->idUtilisateur=0;
     $this->idEntreprise=0;
     $this->nomUtilisateur="";
     $this->mdpUtilisateur="";
   }
   public function getIdUtilisateur(){
     return $this->idUtilisateur;
   }
   public function setIdUtilisateur($idUtilisateur){
     $this->idUtilisateur=$idUtilisateur;
   }
   public function getIdEntreprise(){
     return $this->idEntreprise;
   }
   public function setIdEntreprise($idEntreprise){
     $this->idEntreprise=$idEntreprise;
   }
   public function getNomUtilisateur(){
     return $this->nomUtilisateur;
   }
   public function setNomUtilisateur($nomUtilisateur){
     $this->nomUtilisateur=$nomUtilisateur;
   }
   public function getMdpUtilisateur(){
     return $this->mdpUtilisateur;
   }
   public function setMdpUtilisateur($mdpUtilisateur){
     $this->mdpUtilisateur=$mdpUtilisateur;
   }
   public function create(){
     global $con;
     $query=$con->prepare("INSERT INTO utilisateur VALUES(null,:IDENTREPRISE,:NOMUTILISATEUR,:MDPUTILISATEUR)");
     $query->execute(array('IDENTREPRISE'=>$this->idEntreprise,
                           'NOMUTILISATEUR'=>$this->nomUtilisateur,
                          'MDPUTILISATEUR'=>$this->mdpUtilisateur));
   }
   public function readAll(){
     global $con;
     $query=$con->prepare("SELECT * FROM utilisateur natural join entreprise ");
     $query->execute();
     $res=$query->fetchAll();
     return $res;
   }
   public function readLogin($nomUtil){
     global $con;
     $query=$con->prepare("SELECT NOMUTILISATEUR,MDPUTILISATEUR FROM utilisateur WHERE NOMUTILISATEUR=:NOMUTILISATEUR");
     $query->execute(array('NOMUTILISATEUR'=>$nomUtil));
     $res=$query->fetchAll();
     return $res;
   }
   public function redIdE($user,$mdp){
     global $con;
     $query=$con->prepare("SELECT IDENTREPRISE FROM utilisateur WHERE NOMUTILISATEUR=:NOMUTILISATEUR AND MDPUTILISATEUR=:MDPUTILISATEUR");
     $query->execute(array('NOMUTILISATEUR'=>$user,
                            'MDPUTILISATEUR'=>$mdp));
      $res=$query->fetchAll();
      return $res;
   }
}

 ?>
