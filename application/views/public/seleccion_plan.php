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
            <h2>Selecciona tu anuncio</h2>
            <form name="seleccion_anuncio" id="seleccion_anuncio" method="post" action="<?php echo base_url().'user/forma_pago';?>">


                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>Característica</th>
                            <th>Individuales</th>
                            <th>Vip</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>CLIENTES DIRECTOS</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-times"></i></td>
                        </tr>
                        <tr>
                            <td>ASESORES CAPACITADOS PARA VENTA</td>
                            <td><i class="fas fa-times"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>CRÉDITOS HIPOTECARIOS</td>
                            <td>(COMISION 1.5% SOBRE SOLICITUD)</td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>DURACIÓN</td>
                            <td>30 DÍAS</td>
                            <td>HASTA QUE SE VENDA/RENTE</td>
                        </tr>
                        <tr>
                            <td>FOTOS</td>
                            <td>15</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <td>PAUTA EN REDES SOCIALES DE GPCASAS</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>PAUTA PAGADA EN REDES SOCIALES</td>
                            <td><i class="fas fa-times"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>MANTA PARA PROPIEDAD</td>
                            <td><i class="fas fa-times"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>COMISIÓN POR VENTA:</td>
                            <td><i class="fas fa-times"></i></td>
                            <td>5% SOBRE VALOR DE PROPIEDAD</td>
                        </tr>
                        <tr>
                            <td>COMISIÓN POR RENTA</td>
                            <td><i class="fas fa-times"></i></td>
                            <td>1 RENTA</i></td>
                        </tr>
                        <tr class="table-warning">
                            <td>10. PRIVACIDAD Y PROTECCIÓN A CONTACTO DIRECTO</td>
                            <td><i class="fas fa-times"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>PRECIO</td>
                            <td>Q.100.00</td>
                            <td>GRATIS</i></td>
                        </tr>
                        <tr>
                            <td>SELECCIONE OPCIÓN</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="plan_anuncio"
                                           id="plan_anuncio_individual" value="individual" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="plan_anuncio"
                                           id="plan_anuncio_vip"
                                           value="vip">
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="table-responsive extras">
                    <table class="table table-striped extras">
                        <thead class="thead-light">
                        <tr>
                            <th>EXTRAS</th>
                            <th>TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="150" id="check_manta" name="check_manta">
                                    <label class="form-check-label" for="check_manta">
                                        MANTA PARA PROPIEDAD
                                    </label>
                                </div>

                            </td>
                            <td>+ Q.150.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="100" id="check_pauta" name="check_pauta">
                                    <label class="form-check-label" for="check_pauta">
                                        PAUTA PAGADA REDES SOCIALES
                                    </label>
                                </div>
                                </td>
                            <td>+ Q.100.00</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="table-responsive ">
                    <table class="table table-striped ">
                        <thead class="thead-dark">
                        <tr>
                            <th colspan="2" class="text-center">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Total a pagar:</td>
                            <td><span id="total_a_pagar"></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <input type="hidden" name="monto_pago" id="monto_pago">
                <button type="submit" class="btn btn-primary">Pago</button>

            </form>
        </div>
    </div>

</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script>
    document.forms[0].reset();

    var tipo_anuncio;
    var precio_manta;
    var precio_pauta_redes;
    var total_precio ;
    var precio_individual;

    precio_individual =100;
    precio_manta =150;
    precio_pauta_redes = 100;
    total_precio = 0;

    $("#seleccion_anuncio").change(function () {
        total_precio = 0;
        tipo_anuncio = $("input[name='plan_anuncio']:checked").val();
        console.log(tipo_anuncio);
        total_precio = total_precio + precio_individual;

        if (tipo_anuncio == 'individual') {
            $(".extras").show();
            if($('#check_manta').prop('checked')){
                total_precio = total_precio + precio_manta;
            }
            if($('#check_pauta').prop('checked')){
                total_precio = total_precio + precio_manta;
            }
        }
        if (tipo_anuncio == 'vip') {
            total_precio = 0;
            $(".extras").hide('slow');
        }

        console.log(total_precio);
        $("#total_a_pagar").html('Q.'+total_precio);
        $("#monto_pago").val(total_precio);


    });
</script>
<?php $this->stop() ?>
