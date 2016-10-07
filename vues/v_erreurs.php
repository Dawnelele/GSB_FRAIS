<div class ="erreur">
<ul>
<?php
if(isset($_REQUEST['erreurs']) && !empty($_REQUEST['erreurs'])) {
	foreach($_REQUEST['erreurs'] as $erreur)
	{
      	echo "<li>$erreur</li>";
	}
}
?>
</ul></div>
