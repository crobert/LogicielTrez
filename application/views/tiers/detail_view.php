<h1>D&eacute;tail du tiers <?php echo $tiers->trs_nom; ?></h1>

<table class="table table-hover">
    <tbody>
        <tr>
            <td>Nom</td>
            <td><?php echo $tiers->trs_nom; ?></td>
        </tr>
        <tr>
            <td>Nom du responsable/contact</td>
            <td><?php echo $tiers->trs_responsable; ?></td>
        </tr>
        <tr>
            <td>Num&eacute;ro de t&eacute;l&eacute;phone</td>
            <td><?php echo $tiers->trs_telephone; ?></td>
        </tr>
        <tr>
            <td>Num&eacute;ro de fax</td>
            <td><?php echo $tiers->trs_fax; ?></td>
        </tr>
        <tr>
            <td>Adresse e-mail</td>
            <td><a href="mailto:<?php echo $tiers->trs_mail; ?>"><?php echo $tiers->trs_mail; ?></a></td>
        </tr>
        <tr>
            <td>Adresse postale</td>
            <td><?php echo $tiers->trs_adresse; ?></td>
        </tr>
        <tr>
            <td>RIB</td>
            <td><?php echo $tiers->trs_rib; ?></td>
        </tr>
        <tr>
            <td>Ordre (pour les ch&egrave;ques)</td>
            <td><?php echo $tiers->trs_ordre_cheque; ?></td>
        </tr>
        <tr>
            <td>Commentaire</td>
            <td><?php echo $tiers->trs_commentaire; ?></td>
        </tr>
    </tbody>
</table>


<div>
    <a href="<?php echo site_url('tiers/index'); ?>" class='btn btn-primary'>
        Retour &agrave; la liste des tiers
    </a>
    <a href="<?php echo site_url('tiers/edit/'.$tiers->trs_id); ?>" class='btn'>
        &Eacute;diter
    </a>
</div>
