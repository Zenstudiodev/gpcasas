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
                redirect("cliente/forgot_password", 'refresh');
            }

            // run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                // if there were no errors
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("cliente/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("cliente/forgot_password", 'refresh');
            }
        }
    }
    public function seleccionar_plan(){
        if ($this->session->flashdata('message')) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $data['sin_banner'] = 1;
        echo $this->templates->render('public/seleccion_plan', $data);
    }

}