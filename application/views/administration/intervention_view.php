<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/intervention/nouveau/'); ?>>Ajouter</a> une intervention 

</p>

<table BORDER="1">
	<caption>Voici la liste des interventions : </caption>
	<tr>
		<th>Utilisateur</th><th>Mode</th><th>Type</th><th>Action</th>
	</tr>
	<?php 
	foreach ($liste as $intervention)
	{
	?>
		<tr>
		<td><?php echo $intervention->inte_utilisateur; ?> </td>
		<td><?php echo utf8_decode($intervention->inte_mode); ?> </td>
		<td><?php echo $intervention->inte_type; ?></td>
		<td><a href =<?php echo site_url('administration/intervention/supprimer/'.$intervention->inte_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/intervention/modifier/'.$intervention->inte_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
