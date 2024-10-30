<?php if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class M_Karyawan extends CI_Model
{
   function __construct()
   {
      parent::__construct();

      $this->load->library('uuid');
   }

   function create($param = [])
   {
      $result = [
         'rc' => 0,
         'rd' => 'on process',
         'data' => []
      ];
      $res = [];

      try {
         // validate data
         $this->db->select('*');
         $this->db->from('MKARYAWAN');
         $this->db->where('NAMAKARYAWAN', $param['namakaryawan']);
         $this->db->or_where('TELEPON', $param['telepon']);
         $this->db->or_where('EMAIL', $param['email']);
         $validate = $this->db->get()->row_array();
         if ($validate) {
            throw new Exception('Duplicate Data', $this->HTTP_CONFLICT);
         }

         $data = [
            'UUIDKARYAWAN' => $this->uuid->v4(),
            'NAMAKARYAWAN' => $param['namakaryawan'],
            'TELEPON' => $param['telepon'],
            'EMAIL' => $param['email'],
            'TANGGALGABUNG' => $param['tanggalgabung'],
            'UUIDJABATAN' => $param['uuidjabatan'],
            'STATUS' => $param['status'],
         ];

         $this->db->insert('MKARYAWAN', $data);

         $error = $this->db->error();
         if ($error['message']) {
            throw new Exception($error['message'], $this->HTTP_CONFLICT);
         }

         $result['rc'] = 200;
         $result['rd'] = 'success';
         $result['data'] = $res;
      } catch (\Exception $th) {
         $result['rc'] = $th->getCode();
         $result['rd'] = $th->getMessage();
      }

      return $result;
   }

   function read($param = [])
   {
      $result = [
         'rc' => 0,
         'rd' => 'on process',
         'data' => []
      ];
      $res = [];

      try {
         $this->db->select('*');
         $this->db->from('MKARYAWAN');

         if (isset($param['uuidkaryawan']) && $param['uuidkaryawan'] != '') {
            $this->db->where('UUIDKARYAWAN', $param['uuidkaryawan']);
         }

         $this->db->order_by('NAMAKARYAWAN');
         $res = $this->db->get()->result_array();

         $error = $this->db->error();
         if ($error['message']) {
            throw new Exception($error['message'], $this->HTTP_CONFLICT);
         }

         $result['rc'] = 200;
         $result['rd'] = 'success';
         $result['data'] = $res;
      } catch (\Exception $th) {
         $result['rc'] = $th->getCode();
         $result['rd'] = $th->getMessage();
      }

      return $result;
   }

   function update($param = [])
   {
      $result = [
         'rc' => 0,
         'rd' => 'on process',
         'data' => []
      ];
      $res = [];

      try {
         // validate data
         $this->db->select('*');
         $this->db->from('MKARYAWAN');
         $this->db->where('UUIDKARYAWAN != ', $param['uuidkaryawan']);
         $this->db->group_start();
         $this->db->where('NAMAKARYAWAN', $param['namakaryawan']);
         $this->db->or_where('EMAIL', $param['email']);
         $this->db->or_where('TELEPON', $param['telepon']);
         $this->db->group_end();
         $validate = $this->db->get()->row_array();

         if ($validate) {
            throw new Exception('Duplicate Data', $this->HTTP_CONFLICT);
         }

         $data = [
            'NAMAKARYAWAN' => $param['namakaryawan'],
            'TELEPON' => $param['telepon'],
            'EMAIL' => $param['email'],
            'TANGGALGABUNG' => $param['tanggalgabung'],
            'UUIDJABATAN' => $param['uuidjabatan'],
            'STATUS' => $param['status'],
         ];

         $this->db->set($data);
         $this->db->where('UUIDKARYAWAN', $param['uuidkaryawan']);
         $this->db->update('MKARYAWAN');

         $error = $this->db->error();
         if ($error['message']) {
            throw new Exception($error['message'], $this->HTTP_CONFLICT);
         }

         $result['rc'] = 200;
         $result['rd'] = 'success';
         $result['data'] = $res;
      } catch (\Exception $th) {
         $result['rc'] = $th->getCode();
         $result['rd'] = $th->getMessage();
      }

      return $result;
   }

   function delete($param = [])
   {
      $result = [
         'rc' => 0,
         'rd' => 'on process',
         'data' => []
      ];
      $res = [];

      try {
         $this->db->where('UUIDKARYAWAN', $param['uuidkaryawan']);
         $this->db->delete('MKARYAWAN');

         $error = $this->db->error();
         if ($error['message']) {
            throw new Exception($error['message'], $this->HTTP_CONFLICT);
         }

         $result['rc'] = 200;
         $result['rd'] = 'success';
         $result['data'] = $res;
      } catch (\Exception $th) {
         $result['rc'] = $th->getCode();
         $result['rd'] = $th->getMessage();
      }

      return $result;
   }
}