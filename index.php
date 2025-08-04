<?php
// A verziók és fájlok kezeléséhez szükséges segédfüggvények betöltése
require_once __DIR__.'/qsVersion.php';

// Meghatározza egy modul verzióját, dátumát és fájlméretét
function get_ver_info($code) {
    $fix_codes = array('XLS','FIREBIRD','QSBACKUPFDBSERVICE','RUSTDESK','DBCONNECTORAPI');
    $file = in_array($code, $fix_codes) ? 'sup_fix.ver' : 'sup.ver';
    $path = __DIR__."/{$file}";
    return array(
        qsGetVersion($path, $code),   // verziószám
        qsGetDate($path, $code),      // feltöltés dátuma
        qsGetFileSize(__DIR__.'/../kov/FileS/'.module_files($code)) // fájlméret
    );
}

// A modul kódjának megfelelő telepítőfájl visszaadása
function module_files($code) {
    switch($code) {
        case 'SUP': return 'SUP_Upd_Setup.exe';
        case 'RAKTAR': return 'RA_Upd_Setup.exe';
        case 'MERLEG': return 'LM_Upd_Setup.exe';
        case 'TIP': return 'TIP_Upd_Setup.exe';
        case 'XLS': return 'SUP_XLS_NET_Setup.exe';
        case 'DBCONNECTOR': return 'DBConnector_Setup.exe';
        case 'DBCONNECTORAPI': return 'DbConnectorApi.jar';
        case 'QSBACKUPFDBSERVICE': return 'QsBackupFdbService.zip';
        case 'RUSTDESK': return 'RustDeskQsoft.exe';
        case 'FIREBIRD': return 'FB30_QSoft_Setup.exe';
        case 'WEBUPDATE': return 'WebUpdate.exe';
        default: return '';
    }
}

// A modulok leíró adatait tartalmazó tömb
$modules = [
    'SUP' => ['name' => 'SUP', 'desc' => 'Pénzügyi és számviteli modul', 'icon' => 'sup.jpg', 'color' => '#9CBCC3'],
    'RAKTAR' => ['name' => 'RAKTÁR', 'desc' => 'Raktári készlet és áruforgalmi modul', 'icon' => 'raktar.jpg', 'color' => '#547C4E'],
    'MERLEG' => ['name' => 'MÉRLEG', 'desc' => 'Mérleg és elemzés modul', 'icon' => 'merleg.jpg', 'color' => '#9C67BA'],
    'TIP' => ['name' => 'TIP', 'desc' => 'Titkársági Programcsomag', 'icon' => 'tip.jpg', 'color' => '#4684DC'],
    'XLS' => ['name' => 'XLS', 'desc' => 'XLS.NET függvénycsomag', 'icon' => 'xls.jpg', 'color' => '#2FD0DE'],
    'DBCONNECTOR' => ['name' => 'DBC', 'desc' => 'DbConnector Ütemezett feladatok', 'icon' => 'dbconnector.jpg', 'color' => '#DD9329'],
    'DBCONNECTORAPI' => ['name' => 'API', 'desc' => 'DbConnector API', 'icon' => 'dbconnectorapi.jpg', 'color' => '#6A6A6A'],
    'QSBACKUPFDBSERVICE' => ['name' => 'BACKUP', 'desc' => 'QsFdbBackupService Adatbázismentő', 'icon' => 'qsfdb.png', 'color' => '#B00000'],
    'RUSTDESK' => ['name' => 'RUSTDESK', 'desc' => 'RustDesk Távmenedzselés', 'icon' => 'tavman.jpg', 'color' => '#EB54D0'],
    'FIREBIRD' => ['name' => 'FIREBIRD', 'desc' => 'Firebird SQL adatbáziskezelő', 'icon' => 'firebird.jpg', 'color' => '#ffb900'],
    'WEBUPDATE' => ['name' => 'WEBUPD', 'desc' => 'Internetes frissítés', 'icon' => 'webupdate.jpg', 'color' => '#FFF8A9']
];

// A csempék elrendezésének meghatározása
$all_modules = [
    'SUP',
    'RAKTAR',
    'MERLEG',
    'TIP',
    'XLS',
    'DBCONNECTOR',
    'DBCONNECTORAPI',
    'QSBACKUPFDBSERVICE',
    'RUSTDESK',
    'FIREBIRD',
    'WEBUPDATE'
];
?>

<!DOCTYPE html>
<!-- Dinamikus oldal a SUP modulok és kiegészítők letöltéséhez -->
<html lang="hu">
<head>
    <meta charset="utf-8">
    <title>SUP követés letöltések</title>
    <link rel="icon" href="kepek/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
<header>
    <!-- Fejléc logóval és figyelmeztető szöveggel -->
    <div class="alert-toast">
        <p>Figyelem!!! A követéseket csak <a href="https://dl.sup.hu/dl/?file=supa016iso" target="_blank">A016</a>-s adatbázisverzióhoz telepítse fel!<br>
        (Csak az adatbázis teljes mentése és a 2019. szeptember 4-i követés CD telepítése után!!!)</p>
    </div>
</header>
<main>
    <div class="grid">
        <?php foreach($all_modules as $code):
            if($code === 'SUP') {
        ?>
		
        <!-- A SUP rendszer moduljaihoz tartozó letöltések -->
        <h2 class="section-title">SUP® Rendszerrel kapcsolatos frissítések letöltése</h2>
        <?php } elseif($code === 'RUSTDESK') { ?>

        <!-- Kiegészítő szoftverek letöltési szekciója -->
        <h2 class="section-title">Kiegészítő szoftverek letöltése</h2>
		
        <?php }
            $info = $modules[$code];
            list($v,$d,$s) = get_ver_info($code);
            $file = module_files($code);
        ?>

        <!-- Egy modulhoz tartozó letöltési csempe -->
        <div class="tile" style="--tile-color:<?php echo $info['color']; ?>" data-name="<?php echo $info['name']; ?>" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo $file; ?>" data-href="../kov/FileS/<?php echo $file; ?>">
            <img src="kepek/<?php echo $info['icon']; ?>" alt="<?php echo $info['name']; ?>">
            <span class="name"><?php echo $info['name']; ?></span>
            <span class="desc"><?php echo $info['desc']; ?></span>
            <span class="version"><?php echo $d; ?></span>
        </div>
        <?php endforeach; ?>

        <!-- Link további letöltésekhez -->
        <a class="tile external" style="--tile-color:#2564cf" href="https://aral.qsoft.hu/d/d11f48cbc61548619ad0/" target="_blank">
            <img src="kepek/Blue32x32.png" alt="További letöltések">
            <span class="name">További letöltések</span>
        </a>
    </div>
</main>
<!-- A részleteket megjelenítő modális ablak -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span id="modal-close" class="close">&times;</span>
        <h2 class="modal-title"></h2>
        <ul class="modal-details">
            <li>File: <span class="modal-file"></span></li>
            <li>Verzió: <span class="modal-version"></span></li>
            <li>A feltöltés dátuma: <span class="modal-date"></span></li>
            <li>Méret: <span class="modal-size"></span></li>
        </ul>
        <div class="modal-buttons">
            <a class="modal-download" href="#">Letöltés</a>
        </div>
    </div>
</div>
<footer>
    <!-- Jogi és kapcsolati információk -->
    <span class="copyright">&copy; QSoft Kft. 1991-<?php echo date('Y'); ?>. Minden jog fenntartva.</span>
    <span class="footer-links"><a href="https://www.sup.hu">Fő weboldal</a> | <a href="https://www.facebook.com/sup.hu">Facebook</a></span>
</footer>
</body>
</html>
