<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 01/10/2019
 * Time: 09:25 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('admin/master');
$correo = '';

//Tipo de propiedad
$tipo_propiedad_select = array(
    'name' => 'tipo_propiedad',
    'id' => 'tipo_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$tipo_propiedad_options = array(
    'casa' => 'casa',
    'local' => 'local',
    'terreno' => 'terreno',
    'oficina' => 'oficina',
    'bodega' => 'bodega',
    'parcela' => 'parcela',
    'finca' => 'finca',
    'apartamento' => 'apartamento',
    'town house' => 'town house'
);

//ubicacion
$departamentos_select = array(
    'name' => 'id_departamento',
    'id' => 'id_departamento',
    'class' => ' browser-default form-control',
    'required' => 'required'
);

$departamentos_select_options = array();
foreach ($departamentos->result() as $departamento) {
    $departamentos_select_options[$departamento->id_departamento] = $departamento->nombre_departamento;
}


$municipios_select = array(
    'name' => 'id_municipio',
    'id' => 'id_municipio',
    'class' => ' browser-default form-control',
    'required' => 'required'
);

$zonas_input = array(
    'type' => 'number',
    'name' => 'id_zona',
    'id' => 'id_zona',
    'min' => '1',
    'max' => '25',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$direccion_propiedad_input = array(
    'type' => 'text',
    'name' => 'direccion_propiedad',
    'id' => 'direccion_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$tamaño_terreno_propiedad_input = array(
    'type' => 'number',
    'name' => 'tamaño_terreno_propiedad',
    'id' => 'tamaño_terreno_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);

$tipo_medida_propiedad_select = array(
    'name' => 'tipo_propiedad',
    'id' => 'tipo_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$tipo_medida_propiedad_options = array(
    'Metro Cuadrado' => 'Metro Cuadrado',
    'Varas' => 'Varas',
    'Cuerdas' => 'Cuerdas',
    'Caballerias' => 'Caballerias',
    'Hectareas' => 'Hectareas',
);

$medida_construccion_propiedad_input = array(
    'type' => 'text',
    'name' => 'medida_construccion_propiedad',
    'id' => 'medida_construccion_propiedad',
    'class' => ' browser-default form-control',
);
$medida_oficina_propiedad_input = array(
    'type' => 'text',
    'name' => 'medida_oficina_propiedad',
    'id' => 'medida_oficina_propiedad',
    'class' => ' browser-default form-control',
);
$medida_oficina_propiedad_input = array(
    'type' => 'text',
    'name' => 'medida_oficina_propiedad',
    'id' => 'medida_oficina_propiedad',
    'class' => ' browser-default form-control',
);
$habitaciones_propiedad_input = array(
    'type' => 'number',
    'name' => 'habitaciones_propiedad',
    'id' => 'habitaciones_propiedad',
    'min' => '0',
    'class' => ' browser-default form-control',
);
$baños_completos_propiedad_input = array(
    'type' => 'number',
    'name' => 'baños_completos_propiedad',
    'id' => 'baños_completos_propiedad',
    'min' => '0',
    'class' => ' browser-default form-control',
);
$baño_visita_propiedad_input = array(
    'type' => 'number',
    'name' => 'baño_visita_propiedad',
    'id' => 'baño_visita_propiedad',
    'min' => '0',
    'class' => ' browser-default form-control',
);


$balcon_propiedad_s = array(
    'name' => 'balcon_propiedad',
    'id' => 'balcon_propiedad_s',
    'value' => 'sí',
    'checked' => false,
    'required' => 'required'
);
$balcon_propiedad_n = array(
    'name' => 'balcon_propiedad',
    'id' => 'balcon_propiedad_n',
    'value' => 'no',
    'checked' => false,
);

$niveles_porpiedad = array(
    'type' => 'number',
    'name' => 'niveles_porpiedad',
    'id' => 'niveles_porpiedad',
    'min' => '0',
    'class' => ' browser-default form-control',
);

$cocina_propiedad_s = array(
    'name' => 'cocina_propiedad',
    'id' => 'cocina_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$cocina_propiedad_n = array(
    'name' => 'cocina_propiedad',
    'id' => 'cocina_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$desayunador_propiedad_s = array(
    'name' => 'desayunador_propiedad',
    'id' => 'desayunador_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$desayunador_propiedad_n = array(
    'name' => 'desayunador_propiedad',
    'id' => 'desayunador_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$lineablanca_propiedad_s = array(
    'name' => 'lineablanca_propiedad',
    'id' => 'lineablanca_propiedad_s',
    'value' => 'no',
    'checked' => false,
);
$lineablanca_propiedad_n = array(
    'name' => 'lineablanca_propiedad',
    'id' => 'lineablanca_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$amueblada_propiedad_s = array(
    'name' => 'amueblada_propiedad',
    'id' => 'amueblada_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$amueblada_propiedad_n = array(
    'name' => 'amueblada_propiedad',
    'id' => 'amueblada_propiedad_n',
    'value' => 'no',
    'checked' => false,
);

$cuarto_servicio_propiedad_s = array(
    'name' => 'cuarto_servicio_propiedad',
    'id' => 'cuarto_servicio_propiedad_s',
    'value' => 'si',
    'checked' => false,
);

$cuarto_servicio_propiedad_n = array(
    'name' => 'cuarto_servicio_propiedad',
    'id' => 'cuarto_servicio_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$cuarto_seguridad_propiedad_s = array(
    'name' => 'cuarto_seguridad_propiedad',
    'id' => 'cuarto_seguridad_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$cuarto_seguridad_propiedad_n = array(
    'name' => 'cuarto_seguridad_propiedad',
    'id' => 'cuarto_seguridad_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$lavanderia_propiedad_s = array(
    'name' => 'lavanderia_propiedad',
    'id' => 'lavanderia_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$lavanderia_propiedad_n = array(
    'name' => 'lavanderia_propiedad',
    'id' => 'lavanderia_propiedad_n',
    'value' => 'no',
    'checked' => false,
);

$gas_propano_propiedad_s = array(
    'name' => 'gas_propano_propiedad',
    'id' => 'gas_propano_propiedad_s',
    'value' => 'si',
    'checked' => false,
);

$gas_propano_propiedad_n = array(
    'name' => 'gas_propano_propiedad',
    'id' => 'gas_propano_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$calentador_agua_propiedad_s = array(
    'name' => 'calentador_agua_propiedad',
    'id' => 'calentador_agua_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$calentador_agua_propiedad_n = array(
    'name' => 'calentador_agua_propiedad',
    'id' => 'calentador_agua_propiedad_n',
    'value' => 'si',
    'checked' => false,
);

$garage_propiedad_select = array(
    'name' => 'garage_propiedad',
    'id' => 'garage_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$garage_propiedad_options = array(
    'no' => 'no',
    '1 carro' => '1 carro',
    '2 carro' => '2 carro',
    '3 carro' => '3 carro',
    '4 carro' => '4 carro',
    'más de 4 carros' => 'más de 4 carros'
);
$parqueo_visitas_propiedad_select = array(
    'name' => 'parqueo_visitas_propiedad',
    'id' => 'parqueo_visitas_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$parqueo_visitas_propiedad_options = array(
    'no' => 'no',
    '1 carro' => '1 carro',
    '2 carro' => '2 carro',
    '3 carro' => '3 carro',
    '4 carro' => '4 carro',
    'más de 4 carros' => 'más de 4 carros'
);

$seguridad_privada_propiedad_s = array(
    'name' => 'seguridad_privada_propiedad',
    'id' => 'seguridad_privada_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$seguridad_privada_propiedad_n = array(
    'name' => 'seguridad_privada_propiedad',
    'id' => 'seguridad_privada_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$garita_control_propiedad_s = array(
    'name' => 'garita_control_propiedad',
    'id' => 'garita_control_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$garita_control_propiedad_n = array(
    'name' => 'garita_control_propiedad',
    'id' => 'garita_control_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$sala_propiedad_s = array(
    'name' => 'sala_propiedad',
    'id' => 'sala_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$sala_propiedad_n = array(
    'name' => 'sala_propiedad',
    'id' => 'sala_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$sala_reuniones_propiedad_s = array(
    'name' => 'sala_reuniones_propiedad',
    'id' => 'sala_reuniones_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$sala_reuniones_propiedad_n = array(
    'name' => 'sala_reuniones_propiedad',
    'id' => 'sala_reuniones_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$comedor_propiedad_s = array(
    'name' => 'comedor_propiedad',
    'id' => 'comedor_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$comedor_propiedad_n = array(
    'name' => 'comedor_propiedad',
    'id' => 'comedor_propiedad_n',
    'value' => 'no',
    'checked' => false,
);

$gradas_propiedad_select = array(
    'name' => 'gradas_propiedad',
    'id' => 'gradas_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$gradas_propiedad_options = array(
    'madera' => 'madera',
    'piso' => 'piso',
    'cemento' => 'cemento',
    'metal' => 'metal',
);
$bodega_interior_propiedad_s = array(
    'name' => 'bodega_interior_propiedad',
    'id' => 'bodega_interior_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$bodega_interior_propiedad_n = array(
    'name' => 'bodega_interior_propiedad',
    'id' => 'bodega_interior_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$pergola_propiedad_s = array(
    'name' => 'pergola_propiedad',
    'id' => 'pergola_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$pergola_propiedad_n = array(
    'name' => 'pergola_propiedad',
    'id' => 'pergola_propiedad_n',
    'value' => 'no',
    'checked' => false,
);

$menaje_propiedad_select = array(
    'name' => 'menaje_propiedad',
    'id' => 'menaje_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$menaje_propiedad_options = array(
    'incluye' => 'incluye',
    'no incluye' => 'no incluye',
);
$nombre_condominio_propiedad_input = array(
    'type' => 'text',
    'name' => 'nombre_condominio_propiedad',
    'id' => 'nombre_condominio_propiedad',
    'class' => ' browser-default form-control',
);
$sala_famiiar_propiedad_s = array(
    'name' => 'sala_famiiar_propiedad',
    'id' => 'sala_famiiar_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$sala_famiiar_propiedad_n = array(
    'name' => 'sala_famiiar_propiedad',
    'id' => 'sala_famiiar_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$sala_juegos_propiedad_s = array(
    'name' => 'sala_juegos_propiedad',
    'id' => 'sala_juegos_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$sala_juegos_propiedad_n = array(
    'name' => 'sala_juegos_propiedad',
    'id' => 'sala_juegos_propiedad_n',
    'value' => 'si',
    'checked' => false,
);
$chimenea_propiedad_s = array(
    'name' => 'chimenea_propiedad',
    'id' => 'chimenea_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$chimenea_propiedad_n = array(
    'name' => 'chimenea_propiedad',
    'id' => 'chimenea_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$piscina_propiedad_s = array(
    'name' => 'piscina_propiedad',
    'id' => 'piscina_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$piscina_propiedad_n = array(
    'name' => 'piscina_propiedad',
    'id' => 'piscina_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$agua_propiedad_s = array(
    'name' => 'agua_propiedad',
    'id' => 'agua_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$agua_propiedad_n = array(
    'name' => 'agua_propiedad',
    'id' => 'agua_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$luz_propiedad_s = array(
    'name' => 'luz_propiedad',
    'id' => 'luz_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$luz_propiedad_n = array(
    'name' => 'luz_propiedad',
    'id' => 'luz_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
$cable_internet_propiedad_s = array(
    'name' => 'cable_internet_propiedad',
    'id' => 'cable_internet_propiedad_s',
    'value' => 'si',
    'checked' => false,
);
$cable_internet_propiedad_n = array(
    'name' => 'cable_internet_propiedad',
    'id' => 'cable_internet_propiedad_n',
    'value' => 'no',
    'checked' => false,
);
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
    <h2>Datos de propiedad</h2>

    <form action="<?php echo base_url() ?>admin/guardar_propiedad" method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="identity">Tipo de propiedad</label>
                <?php echo form_dropdown($tipo_propiedad_select, $tipo_propiedad_options) ?>
            </div>
            <div class="form-group col-md-8">
                <label for="direccion_propiedad">Dirección</label>
                <?php echo form_input($direccion_propiedad_input); ?>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="departamento">Departamento</label>
                <?php echo form_dropdown($departamentos_select, $departamentos_select_options) ?>
            </div>
            <div class="form-group col-md-4">
                <label for="municipio">Municipio</label>
                <?php echo form_dropdown($municipios_select) ?>
            </div>
            <div class="form-group col-md-4">
                <label for="zona">Zona</label>
                <?php echo form_input($zonas_input); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="departamento">Tamaño del terreno</label>
                <div class="input-group">
                    <?php echo form_input($tamaño_terreno_propiedad_input); ?>
                    <div class="input-group-append">
                        <?php echo form_dropdown($tipo_medida_propiedad_select, $tipo_medida_propiedad_options); ?>
                    </div>
                </div>

            </div>
            <div class="form-group col-md-4">
                <label for="medida_construccion_propiedad">Medida Construccion</label>
                <?php echo form_input($medida_construccion_propiedad_input); ?>
            </div>
            <div class="form-group col-md-4">

                <label for="zona">Medida Oficina</label>
                <?php echo form_input($medida_oficina_propiedad_input); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="habitaciones_propiedad">Habitaciones</label>
                <?php echo form_input($habitaciones_propiedad_input); ?>
            </div>
            <div class="form-group col-md-4">
                <label for="baños_completos_propiedad">Baños completos</label>
                <?php echo form_input($baños_completos_propiedad_input); ?>
            </div>
            <div class="form-group col-md-4">
                <label for="baño_visita_propiedad">Baño de visitas</label>
                <?php echo form_input($baño_visita_propiedad_input); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="habitaciones_propiedad">Balcon</label>
                <div class="form-check ">
                    <?php echo form_radio($balcon_propiedad_s); ?>
                    <label class="form-check-label" for="balcon_propiedad_s">Si</label>

                    <?php echo form_radio($balcon_propiedad_n); ?>
                    <label class="form-check-label" for="balcon_propiedad_n">No</label>
                </div>

            </div>
            <div class="form-group col-md-4">
                <label for="baño_visita_propiedad">Niveles</label>
                <?php echo form_input($niveles_porpiedad); ?>
            </div>
            <div class="form-group col-md-4">
                <label for="habitaciones_propiedad">Cocina</label>
                <div class="form-check ">
                    <?php echo form_radio($cocina_propiedad_s); ?>
                    <label class="form-check-label" for="cocina_propiedad_s">Si</label>

                    <?php echo form_radio($cocina_propiedad_n); ?>
                    <label class="form-check-label" for="cocina_propiedad_n_">No</label>
                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="habitaciones_propiedad">Desayunador</label>
                <div class="form-check ">
                    <?php echo form_radio($desayunador_propiedad_s); ?>
                    <label class="form-check-label" for="desayunador_propiedad_s">Si</label>

                    <?php echo form_radio($desayunador_propiedad_n); ?>
                    <label class="form-check-label" for="desayunador_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="baños_completos_propiedad">Línea blanca</label>
                <div class="form-check ">
                    <?php echo form_radio($lineablanca_propiedad_s); ?>
                    <label class="form-check-label" for="lineablanca_propiedad_s">Si</label>

                    <?php echo form_radio($lineablanca_propiedad_n); ?>
                    <label class="form-check-label" for="lineablanca_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="baño_visita_propiedad">Amueblada</label>
                <div class="form-check ">
                    <?php echo form_radio($amueblada_propiedad_s); ?>
                    <label class="form-check-label" for="amueblada_propiedad_s">Si</label>

                    <?php echo form_radio($amueblada_propiedad_n); ?>
                    <label class="form-check-label" for="amueblada_propiedad_n">No</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="habitaciones_propiedad">Cuarto de servicio</label>
                <div class="form-check ">
                    <?php echo form_radio($cuarto_servicio_propiedad_s); ?>
                    <label class="form-check-label" for="cuarto_servicio_propiedad_s">Si</label>

                    <?php echo form_radio($cuarto_servicio_propiedad_n); ?>
                    <label class="form-check-label" for="cuarto_servicio_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="baños_completos_propiedad">Cuarto de seguridad</label>
                <div class="form-check ">
                    <?php echo form_radio($cuarto_servicio_propiedad_s); ?>
                    <label class="form-check-label" for="cuarto_servicio_propiedad_s">Si</label>

                    <?php echo form_radio($cuarto_servicio_propiedad_n); ?>
                    <label class="form-check-label" for="cuarto_servicio_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="baño_visita_propiedad">Lavandería</label>
                <div class="form-check ">
                    <?php echo form_radio($lavanderia_propiedad_s); ?>
                    <label class="form-check-label" for="lavanderia_propiedad_s">Si</label>

                    <?php echo form_radio($lavanderia_propiedad_s); ?>
                    <label class="form-check-label" for="lavanderia_propiedad_n">No</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="habitaciones_propiedad">Gas propano</label>
                <div class="form-check ">
                    <?php echo form_radio($gas_propano_propiedad_s); ?>
                    <label class="form-check-label" for="lavanderia_propiedad_s">Si</label>
                    <?php echo form_radio($gas_propano_propiedad_n); ?>
                    <label class="form-check-label" for="lavanderia_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="baños_completos_propiedad">Calentador de agua</label>
                <div class="form-check ">
                    <?php echo form_radio($calentador_agua_propiedad_s); ?>
                    <label class="form-check-label" for="lavanderia_propiedad_s">Si</label>
                    <?php echo form_radio($calentador_agua_propiedad_n); ?>
                    <label class="form-check-label" for="lavanderia_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="garage_propiedad">Garage</label>
                <?php echo form_dropdown($garage_propiedad_select, $garage_propiedad_options) ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="parqueo_visitas_propiedad">Parqueo visitas</label>
                <?php echo form_dropdown($parqueo_visitas_propiedad_select, $parqueo_visitas_propiedad_options) ?>
            </div>
            <div class="form-group col-md-4">
                <label for="seguridad_privada_propiedad">Seguridad Privada</label>
                <div class="form-check ">
                    <?php echo form_radio($seguridad_privada_propiedad_s); ?>
                    <label class="form-check-label" for="seguridad_privada_propiedad_s">Si</label>
                    <?php echo form_radio($seguridad_privada_propiedad_n); ?>
                    <label class="form-check-label" for="seguridad_privada_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="garita_control_propiedad">Garita de control</label>
                <div class="form-check ">
                    <?php echo form_radio($garita_control_propiedad_s); ?>
                    <label class="form-check-label" for="garita_control_propiedad_s">Si</label>
                    <?php echo form_radio($garita_control_propiedad_n); ?>
                    <label class="form-check-label" for="garita_control_propiedad_n">No</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="sala_reuniones_propiedad">Sala de reuniones</label>
                <div class="form-check ">
                    <?php echo form_radio($sala_reuniones_propiedad_s); ?>
                    <label class="form-check-label" for="sala_reuniones_propiedad_s">Si</label>
                    <?php echo form_radio($sala_reuniones_propiedad_s); ?>
                    <label class="form-check-label" for="sala_reuniones_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="comedor_propiedad">Comedor</label>
                <div class="form-check ">
                    <?php echo form_radio($comedor_propiedad_s); ?>
                    <label class="form-check-label" for="comedor_propiedad_s">Si</label>
                    <?php echo form_radio($comedor_propiedad_n); ?>
                    <label class="form-check-label" for="comedor_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="gradas_propiedad">Gradas</label>
                <?php echo form_dropdown($gradas_propiedad_select, $gradas_propiedad_options) ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="bodega_interior_propiedad">Bodega interior</label>
                <div class="form-check ">
                    <?php echo form_radio($bodega_interior_propiedad_s); ?>
                    <label class="form-check-label" for="bodega_interior_propiedad_s">Si</label>
                    <?php echo form_radio($bodega_interior_propiedad_n); ?>
                    <label class="form-check-label" for="bodega_interior_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="menaje_propiedad">Menaje</label>
                <?php echo form_dropdown($menaje_propiedad_select, $menaje_propiedad_options) ?>
            </div>
            <div class="form-group col-md-4">
                <label for="nombre_condominio_propiedad">Nombre Condominio</label>
                <?php echo form_input($nombre_condominio_propiedad_input); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="sala_famiiar_propiedad">Sala familiar</label>
                <div class="form-check ">
                    <?php echo form_radio($sala_famiiar_propiedad_s); ?>
                    <label class="form-check-label" for="sala_famiiar_propiedad_s">Si</label>
                    <?php echo form_radio($sala_famiiar_propiedad_n); ?>
                    <label class="form-check-label" for="sala_famiiar_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="sala_juegos_propiedad">Sala de juegos</label>
                <div class="form-check ">
                    <?php echo form_radio($sala_juegos_propiedad_s); ?>
                    <label class="form-check-label" for="sala_juegos_propiedad_s">Si</label>
                    <?php echo form_radio($sala_juegos_propiedad_n); ?>
                    <label class="form-check-label" for="sala_juegos_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="chimenea_propiedad">Chimenea</label>
                <div class="form-check ">
                    <?php echo form_radio($chimenea_propiedad_s); ?>
                    <label class="form-check-label" for="chimenea_propiedad_s">Si</label>
                    <?php echo form_radio($chimenea_propiedad_n); ?>
                    <label class="form-check-label" for="chimenea_propiedad_n">No</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="habitaciones_propiedad">Piscina</label>
                <div class="form-check ">
                    <?php echo form_radio($piscina_propiedad_s); ?>
                    <label class="form-check-label" for="piscina_propiedad_s">Si</label>
                    <?php echo form_radio($piscina_propiedad_n); ?>
                    <label class="form-check-label" for="piscina_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="agua_propiedad">Agua</label>
                <div class="form-check ">
                    <?php echo form_radio($agua_propiedad_s); ?>
                    <label class="form-check-label" for="agua_propiedad_s">Si</label>
                    <?php echo form_radio($agua_propiedad_n); ?>
                    <label class="form-check-label" for="agua_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="luz_propiedad">luz</label>
                <div class="form-check ">
                    <?php echo form_radio($luz_propiedad_s); ?>
                    <label class="form-check-label" for="luz_propiedad_s">Si</label>
                    <?php echo form_radio($luz_propiedad_n); ?>
                    <label class="form-check-label" for="luz_propiedad_n">No</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="cable_internet_propiedad">Cable internet</label>
                <div class="form-check ">
                    <?php echo form_radio($cable_internet_propiedad_s); ?>
                    <label class="form-check-label" for="cable_internet_propiedad_s">Si</label>
                    <?php echo form_radio($cable_internet_propiedad_n); ?>
                    <label class="form-check-label" for="cable_internet_propiedad_n">No</label>
                </div>
            </div>
            <div class="form-group col-md-4">

            </div>
            <div class="form-group col-md-4">

            </div>
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script>
    $(document).ready(function () {
        $('#id_municipio option').remove();
        departamento = $("#id_departamento").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>/Busqueda/get_municipio_departamento/' + departamento,
            success: function (data) {
                $.each(data, function (key, value) {
                    $('#id_municipio').append('<option value="' + value.id_municipio + '">' + value.nombre_municipio + '</option>');
                });
                // $('select').material_select();
            }
        });
    });

    //Actualizar municipios
    $("#id_departamento").change(function (e) {
        $('#id_municipio option').remove();
        departamento = $("#id_departamento").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>/Busqueda/get_municipio_departamento/' + departamento,
            success: function (data) {
                $.each(data, function (key, value) {
                    $('#id_municipio').append('<option value="' + value.id_municipio + '">' + value.nombre_municipio + '</option>');
                });
            }
        });
    });
</script>
<?php $this->stop() ?>
