<div id="contenu">
      <div class="corpsForm">
          <fieldset>
            <legend>Eléments forfaitisés</legend>
			<?php
				foreach ($lesFraisForfait as $unFrais)
				{
					$idFrais = $unFrais['idfrais'];	
					$libelle = $unFrais['libelle'];
					$quantite = $unFrais['quantite'];
			?>
					<p>
						<label for="idFrais"><?php echo $libelle ?></label>
						<input readonly class="inputNotEditable" type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite?>" >
					</p>
			
			<?php } ?>
           
          </fieldset>
      </div>

      <div class="piedForm">
	      <p>
	        <a href="<?php echo "index.php?uc=gererFrais&action=modifierFiche&idVisiteurToUpdate=". $_REQUEST['requestedIdVisiteur'] ."&moisToUpdate=". $_REQUEST['requestedMonth'];?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
	      </p> 
      </div>


	<?php if(empty($lesFraisHorsForfait)) {
  	  		echo "<div class='row' >Aucun frais hort forfait enregistré pour cette fiche</div>";
  	  		exit;
  	  	} else {
  	  		include("vues/v_listeFraisHorsForfaitComptable.php");
    	}?>
</div>