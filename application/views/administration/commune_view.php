<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/contact/nouveau/'); ?>>Ajouter</a> un contact 

</p>

<table BORDER="1">
	<caption>Voici la liste des contacts : </caption>
	<tr>
		<th>Nom</th><th>CP</th><th>INSEE</th><th>Action</th>
	</tr>
	<?php 
	foreach ($liste as $contact)
	{
	?>
		<tr>
		<td><?php echo $contact->conta_nom; ?> </td>
		<td><?php echo $contact->conta_cp; ?> </td>
		<td><?php echo $contact->conta_insee; ?></td>
		<td><a href =<?php echo site_url('administration/contact/supprimer/'.$contact->conta_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/contact/modifier/'.$contact->conta_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
