<?php
return [
    'modules' => [
        'SUP' => [
            'code' => 'SUP',
            'name' => 'SUP',
            'desc' => 'Pénzügyi és számviteli modul',
            'icon' => 'sup.jpg',
            'color' => '#0078d7'
        ],
        'RAKTAR' => [
            'code' => 'RAKTAR',
            'name' => 'Raktár',
            'desc' => 'Raktári készlet és áruforgalmi modul',
            'icon' => 'raktar.jpg',
            'color' => '#008272'
        ],
        'MERLEG' => [
            'code' => 'MERLEG',
            'name' => 'Mérleg',
            'desc' => 'Mérleg és elemzés modul',
            'icon' => 'merleg.jpg',
            'color' => '#ff8c00'
        ],
        'TIP' => [
            'code' => 'TIP',
            'name' => 'TIP',
            'desc' => 'Titkársági Programcsomag',
            'icon' => 'tip.jpg',
            'color' => '#68217a'
        ],
        'XLS' => [
            'code' => 'XLS',
            'name' => 'SUP Xls.NET',
            'desc' => 'XLS.NET függvénycsomag',
            'icon' => 'xls.jpg',
            'color' => '#1b6ac6'
        ],
        'DBCONNECTOR' => [
            'code' => 'DBCONNECTOR',
            'name' => 'DbConnector',
            'desc' => 'Ütemezett feladatok',
            'icon' => 'dbconnector.jpg',
            'color' => '#00cc6a'
        ],
        'DBCONNECTORAPI' => [
            'code' => 'DBCONNECTORAPI',
            'name' => 'DbConnector API',
            'desc' => 'DbConnector API',
            'icon' => 'dbconnectorapi.jpg',
            'color' => '#e81123'
        ],
        'QSBACKUPFDBSERVICE' => [
            'code' => 'QSBACKUPFDBSERVICE',
            'name' => 'QsFdbBackupService',
            'desc' => 'Adatbázismentő',
            'icon' => 'qsfdb.png',
            'color' => '#0099bc'
        ],
        'RUSTDESK' => [
            'code' => 'RUSTDESK',
            'name' => 'RustDesk',
            'desc' => 'Távmenedzselés',
            'icon' => 'tavman.jpg',
            'color' => '#da3b01'
        ],
        'FIREBIRD' => [
            'code' => 'FIREBIRD',
            'name' => 'Firebird SQL',
            'desc' => 'Firebird adatbáziskezelő',
            'icon' => 'firebird.jpg',
            'color' => '#ffb900'
        ],
        'WEBUPDATE' => [
            'code' => 'WEBUPDATE',
            'name' => 'WebUpdate',
            'desc' => 'Internetes frissítés',
            'icon' => 'webupdate.jpg',
            'color' => '#2166b5'
        ]
    ],
    'rows' => [
        'large1' => ['SUP'],
        'large2' => ['RAKTAR', 'MERLEG', 'TIP'],
        'small'  => ['XLS', 'DBCONNECTOR', 'DBCONNECTORAPI', 'QSBACKUPFDBSERVICE', 'RUSTDESK', 'FIREBIRD', 'WEBUPDATE']
    ]
];
