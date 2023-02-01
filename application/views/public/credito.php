<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 26/11/2019
 * Time: 08:52
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master',
    array(
		'sin_banner' => $sin_banner,
    ));

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
    'max-value' => '8',
    'min-value' => '8',
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
$precio_propiedad_input = array(
    'type' => 'number',
    'name' => 'precio_propiedad',
    'id' => 'precio_propiedad',
	'min-value' => '0',
    'class' => ' browser-default form-control',
    'required' => 'required',
);
?>


<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>

    <div id="contacto_form">
        <div class="container">
            <div class="row justify-content-md-center">
                <h2>Solicitar crédito para propiedad</h2>
                <div class="col-md-8">
                    <?php if (isset($mensaje)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo $mensaje ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <form action="<?php echo base_url() ?>home/enviar_correo_credito" method="post">
                    <!--<form action="" method="post">-->
                        <div class="form-group col-md-12">
                            <label for="nombre">Nombre</label>
                            <div class="input-group mb-3">
                                <?php echo form_input($nombre_input); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="telefono">Teléfono</label>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">+502</span>
								</div>
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
                            <label for="nombre">Precio Propiedad</label>
                            <div class="input-group mb-3">
                                <?php echo form_input($precio_propiedad_input); ?>
                            </div>
                        </div>
						<div id="html_element"></div>
                        <button type="submit" class="btn btn-primary" id="solicitar_credito">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
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
				$("#solicitar_credito").show();
				document.getElementById('captcha').innerHTML = "Captcha completed";
				return true;
			}


		};
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#solicitar_credito").hide();

		});
	</script>
<?php $this->stop() ?>
