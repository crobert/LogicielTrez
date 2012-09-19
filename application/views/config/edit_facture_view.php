<h1>&Eacute;diter la tva <?php echo $facture->ctf_nom; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('config/edit_facture/'.$facture->ctf_id, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="description">Abr&eacute;viation</label>
    <div class="controls">
        <input type="text" id="abr" placeholder="abr" name="abr" value="<?php echo set_value('abr', $facture->ctf_abr); ?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="nom">Nom</label>
    <div class="controls">
        <input type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo set_value('nom', $facture->ctf_nom); ?>" required />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">&Eacute;diter</button>
        <a href="<?php echo site_url('config/index/'); ?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>
