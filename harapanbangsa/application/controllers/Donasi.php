<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Donasi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->ModelDonasi->getDonasi()->result_array();
        $data['jenis'] = $this->ModelDonasi->getJenis()->result_array();
        $data['donatur'] = $this->ModelDonasi->getDonatur()->result_array();
        $this->form_validation->set_rules('jenis_donasi', 'Jenis', 'required', ['required' => 'Jenis harus diisi']);
        $this->form_validation->set_rules('nama_donatur', 'Nama Donatur', 'required|min_length[3]', ['required' => 'Nama Donatur harus diisi', 'min_length' => 'Nama Donatur terlalu pendek']);
        $this->form_validation->set_rules('jumlah_donasi', 'Jumlah Donasi', 'required|min_length[3]', ['required' => 'Jumlah Donasi harus diisi', 'min_length' => 'Jumlah Donasi terlalu pendek']);
        $this->form_validation->set_rules('tanggal_donasi', 'Tanggal Donasi', 'required', ['required' => 'Tanggal Donasi harus diisi']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/index', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'jenis_donasi' => $this->input->post('jenis_donasi', true), 'nama_donatur' => $this->input->post('nama_donatur', true),
                'jumlah_donasi' => $this->input->post('jumlah_donasi', true), 'tanggal_donasi' => $this->input->post('tanggal_donasi', true)
            ];
            $this->ModelDonasi->simpanDonasi($data);
            redirect('donasi');
        }
    }

    public function ubahDonasi()
    {
        $data['judul'] = 'Ubah Data Donasi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->ModelDonasi->donasiWhere(['id' => $this->uri->segment(3)])->result_array();
        $jenis = $this->ModelDonasi->joinJenis(['donasi.id' => $this->uri->segment(3)])->result_array();
        $donatur = $this->ModelDonasi->joinDonatur(['donasi.id' => $this->uri->segment(3)])->result_array();

        foreach ($jenis as $j) {
            $data['id'] = $j['id'];
            $data['j'] = $j['jenis_donasi'];
        }

        foreach ($donatur as $o) {
            $data['id'] = $o['id'];
            $data['o'] = $o['nama_donatur'];
        }

        $data['jenis'] = $this->ModelDonasi->getJenis()->result_array();
        $this->form_validation->set_rules('jenis_donasi', 'Jenis', 'required', ['required' => 'Jenis harus diisi']);
        $this->form_validation->set_rules('nama_donatur', 'Nama Donatur', 'required|min_length[3]', ['required' => 'Nama Donatur harus diisi', 'min_length' => 'Nama Donatur terlalu pendek']);
        $this->form_validation->set_rules('jumlah_donasi', 'Jumlah Donasi', 'required|min_length[3]', ['required' => 'Jumlah Donasi harus diisi', 'min_length' => 'Jumlah Donasi terlalu pendek']);
        $this->form_validation->set_rules('tanggal_donasi', 'Tanggal Donasi', 'required', ['required' => 'Tanggal Donasi harus diisi']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/ubah_donasi', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'jenis_donasi' => $this->input->post('jenis_donasi', true), 'nama_donatur' => $this->input->post('nama_donatur', true),
                'jumlah_donasi' => $this->input->post('jumlah_donasi', true), 'tanggal_donasi' => $this->input->post('tanggal_donasi', true)
            ];

            $this->ModelDonasi->updateDonasi($data, ['id' =>
            $this->input->post('id')]);
            redirect('donasi');
        }
    }

    public function hapusDonasi()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelDonasi->hapusDonasi($where);
        redirect('donasi');
    }

    public function Jenis()
    {
        $data['judul'] = 'Jenis Donasi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->ModelDonasi->getJenis()->result_array();
        $this->form_validation->set_rules('jenis_donasi', 'Jenis Donasi', 'required|min_length[3]', ['required' => 'Jenis Donasi harus diisi']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/jenis', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = ['jenis_donasi' => $this->input->post('jenis_donasi')];
            $this->ModelDonasi->simpanJenis($data);
            redirect('donasi/jenis');
        }
    }

    public function ubahJenis()
    {
        $data['judul'] = 'Ubah Data Jenis ';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->ModelDonasi->jenisWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('jenis_donasi', 'Jenis Donasi', 'required|min_length[3]', ['required' => 'Jenis Donasi harus diisi', 'min_length' => 'Jenis Donasi terlalu pendek']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/ubah_jenis', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = ['jenis_donasi' => $this->input->post('jenis_donasi', true)];
            $this->ModelDonasi->updateJenis(['id' => $this->input->post('id')], $data);
            redirect('donasi/jenis');
        }
    }

    public function hapusJenis()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelDonasi->hapusJenis($where);
        redirect('donasi/jenis');
    }

    public function Donatur()
    {
        $data['judul'] = 'Jenis Donasi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['donatur'] = $this->ModelDonasi->getDonatur()->result_array();
        $this->form_validation->set_rules('nama_donatur', 'Nama Donatur', 'required', ['required' => 'Nama Donatur harus diisi']);
        $this->form_validation->set_rules('no_telepon/hp', 'Nomor Telepon/Hp', 'required|numeric', ['required' => 'Nomor Telepon/Hp harus diisi', 'numeric' => 'Nomor Telepon/Hp harus berupa angka']);
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email harus diisi']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/donatur', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = ['nama_donatur' => $this->input->post('nama_donatur'), 'no_telepon/hp' => $this->input->post('no_telepon/hp'), 'email' => $this->input->post('email')];
            $this->ModelDonasi->simpanDonatur($data);
            redirect('donasi/donatur');
        }
    }

    public function ubahDonatur()
    {
        $data['judul'] = 'Ubah Data Jenis ';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['donatur'] = $this->ModelDonasi->donaturWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('nama_donatur', 'Nama Donatur', 'required', ['required' => 'Nama Donatur harus diisi']);
        $this->form_validation->set_rules('no_telepon/hp', 'Nomor Telepon/Hp', 'required|numeric', ['required' => 'Nomor Telepon/Hp harus diisi', 'numeric' => 'Nomor Telepon/Hp harus berupa angka']);
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email harus diisi']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/ubah_donatur', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = ['nama_donatur' => $this->input->post('nama_donatur'), 'no_telepon/hp' => $this->input->post('no_telepon/hp'), 'email' => $this->input->post('email')];
            $this->ModelDonasi->updateDonatur(['id' => $this->input->post('id')], $data);
            redirect('donasi/donatur');
        }
    }

    public function hapusDonatur()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelDonasi->hapusDonatur($where);
        redirect('donasi/donatur');
    }
}
