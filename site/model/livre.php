<?php
require ('Database.php');
class Livre{
  private $titre;
  private $categorie;
  private $langue;
  function __construct(){
  	$this->titre;
  	$this->categorie;
  	$this->langue;
  }
  function getTitre(){
  	return $this->titre;
  }
  function setTitre($titre){
  	$this->titre=$titre;
  }
  function getCategorie(){
  	return $this->categorie;
  }
  function setCategorie($categorie){
  	$this->categorie=$categorie;
  }
  function getLangue(){
  	return $this->langue;
  }
  function setLangue($langue){
  	$this->langue=$langue;
  }
  function create(){

		global $con;//miantso anle variable global $con ho ampiasaina.(Averina antsoina izay le variable vo afaka ampiasaina amn ity Classe ity).

		$sql="INSERT INTO liver VALUES(null,:titre,:categorie,:langue)";
		$st=$con->prepare($sql);
		$st->bindValue(':titre',$this->getTitre());
		$st->bindValue(':categorie',$this->getCategorie());
		$st->bindValue(':langue',$this->getLangue());
		$st->execute();
		$st->closeCursor();

	}

	function read(){

		global $con;
		$sql="SELECT*FROM liver";
		$st=$con->prepare($sql);
		$st->execute();
		$res=$st->fetchAll();//maka anle valeur rehetra anaty bdd d aveo stokeny ao anaty le $res ny resultat rehetra.
		return $res;


	}
    function readByid($idM){
      global $con;
      $sql="select * from liver where idl=:idl";
      $st=$con->prepare($sql);
      $st->bindValue(':idl',$idM);
      $st->execute();
      $res=$st->fetchAll();
      return $res;
    }
		function delete($id){
     
     global $con;
     $sql="DELETE FROM liver WHERE idl=:id";
     $st=$con->prepare($sql);
     $st->bindValue(':id',$id);
     $st->execute();
     $st->closeCursor();


	}
  function update($id,$titre,$categorie,$langue){
   global $con;
   $sql="update  liver set titre=:titre,categorie=:categorie,langue=:langue where idl=:idl";
   $st=$con->prepare($sql);
   $st->bindValue(':idl',$id);
   $st->bindValue(':titre',$titre);
   $st->bindValue(':categorie',$categorie);
   $st->bindValue(':langue',$langue);
   $st->execute();
   $st->closeCursor();

  }

}
?>