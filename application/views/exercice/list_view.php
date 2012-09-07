<h1>Liste des exercices</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Edition</th>
            <th>Ann&eacute;e 1</th>
            <th>Ann&eacute;e 2</th>
            <th width="70"></th>
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
                <div class="btn-group">
                    <a class="btn btn-small" href="<?php echo site_url('budget/index/'.$exercice->id); ?>" title="Acc&eacute;der aux budgets"><i class="icon-download"></i></a>
                    <a class="btn btn-small" href="<?php echo site_url('exercice/edit/'.$exercice->id); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
                    <a class="btn btn-small"
                       href="<?php echo site_url('exercice/delete/'.$exercice->id); ?>"
                       onclick="return window.confirm('Êtes-vous sur de vouloir supprimer l\'exercice <?php echo $exercice->edition; ?> ?');"
                       title="Supprimer"><i class="icon-remove"></i></a>
                </div>
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
