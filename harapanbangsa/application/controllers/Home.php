<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/index');
        $this->load->view('templates/footer');
    }
}
