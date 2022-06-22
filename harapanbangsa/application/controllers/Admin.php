<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $data['donatur'] = $this->ModelDonasi->getDonatur()->result_array();
        $data['donasi'] = $this->ModelDonasi->getDonasi()->result_array();
        $data['jenis'] = $this->ModelDonasi->getJenis()->result_array();
        $data['yayasan'] = $this->ModelDonasi->getYayasan()->result_array();
        $data['anak'] = $this->ModelDonasi->getAnak()->result_array();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/v_footer');
    }
}
