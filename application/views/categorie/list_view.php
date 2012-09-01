<h1>Liste des exercices</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Budget</th>
            <th width="150"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $categorie): ?>
        <tr>
            <td><?php echo $categorie->id; ?></td>
            <td><?php echo $categorie->nom; ?></td>
            <td><?php echo $categorie->description; ?></td>
            <td><?php echo $categorie->id_budget; ?></td>
            <td>
                <a href="<?php echo site_url().'categorie/modify/'.$categorie->id;?>">Modifier</a>&nbsp;
                <a href="<?php echo site_url().'categorie/delete/'.$categorie->id;?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?php echo site_url();?>categorie/add"><input class="btn" value="Créer une categorie" /></a>
