<h1>Ajouter une facture</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('facture/add/'.$id_ligne, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="type">Type</label>
    <div class="controls">
        <input type="text" id="type" placeholder="Type" name="type" value="<?php echo set_value('type');?>" required />
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
        <input type="text" id="methode_paiement" placeholder="Methode paiement" name="methode_paiement" value="<?php echo set_value('methode_paiement');?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="date">Date</label>
    <div class="controls">
        <input type="text" id="date" placeholder="Date" name="date" value="<?php echo set_value('date');?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="date_paiement">Date de paiement</label>
    <div class="controls">
        <input type="text" id="date_paiement" placeholder="Date paiement" name="date_paiement" value="<?php echo set_value('date_paiement');?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="commentaire">Commentaire</label>
    <div class="controls">
        <input type="text" id="commentaire" placeholder="Commentaire" name="commentaire" value="<?php echo set_value('commentaire');?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="id_tiers">Tiers</label>
    <div class="controls">
		<select id="id_tiers">
		<?php foreach ($tiers as $t) { ?>
			<option value="<?php echo $t->nom;?>"><?php echo $t->nom;?></option>
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
