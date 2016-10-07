 <div class="container">
 	<h2>Mes fiches de frais</h2>
 	<form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post">
 		<div class="container form-group">

 			<p>

 				<label for="lstMois" accesskey="n">Mois : </label>
 				<select class="form-control" id="lstMois" name="lstMois">
 					<?php
 					foreach ($lesMois as $unMois)
 					{
 						$mois = $unMois['mois'];
 						$numAnnee =  $unMois['numAnnee'];
 						$numMois =  $unMois['numMois'];
 						if($mois == $moisASelectionner){
 							?>
 							<option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
 							<?php 
 						}
 						else{ ?>
 						<option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
 						<?php 
 					}

 				}

 				?>    

 			</select>
 		</p>
 	</div>

 	<button style="float: right" class="btn btn-primary" type="submit">Valider</button>

 </form>
 