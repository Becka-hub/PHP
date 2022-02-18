<?php
require('Database.php');
class Image{
    protected $id;
    protected $image;
    protected $text;
    protected $histoire;
    public function __construct(){
        $this->id=0;
        $this->image="";
        $this->text="";
        $this->histoire="";
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image=$image;
    }
    public function getText(){
        return $this->text;
    }
    public function setText($text){
        $this->text=$text;
    }
    public function getHistoire(){
        return $this->histoire;
    }
    public function setHistoire($histoire){
        $this->histoire=$histoire;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO sary VALUES(null,:image,:text,:histoire)");
        $query->execute(array('image'=>$this->image,
                              'text'=>$this->text,
                               'histoire'=>$this->histoire));
    }
    public function Affiche(){
        global $con;
        $query=$con->prepare("SELECT * FROM sary ORDER BY id DESC");
        $query->execute();
        $res=$query->fetchAll();
        return $res;
    }
}
?>