<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
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
		$data['title'] = "Jabatan";
		$data['slug'] = "master-jabatan";
		$data['main_content'] = "master/jabatan/index";

		$this->load->view('template/index', $data);
	}

	public function index_get()
	{
		$method = $this->input->post('_method');

		if ($method === null) {
			$method = $this->input->server('HTTP_X_HTTP_METHOD_OVERRIDE');
            $method = $this->input->method();
				$this->debug($method);
		}

		if ($method !== null) {
			$method = strtolower($method);
		}
		$this->debug('asd');

		$post_data = $this->data_post();
		$this->debug('asd');
		$this->validator($post_data, []);

		// $res = $this->M_Container->read($post_data);
		$res['status'] = 1;
		if ($res['status'] == 1) {
			$this->forwardResponse($this->HTTP_OK, 'ok', $res['data']);
		} else {
			$this->forwardResponse($this->HTTP_BAD_REQUEST, 'failed', $res['message']);
		}
	}
}
