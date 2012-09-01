<form name="nouvel_exercice" id="nouvel_exercice" class="" action="<?php echo site_url();?>exercice/add" method="post" enctype="multipart/form-data" style="padding:0; border:none;">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="right" valign="top"><span>Edition</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="text" name="edition" id="edition" value="<?php echo set_value('edition');?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('edition');?></td>
		</tr>
		<tr>
			<td align="right" valign="top"><span>Ann&eacute;e d'avant</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="number" name="annee_1" id="annee_1" value="<?php echo set_value('annee_1');?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('annee_1');?></td>
		</tr>
		<tr>
			<td align="right" valign="top"><span>Ann&eacute;e d'encore avant</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="number" name="annee_2" id="annee_2" value="<?php echo set_value('annee_2');?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('annee_2');?></td>
		</tr>
	</table>	
	<input type="submit" class="btn" value="Créer exercice"/>
</form>
<a href="<?php echo site_url();?>exercice"><input class="btn btn-danger" value="Annuler" /></a>
