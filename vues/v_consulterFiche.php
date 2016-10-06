<div id="contenu">
	<form method="POST" action="index.php?uc=gererFrais&action=validerFiche">
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
							<?php unset($_SESSION['lesFraisToUpdate']);
							$_SESSION['lesFraisToUpdate'][$idFrais] = $quantite;
							var_dump($_SESSION['lesFraisToUpdate']);?>	
						</p>
				
				<?php } ?>
	           
	          </fieldset>
	      </div>

	      <div class="piedForm">
		      <p>
		        <a href="<?php echo "index.php?uc=gererFrais&action=validerMajFraisForfait&idVisiteurToUpdate=". $_REQUEST['requestedIdVisiteur'] ."&moisToUpdate=". $_REQUEST['requestedMonth'];?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
		      </p> 
	      </div>


	      <table class="listeLegere">
	  	  	<caption>Eléments hors forfait</caption>
	             <tr>
	                <th class="date">Date</th>
					<th class="libelle">Libellé</th>  
	                <th class="montant">Montant</th>
	                <th class="action">&nbsp;</th>            
	             </tr>
	          
			    <?php 
				    foreach( $lesFraisHorsForfait as $unFraisHorsForfait) 
					{
						$libelle = $unFraisHorsForfait['libelle'];
						$date = $unFraisHorsForfait['date'];
						$montant=$unFraisHorsForfait['montant'];
						$id = $unFraisHorsForfait['id'];
	            		?><tr>
	                		<td> <?php echo $date ?></td>
	                		<td><?php echo $libelle ?></td>
	                		<td><?php echo $montant ?></td>
	                		<td><a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>" 
							onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
	             		</tr>
						<?php
					}
				?>	  
	    	</table>
	</form>
</div>