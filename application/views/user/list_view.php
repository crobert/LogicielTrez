<h1>Liste des utilisateurs</h1>

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom d'utilisateur</th>
            <th>Type</th>
            <th width="150"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->type; ?></td>
            <td>
                <a href="">Modifier</a>&nbsp;
                <a href="#">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>