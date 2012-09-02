<h1>Liste des lignes</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Cr&eacute;dit</th>
            <th>D&eacute;bit</th>
            <th width="280"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lignes as $ligne): ?>
        <tr>
            <td><?php echo $ligne->id; ?></td>
            <td><?php echo $ligne->nom; ?></td>
            <td><?php echo $ligne->description; ?></td>
            <td><?php echo $ligne->credit; ?></td>
            <td><?php echo $ligne->debit; ?></td>
            <td>
                <a href="<?php echo site_url('facture/index/'.$ligne->id); ?>">Acc&eacute;der aux factures</a>&nbsp;
                <a href="<?php echo site_url('ligne/modify/'.$ligne->id.'/'.$id_souscategorie); ?>">Modifier</a>&nbsp;
                <a href="<?php echo site_url('ligne/delete/'.$ligne->id.'/'.$id_souscategorie); ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="<?php echo site_url('ligne/add/'.$id_souscategorie); ?>" class='btn btn-primary'>
        <i class="icon-plus"></i> Ajouter une ligne
    </a>
</div>
