<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 20/11/2019
 * Time: 21:23
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master', array(
    'sin_banner' => $sin_banner,
));
$CI =& get_instance();
$user = $user->row();


?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="container">
    <?php if (isset($message)) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $message; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="row">
        <div class="input-field col  center">
            <h2>Perfil</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-primary" href="<?php echo base_url() ?>User/seleccionar_plan">Agregar una propiedad</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card">
                <img src="<?php echo base_url() ?>/ui/public/images/user.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $user->first_name; ?></h5>

                </div>
            </div>
            <hr>
        </div>
        <div class="col-12 col-md-9 ">

            <h2>Propiedades</h2>
            <div id="casas_perfil">
                <?php
                if ($casa_propias) { ?>
                    <div class="row">
                        <?php foreach ($casa_propias->result() as $casa) {
                            //obtenemos imagenes de la propiedad
                            $imagenes_propiedad = get_imgenes_propiedad_public($casa->Id_propiedad);
                            ?>

                            <?php if ($casa->estado_propiedad == 'pendiente') { ?>
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
                                                            <div class="carousel-item <?php if ($start_banner < 1) {
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
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next"
                                                       href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                                       role="button"
                                                       data-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>

                                            </div>
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png"
                                                 class="card-img-top" alt="...">
                                        <?php } ?>
                                        <div class="card-body">
                                            <div class="modo_propiedad">
                                                <span class="badge badge-secondary"><?php echo $casa->modo_propiedad; ?></span>
                                                <span class="badge badge-primary">Estado: <?php echo $casa->estado_propiedad; ?></span>
                                            </div>
                                            <h5 class="card-title">
                                                <div><?php echo $casa->tipo_propiedad; ?> </div>
                                            </h5>
                                            <div class="precio_propiedad_listado">
                                                Q.<?php echo $casa->precio_propiedad; ?>
                                            </div>
                                            Zona <?php echo $casa->id_zona; ?>
                                            | <?php echo id_departamento_a_nombre($casa->id_departamento); ?>
                                        </div>
                                        <div class="card-footer">

                                            <a class="btn btn-warning"
                                               href="<?php echo base_url() . 'User/subir_propiedad_t/' . $casa->Id_propiedad ?>">Seguir
                                                llenando datos</a>
                                        </div>
                                    </div>
                                    <?php //print_contenido($casa); ?>
                                </div>
                            <?php } ?>

                        <?php } ?>
                    </div>
                    <div class="row">
                        <?php foreach ($casa_propias->result() as $casa) {
                            //obtenemos imagenes de la propiedad
                            $imagenes_propiedad = get_imgenes_propiedad_public($casa->Id_propiedad);
                            ?>

                            <?php if ($casa->estado_propiedad == 'alta') { ?>
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
                                                            <div class="carousel-item <?php if ($start_banner < 1) {
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
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next"
                                                       href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                                       role="button"
                                                       data-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>

                                            </div>
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png"
                                                 class="card-img-top" alt="...">
                                        <?php } ?>
                                        <div class="card-body">
                                            <div class="modo_propiedad">
                                                <span class="badge badge-secondary"><?php echo $casa->modo_propiedad; ?></span>
                                                <span class="badge badge-primary">Estado: <?php echo $casa->estado_propiedad; ?></span>
                                            </div>
                                            <h5 class="card-title">
                                                <div><?php echo $casa->tipo_propiedad; ?> </div>
                                            </h5>
                                            <div class="precio_propiedad_listado">
                                                Q.<?php echo $casa->precio_propiedad; ?>
                                            </div>
                                            Zona <?php echo $casa->id_zona; ?>
                                            | <?php echo id_departamento_a_nombre($casa->id_departamento); ?>
                                        </div>
                                        <div class="card-footer">

                                            <a class="btn btn-success"
                                               href="<?php echo base_url() . 'User/subir_propiedad_t/' . $casa->Id_propiedad ?>">Editar</a>
                                        </div>
                                    </div>
                                    <?php //print_contenido($casa); ?>
                                </div>
                            <?php } ?>

                        <?php } ?>
                    </div>
                    <div class="row">
                        <?php foreach ($casa_propias->result() as $casa) {
                            //obtenemos imagenes de la propiedad
                            $imagenes_propiedad = get_imgenes_propiedad_public($casa->Id_propiedad);
                            ?>

                            <?php if ($casa->estado_propiedad == 'baja') { ?>
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
                                                            <div class="carousel-item <?php if ($start_banner < 1) {
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
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next"
                                                       href="#carrusel_producto_<?php echo $casa->Id_propiedad; ?>"
                                                       role="button"
                                                       data-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>

                                            </div>
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png"
                                                 class="card-img-top" alt="...">
                                        <?php } ?>
                                        <div class="card-body">
                                            <div class="modo_propiedad">
                                                <span class="badge badge-secondary"><?php echo $casa->modo_propiedad; ?></span>
                                                <span class="badge badge-primary">Estado: <?php echo $casa->estado_propiedad; ?></span>
                                            </div>
                                            <h5 class="card-title">
                                                <div><?php echo $casa->tipo_propiedad; ?> </div>
                                            </h5>
                                            <div class="precio_propiedad_listado">
                                                Q.<?php echo $casa->precio_propiedad; ?>
                                            </div>
                                            Zona <?php echo $casa->id_zona; ?>
                                            | <?php echo id_departamento_a_nombre($casa->id_departamento); ?>
                                        </div>
                                        <div class="card-footer">

                                            <a class="btn btn-success"
                                               href="<?php echo base_url() . 'Usubir_propiedad_t/' . $casa->Id_propiedad ?>">Editar</a>
                                        </div>
                                    </div>
                                    <?php //print_contenido($casa); ?>
                                </div>
                            <?php } ?>


                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>


    <?php //print_contenido($user)?>
</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>

<?php $this->stop() ?>
