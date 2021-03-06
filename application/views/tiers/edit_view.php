<h1>&Eacute;diter le tiers <?php echo $tiers->trs_nom; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('tiers/edit/'.$tiers->trs_id, array('class' => 'form-horizontal')); ?>
<div class="control-group">
    <label class="control-label" for="nom">Nom</label>
    <div class="controls">
        <input type="text" id="nom" placeholder="Nom du tiers" name="nom" value="<?php echo set_value('nom', $tiers->trs_nom); ?>" required />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="responsable">Responsable</label>
    <div class="controls">
        <input type="text" id="responsable" placeholder="Nom de notre contact" name="responsable" value="<?php echo set_value('responsable', $tiers->trs_responsable); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="telephone">T&eacute;l&eacute;phone</label>
    <div class="controls">
        <input type="tel" id="telephone" placeholder="Num&eacute;ro de t&eacute;l&eacute;phone" name="telephone" value="<?php echo set_value('telephone', $tiers->trs_telephone); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="fax">Fax</label>
    <div class="controls">
        <input type="tel" id="fax" placeholder="Num&eacute;ro de fax" name="fax" value="<?php echo set_value('fax', $tiers->trs_fax); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="mail">Mail</label>
    <div class="controls">
        <input type="email" id="mail" placeholder="Adresse e-mail" name="mail" value="<?php echo set_value('mail', $tiers->trs_mail); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="adresse">Adresse</label>
    <div class="controls">
        <input type="text" id="adresse" placeholder="Adresse postale" name="adresse" value="<?php echo set_value('adresse', $tiers->trs_adresse); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="rib">RIB</label>
    <div class="controls">
        <input type="text" id="rib" placeholder="Relev&eacute; bancaire" name="rib" value="<?php echo set_value('rib', $tiers->trs_rib); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="ordre_cheque">Ordre</label>
    <div class="controls">
        <input type="text" id="ordre_cheque" placeholder="Ordre exact des ch&egrave;ques" name="ordre_cheque" value="<?php echo set_value('ordre_cheque', $tiers->trs_ordre_cheque); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="commentaire">Commentaire</label>
    <div class="controls">
        <textarea id="commentaire" placeholder="Commentaire sur ce tiers" name="commentaire" value="<?php echo set_value('commentaire', $tiers->trs_commentaire); ?>"></textarea>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">&Eacute;diter</button>
        <a href="<?php echo site_url('tiers/index');?>" class="btn btn-danger">Annuler</a>
    </div>
</div>
<?php echo form_close(); ?>
