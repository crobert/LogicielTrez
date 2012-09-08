    <div class="navbar navbar-fixed-top navbar-inverse" id="menu">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="<?php echo site_url();?>">Logiciel Trez</a>
                <?php if ($this->session->userdata('logged')) : ?>
                <ul class="nav">
                    <li><a href="<?php echo site_url('exercice/index');?>">Exercices</a></li>
                    <li><a href="<?php echo site_url('tiers/index');?>">Tiers</a></li>
                    <li><a href="<?php echo site_url('user/index');?>">Utilisateurs</a></li>
                    <li><a href="<?php echo site_url('config/index');?>">Configuration</a></li>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
