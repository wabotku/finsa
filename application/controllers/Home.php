<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('npti_token') == "")
			redirect(base_url());
	}

	public function index()
	{
		$motivated = json_decode(file_get_contents(base_url('assets') . "/katakata.json"));
		$data['title'] = "Home";
		$data['slug'] = "home-index";
		// $data["motivation"] = $motivated[rand(0, count($motivated) -1)];
		$data["motivation"] = '';
		$this->load->view('template/index', $data);
	}
}
