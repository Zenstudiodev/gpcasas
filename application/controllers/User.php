<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 30/09/2019
 * Time: 12:43 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        // Modelos
        $this->load->model('Busqueda_model');
        $this->load->model('Propiedad_model');
        $this->load->model('Banners_model');
        $this->load->model('User_model');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function login()
    {
        if ($this->session->flashdata('message')) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $data['sin_banner'] = 1;
        echo $this->templates->render('public/login', $data);
    }

    public function registro()
    {
        $data['title'] = $this->lang->line('create_user_heading');

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
        if ($identity_column !== 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
        } else {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() === TRUE) {
            $email = strtolower($this->input->post('email'));
            $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("User/login", 'refresh');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('identity'),
            );
            $data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('email'),
            );
            $data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('company'),
            );
            $data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('phone'),
            );
            $data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password'),
            );
            $data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            // $this->_render_page('auth/create_user', $this->data);
            $data['sin_banner'] = 1;

            echo $this->templates->render('public/registro', $data);
        }


    }

    public function guardar_usuario()
    {
    }

    public function perfil()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        $data['sin_banner'] = 1;
        $data['user_id'] = $this->ion_auth->get_user_id();
        $data['user'] = $this->User_model->get_user_by_id($data['user_id']);

        $data['casa_propias'] = $this->Propiedad_model->get_propiedaedes_by_user_id($data['user_id']);

        echo $this->templates->render('public/perfil', $data);
    }

    public function subir_propiedad()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        $data['departamentos'] = $this->Busqueda_model->get_departamentos();
        $data['menu'] = 'no';
        echo $this->templates->render('admin/subir_propiedad', $data);
    }

    public function subir_propiedad_t()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        $data['departamentos'] = $this->Busqueda_model->get_departamentos();
        $data['menu'] = 'no';
        $propiedad_id = $this->uri->segment(3);
        $data['propiedad_id'] = $propiedad_id;
        //datos de la propiedad
        $data['propiedad'] = $this->Propiedad_model->get_propiedad_by_id($propiedad_id);
        $data['fotos_propiedad'] = $this->Propiedad_model->get_fotos_de_propiedad_by_id($propiedad_id);
        echo $this->templates->render('admin/subir_propiedad-n', $data);
    }
    public function guardar_propiedad()
    {

        print_contenido($_POST);

        $datos_propiedad = array(
            'id_propiedad' => $this->input->post('id_propiedad'),
            'modo_propiedad' => $this->input->post('modo_propiedad'),
            'titulo_propiedad' => $this->input->post('titulo_propiedad'),
            'tipo_vendedor' => $this->input->post('tipo_vendedor'),
            'telefono' => $this->input->post('telefono'),
            'telefono_wp' => $this->input->post('telefono_wp'),
            'telefono2' => $this->input->post('telefono2'),
            'telefono2_wp' => $this->input->post('telefono2_wp'),
            'correo_contacto' => $this->input->post('correo_contacto'),
            'nombre_contacto_propiedad' => $this->input->post('nombre_contacto_propiedad'),
            'precio' => $this->input->post('precio_propiedad'),
            'moneda_propiedad' => $this->input->post('moneda_propiedad'),
            'tipo_propiedad' => $this->input->post('tipo_propiedad'),
            'id_departamento' => $this->input->post('id_departamento'),
            'id_municipio' => $this->input->post('id_municipio'),
            'id_zona' => $this->input->post('id_zona'),
            'direccion_propiedad' => $this->input->post('direccion_propiedad'),
            'tamano_terreno_propiedad' => $this->input->post('tamano_terreno_propiedad'),
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
            'cable_internet_propiedad' => $this->input->post('cable_internet_propiedad'),
            'comentario_propiedad' => $this->input->post('comentario_propiedad')
        );
        //actualizar propiedad
        $this->Propiedad_model->actualizar_propiedad($datos_propiedad);
        /*if ($propiedad_id) {
            redirect(base_url() . 'admin/subir_fotos/' . $propiedad_id);
        }*/
        //redirect a lista de propiedades
    }
    public function forgot_password()
    {
        $this->data['header_banners'] = $this->Banners_model->header_banners_activos();

        // setting validation rules by checking whether identity is username or email
        if ($this->config->item('identity', 'ion_auth') != 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
        } else {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        }


        if ($this->form_validation->run() === FALSE) {
            $this->data['type'] = $this->config->item('identity', 'ion_auth');
            // setup the input
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
            );

            if ($this->config->item('identity', 'ion_auth') != 'email') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            // set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            echo $this->templates->render('auth/forgot_password', $this->data);
            //$this->_render_page('auth/forgot_password', $this->data);
        } else {
            $identity_column = $this->config->item('identity', 'ion_auth');
            $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

            if (empty($identity)) {

                if ($this->config->item('identity', 'ion_auth') != 'email') {
                    $this->ion_auth->set_error('forgot_password_identity_not_found');
                } else {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                }

                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("user/forgot_password", 'refresh');
            }

            // run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                // if there were no errors
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("user/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("user/forgot_password", 'refresh');
            }
        }
    }
    public function seleccionar_plan(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if ($this->session->flashdata('message')) {
            $data['message'] = $this->session->flashdata('message');
        }
        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }

        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $data['sin_banner'] = 1;
        echo $this->templates->render('public/seleccion_plan', $data);
    }
    public function forma_pago(){

        if($_POST){

           // print_contenido($_POST);

            $plan = $this->input->post('plan_anuncio');
            if($plan =='vip'){


                $datos_casa_draft = array(
                    'plan_propiedad' => $plan,
                    'user_id_propiedad' =>  $this->ion_auth->get_user_id(),
                );
                $porpiedad_id = $this->Propiedad_model->asignar_casa_dfraft($datos_casa_draft);
                $datos_de_pago = array(
                    'user_id' => $this->ion_auth->get_user_id(),
                    'propiedad_id' => $porpiedad_id,
                    'plan_anuncio' => $plan,
                    'monto_pago' => '0',
                    'direccion_pago' => '-',
                    'fecha_de_pago' => '-',
                    'hora_pago' => '-',
                    'pauta_fb_pago' =>'-',
                    'manta_pago' => '-',
                );
                // print_contenido($datos_de_pago);

                $this->User_model->guardar_pago($datos_de_pago);

                redirect(base_url().'user/subir_propiedad_t/'.$porpiedad_id);
            }
            if($plan =='individual'){
                $data['plan_anuncio'] = $plan;
                $data['monto_pago'] = $this->input->post('monto_pago');
                $data['pauta_fb_pago'] = $this->input->post('check_pauta');
                $data['manta_pago'] = $this->input->post('check_manta');
                $data['sin_banner'] = 1;
                echo $this->templates->render('public/forma_pago', $data);
            }






        }else{
            $this->session->set_flashdata('error', 'Seleccione plan por favor');
            redirect(base_url().'user/seleccionar_plan');
        }

    }
    public function guardar_forma_pago(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }

        if($_POST){
            //print_contenido($_POST);

            $datos_casa_draft = array(
                'plan_propiedad' => $this->input->post('plan_anuncio'),
                'user_id_propiedad' =>  $this->ion_auth->get_user_id(),
            );

            $porpiedad_id = $this->Propiedad_model->asignar_casa_dfraft($datos_casa_draft);

            $datos_de_pago = array(
                'user_id' => $this->ion_auth->get_user_id(),
                'propiedad_id' => $porpiedad_id,
                'plan_anuncio' => $this->input->post('plan_anuncio'),
                'monto_pago' => $this->input->post('monto_pago'),
                'direccion_pago' => $this->input->post('direccion_pago'),
                'fecha_de_pago' => $this->input->post('fecha_de_pago'),
                'hora_pago' => $this->input->post('hora_de_pago'),
                'pauta_fb_pago' =>$this->input->post('pauta_fb_pago'),
                'manta_pago' => $this->input->post('manta_pago'),
            );

            $user_id = $datos_de_pago['user_id'];
            $propiedad_id = $datos_de_pago['propiedad_id'];
            $plan_anuncio = $datos_de_pago['plan_anuncio'];
            $monto_pago = $datos_de_pago['monto_pago'];
            $direccion_pago = $datos_de_pago['direccion_pago'];
            $fecha_de_pago = $datos_de_pago['fecha_de_pago'];
            $hora_pago = $datos_de_pago['hora_pago'];
            // print_contenido($datos_de_pago);

            $this->User_model->guardar_pago($datos_de_pago);
                $this->load->library('email');
                //configuracion de correo
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->from('info@gpcasas.net', 'GP CASAS');
                $this->email->to('info@gpcasas.net');
                //$this->email->cc('info@gpcasas.net');
                $this->email->bcc('csamayoa@zenstudiogt.com');
                $this->email->subject('Pago plan de propiedad');

                //mensaje
                $message = '<html><body>';
                $message .= '<img src="' . base_url() . '/ui/public/images/logo.png" alt="GP CASAS" />';
                $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                $message .= "<tr><td><strong>Usuario:</strong> </td><td>" . strip_tags($user_id) . "</td></tr>";
                $message .= "<tr><td><strong>Propiedad:</strong> </td><td>" . strip_tags($propiedad_id) . "</td></tr>";
                $message .= "<tr><td><strong>Monto:</strong> </td><td>" . strip_tags($monto_pago) . "</td></tr>";
                $message .= "<tr><td><strong>Dirección</strong> </td><td>" . strip_tags($direccion_pago) . "</td></tr>";
                $message .= "<tr><td><strong>Fecha de pago</strong> </td><td>" . strip_tags($fecha_de_pago) . "</td></tr>";
                $message .= "<tr><td><strong>Hora de pago</strong> </td><td>" . strip_tags($hora_pago) . "</td></tr>";
                $message .= '</table>';
                $message .= '</body></html>';
                $this->email->message($message);
                //enviar correo
                $this->email->send();
                // Will only print the email headers, excluding the message subject and body
                $this->email->print_debugger(array('headers'));
                $this->session->set_flashdata('mensaje', 'Gracias por escribirnos pronto nos pondermos en contacto');
                //redirect(base_url() . 'home/credito');

            redirect(base_url().'user/subir_propiedad_t/'.$porpiedad_id);

        }else{
            $this->session->set_flashdata('error', 'Seleccione plan por favor');
            redirect(base_url().'user/seleccionar_plan');
        }

    }

    function enviar_correo_credito()
    {




    }

}