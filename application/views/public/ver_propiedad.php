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
    <?php //print_contenido($propiedad); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>
                    <?php echo $propiedad->titulo_propiedad; ?>
                </h2>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo $propiedad->direccion_propiedad; ?>
                    , <?php echo id_municipio_a_nombre($propiedad->id_municipio); ?>
                    , <?php echo id_departamento_a_nombre($propiedad->id_departamento); ?> </p>
                <p>
                    <i class="fas fa-ruler-combined"></i> <span
                            class="badge badge-success"><?php echo $propiedad->tamaño_terreno_propiedad; ?> </span><?php echo $propiedad->tipo_medida_propiedad; ?>
                    <i class="fas fa-bed"></i> Cuartos <span
                            class="badge badge-success"><?php echo $propiedad->habitaciones_propiedad; ?></span>
                    <i class="fas fa-parking"></i> Parqueo <span
                            class="badge badge-success"><?php echo $propiedad->garage_propiedad; ?> </span>
                    <i class="fas fa-toilet"></i> Baños <span
                            class="badge badge-success"><?php echo $propiedad->baños_completos_propiedad; ?></span>

                </p>
            </div>
            <div class="col">
                <h3 id="precio_propiedad_v"><?php echo $propiedad->moneda_propiedad; ?><span
                            id="precio_propiedad_h"><?php echo $propiedad->precio_propiedad; ?></span></h3>
                <p><span class="badge badge-info"><?php echo $propiedad->modo_propiedad; ?></span></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <?php
                $imagenes_propiedad = get_imgenes_propiedad_public($propiedad->Id_propiedad);
                ?>
                <?php if ($imagenes_propiedad) { ?>
                    <?php
                    $start_banner = 0;
                    foreach ($imagenes_propiedad->result() as $imagen) {

                        $wrapper_class = "img_wreapper";
                        $img_class = "";
                        if ($start_banner >= 1) {
                            $img_class = 'thumb';
                            $wrapper_class = "thumb_img_wreapper";
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
                            <i class="fa fa-search-plus img_zoom_icon" aria-hidden="true"></i>
                        </div>

                        <?php $start_banner++ ?>
                    <?php } ?>

                <?php } else { ?>
                    <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png"
                         class="card-img-top" alt="...">
                <?php } ?>


            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col">
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Descripción propiedad</h5>
                        <p><?php echo $propiedad->comentario_propiedad; ?></p>
                    </div>
                </div>

                <?php //print_contenido($propiedad); ?>
            </div>
        </div>
        <hr>
        <h3>Caracteristicas de propieda</h3>
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <?php if($propiedad->habitaciones_propiedad != '0'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Habitaciones </span>
                        <span class="badge badge-secondary "><?php echo $propiedad->habitaciones_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->baños_completos_propiedad != '0'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Baños completos </span>
                        <span class="badge badge-secondary "><?php echo $propiedad->baños_completos_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->baño_visita_propiedad != '0'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Baños de visita </span>
                        <span class="badge badge-secondary "><?php echo $propiedad->baño_visita_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->balcon_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Balcón</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->balcon_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->niveles_porpiedad != '0'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Niveles</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->niveles_porpiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->cocina_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Cocina</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->cocina_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->desayunador_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Desayunador</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->desayunador_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->lineablanca_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Linea Blanca</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->lineablanca_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->amueblada_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Amueblada</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->amueblada_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->cuarto_servicio_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Cuarto de servicio</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->cuarto_servicio_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->cuarto_seguridad_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Cuarto de seguridad</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->cuarto_seguridad_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->lavanderia_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Lavenderia</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->lavanderia_propiedad; ?></span>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <?php if($propiedad->gas_propano_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Gas propano</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->gas_propano_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->calentador_agua_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Calentador de agua</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->calentador_agua_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->garage_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> garage</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->garage_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->parqueo_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Parqueo</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->parqueo_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->parqueo_visitas_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Parqueo visitas</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->parqueo_visitas_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->seguridad_privada_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Seguridad privada</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->seguridad_privada_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->garita_control_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Garita de control</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->garita_control_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->sala_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Sala</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->sala_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->sala_reuniones_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Sala de reuniones</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->sala_reuniones_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->comedor_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Comedor </span>
                        <span class="badge badge-secondary "><?php echo $propiedad->comedor_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->gradas_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Gradas </span>
                        <span class="badge badge-secondary "><?php echo $propiedad->gradas_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->bodega_interior_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Bodega </span>
                        <span class="badge badge-secondary "><?php echo $propiedad->bodega_interior_propiedad; ?></span>
                    </li>
                    <?php }?>

                </ul>
            </div>
            <div class="col-md-4">

                <ul class="list-group">
                    <?php if($propiedad->pergola_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Pergola</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->pergola_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->habitaciones_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Menaje</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->menaje_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->nombre_condominio_propiedad != ' '){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Nombre condominio</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->nombre_condominio_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->sala_famiiar_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Sala familiar</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->sala_famiiar_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->sala_juegos_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Sala de juegos</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->sala_juegos_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->chimenea_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Chimenea</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->chimenea_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->piscina_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Piscina</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->piscina_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->agua_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Agua</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->agua_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->luz_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> luz</span>
                        <span class="badge badge-secondary "><?php echo $propiedad->luz_propiedad; ?></span>
                    </li>
                    <?php }?>
                    <?php if($propiedad->cable_internet_propiedad != 'no'){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Cable internet </span>
                        <span class="badge badge-secondary "><?php echo $propiedad->cable_internet_propiedad; ?></span>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <hr>

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
<script src="<?php echo base_url(); ?>/ui/vendor/numeral/numeral.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'showImageNumberLabel': false,
        'wrapAround': true,
        'fitImagesInViewport': true,
        'alwaysShowNavOnTouchDevices': true,
    });

    var string = numeral(<?php echo $propiedad->precio_propiedad; ?>).format('0,0.00');
    $("#precio_propiedad_h").html(string)
    // '1,000'
</script>
<?php $this->stop() ?>

