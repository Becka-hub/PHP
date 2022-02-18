<?php
require('Database.php');
class Document{
    protected $IDDOCUMENT;
    protected $TYPE;
    protected $CATEGORIE;
    protected $TITRE;
    protected $COUVERTURE;
    protected $CONTENU;
    protected $VAGUE;
    protected $FILIERE;
    protected $DIPLOME;
    public function __construct(){
        $this->IDDOCUMENT;
        $this->TYPE="";
        $this->CATEGORIE="";
        $this->TITRE="";
        $this->COUVERTURE="";
        $this->CONTENU="";
        $this->VAGUE="";
        $this->FILIERE="";
        $this->DIPLOME="";
    }
    public function getIDDOCUMENT(){
        return $this->IDDOCUMENT;
    }
    public function setIDDOCUMENT($IDDOCUMENT){
        $this->IDDOCUMENT=$IDDOCUMENT;
    }
    public function getTYPE(){
        return $this->TYPE;
    }
    public function setTYPE($TYPE){
        $this->TYPE=$TYPE;
    }
    public function getCATEGORIE(){
        return $this->CATEGORIE;
    }
    public function setCATEGORIE($CATEGORIE){
        $this->CATEGORIE=$CATEGORIE;
    }
    public function getTITRE(){
        return $this->TITRE;
    }
    public function setTITRE($TITRE){
        $this->TITRE=$TITRE;
    }
    public function getCOUVERTURE(){
        return $this->COUVERTURE;
    }
    public function setCOUVERTURE($COUVERTURE){
        $this->COUVERTURE=$COUVERTURE;
    }
    public function getCONTENU(){
        return $this->CONTENU;
    }
    public function setCONTENU($CONTENU){
        $this->CONTENU=$CONTENU;
    }
     public function getDIPLOME(){
        return $this->DIPLOME;
    }
    public function setDIPLOME($DIPLOME){
        $this->DIPLOME=$DIPLOME;
    }

    public function getVAGUE(){
        return $this->VAGUE;
    }
    public function setVAGUE($VAGUE){
        $this->VAGUE=$VAGUE;
    }

    public function getFILIERE(){
        return $this->FILIERE;
    }
    public function setFILIERE($FILIERE){
        $this->FILIERE=$FILIERE;
    }
    public function Insert(){
        global $con;
 $query=$con->prepare("INSERT INTO document VALUES(null,:type,:categorie,:titre,:couverture,:contenu,:vague,:filiere,:diplome)");
        $query->execute(array('type'=>$this->TYPE,
                              'categorie'=>$this->CATEGORIE,
                               'titre'=>$this->TITRE,
                                'couverture'=>$this->COUVERTURE,
                                 'contenu'=>$this->CONTENU,
                                 'vague'=>$this->VAGUE,
                                  'filiere'=>$this->FILIERE,
                                   'diplome'=>$this->DIPLOME,
                                  ));
    }
    public function AfficheTo($titre,$vague,$diplome,$filiere){
        global $con;
        $query=$con->prepare("SELECT * FROM document WHERE  TITRE=:titre AND VAGUE=:vague  AND FILIERE=:filiere AND DIPLOME=:diplome");
        $query->execute(array('titre'=>$titre,
        	                   'vague'=>$vague,
        	                    'filiere'=>$filiere,
                               'diplome'=>$diplome,));
        $res=$query->fetchAll();
        return $res;
    }

 function AfficheId($id){
    global $con;
    $query=$con->prepare("SELECT * FROM ducoment where IDDOCUMENT=:id");
    $query->execute(array(
     'id'=>$id
    ));
   $res=$query->fetchAll();
   return $res;
  }


 function Affiche($diplome,$filiere,$vague,$categorie,$type){
    global $con;
    $query=$con->prepare("SELECT * FROM document WHERE TYPE=:type AND CATEGORIE=:categorie AND VAGUE=:vague AND FILIERE=:filiere AND DIPLOME=:diplome");
    $query->execute(array('type'=>$type,
                          'categorie'=>$categorie,
                           'vague'=>$vague,
                            'filiere'=>$filiere,
                             'diplome'=>$diplome,));
   $res=$query->fetchAll();
   return $res;
  }

}
?>