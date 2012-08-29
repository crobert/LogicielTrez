<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
        $this->load->view('_template/header_view');
    ?>
</head>
<body>
    <?php
        $this->load->view('_template/menu_view');
    ?>
    <div class="container">
        <div class="row">
            <div class="span12">
                <?php
                    $this->load->view($_view);
                ?>
            </div>
        </div>
    </div>
    <?php
        $this->load->view('_template/footer_view');
    ?>
</body>
</html>