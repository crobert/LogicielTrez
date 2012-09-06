<h1>Modifier la cat&eacute;gorie <?php echo $categorie->nom; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('categorie/modify/'.$categorie->id.'/'.$id_budget, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="nom">Nom</label>
    <div class="controls">
        <input type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo set_value('nom', $categorie->nom); ?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="description">Description</label>
    <div class="controls">
        <input type="text" id="description" placeholder="Description" name="description" value="<?php echo set_value('description', $categorie->description); ?>" />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="<?php echo site_url('categorie/index/'.$id_budget); ?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>
