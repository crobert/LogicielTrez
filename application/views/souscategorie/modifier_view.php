<form name="modif_souscategorie" id="modif_souscategorie" class="" action="<?php echo site_url().'souscategorie/modify/'.$souscategorie->id.'/'.$id_categorie;;?>" method="post" enctype="multipart/form-data" style="padding:0; border:none;">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="right" valign="top"><span>Nom</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="text" name="nom" id="nom" value="<?php echo set_value('nom', $souscategorie->nom);?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('nom');?></td>
		</tr>
		<tr>
			<td align="right" valign="top"><span>Description</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="text" name="description" id="description" value="<?php echo set_value('description', $souscategorie->description);?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('description');?></td>
		</tr>
	</table>	
	<input type="submit" class="btn" value="Modifier sous categorie"/>
</form>
<a href="<?php echo site_url().'souscategorie/index/'.$id_categorie;?>"><input class="btn btn-danger" value="Annuler" /></a>
