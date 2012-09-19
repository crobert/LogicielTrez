<h1>D&eacute;tail du budget <?php echo $budget->bud_nom; ?></h1>

<table class="table table-stripped table-hover budget-detail">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>D&eacute;bit</th>
        <th>Cr&eacute;dit</th>
        <th width="20"></th>
    </tr>
    </thead>
    <tbody>
    <?php
        $id_cat = -1;
        $id_sous_cat = -1;

    foreach ($budget_detail as $ligne) :
        if ($ligne->cat_id != $id_cat) :
    ?>
        <tr class="categorie">
            <td><?php echo $ligne->cat_id; ?></td>
            <td><a href="#" rel="tooltip" title="<?php echo $ligne->cat_description; ?>"><?php echo $ligne->cat_nom; ?></a></td>
            <td><?php echo ($ligne->lig_debit == 0) ? '-' : $ligne->lig_debit; ?></td>
            <td><?php echo ($ligne->lig_credit == 0) ? '-' : $ligne->lig_credit; ?></td>
            <td>
                <a class="btn btn-small" href="<?php echo site_url('categorie/index/'.$ligne->cat_id); ?>" title="Voir le d&eacute;tail"><i class="icon-zoom-in"></i></a>
            </td>
        </tr>
    <?php
        endif;

        if ($ligne->sct_id != $id_sous_cat) :
    ?>
        <tr class="sous-categorie">
            <td><?php echo $ligne->sct_id; ?></td>
            <td><a href="#" rel="tooltip" title="<?php echo $ligne->sct_description; ?>"><?php echo $ligne->sct_nom; ?></a></td>
            <td><?php echo ($ligne->lig_debit == 0) ? '-' : $ligne->lig_debit; ?></td>
            <td><?php echo ($ligne->lig_credit == 0) ? '-' : $ligne->lig_credit; ?></td>
            <td>
                <a class="btn btn-small" href="<?php echo site_url('souscategorie/index/'.$ligne->sct_id); ?>" title="Voir le d&eacute;tail"><i class="icon-zoom-in"></i></a>
            </td>
        </tr>    <?php
        endif;
    ?>
    <tr class="ligne">
        <td><?php echo $ligne->lig_id; ?></td>
        <td><a href="#" rel="tooltip" title="<?php echo $ligne->lig_description; ?>"><?php echo $ligne->lig_nom; ?></a></td>
        <td><?php echo ($ligne->lig_debit == 0) ? '-' : $ligne->lig_debit; ?></td>
        <td><?php echo ($ligne->lig_credit == 0) ? '-' : $ligne->lig_credit; ?></td>
        <td>
            <a class="btn btn-small" href="<?php echo site_url('facture/index/'.$ligne->lig_id); ?>" title="Voir le d&eacute;tail"><i class="icon-zoom-in"></i></a>
        </td>
    </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    // active les tooltips TB
    $(document).ready(function () {
        if ($("[rel=tooltip]").length) {
            $("[rel=tooltip]").tooltip({
                placement: "top"
            });
        }
    });
</script>