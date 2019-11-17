<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 01/10/2019
 * Time: 06:18 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Propiedad_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function guardar_propiedad($data)
    {
        $fecha = New DateTime();
        $datos_propiedad = array(
            'user_id_propiedad' => $data['user_id_propiedad'],
            'fecha_creacion_propiedad' => $fecha->format('Y-m-d'),
            'id_departamento' => $data['id_departamento'],
            'id_municipio' => $data['id_municipio'],
            'id_zona' => $data['id_zona'],
            'direccion_propiedad' => $data['direccion_propiedad'],
            'tamaño_terreno_propiedad' => $data['tamaño_terreno_propiedad'],
            'tipo_medida_propiedad' => $data['tipo_medida_propiedad'],
            'medida_construccion_propiedad' => $data['medida_construccion_propiedad'],
            'medida_oficina_propiedad' => $data['medida_oficina_propiedad'],
            'habitaciones_propiedad' => $data['habitaciones_propiedad'],
            'baños_completos_propiedad' => $data['baños_completos_propiedad'],
            'baño_visita_propiedad' => $data['baño_visita_propiedad'],
            'balcon_propiedad' => $data['balcon_propiedad'],
            'niveles_porpiedad' => $data['niveles_porpiedad'],
            'cocina_propiedad' => $data['cocina_propiedad'],
            'desayunador_propiedad' => $data['desayunador_propiedad'],
            'lineablanca_propiedad' => $data['lineablanca_propiedad'],
            'amueblada_propiedad' => $data['amueblada_propiedad'],
            'cuarto_servicio_propiedad' => $data['cuarto_servicio_propiedad'],
            'cuarto_seguridad_propiedad' => $data['cuarto_seguridad_propiedad'],
            'lavanderia_propiedad' => $data['lavanderia_propiedad'],
            'gas_propano_propiedad' => $data['gas_propano_propiedad'],
            'calentador_agua_propiedad' => $data['calentador_agua_propiedad'],
            'garage_propiedad' => $data['garage_propiedad'],
            'parqueo_propiedad' => $data['parqueo_propiedad'],
            'parqueo_visitas_propiedad' => $data['parqueo_visitas_propiedad'],
            'seguridad_privada_propiedad' => $data['seguridad_privada_propiedad'],
            'garita_control_propiedad' => $data['garita_control_propiedad'],
            'sala_propiedad' => $data['sala_propiedad'],
            'sala_reuniones_propiedad' => $data['sala_reuniones_propiedad'],
            'comedor_propiedad' => $data['comedor_propiedad'],
            'gradas_propiedad' => $data['gradas_propiedad'],
            'bodega_interior_propiedad' => $data['bodega_interior_propiedad'],
            'pergola_propiedad' => $data['pergola_propiedad'],
            'menaje_propiedad' => $data['menaje_propiedad'],
            'nombre_condominio_propiedad' => $data['nombre_condominio_propiedad'],
            'sala_famiiar_propiedad' => $data['sala_famiiar_propiedad'],
            'sala_juegos_propiedad' => $data['sala_juegos_propiedad'],
            'chimenea_propiedad' => $data['chimenea_propiedad'],
            'piscina_propiedad' => $data['piscina_propiedad'],
            'agua_propiedad' => $data['agua_propiedad'],
            'luz_propiedad' => $data['luz_propiedad'],
            'cable_internet_propiedad' => $data['cable_internet_propiedad']
        );

        $this->db->insert('propiedades', $datos_propiedad);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function  get_propiedades_pendientes(){
        $this->db->where('estado_propiedad', 'pendiente');
        $query = $this->db->get('propiedades');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_propiedad_by_id($id){
        $this->db->where('Id_propiedad', $id);
        $this->db->from('propiedades');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
}