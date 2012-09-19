<div class="accordion" id="accordion2">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#tva">
			Liste des tva
			</a>
		</div>
	<div id="tva" class="accordion-body collapse in">
		<div class="accordion-inner">
			<table class="table">  
					<thead>  
					  <tr>  
						<th>ID</th>  
						<th>Nom</th>  
						<th>Taux</th>   
						<th>Actif</th>   
						<th width="50"></th>   
					  </tr>  
					</thead>  
					
					<tbody>  
					  <?php foreach ($tva as $t) { ?>
					  <tr>  
						<td><?php echo $t->cct_id;?></td>  
						<td><?php echo $t->cct_nom;?> </td>  
						<td><?php echo $t->cct_taux;?></td>  
						<td><?php echo $t->cct_actif;?></td> 
						<td>
						    <div class="btn-group">
								<a class="btn btn-small" href="<?php echo site_url('config/edit_tva/'.$t->cct_id); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
								<a class="btn btn-small"
								   href="<?php echo site_url('config/delete/tva/'.$t->cct_id); ?>"
								   onclick="return window.confirm('Êtes-vous sur de vouloir supprimer la classe de tva <?php echo $t->cct_nom; ?> ?');"
								   title="Supprimer"><i class="icon-remove"></i></a>
							</div>
						</td>
					  </tr>  
					   <?php } ?>
				</tbody> 
			</table>
			<div>
				<a href="<?php echo site_url('config/add_tva'); ?>" class='btn btn-primary'>
				<i class="icon-plus"></i> Ajouter une classe de tva</a>
			</div>
		</div>
	</div>
	</div>

	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#facture">
			Liste des types de facture
			</a>
		</div>
		<div id="facture" class="accordion-body collapse">
			<div class="accordion-inner">
				<table class="table">  
						<thead>  
						  <tr>  
							<th>ID</th>  
							<th>Abr&eacute;viation</th>  
							<th>Nom</th>     
							<th width="50"></th>   
						  </tr>  
						</thead>  
						
						<tbody>  
							<?php foreach ($type_facture as $t) { ?>
							<tr>  
								<td><?php echo $t->ctf_id;?></td>  
								<td><?php echo $t->ctf_abr ;?></td>  
								<td><?php echo $t->ctf_nom;?></td>  
								<td>
									<div class="btn-group">
										<a class="btn btn-small" href="<?php echo site_url('config/edit_facture/'.$t->ctf_id); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
										<a class="btn btn-small"
										   href="<?php echo site_url('config/delete/facture/'.$t->ctf_id); ?>"
										   onclick="return window.confirm('Êtes-vous sur de vouloir supprimer le type de facture <?php echo $t->ctf_nom; ?> ?');"
										   title="Supprimer"><i class="icon-remove"></i></a>
									</div>
								</td>
							</tr>  
							<?php } ?>
					</tbody> 
				</table>
				<div>
					<a href="<?php echo site_url('config/add_facture'); ?>" class='btn btn-primary'>
					<i class="icon-plus"></i> Ajouter un type de facture</a>
				</div>
			</div>
		</div>
	</div>

	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#paiement">
			Liste des m&eacute;thode de paiement
			</a>
		</div>
		<div id="paiement" class="accordion-body collapse">
			<div class="accordion-inner">
			<table class="table">  
			<caption></caption>
					<thead>  
					  <tr>  
						<th>ID</th>  
						<th>Nom</th>    
						<th width="50"></th>  
					  </tr>  
					</thead>  
					
					<tbody>  
					  
					  <?php foreach ($methode_paiement as $m) { ?>
					  <tr>  
							<td><?php echo $m->cmp_id;?></td>
							<td><?php echo $m->cmp_nom;?> </td>
							<td>
								<div class="btn-group">
									<a class="btn btn-small" href="<?php echo site_url('config/edit_paiement/'.$m->cmp_id); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
									<a class="btn btn-small"
									   href="<?php echo site_url('config/delete/paiement/'.$m->cmp_id); ?>"
									   onclick="return window.confirm('Êtes-vous sur de vouloir supprimer le type de paiement <?php echo $m->cmp_nom; ?> ?');"
									   title="Supprimer"><i class="icon-remove"></i></a>
								</div>
							</td>
					   </tr>   
					   <?php } ?>
					  
				</tbody> 
			</table>
				<div>
					<a href="<?php echo site_url('config/add_paiement'); ?>" class='btn btn-primary'>
					<i class="icon-plus"></i> Ajouter une m&eacute;thode de paiement</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#general">
			Config générale
			</a>
		</div>
		<div id="general" class="accordion-body collapse">
			<div class="accordion-inner">
			<table class="table">  
			<caption></caption>
					<thead>  
					  <tr>  
						<th>ID</th>  
						<th>Nom</th>    
						<th width="50"></th>  
					  </tr>  
					</thead>  
					
					<tbody>  
					  
					  <?php foreach ($conf as $c) { ?>
					  <tr>  
							<td><?php echo $c->cfg_key;?></td>
							<td><?php echo $c->cfg_value;?> </td>
							<td>
								<div class="btn-group">
									<a class="btn btn-small" href="<?php echo site_url('config/edit_conf/'.$c->cfg_id); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
									<a class="btn btn-small"
									   href="<?php echo site_url('config/delete/config/'.$c->cfg_id); ?>"
									   onclick="return window.confirm('Êtes-vous sur de vouloir supprimer la config <?php echo $c->cfg_key; ?> ?');"
									   title="Supprimer"><i class="icon-remove"></i></a>
								</div>
							</td>
					   </tr>   
					   <?php } ?>
					  
				</tbody> 
			</table>
				<div>
					<a href="<?php echo site_url('config/add_conf'); ?>" class='btn btn-primary'>
					<i class="icon-plus"></i> Ajouter une config g&eacute;n&eacute;rale</a>
				</div>
			</div>
		</div>
	</div>
</div>
