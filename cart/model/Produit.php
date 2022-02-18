<?php
require('Database.php');
class Produit{
    protected $id;
    protected $name;
    protected $image;
    protected $price;
    protected $code;
    public function __construct(){
        $this->id=0;
        $this->name="";
        $this->image="";
        $this->price="";
        $this->code="";
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image=$image;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price=$price;
    }
    public function getCode(){
        return $this->code;
    }
    public function setCode($code){
        $this->code=$code;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO chop VALUES(null,:name,:image,:price,:code)");
        $query->execute(array('name'=>$this->name,
                              'image'=>$this->image,
                               'price'=>$this->price,
                               'code'=>$this->code
                                ));
    }
    public function Affiche(){
        global $con;
        $query=$con->prepare("SELECT * FROM chop ORDER BY id DESC");
        $query->execute();
        $res=$query->fetchAll();
        return $res;
    }
    function delete($id){
        global $con;
         $query=$con->prepare("DELETE FROM chop WHERE id=:id");
        $query->execute(array(
         'id'=>$id
        ));
        $query->closeCursor();
 }
 function AfficheId($id){
    global $con;
    $query=$con->prepare("SELECT * FROM chop where id=:id");
    $query->execute(array(
     'id'=>$id
    ));
   $res=$query->fetchAll();
   return $res;
  }

  function update($id,$name,$image,$price,$code){
    global $con;
    $query=$con->prepare("UPDATE  chop set name=:name,image=:image,price=:price,code=:code where id=:id");
    $query->execute(array(
      'name'=>$name,
      'image'=>$image,
      'price'=>$price,
      'code'=>$code,
      'id'=>$id
    ));

}
}
?>