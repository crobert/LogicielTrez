<h1>Liste des Factures</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Type</th>
            <th>Num&eacute;ro</th>
            <th>Objet</th>
            <th>Montant</th>
            <th width="50"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($factures as $facture): ?>
        <tr>
            <td><?php echo $facture->type; ?></td>
            <td><?php echo $facture->numero; ?></td>
            <td><?php echo $facture->objet; ?></td>
            <td><?php echo $facture->montant; ?> €</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-small" href="<?php echo site_url('facture/edit/'.$facture->id.'/'.$id_ligne); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
                    <a class="btn btn-small"
                       href="<?php echo site_url('facture/delete/'.$facture->id.'/'.$id_ligne); ?>"
                       onclick="return window.confirm('Êtes-vous sur de vouloir supprimer la facture <?php echo $facture->numero; ?> ?');"
                       title="Supprimer"><i class="icon-remove"></i></a>
                </div>
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
