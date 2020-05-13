<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BerandaController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('api_model', 'AM');
	}

	public function index()
	{
		$data['paket'] = json_encode( $this->AM->loadData('t_paket', ['stts_paket' => 0]) );
		$data['id_menu'] = 'beranda';
		$data['judul'] = 'Beranda';
		$data['konten'] = [
			'front/carousel',
			'front/paket',
			'front/tentang',
			'front/kontak',
		];
		$this->load->view('front/template', $data);
	}

	public function pendaftaran($id_paket=null)
	{
		if (!$this->session->has_userdata('id_peserta_peserta')) {
			$this->session->set_flashdata('pesan', pesan('Silahkan masuk terlebih dahulu', 'warning'));
			redirect(site_url('masuk'),'refresh');
		}
		$data['id_paket'] = $id_paket;
		$data['paket'] = $this->AM->loadData('t_paket', ['stts_paket' => 0])->result();
		$data['metode'] = $this->AM->loadData('t_metode', ['stts_metode' => 0])->result();
		$data['jenis'] = $this->AM->loadData('t_jenis_mobil')->result();
		$data['penjemputan'] = $this->AM->loadData('t_penjemputan')->result();

		$data['id_menu'] = 'pendaftaran';
		$data['judul'] = 'Pendaftaran';
		$data['konten'] = [
			'front/auth/pendaftaran_1',
			// 'front/auth/pendaftaran_2',
		];
		$this->load->view('front/template', $data);
	}

	public function paket($id_paket)
	{
		$data['paket'] = $this->AM->loadData(
			't_paket',
			['id_paket' => $id_paket]
		)->row();

		$data['id_menu'] = 'beranda';
		$data['judul'] = 'Detail Paket';
		$data['konten'] = [
			'front/paket/detail',
		];
		$this->load->view('front/template', $data);
	}

	public function tentang()
	{
		$data['id_menu'] = 'tentang';
		$data['judul'] = 'Tentang Kami';
		$data['konten'] = [
			'front/tentang',
		];
		$this->load->view('front/template', $data);
	}

	public function kontak()
	{
		$data['id_menu'] = 'kontak';
		$data['judul'] = 'Kontak Kami';
		$data['konten'] = [
			'front/kontak',
		];
		$this->load->view('front/template', $data);
	}
	
	public function not_found()
	{
		echo 'not_found';
	}

}
