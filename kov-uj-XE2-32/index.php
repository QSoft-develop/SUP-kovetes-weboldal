<?php
// A verziók és fájlok kezeléséhez szükséges segédfüggvények betöltése
require_once __DIR__.'/qsVersion.php';

// A modulok leíró adatait tartalmazó tömb
$modules = [
    'SUP' => [
		'name' => 'SUP', 
		'desc' => 'Pénzügyi és számviteli modul', 
		'file' => 'SUP_Upd_Setup.exe',
		'icon' => 'sup.jpg', 
		'color-tile' => '#9CBCC3', 
		'color-modal' => '156, 188, 195'],
    'RAKTAR' => [
		'name' => 'RAKTÁR', 
	    'desc' => 'Raktári készlet és áruforgalmi modul', 
		'file' => 'RA_Upd_Setup.exe',
		'icon' => 'raktar.jpg', 
		'color-tile' => '#A2B3A3', 
		'color-modal' => '103, 148, 103'],
    'MERLEG' => [
		'name' => 'MÉRLEG', 
	    'desc' => 'Mérleg és elemzés modul', 
		'file' => 'LM_Upd_Setup.exe',
		'icon' => 'merleg.jpg', 
		'color-tile' => '#C4A8D7', 
		'color-modal' => '156, 103, 186'],
    'TIP' => [
		'name' => 'TIP', 
	    'desc' => 'Titkársági programcsomag', 
		'file' => 'TIP_Upd_Setup.exe',
		'icon' => 'tip.jpg', 
		'color-tile' => '#93B6DB', 
		'color-modal' => '100, 162, 225'],
    'DBCONNECTOR' => [
		'name' => 'DBC', 
	    'desc' => 'DbConnector ütemezett feladatok', 
		'file' => 'DBConnector_Setup.exe',
		'icon' => 'dbconnector.jpg', 
		'color-tile' => '#D6C6A4', 
		'color-modal' => '255, 188, 13'],
    'DBCONNECTORAPI' => [
		'name' => 'API', 
	    'desc' => 'DbConnector API', 
		'file' => 'DbConnectorApi.jar',
		'icon' => 'dbconnectorapi.jpg', 
		'color-tile' => '#AAAAAA', 
		'color-modal' => '122, 122, 122'],
    'XLS' => [
		'name' => 'XLS', 
	    'desc' => 'XLS.NET függvénycsomag', 
		'file' => 'SUP_XLS_NET_Setup.exe',
		'icon' => 'xls.jpg', 
		'color-tile' => '#8cbfd1', 
		'color-modal' => '65, 204, 232'],
    'QSBACKUPFDBSERVICE' => [
		'name' => 'BACKUP', 
	    'desc' => 'QsFdbBackupService adatbázismentő', 
		'file' => 'QsBackupFdbService.zip',
		'icon' => 'qsfdb.png', 
		'color-tile' => '#E29B94', 
		'color-modal' => '255, 130, 120'],
    'RUSTDESK' => [
		'name' => 'RUSTDESK', 
		'desc' => 'RustDesk távmenedzselés', 
		'file' => 'RustDeskQsoft.exe',
		'icon' => 'rustdesk.png', 
		'color-tile' => '#EFABDC', 
		'color-modal' => '240, 130, 190'],
    'FIREBIRD' => [
		'name' => 'FIREBIRD', 
	    'desc' => 'Firebird SQL adatbáziskezelő', 
		'file' => 'FB30_QSoft_Setup.exe',
		'icon' => 'firebird.png', 
		'color-tile' => '#CBB083', 
		'color-modal' => '221, 157, 51'],
    'WEBUPDATE' => [
		'name' => 'WEBUPD', 
	    'desc' => 'Internetes frissítés', 
		'file' => 'WebUpdate.exe',
		'icon' => 'webupdate.jpg', 
		'color-tile' => '#D8D5B2', 
		'color-modal' => '255, 248, 169']
];

