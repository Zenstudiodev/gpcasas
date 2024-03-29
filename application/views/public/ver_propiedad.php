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

$nombre_input = array(
    'type' => 'text',
    'name' => 'nombre',
    'id' => 'nombre',
    'class' => ' browser-default form-control',
    'required' => 'required',
);
$telefono_input = array(
    'type' => 'tel',
    'name' => 'telefono',
    'id' => 'telefono',
    'class' => ' browser-default form-control',
    'required' => 'required',
);
$correo_input = array(
    'type' => 'email',
    'name' => 'email',
    'id' => 'email',
    'class' => ' browser-default form-control',
    'required' => 'required',
);
$mensaje_informacion = array(
    'type' => 'text',
    'name' => 'mensaje_informacion',
    'id' => 'mensaje_informacion',
    'class' => ' browser-default form-control',
    'required' => 'required',
    'value'=>'Quisiera información de la propiedad código: '. $propiedad->Id_propiedad,
);
?>
<?php
$imagenes_propiedad = get_imgenes_propiedad_public($propiedad->Id_propiedad);
?>
<?php $this->start('meta'); ?>
<meta property="og:url" content="<?php echo base_url().'Propiedades/ver/'.$propiedad->Id_propiedad; ?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $propiedad->Id_propiedad . ' ' . $propiedad->titulo_propiedad.' '.id_municipio_a_nombre($propiedad->id_municipio).' '.id_departamento_a_nombre($propiedad->id_departamento); ?>" />
<meta property="og:description" content="<?php echo$propiedad->comentario_propiedad; ?> " />
<?php
if($imagenes_propiedad){
    $og_imagen=$imagenes_propiedad->row();
   // print_contenido($og_imagen);
?>
    <meta property="og:image" content="<?php echo base_url() . '/web/propiedades_pic/' . $og_imagen->nombre_imagen; ?>" />
<?php
}
?>


<?php $this->stop() ?>

<?php $this->start('css_p'); ?>

<link rel="stylesheet" href="<?php echo base_url() ?>/ui/vendor/lightbox2/css/lightbox.min.css">


