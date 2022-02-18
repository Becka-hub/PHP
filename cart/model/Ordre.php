<?php
require('model/Database.php');
class Ordre{
    protected $id;
    protected $name;
    protected $email;
    protected $phone;
    protected $adresse;
    protected $pmode;
    protected $produit;
    protected $montant;
    public function __construct(){
        $this->id=0;
        $this->name="";
        $this->email="";
        $this->phone="";
        $this->adresse="";
        $this->pmode="";
        $this->produit="";
        $this->montant="";
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
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        $this->phone=$phone;
    }
    public function getAdresse(){
        return $this->adresse;
    }
    public function setAdresse($adresse){
        $this->adresse=$adresse;
    }
    public function getPmode(){
        return $this->pmode;
    }
    public function setPmode($pmode){
        $this->pmode=$pmode;
    }
    public function getProduit(){
        return $this->produit;
    }
    public function setProduit($produit){
        $this->produit=$produit;
    }
    public function getMontant(){
        return $this->montant;
    }
    public function setMontant($montant){
         $this->montant=$montant;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO orders VALUES(null,:name,:email,:phone,:adresse,:pmode,:produit,:montant)");
        $query->execute(array(
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'adresse'=>$this->adresse,
            'pmode'=>$this->pmode,
            'produit'=>$this->produit,
            'montant'=>$this->montant
        ));
    }
    public function Affiche(){
        global $con;
        $query=$con->prepare("SELECT * FROM orders ORDER BY id DESC ");
        $query->execute();
        $res=$query->fetchAll();
        return $res;
    }
    public function Delete($id){
        global $con;
        $query=$con->prepare("DELETE FROM orders WHERE id=:id");
        $query->execute(array(
            'id'=>$id
        ));
    }
    public function AfficheId($id){
        global $con;
        $query=$con->prepare("SELECT FROM orders WHERE id=:id");
        $query->execute(array(
            'id'=>$id
        ));
        $res=$query->fetchAll();
        return $res;
    }
    public function Modifier($name,$email,$phone,$adresse,$pmode,$produit,$montant,$id){
     global $con;
     $query=$con->prepare("UPDATE orders set name=:name,email=:email,phone=:phone,adresse=:adresse,pmode=:pmode,produit=:produit,montant=:montant WHERE id=:id");
     $query->execute(array(
         'name'=>$name,
         'email'=>$email,
         'phone'=>$phone,
         'adresse'=>$adresse,
         'pmode'=>$pmode,
         'produit'=>$produit,
         'montant'=>$montant,
         'id'=>$id
     ));
    }
}
?>