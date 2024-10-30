<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('uuid');
		// $this->debug($this->uuid->v4());
		// $this->load->library('session');
		// if ($this->session->userdata('npti_token') == "")
		// 	redirect(base_url());
	}

	public function index()
	{
		$data['title'] = "Karyawan";
		$data['slug'] = "master-karyawan";
		$data['main_content'] = "master/karyawan/index";

		$this->load->view('template/index', $data);
	}
}
