<?php
require('Database.php');
class Admin{
protected $id_admin;
protected $mail_admin;
protected $password_admin;
protected $type_admin;
protected $create_admin;
function __construct()
{
    $this->id_admin=0;
    $this->mail_admin="";
    $this->password_admin="";
    $this->type_admin="";
    $this->create_admin="";
}
function getId_admin(){
    return $this->id_admin;
}
function setId_admin($id_admin){
    $this->id_admin=$id_admin;
}
function getMail_admin(){
    return $this->mail_admin;
}
function setMail_admin($mail_admin){
    $this->mail_admin=$mail_admin;
}
function getPassword_admin(){
    return $this->password_admin;
}
function setPassword_admin($password_admin){
    $this->password_admin=$password_admin;
}
function getType_admin(){
    return $this->type_admin;
}
function setType_admin($type_admin){
    $this->type_admin=$type_admin;
}
function getCreate_admin(){
    return $this->create_admin;
}
function setCreate_admin($create_admin){
    $this->create_admin=$create_admin;
}

public function Insert(){
    global $con;
    $query=$con->prepare("INSERT INTO admin_table VALUES(null,:mail_admin,:password_admin,:type_admin,sysdate())");
    $query->execute(array('mail_admin'=>$this->mail_admin,
                          'password_admin'=>$this->password_admin,
                           'type_admin'=>$this->type_admin,
                            ));
}
public function Affiche($mail,$pass){
    global $con;
    $query=$con->prepare("SELECT * FROM admin_table WHERE mail_admin=:mail AND password_admin=:pwd");
    $query->execute(array(
        'mail'=>$mail,
        'pwd'=>$pass
    ));
    $res=$query->fetchAll();
    return $res;
}

}
?>