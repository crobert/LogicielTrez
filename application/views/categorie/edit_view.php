<h1>&Eacute;diter la cat&eacute;gorie <?php echo $categorie->cat_nom; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('categorie/edit/'.$categorie->cat_id.'/'.$id_budget, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="nom">Nom</label>
    <div class="controls">
        <input type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo set_value('nom', $categorie->cat_nom); ?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="description">Description</label>
    <div class="controls">
        <input type="text" id="description" placeholder="Description" name="description" value="<?php echo set_value('description', $categorie->cat_description); ?>" />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">&Eacute;diter</button>
        <a href="<?php echo site_url('categorie/index/'.$id_budget); ?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>
