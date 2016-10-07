<table class="table">
  <caption>Descriptif des éléments hors forfait</caption>
  <tr>
    <th class="date">Date</th>
    <th class="libelle">Libellé</th>  
    <th class="montant">Montant</th>  
    <th class="action">&nbsp;</th>              
  </tr>

  <?php    
  foreach($lesFraisHorsForfait as $unFraisHorsForfait) 
  {
   $libelle = $unFraisHorsForfait['libelle'];
   $date = $unFraisHorsForfait['date'];
   $montant=$unFraisHorsForfait['montant'];
   $id = $unFraisHorsForfait['id'];
   ?>		
   <tr>
    <td> <?php echo $date ?></td>
    <td><?php echo $libelle ?></td>
    <td><?php echo $montant ?></td>
    <td><a style="float: right;" class="btn btn-danger" href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>" 
      onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer ce frais</a></td>
    </tr>
    <?php		 

  }
  ?>	  

</table>

<hr>

<form action="index.php?uc=gererFrais&action=validerCreationFrais" method="post">
  <div class="form-group">

    <fieldset>
      <legend>Nouvel élément hors forfait</legend>
      <div class="form-group">
        <label for="txtDateHF">Date (jj/mm/aaaa)</label>
        <input class="form-control" type="text" id="txtDateHF" name="dateFrais" size="10" maxlength="10" value=""  />
      </div>
      <div class="form-group">
        <label for="txtLibelleHF">Libellé</label>
        <input class="form-control" type="text" id="txtLibelleHF" name="libelle" size="70" maxlength="256" value="" />
      </div>
      <div class="form-group">
        <label for="txtMontantHF">Montant</label>
        <input class="form-control" type="text" id="txtMontantHF" name="montant" size="10" maxlength="10" value="" />
      </div>
    </fieldset>
  </div>

  <button style="float: right" class="btn btn-primary" type="submit">Créer</button>

</form>
</form>


