<h1>Liste des Budgets</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th width="150"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($budgets as $budget): ?>
        <tr>
            <td><?php echo $budget->id; ?></td>
            <td><?php echo $budget->nom; ?></td>
            <td>			
                <a href="<?php echo site_url().'categorie/index/'.$budget->id;?>">Accéder&nbsp;aux&nbsp;catégories</a>&nbsp;
                <a href="<?php echo site_url().'budget/modify/'.$budget->id.'/'.$budget->id_exercice;?>">Modifier</a>&nbsp;
                <a href="<?php echo site_url().'budget/delete/'.$budget->id.'/'.$budget->id_exercice;?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?php echo site_url().'budget/add/'.$id_exercice;?>"><input class="btn" value="Créer un budget" /></a>
