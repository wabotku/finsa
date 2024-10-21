<?php if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class M_Curl extends CI_Model
{
   function __construct()
   {
      parent::__construct();
   }

   function createData($url, $params = [])
   {
      return curl_post($url, json_encode($params));
   }

   function readData($url, $params = [])
   {
      // $get = "";
		// if(count($params) > 0){
		// 	$get = '?';
		// 	foreach ($params as $key => $value) {
		// 		$get .= (string)$key . '=' . $value . '&';
		// 	}
		// }
		// $get = rtrim($get,'&');

      // $url .= $get;
      
      return curl_get($url, json_encode($params));
   }

   function updateData($url, $params = [])
   {
      return curl_put($url, json_encode($params));
   }

   function deleteData($url, $params = [])
   {
      return curl_delete($url, json_encode($params));
   }

   function customReadData($url, $params = [], $isLogin = false)
   {
      return curl_post($url, json_encode($params), $isLogin);
   }
} ?>