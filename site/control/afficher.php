<?php
require("../Model/livre.php");
$mod=new Livre();
$r=$mod->read();
foreach ($r as $resultat) { //boucle manao affichage anle anarana sns
    echo "
	 <tbody>
	     <tr>
	         <td>".$resultat['idl']."</td>
	         <td>".$resultat['titre']."</td> 
	         <td>".$resultat['categorie']."</td>
	         <td>".$resultat['langue']."</td>
	         <td>
	         <a href='control/control.php?action=modifier&idM=".$resultat['idl']."'><img src='Images/edit.png'></a><a href='control/control.php?action=suprimer&idL=".$resultat['idl']."'><img src='Images/delete.png'></a>
	         </td>
	         
	     </tr>
	 </tbody>
	";
}

?>