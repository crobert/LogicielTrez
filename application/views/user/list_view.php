<h1>Liste des utilisateurs</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom d'utilisateur</th>
            <th>Type</th>
            <th width="50"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->type; ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-small" href="<?php echo site_url('user/edit/'.$user->id); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
                    <a class="btn btn-small"
                       href="<?php echo site_url('user/delete/'.$user->id); ?>"
                       onclick="return window.confirm('Êtes-vous sur de vouloir supprimer l\'utilisateur <?php echo $user->username; ?> ?');"
                       title="Supprimer"><i class="icon-remove"></i></a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="<?php echo site_url('user/add'); ?>" class='btn btn-primary'>
        <i class="icon-plus"></i> Ajouter un utilisateur
    </a>
</div>