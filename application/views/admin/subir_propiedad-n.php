<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 01/10/2019
 * Time: 09:25 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('admin/master',
    array(
        'menu' => $menu
    ));
$correo = '';
if ($propiedad) {
    $propiedad = $propiedad->row();
}
//Modo de propiedad
$modo_propiedad_select = array(
    'name' => 'modo_propiedad',
    'id' => 'modo_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$modo_propiedad_options = array(
    'renta' => 'renta',
    'venta' => 'venta',
);

$titulo_propiedad = array(
    'name' => 'titulo_propiedad',
    'id' => 'titulo_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required',
    'value' => $propiedad->titulo_propiedad
);

$tipo_vendedor_select = array(
    'name' => 'tipo_vendedor',
    'id' => 'tipo_vendedor',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$tipo_vendedor_options = array(
    'directo' => 'Directo',
    'intermediario' => 'Intermediario',
);
$precio_input = array(
    'type' => 'number',
    'name' => 'precio',
    'id' => 'precio',
    'steps' => 'any',
    'class' => ' browser-default form-control',
    'required' => 'required',
    'value' => $propiedad->precio_propiedad
);
//Moneda de propiedad
$moneda_propiedad_select = array(
    'name' => 'moneda_propiedad',
    'id' => 'moneda_propiedad',
    'class' => ' browser-default  custom-select',
    'required' => 'required'
);
$moneda_propiedad_options = array(
    'Q' => 'Q',
    '$' => '$',
);

$nombre_contacto_propiedad = array(
    'type' => 'text',
    'name' => 'nombre_contacto_propiedad',
    'id' => 'nombre_contacto_propiedad',
    'class' => ' browser-default form-control',
    'value' => $propiedad->telefono,
    'required' => 'required',
);

$telefono_input = array(
    'type' => 'text',
    'name' => 'telefono',
    'id' => 'telefono',
    'class' => ' browser-default form-control',
    'value' => $propiedad->telefono,
    'required' => 'required',
);
$telefono_wp_s = array(
    'name' => 'telefono_wp',
    'id' => 'telefono_wp_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->telefono_wp),
    'required' => 'required'
);
$telefono_wp_n = array(
    'name' => 'telefono_wp',
    'id' => 'telefono_wp_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->telefono_wp),
);
$telefono2_input = array(
    'type' => 'text',
    'name' => 'telefono2',
    'id' => 'telefono2',
    'value' => $propiedad->telefono2,
    'class' => ' browser-default form-control',
);
$telefono2_wp_s = array(
    'name' => 'telefono2_wp',
    'id' => 'telefono_2wp_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->telefono2_wp),
    'required' => 'required'
);
$telefono2_wp_n = array(
    'name' => 'telefono2_wp',
    'id' => 'telefono2_wp_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->telefono2_wp),
);
$nombre_contacto_input = array(
    'type' => 'text',
    'name' => 'nombre_contacto_propiedad',
    'id' => 'nombre_contacto_propiedad',
    'class' => ' browser-default form-control',
    'value' => $propiedad->nombre_contacto_propiedad,
    'required' => 'required',
);
$correo_contacto_input = array(
    'type' => 'text',
    'name' => 'correo_contacto',
    'id' => 'correo_contacto',
    'class' => ' browser-default form-control',
    'value' => $propiedad->correo_contacto,
    'required' => 'required'
);
//Tipo de propiedad
$direccion_propiedad_input = array(
    'type' => 'text',
    'name' => 'direccion_propiedad',
    'id' => 'direccion_propiedad',
    'class' => ' browser-default form-control',
    'value' => $propiedad->direccion_propiedad,
    'required' => 'required'
);
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
    'type' => 'text',
    'name' => 'id_zona',
    'id' => 'id_zona',
    'class' => ' browser-default form-control',
    'value' => $propiedad->id_zona,
    'required' => 'required'
);

$tamano_terreno_propiedad_input = array(
    'type' => 'number',
    'name' => 'tamano_terreno_propiedad',
    'id' => 'tamano_terreno_propiedad',
    'class' => ' browser-default form-control',
    'value' => $propiedad->tamano_terreno_propiedad,
);

$tipo_medida_propiedad_select = array(
    'name' => 'tipo_medida_propiedad',
    'id' => 'tipo_medida_propiedad',
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
    'value' => $propiedad->medida_construccion_propiedad,
);
$medida_oficina_propiedad_input = array(
    'type' => 'text',
    'name' => 'medida_oficina_propiedad',
    'id' => 'medida_oficina_propiedad',
    'value' => $propiedad->medida_oficina_propiedad,
    'class' => ' browser-default form-control',
);
$medida_oficina_propiedad_input = array(
    'type' => 'text',
    'name' => 'medida_oficina_propiedad',
    'id' => 'medida_oficina_propiedad',
    'class' => ' browser-default form-control',
    'value' => $propiedad->medida_oficina_propiedad,
);
$habitaciones_propiedad_input = array(
    'type' => 'number',
    'name' => 'habitaciones_propiedad',
    'id' => 'habitaciones_propiedad',
    'min' => '0',
    'class' => ' browser-default form-control',
    'value' => $propiedad->habitaciones_propiedad,
);
$baños_completos_propiedad_input = array(
    'type' => 'number',
    'name' => 'baños_completos_propiedad',
    'id' => 'baños_completos_propiedad',
    'min' => '0',
    'class' => ' browser-default form-control',
    'value' => $propiedad->baños_completos_propiedad,
);
$baño_visita_propiedad_input = array(
    'type' => 'number',
    'name' => 'baño_visita_propiedad',
    'id' => 'baño_visita_propiedad',
    'min' => '0',
    'class' => ' browser-default form-control',
    'value' => $propiedad->baño_visita_propiedad,
);


$balcon_propiedad_s = array(
    'name' => 'balcon_propiedad',
    'id' => 'balcon_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->balcon_propiedad),
    'required' => 'required'
);
$balcon_propiedad_n = array(
    'name' => 'balcon_propiedad',
    'id' => 'balcon_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->balcon_propiedad),
);

