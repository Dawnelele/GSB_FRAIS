<div id="contenu">
      <h2>Fiche de frais du mois <?php echo $numMois."-".$numAnnee ?></h2>
         
      <form method="POST" action="index.php?uc=gererFrais&action=validerMajFraisForfait<?php echo ($isComptable) ? "&idVisiteurToUpdate=". $_REQUEST['idVisiteurToUpdate'] ."&moisToUpdate=". $_REQUEST['moisToUpdate']."&updated=1" : "" ;?> ">
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
						<input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite?>" >
					</p>
			
			<?php
				}
			?>	
           
          </fieldset>
      </div>

      <div class="piedForm">
	      <p>
	        <input id="ok" type="submit" value="Valider" size="20" />
	        <input id="annuler" type="reset" value="Effacer" size="20" />
	      </p>
      </div>
        
      </form>
</div>

<?php
if(isset($_REQUEST['idVisiteurToUpdate']) && isset($_REQUEST['moisToUpdate']) && isset($_REQUEST['updated']) && $_REQUEST['updated'] == 1){
	echo "<script>window.location.href = 'index.php?uc=gererFrais&action=consulterFrais&requestedIdVisiteur=". $_REQUEST['idVisiteurToUpdate'] ."&requestedMonth=". $_REQUEST['moisToUpdate'] ."';</script>";
}
?>
  