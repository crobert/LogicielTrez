<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/constante/nouveau/'); ?>>Ajouter</a> une constante 

</p>

<table BORDER="1">
	<caption>Voici la liste des constantes : </caption>
	<tr>
		<th>Titre</th><th>URL</th><th>Mail</th><th>Action</th>
	</tr>
	<?php 
	foreach ($liste as $constante)
	{
	?>
		<tr>
		<td><?php echo utf8_decode($constante->cons_titre); ?> </td>
		<td><?php echo $constante->cons_url; ?> </td>
		<td><?php echo $constante->cons_mail; ?></td>
		<td><a href =<?php echo site_url('administration/constante/supprimer/'.$constante->cons_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/constante/modifier/'.$constante->cons_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
