<?php
require('Database.php');
class Message{
    protected $id;
    protected $nom;
    protected $message;
    public function __construct(){
        $this->id=0;
        $this->nom="";
        $this->message="";
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom=$nom;
    }
    public function getMessage(){
        return $this->message;
    }
    public function setMessage($message){
        $this->message=$message;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO message VALUES(null,:nom,:message)");
        $query->execute(array('nom'=>$this->nom,
                              'message'=>$this->message
                               ));
    }
    public function Affiche(){
        global $con;
        $query=$con->prepare("SELECT * FROM message ORDER BY id DESC");
        $query->execute();
        $res=$query->fetchAll();
        return $res;
    }
}
?>