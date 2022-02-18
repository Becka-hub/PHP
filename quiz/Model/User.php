<?php
require('Database.php');
class User{
    protected $user_id;
    protected $user_mail;
    protected $user_password;
    protected $user_v_code;
    protected $user_name;
    protected $user_gender;
    protected $user_adresse;
    protected $user_mobile;
    protected $user_image;
    protected $user_create;
    function __construct()
    {
        $this->user_id=0;
        $this->user_mail=0;
        $this->user_password="";
        $this->user_v_code="";
        $this->user_name="";
        $this->user_gender="";
        $this->user_adresse="";
        $this->user_mobile="";
        $this->user_image="";
        $this->user_create="";
    }
    function getUser_id(){
        return $this->user_id;
    }
    function setUser_id($user_id){
        $this->user_id=$user_id;
    }
    function getUser_mail(){
        return $this->user_mail;
    }
    function setUser_mail($user_mail){
        $this->user_mail=$user_mail;
    }
    function getUser_password(){
        return $this->user_password;
    }
    function setUser_password($user_password){
        $this->user_password=$user_password;
    }
    function getUser_v_code(){
        return $this->user_v_code;
    }
    function setUser_v_code($user_v_code){
        $this->user_v_code=$user_v_code;
    }
    function getUser_name(){
        return $this->user_name;
    }
    function setUser_name($user_name){
        $this->user_name=$user_name;
    }
    function getUser_gender(){
        return $this->user_gender;
    }
    function setUser_gender($user_gender){
        $this->user_gender=$user_gender;
    }
    function getUser_adresse(){
        return $this->user_adresse;
    }
    function setUser_adresse($user_adresse){
        $this->user_adresse=$user_adresse;
    }
    function getUser_mobile(){
        return $this->user_mobile;
    }
    function setUser_mobile($user_mobile){
        $this->user_mobile=$user_mobile;
    }
    function getUser_image(){
        return $this->user_image;
    }
    function setUser_image($user_image){
        $this->user_image=$user_image;
    }
    function getUser_create(){
        return $this->user_create;
    }
    function setUser_create($user_create){
        $this->user_create=$user_create;
    }
    public function Insert(){
        global $con;
        $query=$con->prepare("INSERT INTO user_table VALUES(null,:user_mail,:user_password,:user_v_code,:user_name,:user_gender,:user_adresse,:user_mobile,:user_image,sysdate())");
        $query->execute(array('user_mail'=>$this->user_mail,
                              'user_password'=>$this->user_password,
                               'user_v_code'=>$this->user_v_code,
                               'user_name'=>$this->user_name,
                               'user_gender'=>$this->user_gender,
                               'user_adresse'=>$this->user_adresse,
                               'user_mobile'=>$this->user_mobile,
                               'user_image'=>$this->user_image,
                                ));
    }



    function AfficheMailUser($mail,$pwd)
    {
        global $con;
        $query = $con->prepare("SELECT * FROM user_table WHERE user_mail=:mail AND user_password=:pwd");
        $query->execute(array(
            'mail' => $mail,
            'pwd'=>$pwd
        ));
        $res = $query->fetchAll();
        return $res;
    }
    function AfficheUser($id)
    {
        global $con;
        $query = $con->prepare("SELECT * FROM user_table WHERE user_id=:id");
        $query->execute(array(
            'id' => $id
        ));
        $res = $query->fetchAll();
        return $res;
    }
    
}
?>