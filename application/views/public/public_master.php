<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 13/09/2019
 * Time: 5:25 PM
 */

$CI =& get_instance();

if ($CI->ion_auth->logged_in()) {
    //echo'logeado';
    $user_id = $CI->ion_auth->get_user_id();
    $user_data = $CI->User_model->get_user_by_id($user_id);
    $user_data = $user_data->row();
} else {
    // echo'no logeado';
}


?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#dcdcdc">
    <link rel="manifest" href="/manifest.webmanifest">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/public/css/style.css">
    <?php echo $this->section('css_p') ?>
    <title>GP CASAS</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZFRL5LG9ZK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-ZFRL5LG9ZK');
    </script>
</head>
<body>
<header>

    <div id="top_header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="d-block d-sm-none col-2 ">
                    <a id="movil_menu_open">
                        menu
                        <i class="fas fa-bars"></i>
                    </a>
                    <a id="movil_menu_close">
                        <i class="fas fa-times"></i>
                    </a>
                </div>

                <div class="col-8 col-md-2">
                    <a href="<?php echo base_url() ?>">
                        <img src="<?php echo base_url() ?>ui/public/images/logo.png" class="img-fluid">
                    </a>
                </div>
                <div class="d-none d-sm-block col-md-7 text-center">
                    <span id="top_titulo">www.gpcasas.net</span>
                </div>
                <div class="col-12 col-md-3">
                    <?php
                    if ($CI->ion_auth->logged_in()) { ?>
                        <p>
                            Bienvenido <?php echo $user_data->first_name; ?>
                        </p>
                        <p>
                            <a class="top_boton" href="<?php echo base_url() ?>User/perfil">Perfil <i
                                        class="fas fa-sign-in-alt"></i></a>
                            <a class="top_boton" href="<?php echo base_url() ?>auth/logout">Cerrar <i
                                        class="fas fa-sign-in-alt"></i></a>
                            <?php
                            if ($CI->ion_auth->is_admin()) { ?>
                                <a class="top_boton" href="<?php echo base_url() ?>Admin">Admin panel <i
                                            class="fas fa-sign-in-alt"></i></a>
                            <?php } ?>
                        </p>
                    <?php } else { ?>
                        <a class="top_boton" href="<?php echo base_url() ?>User/login">Ingresar <i
                                    class="fas fa-sign-in-alt"></i></a>
                        <a class="top_boton" href="<?php echo base_url() ?>User/registro">Registrarse <i
                                    class="fas fa-user-plus"></i></a>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</header>
<?php
if (!isset($sin_banner)) {
    ?>
    <hr>    
    <section id="menu_banner_top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <ul id="top_menu">
                        <li><a href="<?php echo base_url() ?>User/seleccionar_plan">Anuncia tu propiedad</a></li>
                        <li><a>Anuncia tu accesorio</a></li>
                        <li><a>Reglamento</a></li>
                        <li><a href="<?php echo base_url() ?>home/contacto">Contactanos</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div id="banner_container">
                        <?php if (isset($header_banners)) { ?>
                            <div id="header_banners" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">

                                    <?php
                                    $start_banner = 0;
                                    foreach ($header_banners->result() as $banner) { ?>


                                        <div class="item <?php if ($start_banner < 1) {
                                            echo 'active';
                                        } ?> ">
                                            <a href="<?php echo $banner->link_bh ?>"
                                               banner_id="<?php echo $banner->id_bh; ?>">
                                                <img src="<?php echo base_url() .'ui/public/images/banners/'. $banner->imagen_bh.'.jpg'; ?>" class="img-fluid">
                                            </a>
                                        </div>

                                        <?php $start_banner++ ?>


                                    <?php } ?>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#header_banners" role="button"
                                   data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#header_banners" role="button"
                                   data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>


                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


<section id="main_content">

</section>

<!-- Content Wrapper. Contains page content -->
<?php echo $this->section('page_content') ?>
<!-- /.content-wrapper -->
<footer>
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-6 col-md-2">
                <img src="<?php echo base_url() ?>ui/public/images/logo.png" class="img-fluid">
            </div>
            <div class=" col-md-2"></div>
            <div class="col-6 col-md-5">
                <ul class="footer_list">
                    <li><a>Quienes somos</a></li>
                    <li><a  href="<?php echo base_url() ?>Home/credito">Creditos Bancarios</a></li>
                    <li><a href="<?php echo base_url() ?>Home/seguros/">Serguro para vivienda</a></li>
                    <li><a  href="<?php echo base_url() ?>User/seleccionar_plan">Anunciate</a></li>
                    <li><a href="<?php echo base_url() ?>Home/contacto">Contactenos</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3">
                <ul class="footer_list">
                    <li><a href="https://www.facebook.com/gpcasas.net" target="_blank"><i class="fab fa-facebook-square"></i> gpcasas_net</a> </li>
                    <li><a href="https://www.instagram.com/gpcasas_net/" target="_blank"><i class="fab fa-instagram"></i> gpcasas_net</a> </li>
                    <li><i class="fab fa-whatsapp"></i> <a href="https://wa.me/50256496977">5649-6977 </a></li>
                    <li><i class="fa fa-phone-square"></i> <a href="tel:+50222945656">2294-5656 </a></li>
                    <li><i class="fas fa-envelope"></i> info@gpcasas.net</li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/90b8541e9b.js"  crossorigin="anonymous" ></script>


<?php echo $this->section('js_p') ?>

<script src="//code.jivosite.com/widget/nP33H9KoDL" async></script>

<script>
    //service
    // CODELAB: Register service worker.
    /*if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/service-worker.js')
                .then((reg) => {
                    console.log('Service worker registered.', reg);
                });
        });
    }*/
</script>

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
<script>
    // Check that service workers are supported
    if ('serviceWorker' in navigator) {
        // Use the window load event to keep the page load performant
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/gpcasas_sw.js');
        });
    }

</script>
</body>
</html>