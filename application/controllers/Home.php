<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 21/01/2018
 * Time: 2:10 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        // Modelos
        $this->load->model('User_model');
        $this->load->model('Banners_model');
    }

    function index()
    {
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/home', $data);
    }

    function contacto()
    {
        $data = array();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/contacto', $data);
    }

    function enviar_correo_contacto()
    {


        $nombre = $this->input->post('nombre');
        $telefono = $this->input->post('telefono');
        $email = $this->input->post('email');
        $mensaje = $this->input->post('mensaje');
        if($email){
            $this->load->library('email');
            //configuracion de correo
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('info@gpcasas.net', 'GP CASAS');
            $this->email->to($email);
            $this->email->cc('info@gpcasas.net');
            $this->email->bcc('csamayoa@zenstudiogt.com');
            $this->email->subject('Contacto página GP casas');

            //mensaje
            $message = '<html><body>';
            $message .= '<img src="' . base_url() . '/ui/public/images/logo.png" alt="GP CASAS" />';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr><td><strong>Nombre:</strong> </td><td>" . strip_tags($nombre) . "</td></tr>";
            $message .= "<tr><td><strong>Teléfono:</strong> </td><td>" . strip_tags($telefono) . "</td></tr>";
            $message .= "<tr><td><strong>Correo:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
            $message .= "<tr><td><strong>Mensaje</strong> </td><td>" . strip_tags($mensaje) . "</td></tr>";
            $message .= '</table>';
            $message .= '</body></html>';
            $this->email->message($message);
            //enviar correo
            $this->email->send();
            // Will only print the email headers, excluding the message subject and body
            $this->email->print_debugger(array('headers'));
            $this->session->set_flashdata('mensaje', 'Gracias por escribirnos pronto nos pondermos en contacto');
            redirect(base_url() . 'home/contacto');
        }else{
            redirect(base_url() . 'home/contacto');
        }

    }
    function credito()
    {
        $data = array();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['sin_banner'] = 1;
        echo $this->templates->render('public/credito', $data);
    }
    function enviar_correo_credito()
    {


        $nombre = $this->input->post('nombre');
        $telefono = $this->input->post('telefono');
        $email = $this->input->post('email');
        $precio_propiedad = $this->input->post('precio_propiedad');
        if($email){
            $this->load->library('email');
            //configuracion de correo
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('info@gpcasas.net', 'GP CASAS');
            $this->email->to($email);
            $this->email->cc('info@gpcasas.net');
            $this->email->bcc('csamayoa@zenstudiogt.com');
            $this->email->subject('Solicitud de credito GP casas');

            //mensaje
            $message = '<html><body>';
            $message .= '<img src="' . base_url() . '/ui/public/images/logo.png" alt="GP CASAS" />';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr><td><strong>Nombre:</strong> </td><td>" . strip_tags($nombre) . "</td></tr>";
            $message .= "<tr><td><strong>Teléfono:</strong> </td><td>" . strip_tags($telefono) . "</td></tr>";
            $message .= "<tr><td><strong>Correo:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
            $message .= "<tr><td><strong>precio_propiedad</strong> </td><td>" . strip_tags($precio_propiedad) . "</td></tr>";
            $message .= '</table>';
            $message .= '</body></html>';
            $this->email->message($message);
            //enviar correo
            $this->email->send();
            // Will only print the email headers, excluding the message subject and body
            $this->email->print_debugger(array('headers'));
            $this->session->set_flashdata('mensaje', 'Gracias por escribirnos pronto nos pondermos en contacto');
            redirect(base_url() . 'home/credito');
        }else{
            redirect(base_url() . 'home/credito');
        }

    }
    function enviar_correo_informacion()
    {


        $propiedad_id =$this->input->post('propiedad_id');
        $nombre = $this->input->post('nombre');
        $telefono = $this->input->post('telefono');
        $email = $this->input->post('email');
        $precio_propiedad = $this->input->post('mensaje_informacion');
        if($email){
            $this->load->library('email');
            //configuracion de correo
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('info@gpcasas.net', 'GP CASAS');
            $this->email->to($email);
            $this->email->cc('info@gpcasas.net');
            $this->email->bcc('csamayoa@zenstudiogt.com');
            $this->email->subject('Solicitud de información de propiedad');

            //mensaje
            $message = '<html><body>';
            $message .= '<img src="' . base_url() . '/ui/public/images/logo.png" alt="GP CASAS" />';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr><td><strong>Nombre:</strong> </td><td>" . strip_tags($nombre) . "</td></tr>";
            $message .= "<tr><td><strong>Teléfono:</strong> </td><td>" . strip_tags($telefono) . "</td></tr>";
            $message .= "<tr><td><strong>Correo:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
            $message .= "<tr><td><strong>precio_propiedad</strong> </td><td>" . strip_tags($precio_propiedad) . "</td></tr>";
            $message .= '</table>';
            $message .= '</body></html>';
            $this->email->message($message);
            //enviar correo
            $this->email->send();
            // Will only print the email headers, excluding the message subject and body
            $this->email->print_debugger(array('headers'));
            $this->session->set_flashdata('mensaje', 'Gracias por escribirnos pronto nos pondermos en contacto');
            redirect(base_url() . 'Propiedades/ver/'.$propiedad_id);
        }else{
            redirect(base_url() . 'home');
        }

    }
    function seguros()
    {
        $data = array();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['sin_banner'] = 1;
        echo $this->templates->render('public/seguros', $data);
    }
    function enviar_correo_seguros()
    {


        $nombre = $this->input->post('nombre');
        $telefono = $this->input->post('telefono');
        $email = $this->input->post('email');
        $precio_propiedad = $this->input->post('precio_propiedad');
        if($email){
            $this->load->library('email');
            //configuracion de correo
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('info@gpcasas.net', 'GP CASAS');
            $this->email->to($email);
            $this->email->cc('info@gpcasas.net');
            $this->email->bcc('csamayoa@zenstudiogt.com');
            $this->email->subject('Solicitud de seguro GP casas');

            //mensaje
            $message = '<html><body>';
            $message .= '<img src="' . base_url() . '/ui/public/images/logo.png" alt="GP CASAS" />';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr><td><strong>Nombre:</strong> </td><td>" . strip_tags($nombre) . "</td></tr>";
            $message .= "<tr><td><strong>Teléfono:</strong> </td><td>" . strip_tags($telefono) . "</td></tr>";
            $message .= "<tr><td><strong>Correo:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
            $message .= "<tr><td><strong>precio_propiedad</strong> </td><td>" . strip_tags($precio_propiedad) . "</td></tr>";
            $message .= '</table>';
            $message .= '</body></html>';
            $this->email->message($message);
            //enviar correo
            $this->email->send();
            // Will only print the email headers, excluding the message subject and body
            $this->email->print_debugger(array('headers'));
            $this->session->set_flashdata('mensaje', 'Gracias por escribirnos pronto nos pondermos en contacto');
            redirect(base_url() . 'home/credito');
        }else{
            redirect(base_url() . 'home/seguros');
        }

    }

    function offline()
    {
        $data = array();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('public/offline', $data);
    }
}