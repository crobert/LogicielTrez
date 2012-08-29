<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/utilisateur/nouveau/'); ?>>Ajouter</a> un utilisateur 

</p>

<table BORDER="1">
	<caption>Voici la liste des utilisateurs : </caption>
	<tr>
		<th>Nom</th><th>Pr&eacute;nom</th><th>Droit</th><th>Action</th>
	</tr>
	<?php 
	foreach ($liste as $user)
	{
	?>
		<tr>
		<td><?php echo $user->util_nom; ?> </td>
		<td><?php echo utf8_decode($user->util_prenom); ?> </td>
		<td><?php echo $user->util_droit; ?></td>
		<td><a href =<?php echo site_url('administration/utilisateur/supprimer/'.$user->util_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/utilisateur/modifier/'.$user->util_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
