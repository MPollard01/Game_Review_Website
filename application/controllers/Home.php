<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
      
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->helper('html');
        $this->load->helper('cookie');

        $this->load->model('HomeModel');
    }

    public function index()
    {
       
        // Get the data from our Home Model.
        $data['result'] = $this->HomeModel->getGame();
        $data['reviews'] = $this->HomeModel->getReview();
        $data['v'] = 'home';
        //Load the view and send the data accross.
       
        $this->load->view('template', $data);
    }

    public function review($slug = NULL)
    {
        //Get the data from the model based on the slug we have.
            $data['review_item'] = $this->HomeModel->getReview($slug);
            $reviewID = $data['review_item']['ID'];
            set_cookie('currentReview', $reviewID,36000);
            if (empty($data['review_item']))
            {
                    show_404();
            }
            
            $currentUser = $this->session->userdata('id');
            if($currentUser)
            {
                $data['userID'] = $currentUser;
                $data['userName'] = $this->session->userdata('userName');
            }
            else {
                $data['userID'] = 'unknown';
                $data['userName'] = 'unknown';
            }
            $data['result'] = $this->HomeModel->getGame();
            $data['title'] = $data['review_item']['GameName'];
           
            $this->load->view('templates/header', $data);
            $this->load->view('reviews', $data);
            $this->load->view('templates/footer');
    }

    public function comments()
    {
        $reviewID = get_cookie('currentReview');
        $userComments = $this->HomeModel->getComments($reviewID);
        //header('Content-Type: application/json');
       echo json_encode($userComments);
        
    }

    public function sendComments()
    {
        $newComments = $this->input->post();
        if($newComments)
        {
            $this->HomeModel->insertComments($newComments);
        }
        
    }

    function logout()
    {
        $this->session->sess_destroy();
    
        redirect('login');
    }
  
}