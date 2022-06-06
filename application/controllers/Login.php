<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('login_model');
    }

    public function index()
    {     
        $data['v'] = 'login';
        $this->load->view('template', $data);
    }

    public function validation()
    {
        $this->form_validation->set_rules('user_name', 'Name', 'required');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        if($this->form_validation->run())
        {
            $result = $this->login_model->is_registered($this->input->post('user_name'), $this->input->post('user_password'));
            if($result == '')
            {
                redirect(base_url());
            }
            else
            {
                $this->session->set_flashdata('message', $result);
                redirect('login');
                
            }
        }
        else
        {
            $this->index();
        }
    }

}