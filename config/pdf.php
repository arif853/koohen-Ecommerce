<?php

return [
	'font_path' => base_path('resources/fonts/'),
	'font_data'         => [
        'nikosh' => [
            'R'  => 'Nikosh.ttf',
            'B'  => 'Nikosh.ttf',
            'I'  => 'Nikosh.ttf',
            'BI' => 'Nikosh.ttf',
            'useOTL' => 0xFF,
            ]
        ],
	'mode'                  => 'utf-8',
	'format'                => 'A5',
	'orientation'           => 'P',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Koohen_Invoice.pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
	'pdf_a'                 => false,
	'pdf_a_auto'            => false,
	'icc_profile_path'      => ''
];
