<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Event_model', 'event');
        $this->load->model('User_model', 'user');

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
    public function index()
    {
        $data['title'] = 'Dashboard Affiliasi';
        $this->load->view('aff/dashboard', $data);
    }
}
