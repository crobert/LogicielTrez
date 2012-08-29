<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/activite/nouveau/'); ?>>Ajouter</a> une activite 

</p>

<table BORDER="1">
	<caption>Voici la liste des activit&eacute; : </caption>
	<tr>
		<th>intitule</th><th>agenda</th><th>description</th><th>Action</th>
	</tr>
	<?php 
	foreach ($liste as $activite)
	{
	?>
		<tr>
		<td><?php echo utf8_decode($activite->acti_intitule); ?> </td>
		<td><?php echo utf8_decode($activite->acti_agenda); ?> </td>
		<td><?php echo stripcslashes(utf8_decode($activite->acti_description)); ?></td>
		<td><a href =<?php echo site_url('administration/activite/supprimer/'.$activite->acti_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/activite/modifier/'.$activite->acti_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