<title><?php
if ($propiedad) {
    echo $propiedad->Id_propiedad . ' ' . $propiedad->titulo_propiedad.' '.id_municipio_a_nombre($propiedad->id_municipio).' '.id_departamento_a_nombre($propiedad->id_departamento);
} else {
    echo 'Propiedad no disponible';
} ?> - GP CASAS Guatemala</title>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<?php if ($propiedad) { ?>
    <?php //print_contenido($propiedad); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php if (isset($mensaje)) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $mensaje ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Código de propiedad <span class="codigo_propiedad"><?php echo $propiedad->Id_propiedad; ?></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">

                <h2>
                    <?php echo $propiedad->titulo_propiedad; ?>
                </h2>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo $propiedad->direccion_propiedad; ?>
                    , <?php echo id_municipio_a_nombre($propiedad->id_municipio); ?>
                    , <?php echo id_departamento_a_nombre($propiedad->id_departamento); ?> </p>
                <p>
                    <?php if(isset($propiedad->tamaño_terreno_propiedad)){ ?>
                    <i class="fas fa-ruler-combined"></i> <span
                            class="badge badge-success"><?php echo $propiedad->tamaño_terreno_propiedad; ?> </span><?php echo $propiedad->tipo_medida_propiedad; ?>
                    <?php } ?>
                    <i class="fas fa-bed"></i> Cuartos <span
                            class="badge badge-success"><?php echo $propiedad->habitaciones_propiedad; ?></span>
                    <i class="fas fa-parking"></i> Parqueo <span
                            class="badge badge-success"><?php echo $propiedad->parqueo_propiedad; ?> </span>
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
        <!--<hr>
        <div class="row">
            <div class="col">
                <a class="btn btn-success" href="https://wa.me/50256496977?text=<?php /*echo urlencode('Quisiera información de la propiedad código: ' . $propiedad->Id_propiedad . ' Titulo: ' . $propiedad->titulo_propiedad . ' Zona: ' . $propiedad->direccion_propiedad); */?>" target="_blank"> <i class="fab fa-whatsapp"></i> Pedir información</a>

            </div>
        </div>-->
        <hr>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Pedir información</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() ?>home/enviar_correo_informacion" method="post">
                            <input type="hidden" name="propiedad_id" value="<?php echo $propiedad->Id_propiedad; ?>">
                            <input type="hidden" name="tipo_propiedad" value="<?php echo $propiedad->tipo_propiedad; ?>">
                            <input type="hidden" name="modo_propiedad" value="<?php echo $propiedad->modo_propiedad; ?>">
                            <div class="form-group col-md-12">
                                <label for="nombre">Nombre</label>
                                <div class="input-group mb-3">
                                    <?php echo form_input($nombre_input); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="telefono">Teléfono</label>
                                <div class="input-group mb-3">
                                    <?php echo form_input($telefono_input); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">Correo</label>
                                <div class="input-group mb-3">
                                    <?php echo form_input($correo_input); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="nombre">Información Solicitada</label>
                                <div class="input-group mb-3">
                                    <?php echo form_textarea($mensaje_informacion); ?>
                                </div>
                            </div>
                            <div id="html_element"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="solicitar_info" class="btn btn-primary">Enviar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">

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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datos de contacto</h5>
                        <?php if($propiedad->propiedad_asesor_id == 0){?>
                            <p>Correo de contacto: <?php echo $propiedad->correo_contacto; ?></p>
                            <p>Teléfono: <a href="tel:+502<?php echo $propiedad->telefono; ?>"><?php echo preg_replace('/\s+/', '', $propiedad->telefono); ?></a></p>
                            <p><a href="https://wa.me/502<?php echo preg_replace('/\s+/', '', $propiedad->telefono); ?>?text=estoy interesado en la popiedad <?php echo $propiedad->Id_propiedad; ?> - <?php echo $propiedad->titulo_propiedad; ?>" class="btn btn-success" target="_blank"> <i class="fab fa-whatsapp" aria-hidden="true"></i> Solicitar información</a></p>
                            <a><a class="btn btn-info" href="#" data-toggle="modal" data-target="#staticBackdrop"> <i class="far fa-envelope"></i> Solicitar información por correo</a></a>
                        <?php }else{
                            $asesor = get_datos_asesor_by_id($propiedad->propiedad_asesor_id);
                            //print_contenido($asesor);

                            ?>
                            <p>Correo de contacto: <?php echo $asesor->email; ?></p>
                            <p>Teléfono: <a href="tel:+502<?php echo $asesor->phone; ?>"><?php echo $asesor->phone; ?></a></p>
                            <p><a href="https://wa.me/502<?php echo $asesor->phone; ?>?text=estoy interesado en la popiedad <?php echo $propiedad->Id_propiedad; ?> - <?php echo $propiedad->titulo_propiedad; ?>" class="btn btn-success" target="_blank"> <i class="fab fa-whatsapp" aria-hidden="true"></i> Solicitar información</a></p>
                            <a><a class="btn btn-info" href="#" data-toggle="modal" data-target="#staticBackdrop"> <i class="far fa-envelope"></i> Solicitar información por correo</a></a>
                        <?php } ?>
                        <?php //echo $propiedad->propiedad_asesor_id; ?>




                    </div>
                </div>

                <?php //print_contenido($propiedad); ?>
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
                        <?php //echo gettype($propiedad->habitaciones_propiedad); ?>
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
                    <?php if($propiedad->habitaciones_propiedad != 'incluye'){?>
                    <?php }else{?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-check-circle caracteristicas_propiedades"></i> Menaje</span>
                            <span class="badge badge-secondary "><?php echo $propiedad->menaje_propiedad; ?></span>
                        </li>
                    <?php  }?>
                    <?php if($propiedad->nombre_condominio_propiedad != null){?>
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

        <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>


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
                    <p>Busca otra propiedad</p>
                    <p><a class="btn btn-success" href="<?php echo base_url()?>Busqueda/index/">Buscar propiedad</a> </p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script src="<?php echo base_url(); ?>/ui/vendor/lightbox2/js/lightbox-plus-jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/vendor/numeral/numeral.min.js"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63c705902d119a79"></script>
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

<script type="text/javascript">
    var onloadCallback = function () {
        grecaptcha.render('html_element', {
            'sitekey': '6LdFJboZAAAAAImwK35wp6voSvlfso3EJfk9g4X-\n',
            'callback': correctCaptcha
        });
    };

</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>


<script type="text/javascript">
    var correctCaptcha = function (response) {
        //console.log(response);
        if (response == 0) {
            console.log(response);
        }
        else {
            console.log(response);
            $("#solicitar_info").show();
            document.getElementById('captcha').innerHTML = "Captcha completed";
            return true;
        }


    };
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#solicitar_info").hide();

    });
</script>
<?php $this->stop() ?>

