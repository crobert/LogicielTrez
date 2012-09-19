<h1>&Eacute;diter la tva <?php echo $tva->cct_nom; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('config/edit_tva/'.$tva->cct_id, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="nom">Nom</label>
    <div class="controls">
        <input type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo set_value('nom', $tva->cct_nom); ?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="description">Taux</label>
    <div class="controls">
        <input type="text" id="taux" placeholder="Taux" name="taux" value="<?php echo set_value('taux', $tva->cct_taux); ?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="description">Actif</label>
    <div class="controls">
        <input type="checkbox" id="actif" name="actif" value="1" <?php if(set_value('actif', $tva->cct_actif)==1){echo "checked";} ?> />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">&Eacute;diter</button>
        <a href="<?php echo site_url('config/index/'); ?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>
