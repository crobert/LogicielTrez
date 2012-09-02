<h1>Liste des exercices</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Edition</th>
            <th>Ann&eacute;e 1</th>
            <th>Ann&eacute;e 2</th>
            <th width="280"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($exercices as $exercice): ?>
        <tr>
            <td><?php echo $exercice->id; ?></td>
            <td><?php echo $exercice->edition; ?></td>
            <td><?php echo $exercice->annee_1; ?></td>
            <td><?php echo $exercice->annee_2; ?></td>
            <td>
                <a href="<?php echo site_url('budget/index/'.$exercice->id); ?>">Acc&eacute;der aux budgets</a>&nbsp;
                <a href="<?php echo site_url('exercice/modify/'.$exercice->id); ?>">Modifier</a>&nbsp;
                <a href="<?php echo site_url('exercice/delete/'.$exercice->id); ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="<?php echo site_url('exercice/add'); ?>" class='btn btn-primary'>
        <i class="icon-plus"></i> Ajouter un exercice
    </a>
</div>
