<h1>Ajouter une facture</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('facture/add/'.$id_ligne, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="type">Type</label>
    <div class="controls">
		<select id="type" name="type" required>
            <?php foreach ($type_facture as $tf) { ?>
                <option value="<?php echo $tf->ctf_id;?>" <?php if(set_value('type') == $tf->ctf_id){echo "selected='selected'";} ?> ><?php echo $tf->ctf_nom;?></option>
            <?php } ?>
		</select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="numero">Num&eacute;ro</label>
    <div class="controls">
        <input type="text" id="numero" placeholder="Numero" name="numero" value="<?php echo set_value('numero');?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="objet">Objet</label>
    <div class="controls">
        <input type="text" id="objet" placeholder="Objet" name="objet" value="<?php echo set_value('objet');?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="montant">Montant</label>
    <div class="controls">
        <input type="text" id="montant" placeholder="Montant" name="montant" value="<?php echo set_value('montant');?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="methode_paiement">M&eacute;thode de paiement</label>
    <div class="controls">
		<select id="methode_paiement" name="methode_paiement" required>
            <?php foreach ($methode_paiement as $mp) { ?>
                <option value="<?php echo $mp->cmp_id;?>" <?php if(set_value('methode_paiement') == $mp->cmp_id){echo "selected='selected'";} ?> ><?php echo $mp->cmp_nom;?></option>
            <?php } ?>
		</select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="date">Date de facturation</label>
    <div class="controls">
        <input type="text" id="date" placeholder="Date de la facture" name="date" value="<?php echo set_value('date');?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="date_paiement">Date de paiement</label>
    <div class="controls">
        <input type="text" id="date_paiement" placeholder="Date du paiement (date comptable)" name="date_paiement" value="<?php echo set_value('date_paiement');?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="ref_paiement">R&eacute;f. paiement</label>
    <div class="controls">
        <input type="text" id="ref_paiement" placeholder="Num&eacute;ro de ch&egrave;que ou de virement" name="ref_paiement" value="<?php echo set_value('ref_paiement');?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="commentaire">Commentaire</label>
    <div class="controls">
        <textarea id="commentaire" placeholder="Commentaire sur cette facture" name="commentaire" value="<?php echo set_value('commentaire'); ?>"></textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="tiers">Tiers</label>
    <div class="controls">
		<select id="tiers" name="tiers" required>
            <?php foreach ($tiers as $t) { ?>
                <option value="<?php echo $t->trs_id;?>" <?php if(set_value('tiers') == $t->trs_id){echo "selected='selected'";} ?> ><?php echo $t->trs_nom;?></option>
            <?php } ?>
		</select>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="<?php echo site_url('facture/index/'.$id_ligne);?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        // transform select into the chosen one
        $('#tiers, #methode_paiement, #type').chosen({no_results_text: "Pas de r&eacute;sultats"});

        // datePickers
        $( "#date" ).datepicker({
            dateFormat: 'dd/mm/yy'
        });
        $( "#date_paiement" ).datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>
