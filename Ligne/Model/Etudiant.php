<?php
require('Database.php');
class Etudiant{
protected $IDETUDIANT;
protected $NOM;
protected $PRENOM;
protected $DIPLOME;
protected $FILIERE;
protected $VAGUE;
protected $PHOTO;
protected $MDP;
function __construct()
{
    $this->IDETUDIANT=0;
    $this->NOM="";
    $this->PRENOM="";
    $this->DIPLOME="";
    $this->FILIERE="";
    $this->VAGUE="";
    $this->PHOTO="";
    $this->MDP="";
}

function getIDETUDIANT(){
    return $this->IDETUDIANT;
}
function setIDETUDIANT($IDETUDIANT){
    $this->IDETUDIANT=$IDETUDIANT;
}
function getNOM(){
    return $this->NOM;
}
function setNOM($NOM){
    $this->NOM=$NOM;
}
function getPRENOM(){
    return $this->PRENOM;
}
function setPRENOM($PRENOM){
    $this->PRENOM=$PRENOM;
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
function getPHOTO(){
    return $this->PHOTO;
}
function setPHOTO($PHOTO){
    $this->PHOTO=$PHOTO;
}
function getMDP(){
    return $this->MDP;
}
function setMDP($MDP){
    $this->MDP=$MDP;
}
function Insert(){
    global $con;
    $query=$con->prepare("INSERT INTO etudiant VALUES(null,:nom,:prenom,:diplome,:filiere,:vague,:photo,:mdp)");
    $query->execute(array('nom'=>$this->NOM,
                            'prenom'=>$this->PRENOM,
                            'diplome'=>$this->DIPLOME,
                             'filiere'=>$this->FILIERE,
                              'vague'=>$this->VAGUE,
                              'photo'=>$this->PHOTO,
                              'mdp'=>$this->MDP,
                             ));
}

function Affiche($prenom,$mdp){
    global $con;
    $query=$con->prepare("SELECT * FROM etudiant WHERE PRENOM=:prenom AND MDP=:mdp");
    $query->execute(array(
        'prenom'=>$prenom,
        'mdp'=>$mdp,
    ));
   $res=$query->fetchAll();
   return $res;
  }

}
?>