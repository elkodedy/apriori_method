<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pemakaian_obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data_pemakaian_obat');
        $this->load->helper('array');
        $this->load->library("pagination");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['files'] = $this->m_data_pemakaian_obat->read('', '', '', '');


        $menu['name'] = "Data Pemakaian Obat";

        $this->load->view('_template/header');
        $this->load->view('_template/sidebar', $menu);
        $this->load->view('data_pemakaian_obat/data_list', $data);
        $this->load->view('_template/footer');
    }

    public function create()
    {
        if (!empty($this->input->post('nama_obat'))) {
            $this->form_validation->set_rules('nama_obat', 'nama_obat', 'trim|required');
            $this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
            $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
            $this->form_validation->set_rules('stok_awal', 'stok_awal', 'trim|required');
            $this->form_validation->set_rules('penerimaan', 'penerimaan', 'trim|required');
            $this->form_validation->set_rules('sisa_stok', 'sisa_stok', 'trim|required');
        }

        if ($this->form_validation->run() == true) {

            $data["nama_obat"] = $this->input->post('nama_obat');
            $data["bulan"] = $this->input->post('bulan');
            $data["tahun"] = $this->input->post('tahun');
            $data["stok_awal"] = $this->input->post('stok_awal');
            $data["penerimaan"] = $this->input->post('penerimaan');
            $data["persediaan"] = $data["stok_awal"] + $data["penerimaan"];
            $data["sisa_stok"] = $this->input->post('sisa_stok');

            if ($this->m_data_pemakaian_obat->create($data)) {

                redirect(site_url('data_pemakaian_obat' ));
                return;
            }
        } else {
            $menu['name'] = "Data Pemakaian Obat";
            $this->load->view('_template/header');
            $this->load->view('_template/sidebar', $menu);
            $this->load->view('data_pemakaian_obat/data_create');
            $this->load->view('_template/footer');
        }
    }

    public function edit($data_id = null)
    {
        if (!empty($this->input->post('nama_obat'))) {
            $this->form_validation->set_rules('nama_obat', 'nama_obat', 'trim|required');
            $this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
            $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
            $this->form_validation->set_rules('stok_awal', 'stok_awal', 'trim|required');
            $this->form_validation->set_rules('penerimaan', 'penerimaan', 'trim|required');
            $this->form_validation->set_rules('sisa_stok', 'sisa_stok', 'trim|required');
        }

        if ($this->form_validation->run() == true) {
            $data["nama_obat"] = $this->input->post('nama_obat');
            $data["bulan"] = $this->input->post('bulan');
            $data["tahun"] = $this->input->post('tahun');
            $data["stok_awal"] = $this->input->post('stok_awal');
            $data["penerimaan"] = $this->input->post('penerimaan');
            $data["persediaan"] = $data["stok_awal"] + $data["penerimaan"];
            $data["sisa_stok"] = $this->input->post('sisa_stok');

            $id_pemakaian['id_pemakaian'] = $this->input->post('id_pemakaian');
            if ($this->m_data_pemakaian_obat->update($data, $id_pemakaian)) {

                redirect(site_url('data_pemakaian_obat'));
                return;
            }
        } else {
            $data['files'] = $this->m_data_pemakaian_obat->read($data_id);
            $menu['name'] = "Data Pemakaian Obat";
            $this->load->view('_template/header');
            $this->load->view('_template/sidebar', $menu);
            $this->load->view('data_pemakaian_obat/data_edit', $data);
            $this->load->view('_template/footer');
        }
    }


    public function delete($id_obat = null)
    {
        if ($id_obat == null) redirect(site_url('data_pemakaian_obat'));

        $id['id_pemakaian'] = $id_obat;
        if ($this->m_data_pemakaian_obat->delete($id)) {
            redirect(site_url('data_pemakaian_obat'));
            return;
        }
    }
}
