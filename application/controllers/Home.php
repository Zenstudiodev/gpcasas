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
	}
	function index()
	{
		echo $this->templates->render('public/home');
	}
	function contacto(){
        echo $this->templates->render('public/contacto');
    }
    function enviar_correo_contacto(){
	    print_contenido($_POST);

        $this->load->library('email');

        $this->email->from('your@example.com', 'Your Name');
        $this->email->to('someone@example.com');
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

    }
}