$niveles_porpiedad = array(
    'type' => 'number',
    'name' => 'niveles_porpiedad',
    'id' => 'niveles_porpiedad',
    'min' => '0',
    'value' => $propiedad->niveles_porpiedad,
    'class' => ' browser-default form-control',
);

$cocina_propiedad_s = array(
    'name' => 'cocina_propiedad',
    'id' => 'cocina_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->cocina_propiedad),
);
$cocina_propiedad_n = array(
    'name' => 'cocina_propiedad',
    'id' => 'cocina_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->cocina_propiedad),
);
$desayunador_propiedad_s = array(
    'name' => 'desayunador_propiedad',
    'id' => 'desayunador_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->desayunador_propiedad),
);
$desayunador_propiedad_n = array(
    'name' => 'desayunador_propiedad',
    'id' => 'desayunador_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->desayunador_propiedad),
);
$lineablanca_propiedad_s = array(
    'name' => 'lineablanca_propiedad',
    'id' => 'lineablanca_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->lineablanca_propiedad),
);
$lineablanca_propiedad_n = array(
    'name' => 'lineablanca_propiedad',
    'id' => 'lineablanca_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->lineablanca_propiedad),
);
$amueblada_propiedad_s = array(
    'name' => 'amueblada_propiedad',
    'id' => 'amueblada_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->amueblada_propiedad),
);
$amueblada_propiedad_n = array(
    'name' => 'amueblada_propiedad',
    'id' => 'amueblada_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->amueblada_propiedad),
);
$cuarto_servicio_propiedad_s = array(
    'name' => 'cuarto_servicio_propiedad',
    'id' => 'cuarto_servicio_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->cuarto_servicio_propiedad),
);
$cuarto_servicio_propiedad_n = array(
    'name' => 'cuarto_servicio_propiedad',
    'id' => 'cuarto_servicio_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->cuarto_servicio_propiedad),
);
$cuarto_seguridad_propiedad_s = array(
    'name' => 'cuarto_seguridad_propiedad',
    'id' => 'cuarto_seguridad_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->cuarto_servicio_propiedad),
);
$cuarto_seguridad_propiedad_n = array(
    'name' => 'cuarto_seguridad_propiedad',
    'id' => 'cuarto_seguridad_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->cuarto_servicio_propiedad),
);
$lavanderia_propiedad_s = array(
    'name' => 'lavanderia_propiedad',
    'id' => 'lavanderia_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->lavanderia_propiedad),
);
$lavanderia_propiedad_n = array(
    'name' => 'lavanderia_propiedad',
    'id' => 'lavanderia_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->lavanderia_propiedad),
);
$gas_propano_propiedad_s = array(
    'name' => 'gas_propano_propiedad',
    'id' => 'gas_propano_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->gas_propano_propiedad),
);
$gas_propano_propiedad_n = array(
    'name' => 'gas_propano_propiedad',
    'id' => 'gas_propano_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->gas_propano_propiedad),
);
$calentador_agua_propiedad_s = array(
    'name' => 'calentador_agua_propiedad',
    'id' => 'calentador_agua_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->calentador_agua_propiedad),
);
$calentador_agua_propiedad_n = array(
    'name' => 'calentador_agua_propiedad',
    'id' => 'calentador_agua_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->calentador_agua_propiedad),
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
    '2 carros' => '2 carros',
    '3 carros' => '3 carros',
    '4 carros' => '4 carros',
    'más de 4 carros' => 'más de 4 carros'
);
$parqueo_propiedad_select = array(
    'name' => 'parqueo_propiedad',
    'id' => 'parqueo_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$parqueo_propiedad_options = array(
    'no' => 'no',
    '1 carro' => '1 carro',
    '2 carros' => '2 carros',
    '3 carros' => '3 carros',
    '4 carros' => '4 carros',
    'más de 4 carros' => 'más de 4 carros'
);
$parqueo_propiedad_s = array(
    'name' => 'parqueo_propiedad',
    'id' => 'parqueo_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->parqueo_propiedad),
);
$parqueo_propiedad_n = array(
    'name' => 'parqueo_propiedad',
    'id' => 'parqueo_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->parqueo_propiedad),
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
    'checked' => radio_helper('si', $propiedad->seguridad_privada_propiedad),
);
$seguridad_privada_propiedad_n = array(
    'name' => 'seguridad_privada_propiedad',
    'id' => 'seguridad_privada_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->seguridad_privada_propiedad),
);
$garita_control_propiedad_s = array(
    'name' => 'garita_control_propiedad',
    'id' => 'garita_control_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->garita_control_propiedad),
);
$garita_control_propiedad_n = array(
    'name' => 'garita_control_propiedad',
    'id' => 'garita_control_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->garita_control_propiedad),
);
$sala_propiedad_s = array(
    'name' => 'sala_propiedad',
    'id' => 'sala_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->sala_propiedad),
);
$sala_propiedad_n = array(
    'name' => 'sala_propiedad',
    'id' => 'sala_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->sala_propiedad),
);
$sala_reuniones_propiedad_s = array(
    'name' => 'sala_reuniones_propiedad',
    'id' => 'sala_reuniones_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->sala_reuniones_propiedad),
);
$sala_reuniones_propiedad_n = array(
    'name' => 'sala_reuniones_propiedad',
    'id' => 'sala_reuniones_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->sala_reuniones_propiedad),
);
$comedor_propiedad_s = array(
    'name' => 'comedor_propiedad',
    'id' => 'comedor_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->comedor_propiedad),
);
$comedor_propiedad_n = array(
    'name' => 'comedor_propiedad',
    'id' => 'comedor_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->comedor_propiedad),
);

