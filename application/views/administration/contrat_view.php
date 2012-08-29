<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/contrat/nouveau/'); ?>>Ajouter</a> un contrat 

</p>

<table BORDER="1">
	<caption>Voici la liste des contrats : </caption>
	<tr>
		<th>Intitule</th><th>Type</th><th>Ech&eacute;ance</th><th>Action</th>
	</tr>
	<?php
	foreach ($liste as $contrat)
	{
	?>
		<tr>
		<td><?php echo $contrat->contr_intitule; ?> </td>
		<td><?php echo utf8_decode($contrat->contr_type); ?> </td>
		<td><?php echo $contrat->contr_echeance; ?></td>
		<td><a href =<?php echo site_url('administration/contrat/supprimer/'.$contrat->contr_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/contrat/modifier/'.$contrat->contr_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
