<form name="nouvel_exercice" id="nouvel_exercice" class="" action="<?php echo site_url().'budget/add/'.$id_exercice;?>" method="post" enctype="multipart/form-data" style="padding:0; border:none;">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="right" valign="top"><span>Nom</span></td>
			<td width="5">&nbsp;</td>
			<td colspan="5" valign="top">
				<input class="" type="text" name="nom" id="nom" value="<?php echo set_value('nom');?>" style="width:300px; min-width:300px; max-width:300px;" />
				</td>
			<td><?php echo form_error('nom');?></td>
		</tr>
	</table>	
	<input type="submit" class="btn" value="Créer budget"/>
</form>
<a href="<?php echo site_url().'budget/index/'.$id_exercice;?>"><input class="btn btn-danger" value="Annuler" /></a>
