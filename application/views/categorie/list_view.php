<h1>Liste des cat&eacute;gories</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Description</th>
            <th width="150"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $categorie): ?>
        <tr>
            <td><?php echo $categorie->id; ?></td>
            <td><?php echo $categorie->nom; ?></td>
            <td><?php echo $categorie->description; ?></td>
            <td>
                <a href="<?php echo site_url().'souscategorie/index/'.$categorie->id;?>">Accéder&nbsp;aux&nbsp;sous&nbsp;catégories</a>&nbsp;
                <a href="<?php echo site_url().'categorie/modify/'.$categorie->id.'/'.$id_budget;?>">Modifier</a>&nbsp;
                <a href="<?php echo site_url().'categorie/delete/'.$categorie->id.'/'.$id_budget;?>">Supprimer</a>
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
