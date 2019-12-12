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
    <?php
    if ($propiedades_filtro) { ?>
        <div class="row">
            <?php foreach ($propiedades_filtro->result() as $casa) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <?php
                        if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg')) { ?>
                        <img src="<?php echo base_url() . 'web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg' ?>"
                             class="card-img-top" alt="...">
                        <?php }else{ ?>
                            <img src="<?php echo base_url() ?>/ui/public/images/img-placeholder.png" class="card-img-top" alt="...">
                        <?php } ?>

                        <div class="card-body">
                            <div class="modo_propiedad">
                                <span class="badge badge-secondary"><?php echo $casa->modo_propiedad; ?></span>
                            </div>
                            <h5 class="card-title">
                                <div><?php echo $casa->tipo_propiedad; ?> </div>
                            </h5>
                            <div class="precio_propiedad_listado">
                                Q.<?php echo $casa->precio_propiedad; ?>
                            </div>
                            <p>
                                Zona <?php echo $casa->id_zona; ?>
                                | <?php echo id_departamento_a_nombre($casa->id_departamento); ?>
                            </p>
                            <p>
                                <a class="btn btn-info" href="<?php echo base_url().'Propiedades/ver/'.$casa->Id_propiedad?>">Ver Propiedad</a>
                            </p>

                        </div>
                    </div>
                    <?php //print_contenido($casa); ?>
                </div>


            <?php } ?>
        </div>
    <?php }else{  ?>
        <div class="alert alert-warning" role="alert">
            Ninguna propiedad concide con su busqueda. Por favor intente de nuevo <a href="<?php echo base_url(); ?>Busqueda/" class="alert-link">Buscar</a>
        </div>
    <?php } ?>
</div>


<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<?php $this->stop() ?>

