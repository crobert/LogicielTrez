<h1>Liste des sous-cat&eacute;gories</h1>

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
        <?php foreach ($souscategories as $souscategorie): ?>
        <tr>
            <td><?php echo $souscategorie->id; ?></td>
            <td><?php echo $souscategorie->nom; ?></td>
            <td><?php echo $souscategorie->description; ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-small" href="<?php echo site_url('ligne/index/'.$souscategorie->id); ?>" title="Accéder aux lignes"><i class="icon-download"></i></a>
                    <a class="btn btn-small" href="<?php echo site_url('souscategorie/edit/'.$souscategorie->id.'/'.$id_categorie); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
                    <a class="btn btn-small"
                       href="<?php echo site_url('souscategorie/delete/'.$souscategorie->id.'/'.$id_categorie); ?>"
                       onclick="return window.confirm('Êtes-vous sur de vouloir supprimer la sous-cat&eacute;gorie <?php echo $souscategorie->nom; ?> ?');"
                       title="Supprimer"><i class="icon-remove"></i></a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="<?php echo site_url('souscategorie/add/'.$id_categorie); ?>" class='btn btn-primary'>
        <i class="icon-plus"></i> Ajouter une sous-cat&eacute;gorie
    </a>
</div>

