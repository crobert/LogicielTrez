<h3>Voici la page de vue des listes</h3>



<p>
	Contr&ocirc;leur op&eacute;rationnel pour : <br/>
	<li><u>List_droits :</u> Liste, Suppression</li>
	<li><u>List_contrats :</u> Liste, Suppression  </li>
	<li><u>List_inte_mode :</u> Liste, Suppression  </li>
	<li><u>List_inte_type :</u> Liste, Suppression  </li>
	<li><u>List_taches :</u> Liste, Suppression  </li>
	<li><u>List_tags :</u> Liste, Suppression </li>
	<li><u>List_tiers :</u> Liste, Suppression </li>
	<li><u>List_tarification :</u> Liste, Suppression  </li>
</p>


<table BORDER="1">
	<caption>List_droits </caption>
	<tr>
		<th>ordre</th><th>valeur</th><th>actif</th><th>action</th>
	</tr>
<?php foreach ($list_droits as $element) 
	{	
	?>
		<tr>
		<td><?php echo $element->list_droi_ordre; ?> </td>
		<td><?php echo utf8_decode($element->list_droi_valeur); ?> </td>
		<td><?php echo $element->list_droi_actif; ?></td>
		<td><a href =<?php echo site_url('administration/listes/supprimer/droit/'.$element->list_droi_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/listes/modifier/droit/'.$element->list_droi_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
?>
<tr><td></td><td></td><td></td><td><a href =<?php echo site_url('administration/listes/nouveau/droit'); ?>>Ajouter un &eacute;l&eacute;ment </a></td></tr>
</table>
<br/>


<table BORDER="1">
	<caption>List_contrats </caption>
	<tr>
		<th>ordre</th><th>valeur</th><th>actif</th><th>action</th>
	</tr>
<?php foreach ($list_contrats as $element) 
	{	
	?>
		<tr>
		<td><?php echo $element->list_contr_ordre; ?> </td>
		<td><?php echo utf8_decode($element->list_contr_valeur); ?> </td>
		<td><?php echo $element->list_contr_actif; ?></td>
		<td><a href =<?php echo site_url('administration/listes/supprimer/contrat/'.$element->list_contr_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/listes/modifier/contrat/'.$element->list_contr_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
?> 
<tr><td></td><td></td><td></td><td><a href =<?php echo site_url('administration/listes/nouveau/contrat'); ?>>Ajouter un &eacute;l&eacute;ment </a></td></tr>
</table>
<br/>


<table BORDER="1">
	<caption>List_taches </caption>
	<tr>
		<th>ordre</th><th>valeur</th><th>actif</th><th>couleur</th><th>action</th>
	</tr>
<?php foreach ($list_taches as $element) 
	{	
	?>
		<tr>
		<td><?php echo $element->list_tach_ordre; ?> </td>
		<td><?php echo utf8_decode($element->list_tach_valeur); ?> </td>
		<td><?php echo $element->list_tach_actif; ?></td>
		<td><?php echo $element->list_tach_couleur; ?></td>
		<td><a href =<?php echo site_url('administration/listes/supprimer/tache/'.$element->list_tach_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/listes/modifier/tache/'.$element->list_tach_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
?>
<tr><td></td><td></td><td></td><td></td><td><a href =<?php echo site_url('administration/listes/nouveau/tache'); ?>>Ajouter un &eacute;l&eacute;ment </a></td></tr>
</table>
<br/>


<table BORDER="1">
	<caption>List_inte_type </caption>
	<tr>
		<th>ordre</th><th>valeur</th><th>actif</th><th>action</th>
	</tr>
<?php foreach ($list_inte_type as $element) 
	{	
	?>
		<tr>
		<td><?php echo $element->list_inte_type_ordre; ?> </td>
		<td><?php echo utf8_decode($element->list_inte_type_valeur); ?> </td>
		<td><?php echo $element->list_inte_type_actif; ?></td>
		<td><a href =<?php echo site_url('administration/listes/supprimer/inte_type/'.$element->list_inte_type_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/listes/modifier/inte_type/'.$element->list_inte_type_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
?>
<tr><td></td><td></td><td></td><td><a href =<?php echo site_url('administration/listes/nouveau/inte_type'); ?>>Ajouter un &eacute;l&eacute;ment </a></td></tr>
</table>
<br/>


<table BORDER="1">
	<caption>List_inte_mode </caption>
	<tr>
		<th>ordre</th><th>valeur</th><th>actif</th><th>action</th>
	</tr>
<?php foreach ($list_inte_mode as $element) 
	{	
	?>
		<tr>
		<td><?php echo $element->list_inte_mode_ordre; ?> </td>
		<td><?php echo utf8_decode($element->list_inte_mode_valeur); ?> </td>
		<td><?php echo $element->list_inte_mode_actif; ?></td>
		<td><a href =<?php echo site_url('administration/listes/supprimer/inte_mode/'.$element->list_inte_mode_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/listes/modifier/inte_mode/'.$element->list_inte_mode_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
?>
<tr><td></td><td></td><td></td><td><a href =<?php echo site_url('administration/listes/nouveau/inte_mode'); ?>>Ajouter un &eacute;l&eacute;ment </a></td></tr>
</table>
<br/>



<table BORDER="1">
	<caption>List_tags </caption>
	<tr>
		<th>ordre</th><th>valeur</th><th>actif</th><th>action</th>
	</tr>
<?php foreach ($list_tags as $element) 
	{	
	?>
		<tr>
		<td><?php echo $element->list_tags_ordre; ?> </td>
		<td><?php echo utf8_decode($element->list_tags_valeur); ?> </td>
		<td><?php echo $element->list_tags_actif; ?></td>
		<td><a href =<?php echo site_url('administration/listes/supprimer/tag/'.$element->list_tags_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/listes/modifier/tag/'.$element->list_tags_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
?>
<tr><td></td><td></td><td></td><td><a href =<?php echo site_url('administration/listes/nouveau/tag'); ?>>Ajouter un &eacute;l&eacute;ment </a></td></tr>
</table>
<br/>



<table BORDER="1">
	<caption>List_tiers </caption>
	<tr>
		<th>ordre</th><th>valeur</th><th>actif</th><th>action</th>
	</tr>
<?php foreach ($list_tiers as $element) 
	{	
	?>
		<tr>
		<td><?php echo $element->list_tier_ordre; ?> </td>
		<td><?php echo utf8_decode($element->list_tier_valeur); ?> </td>
		<td><?php echo $element->list_tier_actif; ?></td>
		<td><a href =<?php echo site_url('administration/listes/supprimer/tiers/'.$element->list_tier_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/listes/modifier/tiers/'.$element->list_tier_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
?>
<tr><td></td><td></td><td></td><td><a href =<?php echo site_url('administration/listes/nouveau/'); ?>>Ajouter un &eacute;l&eacute;ment </a></td></tr>
</table>
<br/>

<table BORDER="1">
	<caption>List_tarification </caption>
	<?php echo form_open('administration/listes/nouveau/tarification'); ?>
	<tr>
		<th>ordre</th><th>valeur</th><th>actif</th><th>action</th>
	</tr>
<?php foreach ($list_tarification as $element) 
	{
	?>
		<tr>
		<td><?php echo $element->list_tari_ordre; ?> </td>
		<td><?php echo utf8_decode($element->list_tari_valeur); ?> </td>
		<td><input type="checkbox" name="option2" value="Butter" <?php if($element->list_tari_actif){echo 'checked';} ?> ><br> </td>
		<td><a href =<?php echo site_url('administration/listes/supprimer/tarification/'.$element->list_tari_id);?> >Supprimer</a>
		<a href =<?php echo site_url('administration/listes/modifier/tarification/'.$element->list_tari_id); ?>>Modifier</a></td>
		</tr>
	<?php 
	}
?>

<tr>
	<td></td>
	<td><input type="text" name="valeur" maxlength="100" size="50" style="width:50%" /></td>
	<td></td>
	<td><input type="submit" name="mysubmit" value="Ajouter un &eacute;l&eacute;ment" /></td></tr>
<?php echo form_close(); ?>
</table>
<br/>

