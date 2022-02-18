<?php
require('model/Domaine.php');
require('model/Stagiaire.php');

?>
<section >
<div class="container-fluid">

<div class="row">
  <div class="col s12">
    <ul class="tabs z-depth-1 hoverable">
      <li class="tab col s3"><a href="#Liste">Home</a></li>
      <li class="tab col s3"><a class="active" href="#Stagiaire">Ajouter Stagiaire</a></li>
      <li class="tab col s3"><a href="#Domaine">Domaine</a></li>
      <li class="tab col s3"><a href="#Deconnection">Liste</a></li>
    </ul>
 </div>

 <div id="Liste" class="col s12 hidencontent">

</div>



      <div id="Stagiaire" class="col s12 hidencontent">
    <div class="row content">
         <div class="col m8 s12 offset-m2">
            <div class="card z-depth-4" style="border-top-left-radius: 50px;border-top-right-radius:50px">
              <Div class="blue" style="border-top-left-radius: 50px;border-top-right-radius:50px">
                 <div class="center-align">
                   <span class="card-title">Ajouter Stagiaire</span>
                 </div>
              </Div>



        <div class="card-content">
            <form action="controls/Afficher.php?action=AjouteSta&idE=<?php echo $_GET['idEntreprise']?>"  method="post" enctype="multipart/form-data">
               <div class="row">
               <div class="col s12 m4">
               <div class="input-field">
                <div class="material-icons prefix">person</div>
                <input type="text" id="nom" name="nom" required>
                <label for="nom">Nom</label>
               </div>
               </div>
               <div class="col s12 m4">
               <div class="input-field">
                <div class="material-icons prefix">add_location</div>
                <input type="text" id="adresse" name="adresse" required>
                <label for="adresse">Adresse</label>
               </div>
               </div>
               <div class="col s12 m4">
               <div class="input-field">
                <div class="material-icons prefix">book</div>
                <input type="text" id="specialiter" name="specialiter" required>
                <label for="specialiater">Specialiter</label>
                </div>
               </div>
               
               </div>
               <div class="row">
               <div class="col s12 m4">
              
               <div class="input-field">
                    <div class="material-icons prefix">card_membership</div>
                    <select name="domaine">
                    <?php
                    $domaine=new Domaine();
                   $res=$domaine->readDomaine();
                   foreach($res as $resultat){
                    $idDom=$resultat['IDDOMAINE'];
                    $nomDom=$resultat['NOMDOMAINE'];
                    echo "<option value=".$idDom.">".$nomDom."</option>";
                   }
               ?>
                    
                    </select>
                    <label>DOMAINE</label>
                </div>
                </div>
                <div class="col s12 m4">
               <div class="input-field">
                <div class="material-icons prefix">av_timer</div>
                <input type="text" id="debut" name="debut" required>
                <label for="debut">Date debut</label>
                </div>
               </div>
               <div class="col s12 m4">
               <div class="input-field">
                    <div class="material-icons prefix">alarm</div>
                    <input type="text" id="fin" name="fin" required>
                    <label for="fin">Date fin</label>
                </div>
                </div>
                </div>
                <div class="row">
                 <div class="col s12 m6">
                 <div class="file-field input-field">
                         <div class="btn">
                           <i class="material-icons">add_a_photo</i>
                              <input type="file" name="uploadFile" multiple>
                                   </div>
                             <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" placeholder="Recherche d'image">
                     </div>
                     </div>
                 </div>
                  <div class="col s12 m6">
                  <div class="row">
                <label>
                    &nbsp;<button type="submit"  class="waves-effect waves-light btn blue" id="ajouteS" style="width: 100%;color: bisque;">Ajouter</button>
                </label>
            </div>
                  </div>
                </div>
        </form>
      
         </div>
           </div>
        </div>
      </div>


       </div>
      


    <div id="Domaine" class="col s12 hidencontent">
      <div class="row">
         <div class="col m4 s12 offset-m4">
            <div class="card z-depth-4" style="border-top-left-radius: 50px;border-top-right-radius:50px">
              <Div class="blue" style="border-top-left-radius: 50px;border-top-right-radius:50px">
                 <div class="center-align">
                   <span class="card-title">Domaine</span>
                 </div>
              </Div>
        <div class="card-content">
            <form action="controls/indexControleur.php?action=domaine&idE=<?php echo $_GET['idEntreprise']?>" id="sform" method="post">
               <div class="input-field">
                  <div class="material-icons prefix">home</div>
                  <input type="text" id="uid" name="domaine" required>
                  <label for="uid">Domaine</label>
               </div>
               <div class="input-field">
                    <div class="material-icons prefix">person</div>
                    <input type="text" id="email" name="encadreur" required>
                    <label for="email">Encadreur</label>
                </div>
        
            <div>
                <label>
                    &nbsp;<button type="submit"  class="waves-effect waves-light btn blue" id="ajouteD" style="width: 100%;color: bisque;">Ajouter</button>
                </label>
            </div>
        </form>
      
         </div>
           </div>
        </div>
      </div>
      </div>


      <div class="col s12">
      <div id="Deconnection" class="col s12 hidencontent">
      
      <table>
        <thead>
          <tr>
              <th>Photo</th>
              <th>nomStagiaire</th>
              <th>Adresse</th>
              <th>Specialiter</th>
              <th>Domaine</th>
              <th>Encadreur</th>
              <th>Delay</th>
              <th>Option</th>
          </tr>
        </thead>

        <tbody>
          <tr>
         <?php
         $stagiaire=new Stagiaire();
         $res=$stagiaire->readAll($_GET['idEntreprise']);
         //echo $_GET['idEntreprise'];
         foreach($res as $resultat){
           $idS=$resultat['IDSTAGIAIRE'];
           
           $nomstagiaire=$resultat['NOMSTAGIAIRE'];
           $adresse=$resultat['ADRESSESTAGIAIRE'];
           $dated=$resultat['DATEDEBUT'];
           $datef=$resultat['DATEFIN'];
        echo "<td><img src='controls/uploadFile/".$resultat['PHOTO']."' style='width:80px;height:80px;'> </td>";
         echo"<td>".$nomstagiaire."</td>";
         echo"<td>".$adresse."</td>";
         echo"<td>".$dated."</td>";
         echo"<td>".$datef."</td>";
         
          }
        
         ?>
          </tr>
        </tbody>
      </table>
  </div> 
</div>
   
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="materialize/js/materialize.min.js"></script>

<script>


document.addEventListener("DOMContentLoaded",function(){
const myTabs=document.querySelector('.tabs');
M.Tabs.init(myTabs,{
  swipeable:true,
  duration:300
});
});


$(document).ready(function(){
    $('select').formSelect();
  });

</script>

</section>
