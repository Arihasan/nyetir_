<?php

function pesan($teks, $tipe='primary')
{
	return "<div class='alert alert-$tipe'>$teks</div>";
}

function site_url_api()
{
	$http = 'http://';
	$host = $_SERVER['HTTP_HOST'].'/';
	$servername = $_SERVER['SERVER_NAME'];
	$port = $_SERVER['SERVER_PORT'] == '80' ? '/' : ':'.$_SERVER['SERVER_PORT'].'/';

	$CI =& get_instance();
	$folder = $CI->config->item('folder_api');
	
	return $http.$servername.$port.$folder.'/api/';
}

function url_upload($url)
{
	$http = 'http://';
	$host = $_SERVER['HTTP_HOST'].'/';
	$servername = $_SERVER['SERVER_NAME'];
	$port = $_SERVER['SERVER_PORT'] == '80' ? '/' : ':'.$_SERVER['SERVER_PORT'].'/';

	$CI =& get_instance();
	$folder = $CI->config->item('folder_api');
	
	return $http.$servername.$port.$folder.'/'.$url;
}

function url_aset($path)
{
	$http = 'http://';
	$host = $_SERVER['HTTP_HOST'].'/';
	$servername = $_SERVER['SERVER_NAME'];
	$port = $_SERVER['SERVER_PORT'] == '80' ? '/' : ':'.$_SERVER['SERVER_PORT'].'/';

	$CI =& get_instance();
	$folder = $CI->config->item('folder_api');
	
	return $http.$servername.$port.$folder.'/uploads/'.$path;
}

function kerupiah($angka)
{
	return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
}

function keangka($rupiah)
{
	return intval(preg_replace('/,.*|[^0-9]/', '', $rupiah));
}

function status($param=null)
{
	$res = [
		0 => 'Aktif',
		1 => 'Non-Aktif',
	];
	return $param == null ? $res : $res[$param];
}