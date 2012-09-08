<h1>Liste des budgets</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th width="70"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($budgets as $budget): ?>
        <tr>
            <td><?php echo $budget->bud_id; ?></td>
            <td><?php echo $budget->bud_nom; ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-small" href="<?php echo site_url('categorie/index/'.$budget->bud_id); ?>" title="Accéder aux catégories"><i class="icon-download"></i></a>
                    <a class="btn btn-small" href="<?php echo site_url('budget/edit/'.$budget->bud_id.'/'.$budget->bud_id_exercice); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
                    <a class="btn btn-small"
                       href="<?php echo site_url('budget/delete/'.$budget->bud_id.'/'.$budget->bud_id_exercice); ?>"
                       onclick="return window.confirm('Êtes-vous sur de vouloir supprimer le budget <?php echo $budget->bud_nom; ?> ?');"
                       title="Supprimer"><i class="icon-remove"></i></a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="<?php echo site_url('budget/add/'.$id_exercice); ?>" class='btn btn-primary'>
        <i class="icon-plus"></i> Ajouter un budget
    </a>
</div>