// Meghatározza egy modul verzióját, dátumát és fájlméretét
function get_ver_info($code) {
    $fix_codes = array('XLS','FIREBIRD','BACKUP','RUSTDESK','DBCONNECTORAPI');
    $file = in_array($code, $fix_codes) ? 'sup_fix.ver' : 'sup.ver';
    $path = __DIR__."/{$file}";
	
    return array(
        qsGetVersion($path, $code),   // verziószám
        qsGetDate($path, $code),      // feltöltés dátuma
        qsGetFileSize(__DIR__.'./FileS/'.$GLOBALS['modules'][$code]['file']) // fájlméret
    );
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <title>SUP követés letöltések</title>
    <link rel="icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>

<body>
<header>SUP<sup>&reg;</sup> Integrált Vállalatirányítási Rendszer követés oldal</header>
<main>
    <!-- Fejléc logóval és figyelmeztető szöveggel -->
    <div class="alert-toast">
        <p>Figyelem!!! A követéseket csak <a href="https://dl.sup.hu/dl/?file=supa016iso" target="_blank">A016</a>-s adatbázisverzióhoz telepítse fel!<br></p>
    </div>

<?php foreach($modules as $code => $info):
		list($v,$d,$s) = get_ver_info($code);
		if($code === 'SUP') { ?>
    <!-- SUP Rendszerrel kapcsolatos frissítések letöltése -->
    <div class="section-title">SUP<sup>&reg;</sup> Rendszerrel kapcsolatos frissítések letöltése</div>
	<div class="grid">
<?php } elseif($code === 'DBCONNECTOR') { ?>
    </div>
	
    <!-- Egyéb modulok letöltési szekciója -->
    <div class="section-title">Egyéb modulok letöltése</div>
    <div class="grid grid2">
			<?php } elseif($code === 'RUSTDESK') { ?>
    </div>
	<div class="section-title">Kiegészítő szoftverek letöltése</div>
    <div class="grid grid3">
			<?php }?>

		<!-- Egy modulhoz tartozó letöltési csempe -->
        <div class="tile<?php echo in_array($code, array('SUP', 'RAKTAR', 'MERLEG', 'TIP')) ? ' firstrow' : '';?>" style="--tile-color:<?php echo $info['color-modal']; ?>" data-name="<?php echo $info['name']; ?>" data-version="<?php echo $v; ?>" data-date="<?php echo $d; ?>" data-size="<?php echo $s; ?>" data-file="<?php echo $info['file']; ?>" data-icon="icons/<?php echo $info['icon']; ?>" data-color="<?php echo $info['color-tile']; ?>" data-href="./FileS/<?php echo $info['file']; ?>">
            <img src="icons/<?php echo $info['icon']; ?>" alt="<?php echo $info['name']; ?>">
            <span class="name"><?php echo $info['desc']; ?></span>
            <span class="version"><?php echo $d; ?></span>
        </div>
<?php if($info['file'] === '') {echo '</a>';} ?>
<?php endforeach; ?>
    </div>
</main>
<!-- A részleteket megjelenítő modális ablak -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span id="modal-close" class="close">&times;</span>
		<div>
			<span class="modal-title"></span>
			<hr>
			<img width="64px" class="modal-icon" src="#">
			<span class="modal-file"></span>
			<ul class="modal-details">
				<li>Verzió: <span class="modal-version"></span></li>
				<li>A feltöltés dátuma: <span class="modal-date"></span></li>
				<li>Méret: <span class="modal-size"></span></li>
			</ul>
			<div class="modal-buttons">
				<a class="modal-download" href="#">Letöltés</a>
			</div>
		</div>
    </div>
</div>
<footer>
    <!-- Jogi és kapcsolati információk -->
    <span class="copyright">&copy; QSoft Kft. 1991-<?php echo date('Y'); ?>. Minden jog fenntartva.</span>
    <span class="footer-links"><a id="foweb" href="https://www.qsoft.hu" target="_blank">Fő weboldal</a> | <a href="https://www.facebook.com/Qsoftkft" target="_blank">Facebook</a></span>
</footer>
</body>
</html>
