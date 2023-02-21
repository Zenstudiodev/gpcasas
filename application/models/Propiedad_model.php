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

    //admin
    public function guardar_propiedad($data)
    {
        $fecha = New DateTime();
        $datos_propiedad = array(
            'modo_propiedad' => $data['modo_propiedad'],
            'user_id_propiedad' => $data['user_id_propiedad'],
            'titulo_propiedad' => $data['titulo_propiedad'],
            'tipo_vendedor' => $data['tipo_vendedor'],
            'telefono' => $data['telefono'],
            'telefono_wp' => $data['telefono_wp'],
            'telefono2' => $data['telefono2'],
            'telefono2_wp' => $data['telefono2_wp'],
            'correo_contacto' => $data['correo_contacto'],
            'precio_propiedad' => $data['precio'],
            'moneda_propiedad' => $data['moneda_propiedad'],
            'tipo_propiedad' => $data['tipo_propiedad'],
            'fecha_creacion_propiedad' => $fecha->format('Y-m-d'),
            'id_departamento' => $data['id_departamento'],
            'id_municipio' => $data['id_municipio'],
            'id_zona' => $data['id_zona'],
            'direccion_propiedad' => $data['direccion_propiedad'],
            'tamaño_terreno_propiedad' => $data['tamano_terreno_propiedad'],
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
            'cable_internet_propiedad' => $data['cable_internet_propiedad'],
            'comentario_propiedad' => $data['comentario_propiedad']
        );

        $this->db->insert('propiedades', $datos_propiedad);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function actualizar_propiedad($data)
    {
        $fecha = New DateTime();
        $propiedad_id = $data['id_propiedad'];
        $datos_propiedad = array(
            'modo_propiedad' => $data['modo_propiedad'],
            //'user_id_propiedad' => $data['user_id_propiedad'],
            'titulo_propiedad' => $data['titulo_propiedad'],
            'tipo_vendedor' => $data['tipo_vendedor'],
            'telefono' => $data['telefono'],
            'telefono_wp' => $data['telefono_wp'],
            'telefono2' => $data['telefono2'],
            'telefono2_wp' => $data['telefono2_wp'],
            'correo_contacto' => $data['correo_contacto'],
            'nombre_contacto_propiedad' => $data['nombre_contacto_propiedad'],
            'precio_propiedad' => $data['precio'],
            'moneda_propiedad' => $data['moneda_propiedad'],
            'tipo_propiedad' => $data['tipo_propiedad'],
            'fecha_creacion_propiedad' => $fecha->format('Y-m-d'),
            'id_departamento' => $data['id_departamento'],
            'id_municipio' => $data['id_municipio'],
            'id_zona' => $data['id_zona'],
            'direccion_propiedad' => $data['direccion_propiedad'],
            'tamano_terreno_propiedad' => $data['tamano_terreno_propiedad'],
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
            'cable_internet_propiedad' => $data['cable_internet_propiedad'],
            'comentario_propiedad' => $data['comentario_propiedad'],
            'estado_propiedad' => 'pendiente',
        );
        //print_contenido($datos_propiedad);
        $this->db->where('Id_propiedad', $propiedad_id);
        $query = $this->db->update('propiedades', $datos_propiedad);

    }

    public function get_propiedades_pendientes()
    {
        $this->db->where('estado_propiedad', 'pendiente');
        $query = $this->db->get('propiedades');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function get_propiedades_de_baja()
    {
        $this->db->where('estado_propiedad', 'baja');
        $query = $this->db->get('propiedades');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function get_propiedades_activas()
    {
        $this->db->where('estado_propiedad', 'alta');
        $query = $this->db->get('propiedades');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function numero_propiedades_activas()
    {
        $this->db->where('estado_propiedad', 'alta');
        $query = $this->db->get('propiedades');
        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }

    public function numero_propiedades_pendientes()
    {
        $this->db->where('estado_propiedad', 'pendiente');
        $query = $this->db->get('propiedades');
        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }

    public function aprobar_propiedad($propiedad_id)
    {
        $datos = array(
            'estado_propiedad' => 'alta',
        );
        $this->db->where('Id_propiedad', $propiedad_id);
        $query = $this->db->update('propiedades', $datos);
    }

    public function baja_propiedad($propiedad_id)
    {
        $datos = array(
            'estado_propiedad' => 'baja',
        );
        $this->db->where('Id_propiedad', $propiedad_id);
        $query = $this->db->update('propiedades', $datos);
    }

    public function get_propiedad_by_id($id)
    {
        $this->db->where('estado_propiedad', 'alta');
        $this->db->where('Id_propiedad', $id);
        $this->db->from('propiedades');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_propiedad_editar_by_id($id)
    {
        //$this->db->where('estado_propiedad', 'alta');
        $this->db->where('Id_propiedad', $id);
        $this->db->from('propiedades');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_propiedad_by_id_subir($id)
    {
        //$this->db->where('estado_propiedad', 'alta');
        $this->db->where('Id_propiedad', $id);
        $this->db->from('propiedades');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function get_propiedaedes_by_user_id($user_id)
    {
        $this->db->where('user_id_propiedad', $user_id);
        $this->db->from('propiedades');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_propiedades_alta_by_user_id($user_id)
    {
        $this->db->where('user_id_propiedad', $user_id);
        $this->db->where('estado_propiedad', 'alta');
        $this->db->from('propiedades');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_propiedades_pendientes_by_user_id($user_id)
    {
        $this->db->where('user_id_propiedad', $user_id);
        $this->db->where('estado_propiedad', 'pendiente');
        $this->db->from('propiedades');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_propiedades_baja_by_user_id($user_id)
    {
        $this->db->where('user_id_propiedad', $user_id);
        $this->db->where('estado_propiedad', 'baja');
        $this->db->from('propiedades');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function resultado_filtro($filtros)
    {

        $tipo = $filtros['tipo'];
        $moneda = $filtros['moneda'];
        $presupuesto = $filtros['presupuesto'];
        $modo = $filtros['modo'];
        $departamento = $filtros['departamento'];
        $municipio = $filtros['municipio'];
        $zona = $filtros['zona'];

        if ($moneda =='Q'){
            $valor_en_quetzales = $filtros['presupuesto'];
            $valor_en_dolares = $filtros['presupuesto'] / 8.00;
            $presupuesto = $valor_en_quetzales;

        }
        if ($moneda =='d'){
            $valor_en_quetzales = $filtros['presupuesto']* 8.00;
            $valor_en_dolares = $filtros['presupuesto'] ;
            $presupuesto = $valor_en_quetzales;
        }
       /* echo 'Q.-'.$valor_en_quetzales;
        echo '$.-'.$valor_en_dolares;*/
       //echo 'presupesto -'.$presupuesto;





        if ($tipo != 'TODOS') {
            $this->db->where('tipo_propiedad', $tipo);
        }
        if ($presupuesto != '0') {
            $this->db->where('precio_propiedad <=', $presupuesto);
        }

        if ($modo != 'TODOS') {
            $this->db->where('modo_propiedad', $modo);
        }
        if ($departamento != 'TODOS') {
            $this->db->where('id_departamento', $departamento);
        }
        if ($municipio != 'TODOS') {
            //echo 'vamos a buscar municipio';
            $this->db->where('id_municipio', $municipio);
        }
        if ($zona != 'TODOS') {
            $this->db->where('id_zona', $filtros['zona']);
        }
        //propiedades activas
        $this->db->where('estado_propiedad', 'alta');
        $this->db->order_by('precio_propiedad', 'desc');
        $this->db->from('propiedades');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;




    }
    public function asignar_asesor($data){
        $datos = array(
            'propiedad_asesor_id'=> $data['propiedad_asesor_id'],
        );
        $this->db->where('Id_propiedad', $data['Id_propiedad']);
        $query = $this->db->update('propiedades', $datos);
    }

    //imagenes propiedad
    public function get_fotos_de_propiedad_by_id($propiedad_id)
    {
        $this->db->where('propiedad_id', $propiedad_id);
        $this->db->order_by('orden_imagen', 'ASC');
        $query = $this->db->get('imagenes_propiedad');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function guardar_foto_tabla_fotos($datos_foto)
    {
        $datos_de_imagen = array(
            'propiedad_id' => $datos_foto['propiedad_id'],
            'extencion' => 'jpg',
            'nombre_imagen' => $datos_foto['nombre_imagen']
        );
        // insertamon en la base de datos
        $this->db->insert('imagenes_propiedad', $datos_de_imagen);
    }

    function get_datos_imagen($imagen_id)
    {
        $this->db->where('imagen_id', $imagen_id);
        $query = $this->db->get('imagenes_propiedad');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function borrar_registro_imagen($imagen_id)
    {
        $this->db->where('imagen_id', $imagen_id);
        $this->db->delete('imagenes_propiedad');
    }

    function actualizar_orden_imagen($data){
        $datos = array(
            'orden_imagen'=> $data['orden'],
        );
        $this->db->where('imagen_id', $data['imagen_id']);
        $query = $this->db->update('imagenes_propiedad', $datos);
    }

    function asignar_casa_dfraft($data){
        $fecha = New DateTime();
        $datos_propiedad = array(
            'plan_propiedad' => $data['plan_propiedad'],
            'user_id_propiedad' => $data['user_id_propiedad'],
            'fecha_creacion_propiedad' => $fecha->format('Y-m-d')
        );
        $this->db->insert('propiedades', $datos_propiedad);
        $insert_id = $this->db->insert_id();
        return $insert_id;

    }




}