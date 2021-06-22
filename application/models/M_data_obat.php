<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_data_obat extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function read($year)
    {
        $this->db->select('*');
        $this->db->from('data_obat');
        $query = $this->db->get();

        if ($year != '') {
            $this->db->where('tahun', $year);
        }

        $this->db->order_by('bulan');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return null;
    }

    public function create($data_obat)
    {
        return $this->db->insert('data_obat', $data_obat);
    }
    public function update($data_obat, $id_obat)
    {
        return  $this->db->update('data_obat', $data_obat, $id_obat);
    }
    public function delete($id_obat)
    {
        return $this->db->delete("data_obat", $id_obat);
    }
    public function count()
    {
        return $this->db->count_all("data_obat");
    }
}
