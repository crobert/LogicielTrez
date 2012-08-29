<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/tache/nouveau/'); ?>>Ajouter</a> une t&acirc;che 

</p>

<table BORDER="1">
	<caption>Voici la liste des taches : </caption>
	<tr>
		<th>Intitule</th><th>Description</th><th>Statut</th><th>Action</th>
	</tr>
	<?php 
	foreach ($liste as $tache)
	{
	?>
		<tr>
		<td><?php echo $tache->tach_intitule; ?> </td>
		<td><?php echo utf8_decode($tache->tach_description); ?> </td>
		<td><?php echo $tache->tach_statut; ?></td>
		<td><a href =<?php echo site_url('administration/tache/supprimer/'.$tache->tach_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/tache/modifier/'.$tache->tach_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
