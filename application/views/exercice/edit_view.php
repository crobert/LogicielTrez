<h1>&Eacute;diter l'exercice de l'&eacute;dition <?php echo $exercice->exe_edition; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('exercice/edit/'.$exercice->exe_id, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="edition">&Eacute;dition</label>
    <div class="controls">
        <input type="number" id="edition" placeholder="Num&eacute;ro de l'&eacute;dition" name="edition" value="<?php echo set_value('edition', $exercice->exe_edition);?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="annee_1">Ann&eacute;e 1</label>
    <div class="controls">
        <input type="number" id="annee_1" placeholder="Ann&eacute;e de d&eacute;but" name="annee_1" value="<?php echo set_value('annee_1', $exercice->exe_annee_1);?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="annee_2">Ann&eacute;e 2</label>
    <div class="controls">
        <input type="number" id="annee_2" placeholder="Ann&eacute;e de fin" name="annee_2" value="<?php echo set_value('annee_2', $exercice->exe_annee_2);?>" />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">&Eacute;diter</button>
        <a href="<?php echo site_url('exercice/index');?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>
