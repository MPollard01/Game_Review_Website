<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id'))
        {
            redirect('login');
        }
    }

    function index()
    {
        redirect('login');
    }

    function logout()
    {
        //gets all session data
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value)
        {
            //delete session data one by one
            $this->session->unset_userdata($row);
        }
        redirect('login');
    }

}