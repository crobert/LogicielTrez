<h1>Connexion</h1>

<?php echo form_open('login/verifLogin', array('class' => 'form-horizontal')); ?>
    <legend>Veuillez entrer vos information de connexion</legend>
    <div class="control-group">
        <label class="control-label" for="inputUsername">Nom d'utilisateur</label>
        <div class="controls">
            <input type="text" id="inputUsername" placeholder="Nom d'utilisateur" required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Mot de passe</label>
        <div class="controls">
            <input type="password" id="inputPassword" placeholder="Mot de passe" required>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
    </div>
<?php echo form_close(); ?>