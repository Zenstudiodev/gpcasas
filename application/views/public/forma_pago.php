<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 16/04/2021
 * Time: 12:41
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master', array(
    'header_banners' => $header_banners,
    'sin_banner' => $sin_banner,
));


$direccion_pago = array(
    'type' => 'text',
    'name' => 'direccion_pago',
    'id' => 'direccion_pago',
    'class' => ' browser-default form-control',
    'placeholder' => ' Ingrese su dirección',
    'required' => 'required'
);
$fecha_de_pago = array(
    'type' => 'date',
    'name' => 'fecha_de_pago',
    'id' => 'fecha_de_pago',
    'class' => ' browser-default form-control',
    'placeholder' => 'Fecha de pago',
    'required' => 'required'
);
$hora_de_pago = array(
    'type' => 'time',
    'name' => 'hora_de_pago',
    'id' => 'hora_de_pago',
    'class' => ' browser-default form-control',
    'placeholder' => 'Hora de pago',
    'required' => 'required'
);

?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>

<div class="container">
    <?php if (isset($error)) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $error; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>


    <div class="row">
        <div class="col">
            <img src="<?php echo base_url()?>ui/public/images/forma_pago.jpg" class="img-fluid">
            <h2>Datos para recoger el pago</h2>
            <form name="seleccion_anuncio" id="seleccion_anuncio" method="post" action="<?php echo base_url().'User/guardar_forma_pago';?>">

                <hr>

                <div class="form-row  justify-content-md-center">

                    <div class="form-group col-md-8">
                        <label for="direccion_pago">Dirección de pago</label>
                        <?php echo form_input($direccion_pago); ?>
                    </div>

                </div>
                <div class="form-row justify-content-md-center">

                    <div class="form-group col-md-4">
                        <label for="fecha_de_pago">Fecha de pago</label>
                        <?php echo form_input($fecha_de_pago); ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="hora_de_pago">Hora de pago</label>
                        <?php echo form_input($hora_de_pago); ?>
                    </div>

                </div>
                <div class="form-row  justify-content-md-center">

                    <div class="form-group col-md-8">
                        <input type="hidden" name="plan_anuncio" id="plan_anuncio" value="<?php echo $plan_anuncio; ?>">
                        <input type="hidden" name="monto_pago" id="monto_pago" value="<?php echo $monto_pago; ?>">
                        <input type="hidden" name="pauta_fb_pago" id="pauta_fb_pago" value="<?php echo $pauta_fb_pago; ?>">
                        <input type="hidden" name="manta_pago" id="manta_pago" value="<?php echo $manta_pago; ?>">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script>

</script>
<?php $this->stop() ?>
