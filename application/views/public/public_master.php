<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 13/09/2019
 * Time: 5:25 PM
 */
?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>ui/public/css/style.css">
    <?php echo $this->section('css_p') ?>
    <title>GP CASAS</title>
</head>
<body>
<header>
    <div id="top_header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="d-block d-sm-none col-2 ">
                    <a id="movil_menu_open">
                        <i class="fas fa-bars"></i>
                    </a>
                    <a id="movil_menu_close">
                        <i class="fas fa-times"></i>
                    </a>
                </div>

                <div class="col-6 col-md-2">
                    <img src="<?php echo base_url()?>ui/public/images/logo.png" class="img-fluid">
                </div>
                <div class="d-none d-sm-block col-md-7 text-center">
                    <span id="top_titulo" >www.gpcasas.net</span>
                </div>
                <div class="col-4 col-md-3">
                    <a class="top_boton">Ingresar <i class="fas fa-sign-in-alt"></i></a>
                    <a class="top_boton">Registrarse <i class="fas fa-user-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
<section id="menu_banner_top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <ul id="top_menu">
                    <li><a>Anuncia tu propiedad</a></li>
                    <li><a>Anuncia tu accesorio</a></li>
                    <li><a>Reglamento</a></li>
                    <li><a>Contactanos</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div id="banner_container">
                    <img src="<?php echo base_url()?>ui/public/images/banner.jpg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="main_content">

</section>

<!-- Content Wrapper. Contains page content -->
<?php echo $this->section('page_content') ?>
<!-- /.content-wrapper -->
<footer>
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-6 col-md-2">
                <img src="<?php echo base_url()?>ui/public/images/logo.png" class="img-fluid">
            </div>
            <div class=" col-md-2"></div>
            <div class="col-6 col-md-5">
                <ul>
                    <li><a>Quienes somos</a></li>
                    <li><a>Creditos Bancarios</a></li>
                    <li><a>Serguro para vivianda</a></li>
                    <li><a>Anunciate</a></li>
                    <li><a>Contactenos</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3">
                <ul>
                    <li><i class="fab fa-facebook-square"></i> gpcasas_net</li>
                    <li><i class="fab fa-instagram"></i> gpcasas_net</li>
                    <li><i class="fab fa-whatsapp"></i> 34045515</li>
                    <li><i class="fas fa-envelope"></i> info@gpcasas.net</li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/90b8541e9b.js"></script>
<?php echo $this->section('js_p') ?>

<script>
    $("#movil_menu_open").click(function () {
        $("#top_menu").addClass('movil_menu_display');
        $("#movil_menu_close").addClass('movil_menu_close_display');
        $("#movil_menu_open").addClass('movil_menu_open_hide');
    });
    $("#movil_menu_close").click(function () {
        $("#top_menu").removeClass('movil_menu_display');
        $("#movil_menu_close").removeClass('movil_menu_close_display');
        $("#movil_menu_open").removeClass('movil_menu_open_hide');
    });
</script>
</body>
</html>