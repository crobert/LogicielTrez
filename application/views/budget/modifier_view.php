<form name="nouvel_exercice" id="nouvel_exercice" class="" action="<?php echo site_url().'budget/modify/'.$budget->id;?>" method="post" enctype="multipart/form-data" style="padding:0; border:none;">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="right" valign="top"><span>Nom</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="text" name="nom" id="nom" value="<?php echo set_value('nom', $budget->nom);?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('nom');?></td>
		</tr>
		<tr>
			<td align="right" valign="top"><span>Exercice</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="number" name="id_exercice" id="id_exercice" value="<?php echo set_value('id_exercice', $budget->id_exercice);?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('id_exercice');?></td>
		</tr>
	</table>	
	<input type="submit" class="btn" value="Modifier budget"/>
</form>
<a href="<?php echo site_url();?>budget"><input class="btn btn-danger" value="Annuler" /></a>
