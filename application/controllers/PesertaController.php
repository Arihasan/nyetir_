<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesertaController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('api_model', 'AM');
		if (!$this->session->has_userdata('id_peserta_peserta')) {
			$this->session->set_flashdata('pesan', pesan('Anda tidak memiliki sesi', 'danger'));
			redirect(site_url('masuk'),'refresh');
		}
	}

	public function index()
	{
		$data['peserta'] = $this->AM->loadData(
			't_peserta', 
			['id_peserta' => $this->session->userdata('id_peserta_peserta')]
		)->row();

		$data['id_menu'] = 'peserta';
		$data['judul'] = 'Profil';
		$data['konten'] = [
			'front/peserta/profil',
		];
		$this->load->view('front/template', $data);
	}

	public function daftar_latihan()
	{
		$data['peserta'] = $this->AM->loadData(
			't_peserta', 
			['id_peserta' => $this->session->userdata('id_peserta_peserta')]
		)->row();

		$data['id_menu'] = 'peserta';
		$data['judul'] = 'Daftar Latihan';
		$data['konten'] = [
			'front/peserta/daftar_latihan',
		];
		$this->load->view('front/template', $data);
	}

	public function invoice($id_daftar)
	{
		$data['res'] = '';
		$html = $this->load->view('front/peserta/cetak/invoice', $data, true);
	}

	public function keluar()
	{
		$this->session->unset_userdata('id_peserta_peserta');
		$this->session->unset_userdata('nm_lgkp_peserta');
		$this->session->set_flashdata('pesan', pesan('Berhasil keluar akun', 'success'));
		redirect(site_url('masuk'),'refresh');
	}

}