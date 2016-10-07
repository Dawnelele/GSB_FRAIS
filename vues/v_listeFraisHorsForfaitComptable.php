<table class="table">
    <caption>Eléments hors forfait</caption>

    <tr>
        <th class="date">Date</th>
        <th class="libelle">Libellé</th>  
        <th class="montant">Montant</th>
        <th class="action"></th>
    </tr>

    <?php
    foreach($lesFraisHorsForfait as $unFraisHorsForfait) 
    {
        $libelle = $unFraisHorsForfait['libelle'];
        $date = $unFraisHorsForfait['date'];
        $montant=$unFraisHorsForfait['montant'];
        $id = $unFraisHorsForfait['id'];
        ?><tr id="<?php echo $id; ?>">
        <td> <?php echo $date ?></td>
        <td><?php echo $libelle ?></td>
        <td><?php echo $montant ?></td>
        <td>
            <a style="float: right;" class="btn btn-danger" href="<?php echo "index.php?uc=gererFrais&action=supprimerFrais&requestedIdVisiteur=". $_REQUEST['requestedIdVisiteur'] ."&requestedMonth=". $_REQUEST['requestedMonth'] ."&idFrais=$id "; ?>" 
                onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Refuser cet élément</a></td>
            </tr>
            <?php
        }
        ?>    
    </table>

    
    <fieldset>
    <legend>Statut de la fiche</legend>
        <select style="margin-bottom: 100px" class="selecteurEtat form-control">
            <?php 
            foreach($lesEtats as $etat) {
                if($etatActuel->idEtat != $etat->id) {
                    echo "<option label=". $id ." value=". $etat->id .">". $etat->libelle ."</option>";
                } else {
                    echo "<option selected label=". $id ." value=". $etat->id .">". $etat->libelle ."</option>";
                }
            }
            ?>
                
        </select>
    </fieldset>
    

            <script>
//PROJET AUTOSELECT VALUE
$(document).ready(function() {
    //$(".selecteurEtat option[value='<?php echo $etatActuel->idEtat ?>']").attr("selected", "");
    var idVisiteurCurrentRow = $(".selecteurEtat option").closest('tr').attr('id');
    //$(".selecteurEtat option[value='<?php echo $etatActuel->idEtat; ?>'][label='"+idVisiteurCurrentRow+"']").attr("selected", "");
    //$(".selecteurEtat option[value='<?php echo $etatActuel->idEtat; ?>']").attr("selected", "");
})

$(".selecteurEtat").on("change", function() {
    var idNouvelEtat = $(".selecteurEtat :selected").val();
    var requestedIdVisiteur = "<?php echo $_REQUEST['requestedIdVisiteur']; ?>";
    var requestedMonth = <?php echo $_REQUEST['requestedMonth']; ?>;
    $.ajax({
        url: 'index.php?uc=gererFrais&action=changerEtat&requestedIdVisiteur='+requestedIdVisiteur+'&requestedMonth='+requestedMonth+'&idNouvelEtat='+idNouvelEtat,
        type: 'post',
        complete: function($data) {
            //alert($data.responseText);
            console.log($data.responseText);
            window.location.href="index.php?uc=gererFrais&action=consulterFrais&requestedIdVisiteur="+requestedIdVisiteur+"&requestedMonth="+requestedMonth;
        },
    })
    
})
</script>