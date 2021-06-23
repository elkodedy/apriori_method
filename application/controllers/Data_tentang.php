<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_tentang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $menu['name'] = "Tentang";
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar', $menu);
        $this->load->view('data_tentang/data_tentang', '');
        $this->load->view('_template/footer');
    }
}
