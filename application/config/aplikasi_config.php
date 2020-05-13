<?php

$config['title'] = "JAYA MOBIL";

$config['folder_api'] = 'nyetir_admin';

$config['menu'] = [
	[
		'url' => '',
		'id' => 'beranda',
		'nama' => 'Beranda',
		'sub' => false,
		'subitem' => null,
		'peserta' => true,
		'keduanya' => true,
	],
	// [
	// 	'url' => '#',
	// 	'id' => 'menu',
	// 	'nama' => 'Menu',
	// 	'sub' => true,
	// 	'subitem' => [
	// 		[
	// 			'url' => 'pendaftaran',
	// 			'nama' => 'Pendaftaran',
	// 		],
	// 	],
	// 	'peserta' => false,
	// 	'keduanya' => false,
	// ],
	[
		'url' => 'pendaftaran',
		'id' => 'pendaftaran',
		'nama' => 'Pendaftaran',
		'sub' => false,
		'subitem' => null,
		'peserta' => true,
		'keduanya' => false,
	],
	// [
	// 	'url' => 'tentang',
	// 	'id' => 'tentang',
	// 	'nama' => 'Tentang Kami',
	// 	'sub' => false,
	// 	'subitem' => null,
	// 	'peserta' => true,
	// 	'keduanya' => true,
	// ],
	// [
	// 	'url' => 'kontak',
	// 	'id' => 'kontak',
	// 	'nama' => 'Kontak Kami',
	// 	'sub' => false,
	// 	'subitem' => null,
	// 	'peserta' => true,
	// 	'keduanya' => true,
	// ],
	[
		'url' => 'masuk',
		'id' => 'masuk',
		'nama' => 'Masuk',
		'sub' => false,
		'subitem' => null,
		'peserta' => false,
		'keduanya' => false,
	],
	[
		'url' => 'daftar',
		'id' => 'daftar',
		'nama' => 'Daftar',
		'sub' => false,
		'subitem' => null,
		'peserta' => false,
		'keduanya' => false,
	],
	[
		'url' => '#',
		'id' => 'peserta',
		'nama' => 'Peserta',
		'sub' => true,
		'subitem' => [
			[
				'url' => 'profil',
				'nama' => 'Profil Akun',
			],
			[
				'url' => 'daftar_latihan',
				'nama' => 'Daftar Latihan',
			],
			[
				'url' => 'keluar',
				'nama' => 'Keluar Sesi',
			],
		],
		'peserta' => true,
		'keduanya' => false,
	],
];