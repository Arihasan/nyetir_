<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('api_model', 'AM');
		$this->load->model('auth_model', 'AUTH');
		if ($this->session->has_userdata('id_peserta_peserta')) {
			$this->session->set_flashdata('pesan', pesan('Anda memiliki sesi', 'warning'));
			redirect(site_url('profil'),'refresh');
		}
	}

	public function index()
	{
		echo "ILEGAL AKSES";
	}

	public function masuk()
	{
		$data['id_menu'] = 'masuk';
		$data['judul'] = 'Masuk Akun';
		$data['konten'] = [
			'front/auth/masuk',
		];
		$this->load->view('front/template', $data);
	}

	public function daftar()
	{
		$data['id_menu'] = 'daftar';
		$data['judul'] = 'Daftar Akun';
		$data['konten'] = [
			'front/auth/daftar',
		];
		$this->load->view('front/template', $data);
	}

	public function pmasuk()
	{
		$cek = $this->AUTH->pmasuk($this->input->post());
		if ( $cek->num_rows() > 0 ) {
			$res = $cek->row();
			$sesi = [
				'id_peserta_peserta' => $res->id_peserta,
				'nm_lgkp_peserta' => $res->nm_lgkp,
			];
			$this->session->set_userdata($sesi);

			$this->session->set_flashdata('pesan', pesan('Berhasil masuk akun', 'success'));
			redirect(site_url('pendaftaran'),'refresh');
		}else{
			$this->session->set_flashdata('pesan', pesan('No. HP atau kata sandi salah', 'danger'));
			redirect(site_url('masuk'),'refresh');
		}
	}

}