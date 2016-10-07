<h2>Fiche de frais du mois <?php echo $numMois."-".$numAnnee ?></h2>

<form method="POST" action="index.php?uc=gererFrais&action=validerMajFraisForfait<?php echo ($isComptable) ? "&idVisiteurToUpdate=". $_REQUEST['idVisiteurToUpdate'] ."&moisToUpdate=". $_REQUEST['moisToUpdate']."&updated=1" : "" ;?> ">
	<div class="form-group">

		<fieldset style="margin-top: 20px">
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

				<?php
			}
			?>	

		</fieldset>

		<button style="float: right" class="btn btn-primary" type="submit">Valider</button>

	</div>
</form>


<?php
if(isset($_REQUEST['idVisiteurToUpdate']) && isset($_REQUEST['moisToUpdate']) && isset($_REQUEST['updated']) && $_REQUEST['updated'] == 1){
	echo "<script>window.location.href = 'index.php?uc=gererFrais&action=consulterFrais&requestedIdVisiteur=". $_REQUEST['idVisiteurToUpdate'] ."&requestedMonth=". $_REQUEST['moisToUpdate'] ."';</script>";
}
?>