<h1>&Eacute;diter le budget <?php echo $budget->bud_nom; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('budget/edit/'.$budget->bud_id.'/'.$id_exercice, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="nom">Nom</label>
    <div class="controls">
        <input type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo set_value('nom', $budget->bud_nom);?>" required />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">&Eacute;diter</button>
        <a href="<?php echo site_url('budget/index/'.$id_exercice);?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>