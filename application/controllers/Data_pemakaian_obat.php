<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pemakaian_obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data_pemakaian_obat');
        $this->load->model('m_data_obat');
        $this->load->helper('array');
        $this->load->library("pagination");
        $this->load->library('form_validation');
        $this->load->library('session');


        // kalau tidak login maka
        if (!($this->session->userdata('id_pengguna'))) {
            // ALERT
            $alert = 'Silahkan Melakukan Login!';
            get_instance()->session->set_flashdata('alert', $alert);
            redirect('auth/login');
        }
        if ($this->session->userdata('id_grup') != 1) {
            // ALERT
            $alert = "<script type='text/javascript'>alert('Anda Tidak Punya Akses Ke Halaman Ini!');</script>";
            get_instance()->session->set_flashdata('alert', $alert);
            redirect('home_page');
        }
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
        if (!empty($this->input->post('id_obat'))) {
            $this->form_validation->set_rules('id_obat', 'id_obat', 'trim|required');
            $this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
            $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
            $this->form_validation->set_rules('stok_awal', 'stok_awal', 'trim|required');
            $this->form_validation->set_rules('penerimaan', 'penerimaan', 'trim|required');
            $this->form_validation->set_rules('sisa_stok', 'sisa_stok', 'trim|required');
        }

        if ($this->form_validation->run() == true) {

            $data["id_obat"] = $this->input->post('id_obat');
            $data["bulan"] = $this->input->post('bulan');
            $data["tahun"] = $this->input->post('tahun');
            $data["stok_awal"] = $this->input->post('stok_awal');
            $data["penerimaan"] = $this->input->post('penerimaan');
            $data["persediaan"] = $data["stok_awal"] + $data["penerimaan"];
            $data["sisa_stok"] = $this->input->post('sisa_stok');

            if ($this->m_data_pemakaian_obat->create($data)) {

                $alert = '<div class="card p-3 bg-success text-white">Berhasil menambah data pemakaian obat </div>';
                get_instance()->session->set_flashdata('alert', $alert);

                redirect(site_url('data_pemakaian_obat'));
                return;
            }
        } else {
            $menu['name'] = "Data Pemakaian Obat";
            $data['obat'] = $this->m_data_obat->read('');
            $this->load->view('_template/header');
            $this->load->view('_template/sidebar', $menu);
            $this->load->view('data_pemakaian_obat/data_create', $data);
            $this->load->view('_template/footer');
        }
    }

    public function edit($data_id = null)
    {
        if (!empty($this->input->post('id_pemakaian'))) {
            $this->form_validation->set_rules('id_pemakaian', 'id_pemakaian', 'trim|required');
            $this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
            $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
            $this->form_validation->set_rules('stok_awal', 'stok_awal', 'trim|required');
            $this->form_validation->set_rules('penerimaan', 'penerimaan', 'trim|required');
            $this->form_validation->set_rules('sisa_stok', 'sisa_stok', 'trim|required');
        }

        if ($this->form_validation->run() == true) {

            $data["bulan"] = $this->input->post('bulan');
            $data["tahun"] = $this->input->post('tahun');
            $data["stok_awal"] = $this->input->post('stok_awal');
            $data["penerimaan"] = $this->input->post('penerimaan');
            $data["persediaan"] = $data["stok_awal"] + $data["penerimaan"];
            $data["sisa_stok"] = $this->input->post('sisa_stok');

            $id_pemakaian['id_pemakaian'] = $this->input->post('id_pemakaian');

            if ($this->m_data_pemakaian_obat->update($data, $id_pemakaian)) {

                $alert = '<div class="card p-3 bg-warning text-white">Berhasil mengubah data pemakaian obat </div>';
                get_instance()->session->set_flashdata('alert', $alert);

                redirect(site_url('data_pemakaian_obat'));
                return;
            }
        } else {
            $data['files'] = $this->m_data_pemakaian_obat->get($data_id);
            $menu['name'] = "Data Pemakaian Obat";
            $this->load->view('_template/header');
            $this->load->view('_template/sidebar', $menu);
            $this->load->view('data_pemakaian_obat/data_edit', $data);
            $this->load->view('_template/footer');
        }
    }


    public function delete($data_id = null)
    {
        if ($data_id == null) redirect(site_url('data_pemakaian_obat'));

        $id['id_pemakaian'] = $data_id;
        if ($this->m_data_pemakaian_obat->delete($id)) {

            $alert = '<div class="card p-3 bg-danger text-white">Berhasil menghapus data pemakaian obat </div>';
            get_instance()->session->set_flashdata('alert', $alert);

            redirect(site_url('data_pemakaian_obat'));
            return;
        }
    }
}
