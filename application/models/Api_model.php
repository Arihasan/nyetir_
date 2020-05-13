<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}

	function loadData($tabel=null, $where=null, $limit=null, $offset=null, $join=null, $order=null, $select=null)
	{
		if ($select != null) {
			$this->db->select($select);
		}else{
			$this->db->select('*');
		}
		
		$this->db->from($tabel);

		if ($join != null) {
			foreach ($join as $j) {
				$this->db->join($j['tabel'], $tabel.'.'.$j['kolom'].' = '.$j['tabel'].'.'.$j['kolom']);
			}
		}
		if ($where != null) {
			$this->db->where($where);
		}
		if ($order != null) {
			$this->db->order_by($order[0], $order[1]);
		}
		if ($limit != null) {
			$this->db->limit($limit);
		}
		if ($offset != null) {
			$offset = $offset*$limit;
			$this->db->offset($offset);
		}

		$res = $this->db->get();
		return $res;
	}

	function updateData($tabel, $kolomWhere, $data)
	{
		$this->db->where($kolomWhere);
		if ( $this->db->update($tabel, $data) ) {
			return true;
		}else{
			return false;
		}
	}

	function insertData($tabel, $data)
	{
		$res = $this->db->insert($tabel, $data);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

}