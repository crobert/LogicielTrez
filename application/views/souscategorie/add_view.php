<h1>Ajouter une sous-cat&eacute;gorie</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('souscategorie/add/'.$id_categorie, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="nom">Nom</label>
    <div class="controls">
        <input type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo set_value('nom');?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="description">Description</label>
    <div class="controls">
        <input type="text" id="description" placeholder="Description" name="description" value="<?php echo set_value('description');?>" />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="<?php echo site_url('souscategorie/index/'.$id_categorie);?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>
