<?php
if(empty($totalQuantiteN1) && empty($totalQuantiteN2)) {
	echo "<script>window.location.href = 'index.php?uc=dashboard&action=selectionVisiteur&notFound=true';</script>";
}?>

<div class="form-group">
	<fieldset>
		<legend>Tableau de bord</legend>
		<H3>Visiteur : <?php echo $nomVisiteur[1] . " " . $nomVisiteur[2] ; ?></H3>
		<p style="display:inline-block;float:left;">Total N - 2 = <b><?php echo $totalQuantiteN2; ?></b></p>
		       <p style="display:inline-block;float:right;">Total N - 1 = <b><?php echo $totalQuantiteN1; ?></b></p><Br /><br />
		<?php if($totalQuantiteN2 != 0) {
		echo "Evolution : " . (($totalQuantiteN1 - $totalQuantiteN2) / $totalQuantiteN2) * 100;?> %<?php
		} else {
			echo "<Br />Aucune valeur n'étant enregistée pour N - 2, impossible de calculer une variation";
			}?>
	</fieldset>
</div>