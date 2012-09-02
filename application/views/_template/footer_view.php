<div id="footer" class="footer">
    <div class="container">
        Proudly powered by <a href="https://github.com/crobert/LogicielTrez">Logiciel Trez</a><br />

        <?php
            if ($this->session->userdata('logged') === TRUE) {
                echo '<a href="'.site_url('login/logout').'">Se déconnecter</a>';
            }
        ?>
    </div>
</div>