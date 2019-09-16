<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 11/09/2019
 * Time: 10:46 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Busqueda_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}