<h1>Ajouter une classe de tva</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('config/add_tva/', array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="nom">Nom</label>
    <div class="controls">
        <input type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo set_value('nom'); ?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="description">Taux</label>
    <div class="controls">
        <input type="text" id="taux" placeholder="Taux" name="taux" value="<?php echo set_value('taux'); ?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="description">Actif</label>
    <div class="controls">
        <input type="checkbox" id="actif" name="actif" value="1" <?php if(set_value('actif', 1)==1){echo "checked";} ?> />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="<?php echo site_url('config/index/'); ?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>
