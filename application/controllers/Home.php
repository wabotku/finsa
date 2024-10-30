<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
		$data['title'] = "Home";
		$data['slug'] = "home-index";
		$data['main_content'] = "home";

		$this->load->view('template/index', $data);
	}

}
