<h1>&Eacute;diter la ligne <?php echo $ligne->nom; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('ligne/edit/'.$ligne->id.'/'.$id_souscategorie, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="nom">Nom</label>
    <div class="controls">
		<input type="text" id="nom" placeholder="Intitul&eacute; de la ligne" name="nom" value="<?php echo set_value('edition', $ligne->nom);?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="description">Description</label>
    <div class="controls">
        <input type="text" id="description" placeholder="Description de la ligne" name="description" value="<?php echo set_value('description', $ligne->description); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="debit">D&eacute;bit</label>
    <div class="controls">
        <input type="number" id="debit" placeholder="D&eacute;bit" name="debit" value="<?php echo set_value('debit', $ligne->debit); ?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="credit">Cr&eacute;dit</label>
    <div class="controls">
        <input type="number" id="credit" placeholder="Cr&eacute;dit" name="credit" value="<?php echo set_value('credit', $ligne->credit); ?>" required />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">&Eacute;diter</button>
        <a href="<?php echo site_url('ligne/index/'.$id_souscategorie);?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>
