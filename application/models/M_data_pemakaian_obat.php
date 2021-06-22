<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_data_pemakaian_obat extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function create($data_obat)
    {
        return $this->db->insert('data_pemakaian_obat', $data_obat);
    }
    public function read($key, $year, $group_by, $order_by)
    {
        $this->db->select('*');
        $this->db->from('data_pemakaian_obat a');
        $this->db->join('data_obat b', 'a.id_obat = b.id_obat');

        if ($key != '') {
            $this->db->where('a.id_obat', $key);
        }
        if ($year != '') {
            $this->db->where('tahun', $year);
        }
        if ($group_by != '') {
            $this->db->group_by($group_by);
        }
        if ($order_by != '') {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }
    public function read_laporan()
    {
        $this->db->select('*');
        $this->db->from('data_pemakaian_obat a');
        $this->db->join('data_obat b', 'a.id_obat = b.id_obat');
        $this->db->group_by('tahun');
        $this->db->group_by('bulan');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }
    public function read_to_pdf($tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('data_pemakaian_obat a');
        $this->db->join('data_obat b', 'a.id_obat = b.id_obat');

        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->order_by('b.nama_obat');


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }
    public function sum_ls($year)
    {
        $query = $this->db->query("SELECT
            (select sum(pemakaian) from data_pemakaian_obat where tahun=" . $year . ") as total_pemakaian
        ");
        $data = $query->result();
        return $data[0]->total_pemakaian;
    }

    public function update($data_obat, $id_obat)
    {
        return  $this->db->update('data_pemakaian_obat', $data_obat, $id_obat);
    }
    public function delete($id_obat)
    {
        return $this->db->delete("data_pemakaian_obat", $id_obat);
    }
    public function count()
    {
        return $this->db->count_all("data_pemakaian_obat");
    }
}
