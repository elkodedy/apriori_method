<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_pengguna extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function create( $data_pengguna )
    {
        return $this->db->insert('data_pengguna', $data_pengguna);
    }
    public function read( $id_pengguna = -1 )
    {
        $sql = "
        SELECT * FROM data_pengguna
        ";
        if( $id_pengguna != -1 ){
            $sql .= "
                WHERE id_pengguna = '$id_pengguna'
            ";  
        }
        return $query = $this->db->query($sql)->result();
    }
    public function update( $data_pengguna, $id_pengguna)
    {
        return  $this->db->update('data_pengguna',$data_pengguna, $id_pengguna);
    }
    public function delete(  $id_pengguna )
    {
        return $this->db->delete( "data_pengguna" , $id_pengguna);
    }
    public function count(  )
    {
        return $this->db->count_all("data_pengguna");
    }
}