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
        $this->load->view('home/header');
        $this->load->view('home/index');
        $this->load->view('home/footer');
    }
}
