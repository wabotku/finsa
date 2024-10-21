<?php

function is_logged_in($role = false)
{
    // $ci = get_instance();
    // if (!$ci->session->userdata('email')) {
    //     redirect('auth');
    // }
    print_r("asd");
    die;
    // if ($role) {
    //     $role_id = $ci->session->userdata('role_id');

    // 	if($role_id != $role) {
    // 		redirect('auth/blocked');
    // 	}
    // }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

if (!function_exists('curl_get')) {
    /**
     * HTTP Get Return Text
     *
     * TODO
     *
     * @param	string 	API url
     * @return	string 	XML objects
     */
    function curl_get($url, $data)
    {
        $ci = get_instance();
        $ci->load->library('session');

        $url = str_replace(" ", "%20", $url);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Basic ' . base64_encode($ci->session->userdata('wvnpti_token')),
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $data = curl_exec($ch);
        curl_close($ch);
        $respon = json_decode($data, true);
        
        if (isset($respon['rc']) && $respon['rc'] == 403) {
            $ci->session->sess_destroy();
            redirect(base_url());
        }

        return $respon;
    }
}

if (!function_exists('curl_post')) {
    /**
     * HTTP Get Return Text
     *
     * TODO
     *
     * @param	string 	API url
     * @return	string 	XML objects
     */
    function curl_post($url, $data, $isLogin = false)
    {
        $ci = get_instance();
        $ci->load->library('session');
        $headers = [];

        $headers[] = 'Content-Type: application/json';

        if (!$isLogin) {
            $headers[] = 'Authorization: Basic ' . base64_encode($ci->session->userdata('wvnpti_token'));
        }

        $url = str_replace(" ", "%20", $url);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $data = curl_exec($ch);
        curl_close($ch);

        $respon = json_decode($data, true);

        if (isset($respon['rc']) && $respon['rc'] == 403) {
            $ci->session->sess_destroy();
            redirect(base_url());
        }

        return $respon;
    }
}

if (!function_exists('curl_put')) {
    /**
     * HTTP Get Return Text
     *
     * TODO
     *
     * @param	string 	API url
     * @return	string 	XML objects
     */
    function curl_put($url, $data, $isLogin = false)
    {
        $ci = get_instance();
        $ci->load->library('session');
        $headers = [];

        $headers[] = 'Content-Type: application/json';

        if (!$isLogin) {
            $headers[] = 'Authorization: Basic ' . base64_encode($ci->session->userdata('wvnpti_token'));
        }

        $url = str_replace(" ", "%20", $url);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $data = curl_exec($ch);
        curl_close($ch);

        $respon = json_decode($data, true);

        if (isset($respon['rc']) && $respon['rc'] == 403) {
            if ($ci->session->has_userdata('token') != '') {
                $ci->session->unset_userdata('token');
                $respon = '';
            }
        }

        return $respon;
    }
}

if (!function_exists('curl_delete')) {
    /**
     * HTTP Get Return Text
     *
     * TODO
     *
     * @param	string 	API url
     * @return	string 	XML objects
     */
    function curl_delete($url, $data, $isLogin = false)
    {
        $ci = get_instance();
        $ci->load->library('session');
        $headers = [];

        $headers[] = 'Content-Type: application/json';

        if (!$isLogin) {
            $headers[] = 'Authorization: Basic ' . base64_encode($ci->session->userdata('wvnpti_token'));
        }

        $url = str_replace(" ", "%20", $url);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $data = curl_exec($ch);
        curl_close($ch);

        $respon = json_decode($data, true);

        if (isset($respon['rc']) && $respon['rc'] == 403) {
            if ($ci->session->has_userdata('token') != '') {
                $ci->session->unset_userdata('token');
                $respon = '';
            }
        }

        return $respon;
    }
}