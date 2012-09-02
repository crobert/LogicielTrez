<h1>D&eacute;tail du tiers <?php echo $tiers->nom; ?></h1>

<table class="table table-hover">
    <tbody>
        <tr>
            <td>Nom</td>
            <td><?php echo $tiers->nom; ?></td>
        </tr>
        <tr>
            <td>Nom du responsable/contact</td>
            <td><?php echo $tiers->responsable; ?></td>
        </tr>
        <tr>
            <td>Num&eacute;ro de t&eacute;l&eacute;phone</td>
            <td><?php echo $tiers->telephone; ?></td>
        </tr>
        <tr>
            <td>Num&eacute;ro de fax</td>
            <td><?php echo $tiers->fax; ?></td>
        </tr>
        <tr>
            <td>Adresse e-mail</td>
            <td><a href="mailto:<?php echo $tiers->mail; ?>"><?php echo $tiers->mail; ?></a></td>
        </tr>
        <tr>
            <td>Adresse postale</td>
            <td><?php echo $tiers->adresse; ?></td>
        </tr>
        <tr>
            <td>RIB</td>
            <td><?php echo $tiers->rib; ?></td>
        </tr>
        <tr>
            <td>Ordre (pour les ch&egrave;ques)</td>
            <td><?php echo $tiers->ordre_cheque; ?></td>
        </tr>
        <tr>
            <td>Commentaire</td>
            <td><?php echo $tiers->commentaire; ?></td>
        </tr>
    </tbody>
</table>


<div>
    <a href="<?php echo site_url('tiers/add'); ?>" class='btn btn-primary'>
        Retour &agrave; la liste des tiers
    </a>
    <a href="<?php echo site_url('tiers/modify/'.$tiers->id); ?>" class='btn'>
        Modifier
    </a>
</div>
