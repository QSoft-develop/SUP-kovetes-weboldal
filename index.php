<?php
require_once __DIR__.'/RegiForraskod/qsVersion.php';

function get_ver_info($code) {
    $fix_codes = array('XLS','FIREBIRD','QSBACKUPFDBSERVICE','RUSTDESK','DBCONNECTORAPI');
    $file = in_array($code, $fix_codes) ? 'sup_fix.ver' : 'sup.ver';
    $path = __DIR__."/RegiForraskod/{$file}";
    return array(
        qsGetVersion($path, $code),
        qsGetDate($path, $code),
        qsGetFileSize(__DIR__.'/RegiForraskod/FileS/'.module_files($code))
    );
}

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
?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="utf-8">
<title>SUP követés letöltések</title>
<link rel="stylesheet" href="style.css">
<script src="script.js" defer></script>
</head>
<body>
<header>
    <img src="RegiForraskod/kepek/suplogo.jpg" alt="SUP logo" class="logo">
    <h1>SUP követés letöltések</h1>
</header>
<main>
    <section class="tiles-row large">
        <?php list($v,$d,$s)=get_ver_info('SUP'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('SUP'); ?>" class="tile" data-name="SUP" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('SUP'); ?>">
            <img src="RegiForraskod/kepek/sup.jpg" alt="SUP">
            <span class="name">SUP</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
        <?php list($v,$d,$s)=get_ver_info('RAKTAR'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('RAKTAR'); ?>" class="tile" data-name="Raktár" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('RAKTAR'); ?>">
            <img src="RegiForraskod/kepek/raktar.jpg" alt="Raktár">
            <span class="name">Raktár</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
        <?php list($v,$d,$s)=get_ver_info('MERLEG'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('MERLEG'); ?>" class="tile" data-name="Mérleg" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('MERLEG'); ?>">
            <img src="RegiForraskod/kepek/merleg.jpg" alt="Mérleg">
            <span class="name">Mérleg</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
        <?php list($v,$d,$s)=get_ver_info('TIP'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('TIP'); ?>" class="tile" data-name="TIP" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('TIP'); ?>">
            <img src="RegiForraskod/kepek/tip.jpg" alt="TIP">
            <span class="name">TIP</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
    </section>
    <section class="tiles-row">
        <?php list($v,$d,$s)=get_ver_info('XLS'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('XLS'); ?>" class="tile" data-name="SUP Xls.NET" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('XLS'); ?>">
            <img src="RegiForraskod/kepek/xls.jpg" alt="XLS">
            <span class="name">SUP Xls.NET</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
        <?php list($v,$d,$s)=get_ver_info('DBCONNECTOR'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('DBCONNECTOR'); ?>" class="tile" data-name="DbConnector" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('DBCONNECTOR'); ?>">
            <img src="RegiForraskod/kepek/dbconnector.jpg" alt="DbConnector">
            <span class="name">DbConnector</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
        <?php list($v,$d,$s)=get_ver_info('DBCONNECTORAPI'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('DBCONNECTORAPI'); ?>" class="tile" data-name="DbConnector API" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('DBCONNECTORAPI'); ?>">
            <img src="RegiForraskod/kepek/dbconnectorapi.jpg" alt="DbConnector API">
            <span class="name">DbConnector API</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
        <?php list($v,$d,$s)=get_ver_info('QSBACKUPFDBSERVICE'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('QSBACKUPFDBSERVICE'); ?>" class="tile" data-name="QsFdbBackupService" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('QSBACKUPFDBSERVICE'); ?>">
            <img src="RegiForraskod/kepek/qsfdb.png" alt="QsFdbBackupService">
            <span class="name">QsFdbBackupService</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
    </section>
    <section class="tiles-row">
        <?php list($v,$d,$s)=get_ver_info('RUSTDESK'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('RUSTDESK'); ?>" class="tile" data-name="RustDesk" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('RUSTDESK'); ?>">
            <img src="RegiForraskod/kepek/tavman.jpg" alt="RustDesk">
            <span class="name">RustDesk</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
        <?php list($v,$d,$s)=get_ver_info('FIREBIRD'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('FIREBIRD'); ?>" class="tile" data-name="Firebird SQL" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('FIREBIRD'); ?>">
            <img src="RegiForraskod/kepek/firebird.jpg" alt="Firebird">
            <span class="name">Firebird SQL</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
        <?php list($v,$d,$s)=get_ver_info('WEBUPDATE'); ?>
        <a href="RegiForraskod/FileS/<?php echo module_files('WEBUPDATE'); ?>" class="tile" data-name="WebUpdate" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo module_files('WEBUPDATE'); ?>">
            <img src="RegiForraskod/kepek/webupdate.jpg" alt="WebUpdate">
            <span class="name">WebUpdate</span>
            <span class="version"><?php echo $v; ?></span>
            <span class="date"><?php echo $d; ?></span>
        </a>
    </section>
</main>
<div id="modal" class="modal">
    <div class="modal-content">
        <span id="modal-close" class="close">&times;</span>
        <h2 class="modal-title"></h2>
        <p>File: <span class="modal-file"></span></p>
        <p>Verzió: <span class="modal-version"></span></p>
        <p>Dátum: <span class="modal-date"></span></p>
        <p>Méret: <span class="modal-size"></span></p>
        <div class="modal-buttons">
            <a class="modal-download" href="#">Letöltés</a>
        </div>
    </div>
</div>
<footer>
    <p>&copy; QSoft Kft. 1991-<?php echo date('Y'); ?>. Minden jog fenntartva.</p>
    <p><a href="https://www.sup.hu">Fő weboldal</a> | <a href="https://www.facebook.com/sup.hu">Facebook</a></p>
</footer>
</body>
</html>
