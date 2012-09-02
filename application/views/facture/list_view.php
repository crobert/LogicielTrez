<h1>Liste des Factures</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Type</th>
            <th>Num&eacute;ro</th>
            <th>Objet</th>
            <th>Montant</th>
            <th width="320"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($factures as $facture): ?>
        <tr>
            <td><?php echo $facture->type; ?></td>
            <td><?php echo $facture->numero; ?></td>
            <td><?php echo $facture->objet; ?></td>
            <td><?php echo $facture->montant; ?></td>
            <td>
                <a href="<?php echo site_url().'facture/modify/'.$facture->id.'/'.$id_ligne;?>">Modifier</a>&nbsp;
                <a href="<?php echo site_url().'facture/delete/'.$facture->id.'/'.$id_ligne;?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="<?php echo site_url('facture/add/'.$id_ligne); ?>" class='btn btn-primary'>
        <i class="icon-plus"></i> Ajouter une facture
    </a>
</div>
