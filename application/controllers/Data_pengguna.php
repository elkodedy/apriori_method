<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data_pengguna');
        $this->load->helper('array');
        $this->load->library("pagination");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['files'] = $this->m_data_pengguna->read('');

        $menu['name'] = "Pengguna";
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar', $menu);
        $this->load->view('data_pengguna/data_list', $data);
        $this->load->view('_template/footer');
    }

    public function create()
    {
        if (!empty($this->input->post('nama_lengkap'))) {
            $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'trim|required');
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');
            $this->form_validation->set_rules('id_grup', 'id_grup', 'trim|required');
        }

        if ($this->form_validation->run() == true) {
            $data["id_grup"] = $this->input->post('id_pengguna');
            $data["nama_lengkap"] = $this->input->post('nama_lengkap');
            $data["username"] = $this->input->post('username');
            $data["password"] = $this->input->post('password');
            $data["id_grup"] = $this->input->post('id_grup');

            if ($this->m_data_pengguna->create($data)) {
                redirect(site_url('data_pengguna'));
                return;
            }
        } else {
            $menu['name'] = "Pengguna";
            $this->load->view('_template/header');
            $this->load->view('_template/sidebar', $menu);
            $this->load->view('data_pengguna/data_create');
            $this->load->view('_template/footer');
        }
    }

    public function edit($data_id = null)
    {
        if (!empty($this->input->post('nama_lengkap'))) {
            $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'trim|required');
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');
            $this->form_validation->set_rules('id_grup', 'id_grup', 'trim|required');
        }

        if ($this->form_validation->run() == true) {
            $data["nama_lengkap"] = $this->input->post('nama_lengkap');
            $data["username"] = $this->input->post('username');
            $data["password"] = $this->input->post('password');
            $data["id_grup"] = $this->input->post('id_grup');

            $id_pengguna['id_pengguna'] = $this->input->post('id_pengguna');
            if ($this->m_data_pengguna->update($data, $id_pengguna)) {

                redirect(site_url('data_pengguna'));
                return;
            }
        } else {
            $data['files'] = $this->m_data_pengguna->read($data_id);
            $menu['name'] = "Pengguna";
            $this->load->view('_template/header');
            $this->load->view('_template/sidebar', $menu);
            $this->load->view('data_pengguna/data_edit', $data);
            $this->load->view('_template/footer');
        }
    }


    public function delete($id_pengguna = null)
    {
        if ($id_pengguna == null) redirect(site_url('data_pengguna'));

        $id['id_pengguna'] = $id_pengguna;
        if ($this->m_data_pengguna->delete($id)) {
            redirect(site_url('data_pengguna'));
            return;
        }
    }
}
