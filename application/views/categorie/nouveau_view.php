<form name="nouvel_categorie" id="nouvel_categorie" class="" action="<?php echo site_url();?>categorie/add" method="post" enctype="multipart/form-data" style="padding:0; border:none;">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="right" valign="top"><span>Nom</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="text" name="nom" id="nom" value="<?php echo set_value('nom');?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('nom');?></td>
		</tr>
		<tr>
			<td align="right" valign="top"><span>Description</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="text" name="description" id="description" value="<?php echo set_value('description');?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('description');?></td>
		</tr>
		<tr>
			<td align="right" valign="top"><span>Budget</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="text" name="id_budget" id="id_budget" value="<?php echo set_value('id_budget');?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('id_budget');?></td>
		</tr>
	</table>	
	<input type="submit" class="btn" value="Créer categorie"/>
</form>
<a href="<?php echo site_url();?>categorie"><input class="btn btn-danger" value="Annuler" /></a>
