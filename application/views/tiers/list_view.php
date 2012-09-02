<h1>Liste des tiers</h1>

<table class="table table-stripped table-hover">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Responsable</th>
        <th>T&eacute;l&eacute;phone</th>
        <th width="170"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tiers as $tier): ?>
    <tr>
        <td><?php echo $tier->nom; ?></td>
        <td><?php echo $tier->responsable; ?></td>
        <td><?php echo $tier->telephone; ?></td>
        <td>
            <a href="<?php echo site_url('tiers/detail/'.$tier->id); ?>">D&eacute;tail</a>&nbsp;
            <a href="<?php echo site_url('tiers/modify/'.$tier->id); ?>">Modifier</a>&nbsp;
            <a href="<?php echo site_url('tiers/delete/'.$tier->id); ?>">Supprimer</a>
        </td>
    </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="<?php echo site_url('tiers/add'); ?>" class='btn btn-primary'>
        <i class="icon-plus"></i> Ajouter un tiers
    </a>
</div>
