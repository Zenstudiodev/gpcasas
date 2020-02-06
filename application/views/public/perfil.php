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
$user =$user->row();


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
        <div class="input-field col s12 center">
            <h2>Perfil</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <img src="<?php echo base_url()?>/ui/public/images/user.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $user->first_name; ?></h5>

                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-primary" href="<?php echo base_url()?>user/subir_propiedad">Agregar una propiedad</a>
                </div>
            </div>
            <hr>
            <h2>Propiedades</h2>
            <?php
            if($casa_propias){ ?>
                <div class="row">
                <?php  foreach ($casa_propias->result() as $casa) {  ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="<?php echo base_url().'web/propiedades_pic/' . $casa->Id_propiedad . ' (1).jpg' ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="modo_propiedad">
                                    <span class="badge badge-secondary"><?php echo $casa->modo_propiedad; ?></span>
                                </div>
                                <h5 class="card-title"><div ><?php echo $casa->tipo_propiedad; ?> </div></h5>
                                <div class="precio_propiedad_listado">
                                   Q.<?php echo $casa->precio_propiedad; ?>
                                </div>
                                    Zona <?php echo $casa->id_zona; ?> | <?php echo id_departamento_a_nombre($casa->id_departamento); ?>
                            </div>
                        </div>
                        <?php //print_contenido($casa); ?>
                    </div>


                <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>


    <?php //print_contenido($user)?>
</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>

<?php $this->stop() ?>
