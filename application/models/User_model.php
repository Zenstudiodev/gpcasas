<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 25/11/2019
 * Time: 12:28
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_user_by_id($user_id){
        $this->db->where('id', $user_id);
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_pago($data){
        $hoy = new DateTime();
        $datos_de_pago = array(
            'tipo_anuncio_pago' => $data['plan_anuncio'],
            'monto_pago' => $data['monto_pago'],
            'fecha_pago' => $hoy->format('Y-m-d'),
            'direccion_pago' => $data['direccion_pago'],
            'fecha_de_pago' => $data['fecha_de_pago'],
            'hora_pago' => $data['hora_pago'],
            'pauta_fb_pago' => $data['pauta_fb_pago'],
            'manta_pago' => $data['manta_pago'],
            'estado_pago' => 'pendiente',
        );
        // insertamon en la base de datos
        $this->db->insert('pagos', $datos_de_pago);
    }
}