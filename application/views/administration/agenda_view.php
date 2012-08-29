<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/agenda/nouveau/'); ?>>Ajouter</a> un agenda 

</p>

<table BORDER="1">
	<caption>Voici la liste des agendas : </caption>
	<tr>
		<th>Intitule</th><th>Type</th><th>Couleur</th><th>Action</th>
	</tr>
	<?php 
	foreach ($liste as $agenda)
	{
	?>
		<tr>
		<td><?php echo $agenda->agen_intitule; ?> </td>
		<td><?php echo utf8_decode($agenda->agen_proprio_id); ?> </td>
		<td><?php echo $agenda->agen_couleur; ?></td>
		<td><a href =<?php echo site_url('administration/agenda/supprimer/'.$agenda->agen_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/agenda/modifier/'.$agenda->agen_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
