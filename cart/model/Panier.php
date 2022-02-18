<?php
require('model/Database.php');
class Panier{
    protected $id;
    protected $name;
    protected $price;
    protected $image;
    protected $qty;
    protected $total;
    protected $code;
    public function __construct(){
        $this->id=0;
        $this->name="";
        $this->price="";
        $this->image="";
        $this->qty=0;
        $this->total="";
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
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price=$price;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image=$image;
    }
    public function getQty(){
        return $this->qty;
    }
    public function setQty($qty){
        $this->qty=$qty;
    }
    public function getTotal(){
        return $this->total;
    }
    public function setTotal($total){
        $this->total=$total;
    }
    public function getCode(){
        return $this->code;
    }
    public function setCode($code){
        $this->code=$code;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO panier VALUES(null,:name,:price,:image,:qty,:total,:code)");
        $query->execute(array(
            'name'=>$this->name,
            'price'=>$this->price,
            'image'=>$this->image,
            'qty'=>$this->qty,
            'total'=>$this->total,
            'code'=>$this->code
        ));
    }
    public function Affiche(){
        global $con;
        $query=$con->prepare("SELECT * FROM panier");
        $query->execute();
        $res=$query->fetchAll();
        return $res;
    }
    public function AfficheCount(){
        global $con;
        $query=$con->prepare("SELECT count(id) as total FROM panier");
        $query->execute();
        $res=$query->fetchAll();
        return $res;
    }   
    public function AfficheCode($code){
        global $con;
        $query=$con->prepare("SELECT code FROM panier WHERE code=:code");
        $query->execute(array(
            'code'=>$code
        ));
        $res=$query->fetchAll();
        return $res;
    }
    public function AfficheValide(){
        global $con;
        $query=$con->prepare("SELECT  CONCAT(name,'(',qty,')') as ItemQty,total FROM panier");
        $query->execute();
        $res=$query->fetchAll();
        return $res;
    }
    public function Delete($id){
        global $con;
        $query=$con->prepare("DELETE FROM panier WHERE id=:id");
        $query->execute(array(
            'id'=>$id
        ));
    }
    
    public function DeleteTous(){
        global $con;
        $query=$con->prepare("DELETE FROM panier");
        $query->execute();
    }

    public function Modifier($qty,$total,$id){
     global $con;
     $query=$con->prepare("UPDATE panier set qty=:qty,total=:total  WHERE id=:id");
     $query->execute(array(
         'qty'=>$qty,
         'total'=>$total,
         'id'=>$id
     ));
    }
}
?>