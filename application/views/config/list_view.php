<table class="table">  
<caption>Liste des tva</caption>
        <thead>  
          <tr>  
            <th>ID</th>  
            <th>Nom</th>  
            <th>Taux</th>   
            <th>Actif</th>   
          </tr>  
        </thead>  
        
        <tbody>  
          <?php foreach ($tva as $t) { ?>
          <tr>  
            <td><?php echo $t->cfg_id;?></td>  
            <td><?php echo $t->cfg_nom;?> </td>  
            <td><?php echo $t->cfg_taux;?></td>  
            <td><?php echo $t->cfg_actif;?></td>  
          </tr>  
           <?php } ?>
	</tbody> 
</table>

<table class="table">  
<caption>Liste des types de facture</caption>
        <thead>  
          <tr>  
            <th>ID</th>  
            <th>Abbr</th>  
            <th>Nom</th>   
          </tr>  
        </thead>  
        
        <tbody>  
			<?php foreach ($type_facture as $t) { ?>
			<tr>  
				<td><?php echo $t->cfg_id;?></td>  
				<td><?php echo $t->cfg_abbr ;?></td>  
				<td><?php echo $t->cfg_nom;?></td>  
			</tr>  
			<?php } ?>
	</tbody> 
</table>

<table class="table">  
<caption>Liste des m&eacute;thode de paiement</caption>
        <thead>  
          <tr>  
            <th>ID</th>  
            <th>Nom</th>  
          </tr>  
        </thead>  
        
        <tbody>  
          
          <?php foreach ($methode_paiement as $m) { ?>
          <tr>  
				<td><?php echo $m->cfg_id;?></td>
				<td><?php echo $m->cfg_value;?> </td>
           </tr>   
           <?php } ?>
          
	</tbody> 
</table>
