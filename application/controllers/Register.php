<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        //load correct libaries
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('register_model');
    }

    public function index() 
    {
        $data['v'] = 'register';
        $this->load->view('template', $data);
    }

    public function validation()
    {
        // set validation rules
        $this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[5]|max_length[20]|is_unique[users.UserName]');
        $this->form_validation->set_rules('user_email', 'Email Address', 'trim|required|valid_email|is_unique[users.UserEmail]');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[5]|max_length[20]');
        if($this->form_validation->run())
        {
            $encrypted_password = $this->encryption->encrypt($this->input->post('user_password'));
            $data = array(
                'UserName' => $this->input->post('user_name'),
                'UserPassword' => $encrypted_password,
                'UserEmail' => $this->input->post('user_email')
               
            );
            $id = $this->register_model->insert($data);
            if($id > 0)
            {
                redirect('login');
            }
            else echo "error";
        }
        else
        {
            $this->index();
        }
    }

}