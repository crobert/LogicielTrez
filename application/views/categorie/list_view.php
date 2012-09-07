<h1>Liste des cat&eacute;gories</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Description</th>
            <th width="70"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $categorie): ?>
        <tr>
            <td><?php echo $categorie->id; ?></td>
            <td><?php echo $categorie->nom; ?></td>
            <td><?php echo $categorie->description; ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-small" href="<?php echo site_url('souscategorie/index/'.$categorie->id); ?>" title="Accéder aux sous-catégories"><i class="icon-download"></i></a>
                    <a class="btn btn-small" href="<?php echo site_url('categorie/edit/'.$categorie->id.'/'.$id_budget); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
                    <a class="btn btn-small"
                       href="<?php echo site_url('categorie/delete/'.$categorie->id.'/'.$id_budget); ?>"
                       onclick="return window.confirm('Êtes-vous sur de vouloir supprimer la cat&eacute;gorie <?php echo $categorie->nom; ?> ?');"
                       title="Supprimer"><i class="icon-remove"></i></a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="<?php echo site_url('categorie/add/'.$id_budget); ?>" class='btn btn-primary'>
        <i class="icon-plus"></i> Ajouter une cat&eacute;gorie
    </a>
</div>
