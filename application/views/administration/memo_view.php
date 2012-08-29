<p>
	Contr&ocirc;leur op&eacute;rationnel. <br/>
	
	Vous pouvez <a href =<?php echo site_url('administration/memo/nouveau/'); ?>>Ajouter</a> un memo 

</p>

<table BORDER="1">
	<caption>Voici la liste des memos : </caption>
	<tr>
		<th>Titre</th><th>Contenu</th><th>Date</th><th>Action</th>
	</tr>
	<?php 
	foreach ($liste as $memo)
	{
	?>
		<tr>
		<td><?php echo $memo->memo_titre; ?> </td>
		<td><?php echo utf8_decode($memo->memo_contenu); ?> </td>
		<td><?php echo $memo->memo_date; ?></td>
		<td><a href =<?php echo site_url('administration/memo/supprimer/'.$memo->memo_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/memo/modifier/'.$memo->memo_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
	?>
</table>
