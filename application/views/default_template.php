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
                    // on regarde les flashdatas
                    if ($this->session->flashdata('error')) {
                        echo    '<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">×</a>'.
                                $this->session->flashdata('error').'</div>';
                    }
                    if ($this->session->flashdata('warning')) {
                        echo    '<div class="alert"><a href="#" class="close" data-dismiss="alert">×</a>'.
                                $this->session->flashdata('warning').'</div>';
                    }
                    if ($this->session->flashdata('success')) {
                        echo    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">×</a>'.
                                $this->session->flashdata('success').'</div>';
                    }
                    if ($this->session->flashdata('info')) {
                        echo    '<div class="alert alert-info"><a href="#" class="close" data-dismiss="alert">×</a>'.
                                $this->session->flashdata('info').'</div>';
                    }

                    if (is_array($this->session->userdata('breadcrumbs'))) {
                        echo '<ul class="breadcrumb">';
                        $breadcrumbs = $this->session->userdata('breadcrumbs');
                        $last = array_pop($breadcrumbs);
                        foreach ($breadcrumbs as $bd) {
                            echo '<li><a href="'.site_url($bd['link']).'">'.$bd['name'].'</a> <span class="divider">/</span></li>';
                        }
                        echo '<li class="active">'.$last['name'].'</li>';
                        echo '</ul>';
                    }

                    // on charge la vue demandée (juste du contenu)
                    $this->load->view($_view); // propage automatiquement les data
                ?>
            </div>
        </div>
    </div>
    <?php
        $this->load->view('_template/footer_view');
    ?>
</body>
</html>