<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 29/11/2019
 * Time: 13:24
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master', array(
    'sin_banner' => $sin_banner,
));
$CI =& get_instance();
?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Resultado de la busqueda</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>presupuesto</h3>
            <p>Q. <?php echo $presupuesto_q; ?> - $ <?php echo $presupuesto_d; ?></p>
            <p></p>
        </div>
    </div>

    <?php
    if ($propiedades_filtro) { ?>
        <div class="row">
            <?php foreach ($propiedades_filtro->result() as $casa) {
                //obtenemos imagenes de la propiedad
                $imagenes_propiedad = get_imgenes_propiedad_public($casa->Id_propiedad);
                ?>
                <?php if ($smoneda == 'd') { ?>
                    <?php if ($casa->moneda_propiedad == '$' && $casa->precio_propiedad <= $presupuesto_d) { ?>
                        <div class="col-md-4 filtro_card">
                            <div class="card">
                                <?php if ($imagenes_propiedad) { ?>
                                    <div class="card animated  zoomIn ">
                                        <div id="carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                             class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php
                                                $start_banner = 0;
                                                foreach ($imagenes_propiedad->result() as $imagen) { ?>
                                                    <div class="carousel-item item_list_r_filtro <?php if ($start_banner < 1) {
                                                        echo 'active';
                                                    } ?>">
                                                        <img class="card-img-top"
                                                             src="<?php echo base_url() . 'web/propiedades_pic/' . $imagen->nombre_imagen; ?>"
                                                             alt="<?php echo $casa->Id_propiedad; ?>">
                                                    </div>
                                                    <?php $start_banner++ ?>
                                                <?php } ?>
                                            </div>
                                            <a class="carousel-control-prev"
                                               href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                               role="button"
                                               data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next"
                                               href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                               role="button"
                                               data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png"
                                         class="card-img-top" alt="...">
                                <?php } ?>

                                <?php
                                /*
                                if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg')) { ?>
                                <img src="<?php echo base_url() . 'web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg' ?>"
                                     class="card-img-top" alt="...">
                                <?php }else{ ?>
                                    <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png" class="card-img-top" alt="...">
                                <?php } */ ?>

                                <div class="card-body">
                                    <div class="modo_propiedad">
                                        <span class="badge badge-secondary"><?php echo $casa->modo_propiedad; ?></span>
                                    </div>
                                    <h5 class="card-title">
                                        <div><?php echo $casa->tipo_propiedad; ?> </div>
                                    </h5>
                                    <div class="precio_propiedad_listado">
                                        <?php echo $casa->moneda_propiedad; ?><span class="precio_propiedad"><?php echo $casa->precio_propiedad; ?></span>


                                    </div>
                                    <p>
                                        Zona <?php echo $casa->id_zona; ?> <br>
                                        <?php echo id_departamento_a_nombre($casa->id_departamento); ?> | <?php echo id_municipio_a_nombre($casa->id_municipio); ?>
                                    </p>
                                    <p>
                                        <a class="btn btn-info"
                                           href="<?php echo base_url() . 'Propiedades/ver/' . $casa->Id_propiedad ?>">Ver
                                            Propiedad</a>
                                    </p>

                                </div>
                            </div>
                            <?php //print_contenido($casa); ?>
                        </div>
                    <?php } else {} ?>
                    <?php if ($casa->moneda_propiedad == 'Q' && $casa->precio_propiedad <= $presupuesto_q) { ?>
                        <div class="col-md-4 filtro_card">
                            <div class="card">

                                <?php if ($imagenes_propiedad) { ?>
                                    <div class="card animated  zoomIn ">


                                        <div id="carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                             class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php
                                                $start_banner = 0;
                                                foreach ($imagenes_propiedad->result() as $imagen) { ?>
                                                    <div class="carousel-item item_list_r_filtro <?php if ($start_banner < 1) {
                                                        echo 'active';
                                                    } ?>">
                                                        <img class="card-img-top"
                                                             src="<?php echo base_url() . 'web/propiedades_pic/' . $imagen->nombre_imagen; ?>"
                                                             alt="<?php echo $casa->Id_propiedad; ?>">
                                                    </div>
                                                    <?php $start_banner++ ?>
                                                <?php } ?>
                                            </div>
                                            <a class="carousel-control-prev"
                                               href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                               role="button"
                                               data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next"
                                               href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                               role="button"
                                               data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>

                                    </div>
                                <?php } else { ?>
                                    <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png"
                                         class="card-img-top" alt="...">
                                <?php } ?>




                                <?php
                                /*
                                if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg')) { ?>
                                <img src="<?php echo base_url() . 'web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg' ?>"
                                     class="card-img-top" alt="...">
                                <?php }else{ ?>
                                    <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png" class="card-img-top" alt="...">
                                <?php } */ ?>

                                <div class="card-body">
                                    <div class="modo_propiedad">
                                        <span class="badge badge-secondary"><?php echo $casa->modo_propiedad; ?></span>
                                    </div>
                                    <h5 class="card-title">
                                        <div><?php echo $casa->tipo_propiedad; ?> </div>
                                    </h5>
                                    <div class="precio_propiedad_listado">
                                        <?php echo $casa->moneda_propiedad; ?><span class="precio_propiedad"><?php echo $casa->precio_propiedad; ?></span>
                                    </div>
                                    <p>
                                        Zona <?php echo $casa->id_zona; ?> <br>
                                        <?php echo id_departamento_a_nombre($casa->id_departamento); ?> | <?php echo id_municipio_a_nombre($casa->id_municipio); ?>
                                    </p>
                                    <p>
                                        <a class="btn btn-info"
                                           href="<?php echo base_url() . 'Propiedades/ver/' . $casa->Id_propiedad ?>">Ver
                                            Propiedad</a>
                                    </p>

                                </div>
                            </div>
                            <?php //print_contenido($casa); ?>
                        </div>
                    <?php } else {} ?>
                <?php } else {} ?>
                 <?php if ($smoneda == 'Q') { ?>
                    <?php if ($casa->moneda_propiedad == '$' && $casa->precio_propiedad <= $presupuesto_d) { ?>

                        <div class="col-md-4 filtro_card">
                           <!-- <?php /*echo ($casa->moneda_propiedad)  */?>
                            <?php /*echo ($casa->precio_propiedad ) */?>
                            --><?php /*echo ($presupuesto_d)  */?>
                            <div class="card">

                                <?php if ($imagenes_propiedad) { ?>
                                    <div class="card animated  zoomIn ">


                                        <div id="carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                             class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php
                                                $start_banner = 0;
                                                foreach ($imagenes_propiedad->result() as $imagen) { ?>
                                                    <div class="carousel-item item_list_r_filtro <?php if ($start_banner < 1) {
                                                        echo 'active';
                                                    } ?>">
                                                        <img class="card-img-top"
                                                             src="<?php echo base_url() . 'web/propiedades_pic/' . $imagen->nombre_imagen; ?>"
                                                             alt="<?php echo $casa->Id_propiedad; ?>">
                                                    </div>
                                                    <?php $start_banner++ ?>
                                                <?php } ?>
                                            </div>
                                            <a class="carousel-control-prev"
                                               href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                               role="button"
                                               data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next"
                                               href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                               role="button"
                                               data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>

                                    </div>
                                <?php } else { ?>
                                    <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png"
                                         class="card-img-top" alt="...">
                                <?php } ?>




                                <?php
                                /*
                                if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg')) { ?>
                                <img src="<?php echo base_url() . 'web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg' ?>"
                                     class="card-img-top" alt="...">
                                <?php }else{ ?>
                                    <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png" class="card-img-top" alt="...">
                                <?php } */ ?>

                                <div class="card-body">
                                    <div class="modo_propiedad">
                                        <span class="badge badge-secondary"><?php echo $casa->modo_propiedad; ?></span>
                                    </div>
                                    <h5 class="card-title">
                                        <div><?php echo $casa->tipo_propiedad; ?> </div>
                                    </h5>
                                    <div class="precio_propiedad_listado">
                                        <?php echo $casa->moneda_propiedad; ?><span class="precio_propiedad"><?php echo $casa->precio_propiedad; ?></span>
                                    </div>
                                    <p>
                                        Zona <?php echo $casa->id_zona; ?> <br>
                                        <?php echo id_departamento_a_nombre($casa->id_departamento); ?> | <?php echo id_municipio_a_nombre($casa->id_municipio); ?>
                                    </p>
                                    <p>
                                        <a class="btn btn-info"
                                           href="<?php echo base_url() . 'Propiedades/ver/' . $casa->Id_propiedad ?>">Ver
                                            Propiedad</a>
                                    </p>

                                </div>
                            </div>
                            <?php //print_contenido($casa); ?>
                        </div>
                    <?php } else {} ?>
                    <?php if ($casa->moneda_propiedad == 'Q' && $casa->precio_propiedad <= $presupuesto_q) { ?>
                        <div class="col-md-4 filtro_card">
                            <div class="card">
                                <?php /*echo ($casa->moneda_propiedad)  */?><!--
                                <?php /*echo ($casa->precio_propiedad ) */?>
                                --><?php /*echo ($presupuesto_q)  */?>
                                <?php if ($imagenes_propiedad) { ?>
                                    <div class="card animated  zoomIn ">


                                        <div id="carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                             class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php
                                                $start_banner = 0;
                                                foreach ($imagenes_propiedad->result() as $imagen) { ?>
                                                    <div class="carousel-item item_list_r_filtro <?php if ($start_banner < 1) {
                                                        echo 'active';
                                                    } ?>">
                                                        <img class="card-img-top"
                                                             src="<?php echo base_url() . 'web/propiedades_pic/' . $imagen->nombre_imagen; ?>"
                                                             alt="<?php echo $casa->Id_propiedad; ?>">
                                                    </div>
                                                    <?php $start_banner++ ?>
                                                <?php } ?>
                                            </div>
                                            <a class="carousel-control-prev"
                                               href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                               role="button"
                                               data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next"
                                               href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                               role="button"
                                               data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>

                                    </div>
                                <?php } else { ?>
                                    <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png"
                                         class="card-img-top" alt="...">
                                <?php } ?>




                                <?php
                                /*
                                if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg')) { ?>
                                <img src="<?php echo base_url() . 'web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg' ?>"
                                     class="card-img-top" alt="...">
                                <?php }else{ ?>
                                    <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png" class="card-img-top" alt="...">
                                <?php } */ ?>

                                <div class="card-body">
                                    <div class="modo_propiedad">
                                        <span class="badge badge-secondary"><?php echo $casa->modo_propiedad; ?></span>
                                    </div>
                                    <h5 class="card-title">
                                        <div><?php echo $casa->tipo_propiedad; ?> </div>
                                    </h5>
                                    <div class="precio_propiedad_listado">
                                        <?php echo $casa->moneda_propiedad; ?><span class="precio_propiedad"><?php echo $casa->precio_propiedad; ?></span>
                                    </div>
                                    <p>
                                        Zona <?php echo $casa->id_zona; ?> <br>
                                        <?php echo id_departamento_a_nombre($casa->id_departamento); ?> | <?php echo id_municipio_a_nombre($casa->id_municipio); ?>
                                    </p>
                                    <p>
                                        <a class="btn btn-info"
                                           href="<?php echo base_url() . 'Propiedades/ver/' . $casa->Id_propiedad ?>">Ver
                                            Propiedad</a>
                                    </p>

                                </div>
                            </div>
                            <?php //print_contenido($casa); ?>
                        </div>
                    <?php } else {} ?>
                <?php } else {} ?>
                <?php if ($presupuesto == '0') { ?>
                    <div class="col-md-4 filtro_card">
                        <div class="card">

                            <?php if ($imagenes_propiedad) { ?>
                                <div class="card animated  zoomIn ">


                                    <div id="carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                         class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php
                                            $start_banner = 0;
                                            foreach ($imagenes_propiedad->result() as $imagen) { ?>
                                                <div class="carousel-item item_list_r_filtro <?php if ($start_banner < 1) {
                                                    echo 'active';
                                                } ?>">
                                                    <img class="card-img-top"
                                                         src="<?php echo base_url() . 'web/propiedades_pic/' . $imagen->nombre_imagen; ?>"
                                                         alt="<?php echo $casa->Id_propiedad; ?>">
                                                </div>
                                                <?php $start_banner++ ?>
                                            <?php } ?>
                                        </div>
                                        <a class="carousel-control-prev"
                                           href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                           role="button"
                                           data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next"
                                           href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                           role="button"
                                           data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                            <?php } else { ?>
                                <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png"
                                     class="card-img-top" alt="...">
                            <?php } ?>




                            <?php
                            /*
                            if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg')) { ?>
                            <img src="<?php echo base_url() . 'web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg' ?>"
                                 class="card-img-top" alt="...">
                            <?php }else{ ?>
                                <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png" class="card-img-top" alt="...">
                            <?php } */ ?>

                            <div class="card-body">
                                <div class="modo_propiedad">
                                    <span class="badge badge-secondary"><?php echo $casa->modo_propiedad; ?></span>
                                </div>
                                <h5 class="card-title">
                                    <div><?php echo $casa->tipo_propiedad; ?> </div>
                                </h5>
                                <div class="precio_propiedad_listado">
                                    <?php echo $casa->moneda_propiedad; ?><span class="precio_propiedad"><?php echo $casa->precio_propiedad; ?></span>
                                </div>
                                <p>
                                    Zona <?php echo $casa->id_zona; ?> <br>
                                    <?php echo id_departamento_a_nombre($casa->id_departamento); ?> | <?php echo id_municipio_a_nombre($casa->id_municipio); ?>
                                </p>
                                <p>
                                    <a class="btn btn-info"
                                       href="<?php echo base_url() . 'Propiedades/ver/' . $casa->Id_propiedad ?>">Ver
                                        Propiedad</a>
                                </p>

                            </div>
                        </div>
                        <?php //print_contenido($casa); ?>
                    </div>
                <?php } else {} ?>





            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            Ninguna propiedad concide con su busqueda. Por favor intente de nuevo <a
                    href="<?php echo base_url(); ?>Busqueda/" class="alert-link">Buscar</a>
        </div>
    <?php } ?>
</div>


<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script src="<?php echo base_url(); ?>/ui/vendor/numeral/numeral.min.js"></script>
<script>
    $( document ).ready(function() {
        $('.precio_propiedad').each(function() {

            // console.log($(this).first().text());
            var string = numeral($(this).first().text()).format('0,0.00');
            console.log(string);
            $(this).html(string)

        });
    });
</script>
<?php $this->stop() ?>
