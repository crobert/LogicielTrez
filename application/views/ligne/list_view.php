<h1>Liste des lignes</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Cr&eacute;dit</th>
            <th>D&eacute;bit</th>
            <th width="70"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lignes as $ligne): ?>
        <tr>
            <td><?php echo $ligne->id; ?></td>
            <td><?php echo $ligne->nom; ?></td>
            <td><?php echo $ligne->description; ?></td>
            <td><?php echo $ligne->credit; ?> €</td>
            <td><?php echo $ligne->debit; ?> €</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-small" href="<?php echo site_url('facture/index/'.$ligne->id); ?>" title="Accéder aux factures"><i class="icon-download"></i></a>
                    <a class="btn btn-small" href="<?php echo site_url('ligne/edit/'.$ligne->id.'/'.$id_souscategorie); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
                    <a class="btn btn-small"
                       href="<?php echo site_url('ligne/delete/'.$ligne->id.'/'.$id_souscategorie); ?>"
                       onclick="return window.confirm('Êtes-vous sur de vouloir supprimer la ligne <?php echo $ligne->nom; ?> ?');"
                       title="Supprimer"><i class="icon-remove"></i></a>
                </div>
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