$gradas_propiedad_select = array(
    'name' => 'gradas_propiedad',
    'id' => 'gradas_propiedad',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$gradas_propiedad_options = array(
    'no' => 'no',
    'madera' => 'madera',
    'piso' => 'piso',
    'cemento' => 'cemento',
    'metal' => 'metal',
);
$bodega_interior_propiedad_s = array(
    'name' => 'bodega_interior_propiedad',
    'id' => 'bodega_interior_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->bodega_interior_propiedad),
);
$bodega_interior_propiedad_n = array(
    'name' => 'bodega_interior_propiedad',
    'id' => 'bodega_interior_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->bodega_interior_propiedad),
);
$pergola_propiedad_s = array(
    'name' => 'pergola_propiedad',
    'id' => 'pergola_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->pergola_propiedad),
);
$pergola_propiedad_n = array(
    'name' => 'pergola_propiedad',
    'id' => 'pergola_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->pergola_propiedad),
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
    'value' => $propiedad->nombre_condominio_propiedad,
);
$sala_famiiar_propiedad_s = array(
    'name' => 'sala_famiiar_propiedad',
    'id' => 'sala_famiiar_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->sala_famiiar_propiedad),
);
$sala_famiiar_propiedad_n = array(
    'name' => 'sala_famiiar_propiedad',
    'id' => 'sala_famiiar_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->sala_famiiar_propiedad),
);
$sala_juegos_propiedad_s = array(
    'name' => 'sala_juegos_propiedad',
    'id' => 'sala_juegos_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->sala_juegos_propiedad),
);
$sala_juegos_propiedad_n = array(
    'name' => 'sala_juegos_propiedad',
    'id' => 'sala_juegos_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->sala_juegos_propiedad),
);
$chimenea_propiedad_s = array(
    'name' => 'chimenea_propiedad',
    'id' => 'chimenea_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->chimenea_propiedad),
);
$chimenea_propiedad_n = array(
    'name' => 'chimenea_propiedad',
    'id' => 'chimenea_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->chimenea_propiedad),
);
$piscina_propiedad_s = array(
    'name' => 'piscina_propiedad',
    'id' => 'piscina_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->piscina_propiedad),
);
$piscina_propiedad_n = array(
    'name' => 'piscina_propiedad',
    'id' => 'piscina_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->piscina_propiedad),
);
$agua_propiedad_s = array(
    'name' => 'agua_propiedad',
    'id' => 'agua_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->agua_propiedad),
);
$agua_propiedad_n = array(
    'name' => 'agua_propiedad',
    'id' => 'agua_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->agua_propiedad),
);
$luz_propiedad_s = array(
    'name' => 'luz_propiedad',
    'id' => 'luz_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->luz_propiedad),
);
$luz_propiedad_n = array(
    'name' => 'luz_propiedad',
    'id' => 'luz_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->luz_propiedad),
);
$cable_internet_propiedad_s = array(
    'name' => 'cable_internet_propiedad',
    'id' => 'cable_internet_propiedad_s',
    'value' => 'si',
    'checked' => radio_helper('si', $propiedad->cable_internet_propiedad),
);
$cable_internet_propiedad_n = array(
    'name' => 'cable_internet_propiedad',
    'id' => 'cable_internet_propiedad_n',
    'value' => 'no',
    'checked' => radio_helper('no', $propiedad->cable_internet_propiedad),
);
$comentario_propiedad = array(
    'name' => 'comentario_propiedad',
    'id' => 'comentario_propiedad',
    'class' => ' browser-default form-control',
    'rows' => ' 4',
    'value' => $propiedad->comentario_propiedad,
);
?>
<?php $this->start('css_p') ?>
<!-- Dropzone -->
<link rel="stylesheet" href="<?php base_url() ?>/ui/vendor/dropzone/dropzone.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/ui/vendor/cropperjs/cropper.min.css"/>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="container-fluid">

    <?php if (isset($message)) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $message; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-12 col-xl-8">
            <h2>Datos de propiedad</h2>
            <form action="<?php echo base_url() ?>admin/guardar_propiedad" method="post" id="subir_casa_form">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button">
                                    Datos de la propiedad
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class=" show">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="identity">Modo propiedad</label>
                                        <?php echo form_dropdown($modo_propiedad_select, $modo_propiedad_options, $propiedad->modo_propiedad) ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="identity">Tipo de propiedad</label>
                                        <?php echo form_dropdown($tipo_propiedad_select, $tipo_propiedad_options, $propiedad->tipo_propiedad) ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="departamento">Departamento</label>
                                        <?php echo form_dropdown($departamentos_select, $departamentos_select_options, $propiedad->id_departamento) ?>
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

                                    <div class="form-group col-md-8">
                                        <label for="direccion_propiedad">Dirección (opcional)</label>
                                        <?php echo form_input($direccion_propiedad_input); ?>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="precio">Titulo propiedad</label>
                                        <?php echo form_input($titulo_propiedad); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="departamento">Tipo de vendedor</label>
                                        <?php echo form_dropdown($tipo_vendedor_select, $tipo_vendedor_options, $propiedad->tipo_vendedor) ?>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="precio">Precio</label>
                                        <div class="input-group">
                                            <?php echo form_input($precio_input); ?>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <?php echo form_dropdown($moneda_propiedad_select, $moneda_propiedad_options,  $propiedad->moneda_propiedad) ?>
                                                </div>
                                            </div>
                                        </div>
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
                                    <label for="baño_visita_propiedad">Niveles</label>
                                    <?php echo form_input($niveles_porpiedad); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="cable_internet_propiedad">parqueo propiedad</label>
                                        <div class="form-check ">
                                            <?php echo form_dropdown($parqueo_propiedad_select, $parqueo_propiedad_options, $propiedad->parqueo_propiedad ) ?>

                                            <?php /*echo form_radio($parqueo_propiedad_s); */?><!--
                                            <label class="form-check-label" for="cable_internet_propiedad_s">Si</label>
                                            <?php /*echo form_radio($parqueo_propiedad_n); */?>
                                            <label class="form-check-label" for="cable_internet_propiedad_n">No</label>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="comentario_propiedad">Descripción</label>
                                    <?php echo form_textarea($comentario_propiedad); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Datos de contacto
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="nombre_contacto_propiedad">Nombre contacto</label>
                                        <?php echo form_input($nombre_contacto_input); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="identity">Telefono</label>
                                        <div class="input-group">
                                            <?php echo form_input($telefono_input); ?>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    Whatsapp
                                                    <div class="form-check ">
                                                        <?php echo form_radio($telefono_wp_s); ?>
                                                        <label class="form-check-label" for="telefono_wp_s">Si</label>

                                                        <?php echo form_radio($telefono_wp_n); ?>
                                                        <label class="form-check-label" for="telefono_wp_n">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="identity">Telefono 2</label>
                                        <div class="input-group">
                                            <?php echo form_input($telefono2_input); ?>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    Whatsapp
                                                    <div class="form-check ">
                                                        <?php echo form_radio($telefono2_wp_s); ?>
                                                        <label class="form-check-label" for="telefono2_wp_s">Si</label>

                                                        <?php echo form_radio($telefono2_wp_n); ?>
                                                        <label class="form-check-label" for="telefono2_wp_n">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">

                                        <label for="correo_contacto">Correo contacto</label>
                                        <?php echo form_input($correo_contacto_input); ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingthree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse"
                                        data-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">
                                    Extras
                                </button>
                            </h2>
                        </div>
                        <div id="collapsethree" class="collapse" aria-labelledby="headingthree"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="departamento">Tamaño del terreno</label>
                                        <div class="input-group">
                                            <?php echo form_input($tamano_terreno_propiedad_input); ?>
                                            <div class="input-group-append">
                                                <?php echo form_dropdown($tipo_medida_propiedad_select, $tipo_medida_propiedad_options, $propiedad->tipo_medida_propiedad); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="medida_construccion_propiedad">Medida Construccion</label>
                                        <div class="input-group mb-3">
                                            <?php echo form_input($medida_construccion_propiedad_input); ?>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Metros cuadrados</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="zona">Medida Oficina</label>
                                        <?php echo form_input($medida_oficina_propiedad_input); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="habitaciones_propiedad">Balcón</label>
                                        <div class="form-check ">
                                            <?php echo form_radio($balcon_propiedad_s); ?>
                                            <label class="form-check-label" for="balcon_propiedad_s">Si</label>

                                            <?php echo form_radio($balcon_propiedad_n); ?>
                                            <label class="form-check-label" for="balcon_propiedad_n">No</label>
                                        </div>

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
                                            <?php echo form_radio($cuarto_seguridad_propiedad_s); ?>
                                            <label class="form-check-label" for="cuarto_servicio_propiedad_s">Si</label>

                                            <?php echo form_radio($cuarto_seguridad_propiedad_n); ?>
                                            <label class="form-check-label" for="cuarto_servicio_propiedad_n">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="baño_visita_propiedad">Lavandería</label>
                                        <div class="form-check ">
                                            <?php echo form_radio($lavanderia_propiedad_s); ?>
                                            <label class="form-check-label" for="lavanderia_propiedad_s">Si</label>

                                            <?php echo form_radio($lavanderia_propiedad_n); ?>
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
                                        <?php echo form_dropdown($garage_propiedad_select, $garage_propiedad_options, $propiedad->garage_propiedad ) ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="parqueo_visitas_propiedad">Parqueo visitas</label>
                                        <?php echo form_dropdown($parqueo_visitas_propiedad_select, $parqueo_visitas_propiedad_options,$propiedad->parqueo_visitas_propiedad ); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="seguridad_privada_propiedad">Seguridad Privada</label>
                                        <div class="form-check ">
                                            <?php echo form_radio($seguridad_privada_propiedad_s); ?>
                                            <label class="form-check-label"
                                                   for="seguridad_privada_propiedad_s">Si</label>
                                            <?php echo form_radio($seguridad_privada_propiedad_n); ?>
                                            <label class="form-check-label"
                                                   for="seguridad_privada_propiedad_n">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="garita_control_propiedad">Garita de control</label>
                                        <div class="form-check ">
                                            <?php echo form_radio($garita_control_propiedad_s); ?>
                                            <label class="form-check-label" for="garita_control_propiedad_s">Si</label>
                                            <?php echo form_radio($garita_control_propiedad_n); ?>
                                            <label class="form-check-label" for="garita_control_propiedad_n">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="sala_reuniones_propiedad">Sala</label>
                                        <div class="form-check ">
                                            <?php echo form_radio($sala_propiedad_s); ?>
                                            <label class="form-check-label" for="sala_propiedad_s">Si</label>
                                            <?php echo form_radio($sala_propiedad_n); ?>
                                            <label class="form-check-label" for="sala_propiedad_n">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="sala_reuniones_propiedad">Sala de reuniones</label>
                                        <div class="form-check ">
                                            <?php echo form_radio($sala_reuniones_propiedad_s); ?>
                                            <label class="form-check-label" for="sala_reuniones_propiedad_s">Si</label>
                                            <?php echo form_radio($sala_reuniones_propiedad_n); ?>
                                            <label class="form-check-label" for="sala_reuniones_propiedad_n">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
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
                                        <?php echo form_dropdown($gradas_propiedad_select, $gradas_propiedad_options, $propiedad->gradas_propiedad) ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bodega_interior_propiedad">Bodega interior</label>
                                        <div class="form-check ">
                                            <?php echo form_radio($bodega_interior_propiedad_s); ?>
                                            <label class="form-check-label" for="bodega_interior_propiedad_s">Si</label>
                                            <?php echo form_radio($bodega_interior_propiedad_n); ?>
                                            <label class="form-check-label" for="bodega_interior_propiedad_n">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="sala_famiiar_propiedad">Pergola</label>
                                        <div class="form-check ">
                                            <?php echo form_radio($pergola_propiedad_s); ?>
                                            <label class="form-check-label" for="pergola_propiedad_s">Si</label>
                                            <?php echo form_radio($pergola_propiedad_n); ?>
                                            <label class="form-check-label" for="$pergola_propiedad_n">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="menaje_propiedad">Menaje</label>
                                        <?php echo form_dropdown($menaje_propiedad_select, $menaje_propiedad_options, $propiedad->menaje_propiedad) ?>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <a class="btn btn-success" href="<?php echo base_url()?>User/perfil">Terminar</a>
            </form>

        </div>
        <div class="col-12 col-xl-4">
            <h2>Imagenes de propiedad</h2>

            <div class="container">
                <?php if (isset($message)) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?php echo $message; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <?php if ($propiedad) { ?>
                    <div class="card">
                        <div class="card-header">
                            Subir imágenes propiedad ID:<?php echo $propiedad->Id_propiedad; ?>
                            - <?php echo $propiedad->titulo_propiedad; ?>
                        </div>
                        <div class="card-body">
                            <?php if (isset($mensaje)) { ?>

                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <?php echo $mensaje ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php } ?>
                            <form action="<?php echo base_url() ?>Productos/guardar_imagen" class="dropzone" id="dpf">
                                <div class="fallback">
                                    <input name="file" type="file" multiple/>
                                </div>
                            </form>
                            <hr>
                            <?php
                            if ($fotos_propiedad) {
                                ?>
                                <div class="row">
                                    <?php foreach ($fotos_propiedad->result() as $imagen) { ?>
                                        <div class="col-md-4">
                                            <div class="card" >
                                                <?php // print_contenido($imagen); ?>
                                                <img class="card-img-top" src="<?php echo base_url() . '/web/propiedades_pic/' . $imagen->nombre_imagen; ?>" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="fas fa-file-image"></i> <?php echo $imagen->nombre_imagen ?></h5>
                                                    <p class="card-text">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">orden</label>
                                                        <input type="number" min="1" class="form-control orden_input" id="orden_image_<?php echo $propiedad->Id_propiedad ?>" value="<?php echo $imagen->orden_imagen;?>" casa_id="<?php echo $propiedad->Id_propiedad ?>" imagen_id="<?php echo $imagen->imagen_id; ?>"  placeholder="">

                                                    </div>
                                                    </p>
                                                    <a href="<?php echo base_url() . 'admin/borrar_imagen/' . $imagen->imagen_id . '/' . $propiedad->Id_propiedad; ?>"
                                                       class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                            <?php } ?>
                        </div>
                    </div>

                <?php } else { ?>
                    <div class="row">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×
                            </button>
                            <h4><i class="fas fa-bell"></i> La propiedad que busca no existe</h4>
                        </div>
                    </div>
                <?php } ?>

                <div class="col s12 m3">
                    <div class="card upl_card">
                        <div class="card-image">
                            <label class="" title="img_9">
                                <?php
                                if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (9).jpg')) { ?>
                                    <img src="<?php  echo base_url().'web/images_cont/' . $carro->id_carro . ' (9).jpg' ?>"
                                         id="img_9_placeholder" >
                                <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/9.jpg"
                                         id="img_9_placeholder">
                                <?php } ?>
                                <input type="file" class="sr-only" id="input_img_9" name="input_img_9"
                                       accept="image/*">
                            </label>
                        </div>
                        <div class="card-content">
                            <div class="progress" id="progress_img_9">
                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                     id="progress_bar_img_9" role="progressbar"
                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                </div>
                            </div>
                            <div class="alert" role="alert" id="alert_img_9"></div>
                        </div>
                        <div class="card-action">
                            subir imágen (toque la imágen)
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal Structure -->

    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Ajustar Imagen</h4>
            <div class="img-container">
                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
            </div>
        </div>
        <div class="modal-footer">

            <a class="waves-effect waves-light btn" id="zoom_in_btn">
                <i class="icon-zoom-in"></i>Acercar
            </a>
            <a class="waves-effect waves-light btn" id="zoom_off_btn">
                <i class="icon-zoom-out"></i>Alejar
            </a>
            <a class="waves-effect waves-light btn" id="rotate_btn">
                <i class="material-icons left">crop_rotate</i>Girar
            </a>
            <a href="#!" class="modal-action modal-close waves-effect waves-light btn" id="crop">
                Subir imagenes
            </a>

        </div>
    </div>


</div>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<!-- Dropzone js-->
<script src="<?php echo base_url(); ?>/ui/vendor/dropzone/dropzone.js"></script>
<script src="<?php echo base_url() ?>/ui/vendor/cropperjs/cropper.min.js"></script>
<!-- page script -->
<script>

    //live edit

    var id_propiedad = '<?php echo $propiedad->Id_propiedad;?>';
    var modo_propiedad;
    var moneda_propiedad;
    var titulo_propiedad;
    var tipo_vendedor;
    var correo_contacto;
    var telefono;
    var telefono_wp;
    var telefono2;
    var telefono2_wp;
    var user_id_propiedad;
    var nombre_contacto_propiedad;
    var precio_propiedad;
    var tipo_propiedad;
    var fecha_creacion_propiedad;
    var fecha_aprovacion_propiedad;
    var estado_propiedad;
    var id_departamento;
    var id_municipio;
    var id_zona;
    var direccion_propiedad;
    var tamaño_terreno_propiedad;
    var tipo_medida_propiedad;
    var medida_construccion_propiedad;
    var medida_oficina_propiedad;
    var habitaciones_propiedad;
    var baños_completos_propiedad;
    var baño_visita_propiedad;
    var balcon_propiedad;
    var niveles_porpiedad;
    var cocina_propiedad;
    var desayunador_propiedad;
    var lineablanca_propiedad;
    var amueblada_propiedad;
    var cuarto_servicio_propiedad;
    var cuarto_seguridad_propiedad;
    var lavanderia_propiedad;
    var gas_propano_propiedad;
    var calentador_agua_propiedad;
    var garage_propiedad;
    var parqueo_propiedad;
    var parqueo_visitas_propiedad;
    var seguridad_privada_propiedad;
    var garita_control_propiedad;
    var sala_propiedad;
    var sala_reuniones_propiedad;
    var comedor_propiedad;
    var gradas_propiedad;
    var bodega_interior_propiedad;
    var pergola_propiedad;
    var menaje_propiedad;
    var nombre_condominio_propiedad;
    var sala_famiiar_propiedad;
    var sala_juegos_propiedad;
    var chimenea_propiedad;
    var piscina_propiedad;
    var agua_propiedad;
    var luz_propiedad;
    var cable_internet_propiedad;
    var comentario_propiedad;

    function detectBrowser() {
        var N = navigator.appName;
        var UA = navigator.userAgent;
        var temp;
        var browserVersion = UA.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
        if (browserVersion && (temp = UA.match(/version\/([\.\d]+)/i)) != null)
            browserVersion[2] = temp[1];
        browserVersion = browserVersion ? [browserVersion[1], browserVersion[2]] : [N, navigator.appVersion, '-?'];
        return browserVersion;
    };
    //$("input[name='cerradura_c']:checked").val();

    $("#subir_casa_form").change(function () {
        modo_propiedad = $("#modo_propiedad option:selected").text();
        moneda_propiedad = $("#moneda_propiedad option:selected").text();
        titulo_propiedad = $("#titulo_propiedad").val();
        tipo_vendedor = $("#tipo_vendedor option:selected").text();
        correo_contacto = $("#correo_contacto").val();
        nombre_contacto_propiedad = $("#nombre_contacto_propiedad").val();
        tipo_propiedad = $("#tipo_propiedad option:selected").text();
        id_departamento = $("#id_departamento option:selected").val();
        id_municipio = $("#id_municipio option:selected").val();
        id_zona = $("#id_zona").val();
        direccion_propiedad =$("#direccion_propiedad").val();
        precio_propiedad = $("#precio").val();
        comentario_propiedad = $("#comentario_propiedad").val();
        telefono = $("#telefono").val();
        telefono_wp  = $("input[name='telefono_wp']:checked").val();
        telefono2 = $("#telefono2").val();
        telefono2_wp = $("input[name='telefono2_wp']:checked").val();
        tamaño_terreno_propiedad = $("#tamano_terreno_propiedad").val();
        tipo_medida_propiedad = $("#tipo_medida_propiedad option:selected").val();
        medida_construccion_propiedad   = $("#medida_construccion_propiedad").val();
        medida_oficina_propiedad = $("#medida_oficina_propiedad").val();
        habitaciones_propiedad = $("#habitaciones_propiedad").val();
        baños_completos_propiedad = $("#baños_completos_propiedad").val();
        baño_visita_propiedad = $("#baño_visita_propiedad").val();
        balcon_propiedad = $("input[name='balcon_propiedad']:checked").val();
        niveles_porpiedad = $("#niveles_porpiedad").val();
        cocina_propiedad = $("input[name='cocina_propiedad']:checked").val();
        desayunador_propiedad = $("input[name='desayunador_propiedad']:checked").val();
        lineablanca_propiedad = $("input[name='lineablanca_propiedad']:checked").val();
        amueblada_propiedad = $("input[name='amueblada_propiedad']:checked").val();
        cuarto_servicio_propiedad = $("input[name='cuarto_servicio_propiedad']:checked").val();
        cuarto_seguridad_propiedad = $("input[name='cuarto_seguridad_propiedad']:checked").val();
        lavanderia_propiedad = $("input[name='lavanderia_propiedad']:checked").val();
        gas_propano_propiedad = $("input[name='gas_propano_propiedad']:checked").val();
        calentador_agua_propiedad = $("input[name='desayunador_propiedad']:checked").val();
        garage_propiedad = $("#garage_propiedad option:selected").text();
        //parqueo_propiedad =  $("input[name='parqueo_propiedad']:checked").val();
        parqueo_propiedad =  $("#parqueo_propiedad option:selected").text();
        parqueo_visitas_propiedad =$("#parqueo_visitas_propiedad option:selected").text();
        seguridad_privada_propiedad = $("input[name='seguridad_privada_propiedad']:checked").val();
        garita_control_propiedad = $("input[name='garita_control_propiedad']:checked").val();
        sala_propiedad = $("input[name='sala_propiedad']:checked").val();
        sala_reuniones_propiedad = $("input[name='sala_reuniones_propiedad']:checked").val();
        comedor_propiedad = $("input[name='comedor_propiedad']:checked").val();
        gradas_propiedad =$("#gradas_propiedad option:selected").text();
        bodega_interior_propiedad = $("input[name='garita_control_propiedad']:checked").val();
        pergola_propiedad = $("input[name='garita_control_propiedad']:checked").val();
        menaje_propiedad=$("#menaje_propiedad option:selected").text();
        nombre_condominio_propiedad = $("#nombre_condominio_propiedad").val();
        sala_famiiar_propiedad = $("input[name='sala_famiiar_propiedad']:checked").val();
        sala_juegos_propiedad = $("input[name='sala_juegos_propiedad']:checked").val();
        chimenea_propiedad = $("input[name='chimenea_propiedad']:checked").val();
        piscina_propiedad = $("input[name='piscina_propiedad']:checked").val();
        agua_propiedad = $("input[name='agua_propiedad']:checked").val();
        luz_propiedad = $("input[name='luz_propiedad']:checked").val();
        cable_internet_propiedad = $("input[name='cable_internet_propiedad']:checked").val();

        form_data = {
            id_propiedad: id_propiedad,
            modo_propiedad: modo_propiedad,
            moneda_propiedad: moneda_propiedad,
            titulo_propiedad: titulo_propiedad,
            tipo_vendedor: tipo_vendedor,
            correo_contacto: correo_contacto,
            nombre_contacto_propiedad: nombre_contacto_propiedad,
            telefono: telefono,
            telefono_wp: telefono_wp,
            telefono2: telefono2,
            telefono2_wp: telefono2_wp,
            user_id_propiedad: user_id_propiedad,
            precio_propiedad: precio_propiedad,
            tipo_propiedad: tipo_propiedad,
            fecha_creacion_propiedad: fecha_creacion_propiedad,
            fecha_aprovacion_propiedad: fecha_aprovacion_propiedad,
            estado_propiedad: estado_propiedad,
            id_departamento: id_departamento,
            id_municipio: id_municipio,
            id_zona: id_zona,
            direccion_propiedad: direccion_propiedad,
            tamano_terreno_propiedad: tamaño_terreno_propiedad,
            tipo_medida_propiedad: tipo_medida_propiedad,
            medida_construccion_propiedad: medida_construccion_propiedad,
            medida_oficina_propiedad: medida_oficina_propiedad,
            habitaciones_propiedad: habitaciones_propiedad,
            baños_completos_propiedad: baños_completos_propiedad,
            baño_visita_propiedad: baño_visita_propiedad,
            balcon_propiedad: balcon_propiedad,
            niveles_porpiedad: niveles_porpiedad,
            cocina_propiedad: cocina_propiedad,
            desayunador_propiedad: desayunador_propiedad,
            lineablanca_propiedad: lineablanca_propiedad,
            amueblada_propiedad: amueblada_propiedad,
            cuarto_servicio_propiedad: cuarto_servicio_propiedad,
            cuarto_seguridad_propiedad: cuarto_seguridad_propiedad,
            lavanderia_propiedad: lavanderia_propiedad,
            gas_propano_propiedad: gas_propano_propiedad,
            calentador_agua_propiedad: calentador_agua_propiedad,
            garage_propiedad: garage_propiedad,
            parqueo_propiedad: parqueo_propiedad,
            parqueo_visitas_propiedad: parqueo_visitas_propiedad,
            seguridad_privada_propiedad: seguridad_privada_propiedad,
            garita_control_propiedad: garita_control_propiedad,
            sala_propiedad: sala_propiedad,
            sala_reuniones_propiedad: sala_reuniones_propiedad,
            comedor_propiedad: comedor_propiedad,
            gradas_propiedad: gradas_propiedad,
            bodega_interior_propiedad: bodega_interior_propiedad,
            pergola_propiedad: pergola_propiedad,
            menaje_propiedad: menaje_propiedad,
            nombre_condominio_propiedad: nombre_condominio_propiedad,
            sala_famiiar_propiedad: sala_famiiar_propiedad,
            sala_juegos_propiedad: sala_juegos_propiedad,
            chimenea_propiedad: chimenea_propiedad,
            piscina_propiedad: piscina_propiedad,
            agua_propiedad: agua_propiedad,
            luz_propiedad: luz_propiedad,
            cable_internet_propiedad: cable_internet_propiedad,
            comentario_propiedad: comentario_propiedad
        };

        console.log(form_data);
        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>User/guardar_propiedad",
            data: form_data
        })
            .done(function (msg) {
                console.log("Data Saved: " + msg);
            });
    });


    //variables
    // This example uses jQuery so it creates the Dropzone, only when the DOM has
    // loaded.
    // Disabling autoDiscover, otherwise Dropzone will try to attach twice.
    Dropzone.autoDiscover = false;
    // or disable for specific dropzone:
    // Dropzone.options.myDropzone = false;
    $(function () {
        // Now that the DOM is fully loaded, create the dropzone, and setup the
        // event listeners
        var myDropzone = new Dropzone("#dpf ",
            {
                url: "<?php echo base_url()?>Admin/guardar_imagen?pid=<?php echo $propiedad->Id_propiedad;?>",
                paramName: "imagen_propiedad",
                parallelUploads: 1,
                maxFiles: 15,
                acceptedFiles: ".jpg,.jpeg",
                resizeWidth: '1920',
                //resizeMimeType: '.jpg',
                //uploadMultiple: true,
                //chunking: true,
                //retryChunks: true,
                //forceChunking: true,
                //chunkSize: 500000,
                //retryChunksLimit: 40,
                //method: "post",
                //withCredentials: true,
                headers: {
                    "propiedad_id": "<?php echo $propiedad->Id_propiedad;?>"
                }
            })
        ;

        myDropzone.on("addedfile", function (file) {
            //console.log(file)
            /* Maybe display some more file information on your page */
        });
        myDropzone.on("success", function (file, data) {
            //console.log(file);
            console.log(data);
            window.navigator.vibrate(200);
            //location.reload();
            /* Maybe display some more file information on your page */
        });

        myDropzone.on("queuecomplete", function () {
            location.reload();
            /* Maybe display some more file information on your page */
        });
    });

    $(".orden_input").change(function (e) {
        console.log('change');
        console.log($(this).val());
        console.log($(this).attr('casa_id'));
        console.log($(this).attr('imagen_id'));

        var orden;
        var casa_id;
        var imagen_id;

        orden = $(this).val();
        casa_id = $(this).attr('casa_id');
        imagen_id = $(this).attr('imagen_id');



        form_data = {
            orden: orden,
            casa_id: casa_id,
            imagen_id: imagen_id
        };

        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>Propiedades/actualizar_orden_img",
            data: form_data
        })
            .done(function (msg) {
                console.log("Data Saved: " + msg);
                location.reload();

            });
    });


    <?php
    if ($fotos_propiedad) {
    ?>
    <div class="row">
        <?php foreach ($fotos_propiedad->result() as $imagen) { ?>
        <?php } ?>

    <?php } ?>

    //croperr
    window.addEventListener('DOMContentLoaded', function () {
        var img_1 = document.getElementById('img_1_placeholder');
        var input_1 = document.getElementById('input_img_1');
        var progress_img_1 = $('#progress_img_1');
        var progress_bar_img_1 = $('#progress_bar_img_1');
        var alert_img_1 = $('#alert_img_1');

        var img_2 = document.getElementById('img_2_placeholder');
        var input_2 = document.getElementById('input_img_2');
        var progress_img_2 = $('#progress_img_2');
        var progress_bar_img_2 = $('#progress_bar_img_2');
        var alert_img_2 = $('#alert_img_2');

        var img_3 = document.getElementById('img_3_placeholder');
        var input_3 = document.getElementById('input_img_3');
        var progress_img_3 = $('#progress_img_3');
        var progress_bar_img_3 = $('#progress_bar_img_3');
        var alert_img_3 = $('#alert_img_3');

        var img_4 = document.getElementById('img_4_placeholder');
        var input_4 = document.getElementById('input_img_4');
        var progress_img_4 = $('#progress_img_4');
        var progress_bar_img_4 = $('#progress_bar_img_4');
        var alert_img_4 = $('#alert_img_4');

        var img_5 = document.getElementById('img_5_placeholder');
        var input_5 = document.getElementById('input_img_5');
        var progress_img_5 = $('#progress_img_5');
        var progress_bar_img_5 = $('#progress_bar_img_5');
        var alert_img_5 = $('#alert_img_5');

        var img_6 = document.getElementById('img_6_placeholder');
        var input_6 = document.getElementById('input_img_6');
        var progress_img_6 = $('#progress_img_6');
        var progress_bar_img_6 = $('#progress_bar_img_6');
        var alert_img_6 = $('#alert_img_6');

        var img_7 = document.getElementById('img_7_placeholder');
        var input_7 = document.getElementById('input_img_7');
        var progress_img_7 = $('#progress_img_7');
        var progress_bar_img_7 = $('#progress_bar_img_7');
        var alert_img_7 = $('#alert_img_7');

        var img_8 = document.getElementById('img_8_placeholder');
        var input_8 = document.getElementById('input_img_8');
        var progress_img_8 = $('#progress_img_8');
        var progress_bar_img_8 = $('#progress_bar_img_8');
        var alert_img_8 = $('#alert_img_8');

        var img_9 = document.getElementById('img_9_placeholder');
        var input_9 = document.getElementById('input_img_9');
        var progress_img_9 = $('#progress_img_9');
        var progress_bar_img_9 = $('#progress_bar_img_9');
        var alert_img_9 = $('#alert_img_9');

        var img_10 = document.getElementById('img_10_placeholder');
        var input_10 = document.getElementById('input_img_10');
        var progress_img_10 = $('#progress_img_10');
        var progress_bar_img_10 = $('#progress_bar_img_10');
        var alert_img_10 = $('#alert_img_10');


        var avatar = document.getElementById('avatar');
        var image = document.getElementById('image');
        var input = document.getElementById('input');
        var $progress = $('.progress');
        var $progressBar = $('.progress-bar');
        var $alert = $('.alert');
        var $modal = $('#modal');
        var cropper;

        //herramientas zoom
        $("#zoom_in_btn").click(function () {
            cropper.zoom(0.1);
        });
        $("#zoom_off_btn").click(function () {
            cropper.zoom(-0.1);
        });
        $("#rotate_btn").click(function () {
            cropper.rotate(90);
        });


        $('[data-toggle="tooltip"]').tooltip();

        //img 1 event listener
        input_1.addEventListener('change', function (e) {
            img_placeholder = 'img_1_placeholder';
            imagen_number = 1;
            progress = progress_img_1;
            alert = alert_img_1;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                console.log(input_1.id);
                $('#modal1').modal('open', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 2,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 2 event listener
        input_2.addEventListener('change', function (e) {
            img_placeholder = 'img_2_placeholder';
            imagen_number = 2;
            progress = progress_img_2;
            alert = alert_img_2;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                console.log(input_1.id);
                $('#modal1').modal('open', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 2,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 3 event listener
        input_3.addEventListener('change', function (e) {
            img_placeholder = 'img_3_placeholder';
            imagen_number = 3;
            progress = progress_img_3;
            alert = alert_img_3;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 4 event listener
        input_4.addEventListener('change', function (e) {
            img_placeholder = 'img_4_placeholder';
            imagen_number = 4;
            progress = progress_img_4;
            alert = alert_img_4;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 5 event listener
        input_5.addEventListener('change', function (e) {
            img_placeholder = 'img_5_placeholder';
            imagen_number = 5;
            progress = progress_img_5;
            alert = alert_img_5;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 6 event listener
        input_6.addEventListener('change', function (e) {
            img_placeholder = 'img_6_placeholder';
            imagen_number = 6;
            progress = progress_img_6;
            alert = alert_img_6;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 7 event listener
        input_7.addEventListener('change', function (e) {
            img_placeholder = 'img_7_placeholder';
            imagen_number = 7;
            progress = progress_img_7;
            alert = alert_img_7;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 8 event listener
        input_8.addEventListener('change', function (e) {
            img_placeholder = 'img_8_placeholder';
            imagen_number = 8;
            progress = progress_img_8;
            alert = alert_img_8;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 9 event listener
        input_9.addEventListener('change', function (e) {
            img_placeholder = 'img_9_placeholder';
            imagen_number = 9;
            progress = progress_img_9;
            alert = alert_img_9;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 10 event listener
        input_10.addEventListener('change', function (e) {
            img_placeholder = 'img_10_placeholder';
            imagen_number = 10;
            progress = progress_img_10;
            alert = alert_img_10;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        //crop and upload
        document.getElementById('crop').addEventListener('click', function () {
            var initialAvatarURL;
            var canvas;
            //$modal.modal('close');
            $('#modal1').modal('close');
            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 638,
                    height: 359,
                });
                console.log(img_placeholder);
                avatar = document.getElementById(img_placeholder);
                initialAvatarURL = avatar.src;
                avatar.src = canvas.toDataURL();

                $progress = progress;
                $progress.show();

                $alert = alert;
                $alert.removeClass('alert-success alert-warning');
                canvas.toBlob(function (blob) {
                    var formData = new FormData();
                    formData.append('imagen', blob);
                    formData.append('id_carro', '<?php echo $propiedad->Id_propiedad; ?>');
                    formData.append('img_number', imagen_number);
                    //$.ajax('https://jsonplaceholder.typicode.com/posts', {
                    $.ajax('<?php echo base_url()?>cliente/procesar_foto', {
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        xhr: function () {
                            var xhr = new XMLHttpRequest();
                            xhr.upload.onprogress = function (e) {
                                var percent = '0';
                                var percentage = '0%';
                                if (e.lengthComputable) {
                                    percent = Math.round((e.loaded / e.total) * 100);
                                    percentage = percent + '%';
                                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                                }
                            };
                            return xhr;
                        },
                        success: function (msg) {
                            console.log(msg);
                            $alert.show().addClass('alert-success').text('Upload success');
                        },
                        error: function () {
                            avatar.src = initialAvatarURL;
                            $alert.show().addClass('alert-warning').text('Upload error');
                        },
                        complete: function () {
                            $progress.hide();
                        },
                    });
                });
            }
        });
    });
</script>

<script>
    var municipio;
    municipio = '<?php echo $propiedad->id_municipio; ?>';
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
                $("#id_municipio").val(municipio);
                const $select = document.querySelector('#id_municipio');
                $select.value = municipio;
            }
        });
        //cropper
        $(".iframe-container-bottom").remove();
        console.log('removido');
        detectBrowser();
        $(".progress").hide();
        $(".alert").hide();
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
                $("#id_municipio").val(municipio);
            }
        });
    });
</script>
<?php $this->stop() ?>
