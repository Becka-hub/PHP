<?php
require('Database.php');
class Image{
    protected $id;
    protected $image;
    protected $text;
    public function __construct(){
        $this->id=0;
        $this->image="";
        $this->text="";
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
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO image VALUES(null,:image,:text)");
        $query->execute(array('image'=>$this->image,
                              'text'=>$this->text));
    }
    public function Affiche(){
        global $con;
        $query=$con->prepare("SELECT * FROM image ORDER BY id DESC");
        $query->execute();
        $res=$query->fetchAll();
        return $res;
    }
}
?>