<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/site/nouveau/'); ?>>Ajouter</a> un site 

</p>

<table BORDER="1">
	<caption>Voici la liste des sites : </caption>
	<tr>
		<th>Intitule</th><th>Adresse</th><th>CP</th><th>Action</th>
	</tr>
	<?php 
	foreach ($liste as $site)
	{
	?>
		<tr>
		<td><?php echo $site->site_intitule; ?> </td>
		<td><?php echo utf8_decode($site->site_adresse); ?> </td>
		<td><?php echo $site->site_cp; ?></td>
		<td><a href =<?php echo site_url('administration/site/supprimer/'.$site->site_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/site/modifier/'.$site->site_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
