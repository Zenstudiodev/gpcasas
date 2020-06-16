<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 2/12/2019
 * Time: 16:34
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master', array(
    'sin_banner' => $sin_banner,
));
if ($propiedad) {
    $propiedad = $propiedad->row();
}
?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<?php if ($propiedad) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>
                    <?php echo $propiedad->titulo_propiedad; ?>
                </h2>
            </div>
            <div class="col">
                <?php echo $propiedad->moneda_propiedad; ?> <?php echo $propiedad->precio_propiedad; ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <?php
                $imagenes_propiedad = get_imgenes_propiedad_public($propiedad->Id_propiedad);
                ?>
                <?php if ($imagenes_propiedad) { ?>
                    <?php
                    $start_banner = 0;
                    foreach ($imagenes_producto->result() as $imagen) { ?>
                        <a href="<?php echo base_url() . '/web/propiedades_pic/' . $imagen->nombre_imagen; ?>"
                           data-lightbox="<?php echo 'prod_' . $propiedad->Id_propiedad; ?>"
                           data-title="<?php echo $propiedad->titulo_propiedad; ?>">
                            <img class=" img_producto img-fluid <?php if ($start_banner >= 1) {
                                echo 'thumb';
                            } ?>"
                                 src="<?php echo base_url() . 'uploads/imagenes_productos/' . $imagen->nombre_imagen; ?>"
                                 alt="<?php echo $producto->nombre_producto; ?>">
                        </a>
                        <?php $start_banner++ ?>
                    <?php } ?>

                <?php } else { ?>
                    <img class="card-img-top img-responsive" src="/ui/public/images/logo.png"
                         alt="Card image cap">
                <?php } ?>



                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $propiedad->Id_propiedad . ' (1).jpg')) { ?>
                            <div class="carousel-item active">
                                <img src="<?php echo base_url() . 'web/propiedades_pic/' . $propiedad->Id_propiedad . ' (1).jpg' ?>"
                                     id="img_1_placeholder" class="d-block w-100">
                            </div>
                        <?php } else { ?>
                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/1.jpg"
                                 id="img_1_placeholder">
                        <?php } ?>
                        <?php
                        if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $propiedad->Id_propiedad . ' (2).jpg')) { ?>
                            <div class="carousel-item ">
                                <img src="<?php echo base_url() . 'web/propiedades_pic/' . $propiedad->Id_propiedad . ' (2).jpg' ?>"
                                     id="img_1_placeholder" class="d-block w-100">
                            </div>
                        <?php } else { ?>
                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/1.jpg"
                                 id="img_1_placeholder">
                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-bed"></i> Cuartos <span class="badge badge-light  badge-pill"><?php echo $propiedad->habitaciones_propiedad; ?></span></li>
                    <li class="list-group-item"><i class="fas fa-toilet"></i> Baños <?php echo $propiedad->baños_completos_propiedad; ?></li>
                    <li class="list-group-item"><i class="fas fa-parking"></i> Parqueo <?php echo $propiedad->garage_propiedad; ?></li>
                    <li class="list-group-item"><i class="fas fa-ruler-combined"></i>  <?php echo $propiedad->tamaño_terreno_propiedad; ?> <?php echo $propiedad->tipo_medida_propiedad; ?></li>
                    <li class="list-group-item"><i class="fas fa-hotel"></i> Niveles <?php echo $propiedad->niveles_porpiedad; ?></li>
                    <li class="list-group-item"><i class="fas fa-couch"></i> Sala <?php echo $propiedad->sala_propiedad; ?></li>
                    <li class="list-group-item"><i class="fas fa-utensils"></i> Comedor <?php echo $propiedad->sala_propiedad; ?></li>
                    <li class="list-group-item"><i class="fas fa-tshirt"></i> Lavanderia <?php echo $propiedad->comedor_propiedad; ?></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datos de contacto</h5>
                        <p>Correo de contacto: <?php echo $propiedad->correo_contacto; ?></p>
                        <p>Teléfono: <a href="tel:+50251677220">5167 7220</a> </p>

                    </div>
                </div>

                <?php //print_contenido($propiedad); ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Esa propiedad no se encuentra disponible!</h4>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<?php $this->stop() ?>

