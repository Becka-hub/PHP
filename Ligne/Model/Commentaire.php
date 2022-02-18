<?php
class Commentaire{
    protected $IDC;
    protected $IDETUDIANT;
    protected $IDP;
    protected $COMMENTAIRE;
    public function __construct()
    {
        $this->IDC=0;
        $this->IDETUDIANT=0;
        $this->IDP=0;
        $this->COMMENTAIRE="";
    }
    function getIDC(){
        return $this->IDC;
    }
    function setIDC($IDC){
        $this->IDC=$IDC;
    }
    function getIDETUDIANT(){
        return $this->IDETUDIANT;
    }
    function setIDETUDIANT($IDETUDIANT){
        $this->IDETUDIANT=$IDETUDIANT;
    }
    function getIDP(){
        return $this->IDP;
    }
    function setIDP($IDP){
        $this->IDP=$IDP;
    }
    function getCOMMENTAIRE(){
        return $this->COMMENTAIRE;
    }
    function setCOMMENTAIRE($COMMENTAIRE){
        $this->COMMENTAIRE=$COMMENTAIRE;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO commenteire VALUES(null,:idetudiant,:idp,:commentaire)");
        $query->execute(array('idetudiant'=>$this->IDETUDIANT,
                              'idp'=>$this->IDP,
                                'commentaire'=>$this->COMMENTAIRE,
                                 ));
    }
    function Affiche($idp){
        global $con;
        $query=$con->prepare("SELECT * FROM commenteire WHERE IDP=:idp");
        $query->execute(array("idp"=>$idp,));
       $res=$query->fetchAll();
       return $res;
      }

}
?>