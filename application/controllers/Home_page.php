<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_page extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
	}

    public function index()
    {
        $menu['name']="Beranda";

        $this->load->view('_template/header');
		$this->load->view('_template/sidebar',$menu);
		$this->load->view('_template/content');
		$this->load->view('_template/footer');
    }
}


?>