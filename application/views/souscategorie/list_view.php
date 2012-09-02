<h1>Liste des sous-cat&eacute;gories</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Description</th>
            <th width="260"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($souscategories as $souscategorie): ?>
        <tr>
            <td><?php echo $souscategorie->id; ?></td>
            <td><?php echo $souscategorie->nom; ?></td>
            <td><?php echo $souscategorie->description; ?></td>
            <td>
                <a href="<?php echo site_url().'ligne/index/'.$souscategorie->id;?>">Accéder&nbsp;aux&nbsp;lignes</a>&nbsp;
                <a href="<?php echo site_url().'souscategorie/modify/'.$souscategorie->id.'/'.$id_categorie;?>">Modifier</a>&nbsp;
                <a href="<?php echo site_url().'souscategorie/delete/'.$souscategorie->id.'/'.$id_categorie;?>">Supprimer</a>
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

