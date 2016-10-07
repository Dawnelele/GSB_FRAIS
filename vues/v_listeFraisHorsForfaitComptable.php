<table class="listeLegere">
        <caption>Eléments hors forfait</caption>
        
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>  
                <th class="montant">Montant</th>
                <th class="action">Actions</th>
             </tr>

            <?php
                foreach($lesFraisHorsForfait as $unFraisHorsForfait) 
                {
                    $libelle = $unFraisHorsForfait['libelle'];
                    $date = $unFraisHorsForfait['date'];
                    $montant=$unFraisHorsForfait['montant'];
                    $id = $unFraisHorsForfait['id'];
                    ?><tr>
                        <td> <?php echo $date ?></td>
                        <td><?php echo $libelle ?></td>
                        <td><?php echo $montant ?></td>
                        <td>
                        <select class="selecteurEtat">
                        <?php foreach($lesEtats as $etat)
                        {
                            echo "<option value=". $etat->id .">". $etat->libelle ."</option>";
                                
                        }?>
                        </select>
                        <a href="<?php echo "index.php?uc=gererFrais&action=supprimerFrais&requestedIdVisiteur=". $_REQUEST['requestedIdVisiteur'] ."&requestedMonth=". $_REQUEST['requestedMonth'] ."&idFrais=$id "; ?>" 
                        onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                    </tr>
                    <?php
                }
            ?>    
</table>

<script>
//PROJET AUTOSELECT VALUE
$(document).ready(function() {
    $(".selecteurEtat option[value='B']").attr("selected","selected");
})

$(".selecteurEtat").on("change", function() {
    var idNouvelEtat = $(".selecteurEtat :selected").val();
    var requestedIdVisiteur = "<?php echo $_REQUEST['requestedIdVisiteur']; ?>";
    var requestedMonth = <?php echo $_REQUEST['requestedMonth']; ?>;
    $.ajax({
        url: 'index.php?uc=gererFrais&action=changerEtat&requestedIdVisiteur='+requestedIdVisiteur+'&requestedMonth='+requestedMonth+'&idNouvelEtat='+idNouvelEtat,
        type: 'post',
        complete: function() {
            alert('complete');
        },
    })
})
</script>