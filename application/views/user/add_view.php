<h1>Ajouter un utilisateur</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('user/add', array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="inputUsername">Nom d'utilisateur</label>
    <div class="controls">
        <input type="text" id="inputUsername" placeholder="Nom d'utilisateur" name="username" value="<?php echo set_value('username'); ?>" required>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="inputPassword">Mot de passe</label>
    <div class="controls">
        <input type="password" id="inputPassword" placeholder="Mot de passe" name="password" required>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="inputPasswordConf">Confirmation du mot de passe</label>
    <div class="controls">
        <input type="password" id="inputPasswordConf" placeholder="Mot de passe" name="password_confirmation" required>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="inputType">Type</label>
    <div class="controls">
        <input type="text" id="inputType" placeholder="admin" name="type" value="<?php echo set_value('type'); ?>" required>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</div>
<?php echo form_close(); ?>