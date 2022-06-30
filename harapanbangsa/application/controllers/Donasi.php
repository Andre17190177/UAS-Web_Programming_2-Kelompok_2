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

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('donasi/index', $data);
        $this->load->view('templates/v_footer');
    }

    public function Form()
    {
        $data['jenis'] = $this->ModelDonasi->getJenis()->result_array();

        $this->form_validation->set_rules('jenis_donasi', 'Jenis', 'required', ['required' => 'Jenis Donasi harus diisi']);
        $this->form_validation->set_rules('nama_donatur', 'Nama Donatur', 'required|min_length[3]', ['required' => 'Nama Donatur harus diisi', 'min_length' => 'Nama Donatur terlalu pendek']);
        $this->form_validation->set_rules('no_telepon/hp', 'Nomor Telepon/Hp', 'required|min_length[3]|numeric', ['required' => 'Nomor Telepon/Hp harus diisi', 'min_length' => 'Nomor Telepon/Hp terlalu pendek', 'numeric' => 'Nomor Telepon/Hp harus berupa angka']);
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]', ['required' => 'Email harus diisi', 'min_length' => 'Email terlalu pendek']);
        $this->form_validation->set_rules('jumlah_donasi', 'Jumlah Donasi', 'numeric', ['numeric' => 'Jumlah Donasi harus berupa angka']);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Form Donasi';
            $this->load->view('templates/aute_header', $data);
            $this->load->view('donasi/form');
            $this->load->view('templates/aute_footer');
        } else {
            $data = [
                'jenis_donasi' => $this->input->post('jenis_donasi', true),
                'nama_donatur' => $this->input->post('nama_donatur', true),
                'no_telepon/hp' => $this->input->post('no_telepon/hp', true),
                'email' => $this->input->post('email', true),
                'jumlah_donasi' => $this->input->post('jumlah_donasi', true),
                'tanggal_donasi' => time()
            ];
            $this->ModelDonasi->simpanDonasi($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Terimakasih Sudah Berdonasi</div>');
            redirect('donasi/form');
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
        $data['judul'] = 'Data Jenis Donasi';
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

    public function Yayasan()
    {
        $data['judul'] = 'Data Yayasan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['yayasan'] = $this->ModelDonasi->getYayasan()->result_array();
        $this->form_validation->set_rules('nama_yayasan', 'Nama Yayasan', 'required|min_length[3]', ['required' => 'Nama Yayasan harus diisi', 'min_length' => 'Nama Yayasan terlalu pendek']);
        $this->form_validation->set_rules('no_telepon/hp', 'Nomor Telepon/Hp', 'required|numeric', ['required' => 'Nomor Telepon/Hp harus diisi', 'numeric' => 'Nomor Telepon/Hp harus berupa angka']);
        $this->form_validation->set_rules('alamat', 'Alamat Yayasan', 'required|min_length[3]', ['required' => 'Alamat yayasan harus diisi', 'min_length' => 'Alamat yayasan terlalu pendek']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/yayasan', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = ['nama_yayasan' => $this->input->post('nama_yayasan'), 'no_telepon/hp' => $this->input->post('no_telepon/hp'), 'alamat' => $this->input->post('alamat')];
            $this->ModelDonasi->simpanYayasan($data);
            redirect('donasi/yayasan');
        }
    }

    public function ubahYayasan()
    {
        $data['judul'] = 'Ubah Data Yayasan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['yayasan'] = $this->ModelDonasi->yayasanWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('nama_yayasan', 'Nama Yayasan', 'required|min_length[3]', ['required' => 'Nama Yayasan harus diisi', 'min_length' => 'Nama Yayasan terlalu pendek']);
        $this->form_validation->set_rules('no_telepon/hp', 'Nomor Telepon/Hp', 'required|numeric', ['required' => 'Nomor Telepon/Hp harus diisi', 'numeric' => 'Nomor Telepon/Hp harus berupa angka']);
        $this->form_validation->set_rules('alamat', 'Alamat Yayasan', 'required|min_length[3]', ['required' => 'Alamat yayasan harus diisi', 'min_length' => 'Alamat yayasan terlalu pendek']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/ubah_yayasan', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'nama_yayasan' => $this->input->post('nama_yayasan', true),
                'no_telepon/hp' => $this->input->post('no_telepon/hp', true),
                'alamat' => $this->input->post('alamat', true)
            ];
            $this->ModelDonasi->updateYayasan(['id' => $this->input->post('id')], $data);
            redirect('donasi/yayasan');
        }
    }

    public function hapusYayasan()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelDonasi->hapusYayasan($where);
        redirect('donasi/yayasan');
    }

    public function Anak()
    {
        $data['judul'] = 'Data Anak Asuh';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anak'] = $this->ModelDonasi->getAnak()->result_array();
        $this->form_validation->set_rules('nama_anak', 'Nama Anak Asuh', 'required|min_length[3]', ['required' => 'Nama anak asuh harus diisi', 'min_length' => 'Nama anak terlalu pendek']);
        $this->form_validation->set_rules('no_telepon/hp', 'Nomor Telepon/Hp', 'required|min_length[3]|numeric', ['required' => 'Nomor telepon harus diisi', 'min_length' => 'Nomor telepon terlalu pendek', 'numeric' => 'isian harus berupa nomor']);
        $this->form_validation->set_rules('alamat', 'Alamat Anak Asuh', 'required|min_length[3]', ['required' => 'Alamat harus diisi', 'min_legth' => 'Alamat terlalu pendek']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/anak', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'nama_anak' => $this->input->post('nama_anak'),
                'no_telepon/hp' => $this->input->post('no_telepon/hp'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->ModelDonasi->simpanAnak($data);
            redirect('donasi/anak');
        }
    }

    public function ubahAnak()
    {
        $data['judul'] = 'Ubah Data Anak Asuh';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anak'] = $this->ModelDonasi->anakWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('nama_anak', 'Nama Anak Asuh', 'required|min_length[3]', ['required' => 'Nama anak asuh harus diisi', 'min_length' => 'Nama anak terlalu pendek']);
        $this->form_validation->set_rules('no_telepon/hp', 'Nomor Telepon/Hp', 'required|min_length[3]|numeric', ['required' => 'Nomor telepon harus diisi', 'min_length' => 'Nomor telepon terlalu pendek', 'numeric' => 'isian harus berupa nomor']);
        $this->form_validation->set_rules('alamat', 'Alamat Anak Asuh', 'required|min_length[3]', ['required' => 'Alamat harus diisi', 'min_legth' => 'Alamat terlalu pendek']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/ubah_anak', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'nama_anak' => $this->input->post('nama_anak', true),
                'no_telepon/hp' => $this->input->post('no_telepon/hp', true),
                'alamat' => $this->input->post('alamat', true)
            ];
            $this->ModelDonasi->updateAnak(['id' => $this->input->post('id')], $data);
            redirect('donasi/anak');
        }
    }

    public function hapusAnak()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelDonasi->hapusAnak($where);
        redirect('donasi/anak');
    }
}
