<article>
  <form action="../control/control.php?action=update&idM=<?php echo $_GET['idM'] ?>" method="post">
 <div class="form-group">
Titre : <input type="text" name='titre' value='<?php echo $titre;?>'>
</div>
<div class="form-group">
categorie :
<select id="select" name="categorie">
<option value="info">Info</option>
<option value="mecanique">Mecanique</option>
<option value="mecanique">Santer</option>
</select>
</div>
 <div class="form-group">
Langue : <input type="text" name="langue" value='<?php echo $langue;?>'>
</div>
<button type="submit" class="btn btn-info">Modifier</button>
</form>
</article>
