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
    }
    public function login(){
        if ($this->session->flashdata('message')) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['departamentos'] = $this->Busqueda_model->get_departamentos();
        echo $this->templates->render('public/login', $data);
    }
    public function register(){
        if ($this->session->flashdata('message')) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['departamentos'] = $this->Busqueda_model->get_departamentos();
        echo $this->templates->render('public/register', $data);
    }

}