<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 30/09/2019
 * Time: 10:55 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        // Modelos
        $this->load->model('Busqueda_model');
        $this->load->model('Propiedad_model');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        echo $this->templates->render('admin/home');
    }

    public function subir_propiedad()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        $data['departamentos'] = $this->Busqueda_model->get_departamentos();
        echo $this->templates->render('admin/subir_propiedad', $data);
    }

    public function guardar_propiedad()
    {
        print_contenido($_POST);

        $datos_propiedad = array(
            'tipo_propiedad' => $this->input->post('tipo_propiedad'),
            'id_departamento' => $this->input->post('id_departamento'),
            'id_municipio' => $this->input->post('id_municipio'),
            'id_zona' => $this->input->post('id_zona'),
            'direccion_propiedad' => $this->input->post('direccion_propiedad'),
            'tamaño_terreno_propiedad' => $this->input->post('tamaño_terreno_propiedad'),
            'tipo_medida_propiedad' => $this->input->post('tipo_medida_propiedad'),
            'medida_construccion_propiedad' => $this->input->post('medida_construccion_propiedad'),
            'medida_oficina_propiedad' => $this->input->post('medida_oficina_propiedad'),
            'habitaciones_propiedad' => $this->input->post('habitaciones_propiedad'),
            'baños_completos_propiedad' => $this->input->post('baños_completos_propiedad'),
            'baño_visita_propiedad' => $this->input->post('baño_visita_propiedad'),
            'balcon_propiedad' => $this->input->post('balcon_propiedad'),
            'niveles_porpiedad' => $this->input->post('niveles_porpiedad'),
            'cocina_propiedad' => $this->input->post('cocina_propiedad'),
            'desayunador_propiedad' => $this->input->post('desayunador_propiedad'),
            'lineablanca_propiedad' => $this->input->post('lineablanca_propiedad'),
            'amueblada_propiedad' => $this->input->post('amueblada_propiedad'),
            'cuarto_servicio_propiedad' => $this->input->post('cuarto_servicio_propiedad'),
            'cuarto_seguridad_propiedad' => $this->input->post('cuarto_seguridad_propiedad'),
            'lavanderia_propiedad' => $this->input->post('lavanderia_propiedad'),
            'gas_propano_propiedad' => $this->input->post('gas_propano_propiedad'),
            'calentador_agua_propiedad' => $this->input->post('calentador_agua_propiedad'),
            'garage_propiedad' => $this->input->post('garage_propiedad'),
            'parqueo_propiedad' => $this->input->post('parqueo_propiedad'),
            'parqueo_visitas_propiedad' => $this->input->post('parqueo_visitas_propiedad'),
            'seguridad_privada_propiedad' => $this->input->post('seguridad_privada_propiedad'),
            'garita_control_propiedad' => $this->input->post('garita_control_propiedad'),
            'sala_propiedad' => $this->input->post('sala_propiedad'),
            'sala_reuniones_propiedad' => $this->input->post('sala_reuniones_propiedad'),
            'comedor_propiedad' => $this->input->post('comedor_propiedad'),
            'gradas_propiedad' => $this->input->post('gradas_propiedad'),
            'bodega_interior_propiedad' => $this->input->post('bodega_interior_propiedad'),
            'pergola_propiedad' => $this->input->post('pergola_propiedad'),
            'menaje_propiedad' => $this->input->post('menaje_propiedad'),
            'nombre_condominio_propiedad' => $this->input->post('nombre_condominio_propiedad'),
            'sala_famiiar_propiedad' => $this->input->post('sala_famiiar_propiedad'),
            'sala_juegos_propiedad' => $this->input->post('sala_juegos_propiedad'),
            'chimenea_propiedad' => $this->input->post('chimenea_propiedad'),
            'piscina_propiedad' => $this->input->post('piscina_propiedad'),
            'agua_propiedad' => $this->input->post('agua_propiedad'),
            'luz_propiedad' => $this->input->post('luz_propiedad'),
            'cable_internet_propiedad' => $this->input->post('cable_internet_propiedad')
        );
    }
}