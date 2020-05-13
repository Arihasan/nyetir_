<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}

	function pmasuk($post)
	{
		$no_hp = $post['no_hp'];
		$sandi = md5($post['sandi']);
		// $q = "SELECT * FROM `t_peserta` WHERE `no_hp` LIKE '$param1' OR `email` LIKE '$param1' AND `sandi` = '$sandi'";
		// return $this->db->query($q);

		return $this->db->get_where('t_peserta', [
			'no_hp' => $no_hp,
			'sandi' => $sandi,
		]);

	}

}