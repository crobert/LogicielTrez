<h1>&Eacute;diter la config <?php echo $conf->cfg_key; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('config/edit_conf/'.$conf->cfg_id, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="nom">Nom</label>
    <div class="controls">
        <input type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo set_value('nom', $conf->cfg_key); ?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="description">Taux</label>
    <div class="controls">
        <input type="text" id="valeur" placeholder="valeur" name="valeur" value="<?php echo set_value('valeur', $conf->cfg_value); ?>" required />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">&Eacute;diter</button>
        <a href="<?php echo site_url('config/index/'); ?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>
