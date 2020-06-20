<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 02/09/2019
 * Time: 01:56 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master', array(
    'header_banners' => $header_banners
));


//ubicacion
$departamentos_select = array(
    'name' => 'departamentos',
    'id' => 'departamentos',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$departamentos_select_options = array();
foreach ($departamentos->result() as $departamento) {
    $departamentos_select_options[$departamento->id_departamento] = $departamento->nombre_departamento;
}


$municipios_select = array(
    'name' => 'municipios',
    'id' => 'municipios',
    'class' => ' browser-default form-control',
    'required' => 'required'
);

$zonas_select = array(
    'name' => 'zona',
    'id' => 'zona',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$zonas_select_options = array(
    'TODOS' => 'TODOS',
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
    '6' => '6',
    '7' => '7',
    '8' => '8',
    '9' => '9',
    '10' => '10',
    '11' => '11',
    '12' => '12',
    '13' => '13',
    '14' => '13',
    '15' => '15',
    '16' => '16',
    '17' => '17',
    '18' => '18',
    '19' => '19',
    '21' => '21',
    '24' => '24',
);


$modo_select = array(
    'name' => 'modo',
    'id' => 'modo',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$modo_select_options = array(
    'renta' => 'Renta',
    'venta' => 'Venta'
);


//tipo de propiedad
$tipo_propiedad_select = array(
    'name' => 'tipo_propiedad_select',
    'id' => 'tipo_propiedad_select',
    'class' => 'custom-select',
    'required' => 'required'
);
$tipo_carro_select_options = array();
/*
foreach ($tipos->result() as $tipo_carro)
{
    $tipo_carro_select_options[$tipo_carro->id_tipo_carro] = $tipo_carro->id_tipo_carro;
}*/

//No habitaciones

//No baños

//precio min

//precio max

//min area

//max area


?>


<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>

<div class="container">
    <section id="cuadro_busqueda">
        <div class="row">
            <div class="col-10">
                <h2>Encuentra tu propiedad</h2>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="departamento">Departamento</label>
                    <?php echo form_dropdown($departamentos_select, $departamentos_select_options, '7') ?>
                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="municipio">Municipio</label>
                    <?php echo form_dropdown($municipios_select) ?>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="tipo_propiedad_select">Zona</label>
                    <?php echo form_dropdown($zonas_select, $zonas_select_options) ?>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="modo">Modo</label>
                    <?php echo form_dropdown($modo_select, $modo_select_options, $tipo_busqueda) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-3">

            </div>
            <div class="col-2">

            </div>
            <div class="col-2">

            </div>
            <div class="col-md-2">
                <a class="btn btn-success btn-lg" id="busaqueda_boton">Buscar</a>
            </div>
        </div>
    </section>
</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>

<script>
    var departamento;
    var municipio;
    var zona;
    var modo;
    var precio;
    var filtros;


    $(document).ready(function () {
        $('#municipios option').remove();
        departamento = $("#departamentos").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>/Busqueda/get_municipio_departamento/' + departamento,
            success: function (data) {
               // console.log(data);
                $('#municipios').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#municipios').append('<option value="' + value.id_municipio + '">' + value.nombre_municipio + '</option>');
                });
                // $('select').material_select();
            }
        });
    });
    //Actualizar municipios
    $("#departamentos").change(function (e) {

        $('#municipios option').remove();
        departamento = $("#departamentos").val();

        console.log(departamento);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>/Busqueda/get_municipio_departamento/' + departamento,
            success: function (data) {
                console.log(data);
                $('#municipios').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#municipios').append('<option value="' + value.id_municipio + '">' + value.nombre_municipio + '</option>');
                });
                // $('select').material_select();
            }
        });
    });

    //boton de busqueda
    $("#busaqueda_boton").click(function () {
        modo = $("#modo").val();
        departamento = $("#departamentos").val();
        municipio = $("#municipios").val();
        zona = $("#zona").val();
        console.log(departamento);
        console.log(municipio);
        console.log(zona);
        console.log(modo);
        filtros = '<?php echo base_url()?>' + 'Propiedades/filtro/' + modo + '/' + departamento + '/' + municipio + '/' + zona;
        window.location.assign(filtros);
    });



</script>

<?php $this->stop() ?>
