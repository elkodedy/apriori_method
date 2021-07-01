<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data_obat');
        $this->load->model('m_data_pemakaian_obat');
        $this->load->model('m_data_pengguna');
        $this->load->library('session');

        // kalau tidak login maka
        if (!($this->session->userdata('id_pengguna'))) {
            // ALERT
            $alert = 'Silahkan Melakukan Login!';
            get_instance()->session->set_flashdata('alert', $alert);
            redirect('auth/login');
        }
    }

    public function index()
    {
        $menu['name'] = "Beranda";
        $menu['jumlah_obat'] = $this->m_data_obat->count();
        $menu['jumlah_pengguna'] = $this->m_data_pengguna->count();

        $this->load->view('_template/header');
        $this->load->view('_template/sidebar', $menu);
        $this->load->view('_template/content');
        $this->load->view('_template/footer');
    }
}
