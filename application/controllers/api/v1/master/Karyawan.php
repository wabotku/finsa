<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Karyawan extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/M_Karyawan');
		// $this->load->library('session');
	}

	public function index_post()
	{
		$post_data = $this->post_data();
		$this->validator($post_data, ['namakaryawan','telepon','email','tanggalgabung','uuidjabatan','status']);
		
		$res = $this->M_Karyawan->create($post_data);
		if ($res['rc'] == 200) {
			$this->forwardResponse($this->HTTP_OK, $this->HTTP_RESP[$this->HTTP_OK], $res['data']);
		} else {
			$this->forwardResponse($res['rc'], $this->HTTP_RESP[$res['rc']], $res['rd']);
		}
	}

	public function index_get()
	{
		$post_data = $this->post_data();
		$this->validator($post_data, []);
		
		$res = $this->M_Karyawan->read($post_data);
		if ($res['rc'] == 200) {
			$this->forwardResponse($this->HTTP_OK, $this->HTTP_RESP[$this->HTTP_OK], $res['data']);
		} else {
			$this->forwardResponse($res['rc'], $this->HTTP_RESP[$res['rc']], $res['rd']);
		}
	}

	public function index_put()
	{
		$post_data = $this->post_data();
		$this->validator($post_data, []);
		
		$res = $this->M_Karyawan->update($post_data);
		if ($res['rc'] == 200) {
			$this->forwardResponse($this->HTTP_OK, $this->HTTP_RESP[$this->HTTP_OK], $res['data']);
		} else {
			$this->forwardResponse($res['rc'], $this->HTTP_RESP[$res['rc']], $res['rd']);
		}
	}
}