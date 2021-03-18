<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 16/09/2020
 * Time: 16:45
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master', array(
    'header_banners' => $header_banners,
    'sin_banner' => $sin_banner,
));

//correo
$correo = array(
    'type' => 'email',
    'name' => 'identity',
    'id' => 'identity',
    'class' => ' browser-default form-control',
    'placeholder' => ' Ingrese su correo',
    'required' => 'required'
);
//clave
$clave = array(
    'type' => 'password',
    'name' => 'password',
    'id' => 'password',
    'class' => ' browser-default form-control',
    'placeholder' => ' Ingrese su clave',
    'required' => 'required'
);

?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>

<div class="container">
    <?php if(isset($message)){?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $message;?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>


    <div class="row">
        <div class="col">
            <h3 class="titulo_planes">
                Anuncio<br>
                <span class="subtitulo_planes">VIP</span>
                <ul class="list_planes">
                    <li>Duración de anuncio <br> <span class="subtitulo_lista_planes">Hasta que se venda</span></li>
                    <li>Gpcasa realiza la venta</li>
                    <li>Demostracion Bajo cita</li>
                    <li>Asesores especializados</li>
                    <li>Publicdad en redes sociales</li>
                    <li>Rotulación en propiedad</li>
                    <li>Mailing masivo</li>
                    <li>Crédito hipotecario</li>
                    <li>Comisión del 5.6% sobre venta</li>
                    <li>Comisión de una renta de alquiler</li>
                </ul>

            </h3>
        </div>
        <div class="col">
            <h3 class="titulo_planes">
                Anuncio<br>
                <span class="subtitulo_planes">Individual</span>
                <ul class="list_planes">
                    <li>Duración de anuncio <br> <span class="subtitulo_lista_planes">1 mes</span></li>
                    <li>Anunciante realiza la venta</li>
                    <li>Anunciante realiza la demostración</li>
                    <li>Publicdad en redes sociales <br> <span class="subtitulo_lista_planes">Adicional</span></li>
                    <li>Mailing masivo</li>
                    <li>Crédito hipotecario</li>
                </ul>
                <ul>
                    <li>
                        Recibe descuento en tu anuncio al solicitar mas meses en tu publicación
                    </li>
                </ul>

            </h3>
        </div>
        <div class="col">
            <h3 class="titulo_planes">
                Anuncio<br>
                <span class="subtitulo_planes">inmobilarias desarolladoras</span>
                <ul class="list_planes">
                    <li>Contrato de publicidad <br> <span class="subtitulo_lista_planes">Duración 6 meses minimo</span></li>
                    <li>Anunciante realiza la venta</li>
                    <li>Anunciante realiza la demostración</li>
                    <li>Publicdad en redes sociales <br> <span class="subtitulo_lista_planes">Marca y propiedades</span></li>
                    <li>Logo de empresa en la web</li>
                    <li>Crédito hipotecario</li>
                    <li>15 fotografías por propiedad</li>
                    <li>Usuarios de administrador de propiedades dentro de gpcasas.net</li>
                </ul>
                <ul>
                    <li>
                        Recibe descuento en tu anuncio al solicitar mas meses en tu publicación
                    </li>
                </ul>

            </h3>
        </div>
    </div>
</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>

<?php $this->stop() ?>
