<h1>Liste des tiers</h1>

<table class="table table-stripped table-hover">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Responsable</th>
        <th>T&eacute;l&eacute;phone</th>
        <th width="70"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tiers as $tier): ?>
    <tr>
        <td><?php echo $tier->trs_nom; ?></td>
        <td><?php echo $tier->trs_responsable; ?></td>
        <td><?php echo $tier->trs_telephone; ?></td>
        <td>
            <div class="btn-group">
                <a class="btn btn-small" href="<?php echo site_url('tiers/detail/'.$tier->trs_id); ?>" title="D&eacute;tail"><i class="icon-zoom-in"></i></a>
                <a class="btn btn-small" href="<?php echo site_url('tiers/edit/'.$tier->trs_id); ?>" title="&Eacute;diter"><i class="icon-pencil"></i></a>
                <a class="btn btn-small"
                   href="<?php echo site_url('tiers/delete/'.$tier->trs_id); ?>"
                   onclick="return window.confirm('Êtes-vous sur de vouloir supprimer le tiers <?php echo $tier->trs_nom; ?> ?');"
                   title="Supprimer"><i class="icon-remove"></i></a>
            </div>
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
