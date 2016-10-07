<div class="form-group">
	<fieldset>
		<legend>Eléments forfaitisés</legend>
		<?php
		foreach ($lesFraisForfait as $unFrais)
		{
			$idFrais = $unFrais['idfrais'];	
			$libelle = $unFrais['libelle'];
			$quantite = $unFrais['quantite'];
			?>
			<div class="form-group">
					<label for="idFrais"><?php echo $libelle ?></label>
					<input class="form-control" type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite?>" >
			</div>
			
			<?php } ?>

		</fieldset>
			<a style="float: right;" href="<?php echo "index.php?uc=gererFrais&action=modifierFiche&idVisiteurToUpdate=". $_REQUEST['requestedIdVisiteur'] ."&moisToUpdate=". $_REQUEST['requestedMonth'];?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editer</button></a>
	</div>



	<?php if(empty($lesFraisHorsForfait)) {
		echo "<div class='row'>Aucun frais hort forfait enregistré pour cette fiche</div>";
		exit;
	} else {
		include("vues/v_listeFraisHorsForfaitComptable.php");
	}?>
</div>