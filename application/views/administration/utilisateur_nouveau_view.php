<?php echo form_open('administration/verifnewuser'); ?>
    <?php echo form_error('nom'); ?>
    <label for="nom">Nom:</label>   
    <input type="text" size="20" name="nom" value="<?php echo set_value('nom');?>" />
    <br/>  

    <?php echo form_error('prenom'); ?>
    <label for="prenom">Pr&eacute;nom:</label>
    <input type="text" size="20" name="prenom" value="<?php echo set_value('prenom');?>" />
    <br/>
    
	<?php echo form_error('login'); ?>    
	<label for="login">Login:</label>
	<input type="text" size="20" name="login" value="<?php echo set_value('login');?>" />
	<br/>
     
	<?php echo form_error('civilite'); ?><br>     
	<label for="civilite">Civilit&eacute;:</label>
		<fieldset style="width:120px">
			<input type=radio name="civilite" value="Mlle" <?php echo set_radio('civilite', 'Mlle'); ?> >Mademoiselle  <br>
			<input type=radio name="civilite" value="Mme" <?php echo set_radio('civilite', 'Mme'); ?> >Madame  <br>
			<input type=radio name="civilite" value="M" <?php echo set_radio('civilite', 'M'); ?> >Monsieur  <br>
		</fieldset>
     <br/>
       
	<?php //Petit script pour récupérer les anciennes valeurs ou la valeur par défaut
	$defaultDroit = $this->input->post('droit');
	if ($defaultDroit == FALSE)
	{ $defaultDroit = 'intervenant'; } 
	// Fin du script?>     
     
     
	<?php echo form_error('droit'); ?><br>     
	<label for="droit">Droit:</label>
		<fieldset style="width:120px">
			<?php foreach ($droits as $droit) 
			{ $droit = $droit->list_droi_valeur;?>
			<input type=radio name="droit" <?php if($droit == $defaultDroit) {echo "checked ='default'";} ?> value=<?php echo $droit; ?> <?php echo set_radio('droit', $droit); ?> ><?php echo $droit; ?>  <br>
			<?php  } ?>	
		</fieldset>
     <br/>
        
	<?php echo form_error('mel'); ?>
	<label for="mel">Email:</label>    
	<input type="text" name="mel" value="<?php echo set_value('mel');?>" />
	<br/>
     
	<?php echo form_error('type'); ?><br>     
	<label for="type">Type:</label>
		<fieldset style="width:120px">
			<input type=radio name="type" value="Interne" checked="default" <?php echo set_radio('type', 'Interne'); ?> >Interne  <br>
			<input type=radio name="type" value="Externe" <?php echo set_radio('type', 'Externe'); ?> >Externe  <br>
		</fieldset>
	 <br/>
     
     
	<?php echo form_error('commentaire'); ?><br>
    <label for="commentaire">Commentaire:</label>
		<textarea name="commentaire" value="<?php echo set_value('commentaire');?>"></textarea>
	<br/>
	
	<?php echo form_error('adresse'); ?>
	<label for="adresse">Adresse:</label>  
	<input type="text" name="adresse" value="<?php echo set_value('adresse');?>" />
	<br/>
         
	<?php echo form_error('cp'); ?>
	<label for="cp">Code Postal:</label>   
	<input type="text" name="cp" value="<?php echo set_value('cp');?>" />
	<br/>     
        
	<?php echo form_error('commune'); ?>
	<label for="commune">Commune:</label>  
	<input type="text" name="commune" value="<?php echo set_value('commune');?>" />
	<br/>     
        
	<?php echo form_error('insee'); ?>
	<label for="insee">INSEE:</label>  
	<input type="text" name="insee" value="<?php echo set_value('insee');?>" />
	<br/>     
         
	<?php echo form_error('tel1'); ?>   
	<label for="tel1">N&deg; T&eacute;l&eacute;phone:</label>  
	<input type="text" name="tel1" value="<?php echo set_value('tel1');?>" />
	<br/>  
	   
	<?php echo form_error('tel2'); ?>
	<label for="tel2">N&deg; T&eacute;l&eacute;phone (secondaire):</label>  
	<input type="text" name="tel2" value="<?php echo set_value('tel2');?>" />
	<br/>     
 
	<?php echo form_error('fax'); ?>	
	<label for="fax">N&deg; Fax:</label>  
	<input type="text" name="fax" value="<?php echo set_value('fax');?>" />
	<br/>  
	
     <input type="submit" value="New"/>
<?php echo form_close(); ?>

