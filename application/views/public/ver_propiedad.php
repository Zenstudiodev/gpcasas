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
<link rel="stylesheet" href="<?php echo base_url() ?>/ui/vendor/lightbox2/css/lightbox.min.css">
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
                <?php echo $propiedad->moneda_propiedad; ?><?php echo $propiedad->precio_propiedad; ?>
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
                    foreach ($imagenes_propiedad->result() as $imagen) {

                        $wrapper_class ="img_wreapper";
                        $img_class = "";
                        if ($start_banner >= 1) {
                            $img_class = 'thumb';
                            $wrapper_class ="thumb_img_wreapper";
                        }


                        ?>


                        <div class=" <?php echo $wrapper_class; ?>">
                            <a href="<?php echo base_url() . '/web/propiedades_pic/' . $imagen->nombre_imagen; ?>"
                               data-lightbox="<?php echo 'prod_' . $propiedad->Id_propiedad; ?>"
                               data-title="<?php echo $propiedad->titulo_propiedad; ?>">
                                <img class=" img_producto img-fluid <?php echo $img_class; ?>"
                                     src="<?php echo base_url() . '/web/propiedades_pic/' . $imagen->nombre_imagen; ?>"
                                     alt="<?php echo $propiedad->titulo_propiedad; ?>">
                            </a>
                        </div>

                        <?php $start_banner++ ?>
                    <?php } ?>

                <?php } else { ?>
                    <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png"
                         class="card-img-top" alt="...">
                <?php } ?>



            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-bed"></i> Cuartos <span
                                class="badge badge-light  badge-pill"><?php echo $propiedad->habitaciones_propiedad; ?></span>
                    </li>
                    <li class="list-group-item"><i class="fas fa-toilet"></i>
                        Baños <?php echo $propiedad->baños_completos_propiedad; ?></li>
                    <li class="list-group-item"><i class="fas fa-parking"></i>
                        Parqueo <?php echo $propiedad->garage_propiedad; ?></li>
                    <li class="list-group-item"><i
                                class="fas fa-ruler-combined"></i> <?php echo $propiedad->tamaño_terreno_propiedad; ?> <?php echo $propiedad->tipo_medida_propiedad; ?>
                    </li>
                    <li class="list-group-item"><i class="fas fa-hotel"></i>
                        Niveles <?php echo $propiedad->niveles_porpiedad; ?></li>
                    <li class="list-group-item"><i class="fas fa-couch"></i>
                        Sala <?php echo $propiedad->sala_propiedad; ?></li>
                    <li class="list-group-item"><i class="fas fa-utensils"></i>
                        Comedor <?php echo $propiedad->sala_propiedad; ?></li>
                    <li class="list-group-item"><i class="fas fa-tshirt"></i>
                        Lavanderia <?php echo $propiedad->comedor_propiedad; ?></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datos adicionales </h5>
                        <p><?php echo $propiedad->comentario_propiedad; ?></p>
                    </div>
                </div>

                <?php //print_contenido($propiedad); ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datos de contacto</h5>
                        <p>Correo de contacto: Info@gpcasas.net</p>
                        <p>Teléfono: <a href="tel:+50251677220">5167 7220</a></p>

                    </div>
                </div>

                <?php //print_contenido($propiedad); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <p>
                    <?php
                    $ref_volver = '';
                    $url_actual = rtrim(base_url(), "/") . $_SERVER['REQUEST_URI'];


                    $url_ref = '';
                    $url_ref_set = false;
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $url_ref = $_SERVER['HTTP_REFERER'];
                        $url_ref_set = true;
                    }

                    if ($url_ref == base_url()) {
                        $ref_volver = base_url();
                    } elseif ($url_ref == $url_actual) {
                        $ref_volver = base_url();

                    } else if ($url_ref_set) {
                        $ref_volver = $_SERVER['HTTP_REFERER'] . '?card=' . $propiedad->Id_propiedad . '_card#' . $propiedad->Id_propiedad . '_card';
                    } else {
                        $ref_volver = base_url();
                    } ?>

                    <a class="btn btn-primary" href="<?php echo $ref_volver ?>">Volver</a>
                </p>
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
<script src="<?php echo base_url(); ?>/ui/vendor/lightbox2/js/lightbox-plus-jquery.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'showImageNumberLabel': false,
        'wrapAround': true,
    });</script>
<?php $this->stop() ?>

