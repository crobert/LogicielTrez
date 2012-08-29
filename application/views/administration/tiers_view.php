<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/tiers/nouveau/'); ?>>Ajouter</a> un tiers 

</p>

<table BORDER="1">
	<caption>Voici la liste des tierss : </caption>
	<tr>
		<th>Intitule</th><th>Cat&eacute;</th><th>Type</th><th>Action</th>
	</tr>
	<?php 
	foreach ($liste as $tiers)
	{
	?>
		<tr>
		<td><?php echo $tiers->tier_intitule; ?> </td>
		<td><?php echo utf8_decode($tiers->tier_categorie); ?> </td>
		<td><?php echo $tiers->tier_type; ?></td>
		<td><a href =<?php echo site_url('administration/tiers/supprimer/'.$tiers->tier_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/tiers/modifier/'.$tiers->tier_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
