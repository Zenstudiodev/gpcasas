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
    public function get_departamentos(){
        $query = $this->db->get('departamentos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_municipios_departamento($departamento_id){
        $this->db->where('id_departamento', $departamento_id);
        $this->db->from('municipios');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_zonas_municipio($municipio_id){
        $this->db->where('id_municipio', $municipio_id);
        $this->db->from('zonas');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
}