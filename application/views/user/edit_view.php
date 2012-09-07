<h1>&Eacute;diter l'utilisateur <?php echo $username; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('user/edit/'.$id, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="inputUsername">Nom d'utilisateur</label>
    <div class="controls">
        <input type="text" id="inputUsername" placeholder="Nom d'utilisateur" name="username" value="<?php echo set_value('username', $username); ?>" required>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="inputPassword">Mot de passe</label>
    <div class="controls">
        <input type="password" id="inputPassword" placeholder="Mot de passe" name="password">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="inputPasswordConf">Confirmation du mot de passe</label>
    <div class="controls">
        <input type="password" id="inputPasswordConf" placeholder="Mot de passe" name="password_confirmation">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="inputType">Type</label>
    <div class="controls">
        <input type="text" id="inputType" placeholder="admin" name="type" value="<?php echo set_value('type', $type); ?>" required>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">&Eacute;diter</button>
        <a href="<?php echo site_url('user/index');?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>