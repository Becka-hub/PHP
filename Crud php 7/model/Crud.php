<?php

namespace App\model;

require_once('./db/Db.php');

use App\db\Db;

class Crud
{
    protected int $id;
    protected string $fname;
    protected string $lname;
    protected string $email;
    protected string $telephone;
    public function __construct()
    {
        $this->id = 0;
        $this->fname = "";
        $this->lname = "";
        $this->email = "";
        $this->telephone = "";
    }
    public function getId():int
    {
        return $this->id;
    }
    public function setId(int $id):self
    {
        if($id > 0){
            $this->id = $id;
        }
        return $this;
    }
    public function getFname():string
    {
        return $this->fname;
    }
    public function setFname(string $fname):self
    {
        if($fname!=""){
            $this->fname = $fname;
        }
        return $this;
    }
    public function getLname():string
    {
        return $this->lname;
    }
    public function setLname(string $lname):self
    {
        if($lname!=""){
            $this->lname = $lname;
        }
        return $this;
    }
    public function getEmail():string
    {
        return $this->email;
    }
    public function setEmail(string $email):self
    {
        if($email!=""){
            $this->email = $email;
        }
        return $this;
    }
    public function getTelephone():string
    {
        return $this->telephone;
    }
    public function setTelephone(string $telephone):self
    {
        if($telephone!=""){
            $this->telephone = $telephone;
        }
        return $this;
    }
    public function Insert()
    {
        $db = Db::getInstance();
        $query = $db->prepare("INSERT INTO ajax VALUES(null,:fname,:lname,:email,:telephone)");
        $query->execute(array(
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'telephone' => $this->telephone
        ));
    }
    public function Affiche()
    {
        $db = Db::getInstance();
        $query = $db->prepare("SELECT * FROM ajax ORDER BY id DESC");
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }
    public function delete($id)
    {
        $db = Db::getInstance();
        $query = $db->prepare("DELETE FROM ajax WHERE id=:id");
        $query->execute(array(
            'id' => $id
        ));
        $query->closeCursor();
    }
    public function AfficheId($id)
    {
        $db = Db::getInstance();
        $query = $db->prepare("SELECT * FROM ajax where id=:id");
        $query->execute(array(
            'id' => $id
        ));
        $res = $query->fetchAll();
        return $res;
    }

    public function update($id, $fname, $lname, $email, $telephone)
    {
        $db = Db::getInstance();
        $query = $db->prepare("UPDATE  ajax set fname=:fname,lname=:lname,email=:email,Telephone=:telephone where id=:id");
        $query->execute(array(
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'telephone' => $telephone,
            'id' => $id
        ));
    }
}
