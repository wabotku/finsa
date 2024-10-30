<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Home extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function read($params = [])
    {
        $result = [
            'status' => 0,
            'message' => 'on process',
            'data' => []
        ];

        try {

            $result['status'] = 1;
            $result['message'] = 'success';
            // $result['data'] = $res;
        } catch (\Exception $th) {
            $result['message'] = $th->getMessage();
        }

        return $result;
    }
}