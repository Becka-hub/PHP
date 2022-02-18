<?php
$login='root';
$mdp='';
$dsn='mysql:host=localhost;dbname=image';
global $con;
try{

	$con=new PDO($dsn,$login,$mdp);


}catch(Exception $e){

	echo $e->getMessage();
}


?>
