<?php
require_once __DIR__.'/RegiForraskod/qsVersion.php';

function get_ver_info($code) {
    $fix_codes = array('XLS','FIREBIRD','QSBACKUPFDBSERVICE','RUSTDESK','DBCONNECTORAPI');
    $file = in_array($code, $fix_codes) ? 'sup_fix.ver' : 'sup.ver';
    $path = __DIR__."/RegiForraskod/{$file}";
    return array(
        qsGetVersion($path, $code),
        qsGetDate($path, $code)
    );
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="utf-8">
<title>Linkek listája</title>
<style>
table { border-collapse: collapse; }
th, td { border: 1px solid #444; padding: 8px; }
</style>
</head>
<body>
<h1>Linkek gyűjteménye</h1>
<table>
<tr><th>Link</th><th>Adatok</th></tr>
<tr>
<td><a href="https://www.sup.hu/kov">https://www.sup.hu/kov</a></td>
<td></td>
</tr>
<tr>
<td><a href="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd</a></td>
<td></td>
</tr>
<tr>
<td><a href="http://www.w3.org/1999/xhtml">http://www.w3.org/1999/xhtml</a></td>
<td></td>
</tr>
<tr>
<td><a href="http://ICON.png">http://ICON.png</a></td>
<td></td>
</tr>
<tr>
<td><a href="http://www.sup.hu/kov">http://www.sup.hu/kov</a></td>
<td></td>
</tr>
<tr>
<td><img src="RegiForraskod/kepek/Blue32x32.png" alt="Blue32x32"> <a href="https://aral.qsoft.hu/d/d11f48cbc61548619ad0/">https://aral.qsoft.hu/d/d11f48cbc61548619ad0/</a></td>
<td></td>
</tr>
<tr>
<td><a href="https://dl.sup.hu/dl/?file=supa016iso">https://dl.sup.hu/dl/?file=supa016iso</a></td>
<td></td>
</tr>
<?php list($v,$d)=get_ver_info('SUP'); ?>
<tr>
<td><img src="RegiForraskod/kepek/sup.jpg" alt="SUP"> <a href="RegiForraskod/FileS/SUP_Upd_Setup.exe">SUP_Upd_Setup.exe</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
<?php list($v,$d)=get_ver_info('RAKTAR'); ?>
<tr>
<td><img src="RegiForraskod/kepek/raktar.jpg" alt="RAKTAR"> <a href="RegiForraskod/FileS/RA_Upd_Setup.exe">RA_Upd_Setup.exe</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
<?php list($v,$d)=get_ver_info('MERLEG'); ?>
<tr>
<td><img src="RegiForraskod/kepek/merleg.jpg" alt="MERLEG"> <a href="RegiForraskod/FileS/LM_Upd_Setup.exe">LM_Upd_Setup.exe</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
<?php list($v,$d)=get_ver_info('TIP'); ?>
<tr>
<td><img src="RegiForraskod/kepek/tip.jpg" alt="TIP"> <a href="RegiForraskod/FileS/TIP_Upd_Setup.exe">TIP_Upd_Setup.exe</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
<?php list($v,$d)=get_ver_info('XLS'); ?>
<tr>
<td><img src="RegiForraskod/kepek/xls.jpg" alt="XLS"> <a href="RegiForraskod/FileS/SUP_XLS_NET_Setup.exe">SUP_XLS_NET_Setup.exe</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
<?php list($v,$d)=get_ver_info('DBCONNECTOR'); ?>
<tr>
<td><img src="RegiForraskod/kepek/dbconnector.jpg" alt="DBCONNECTOR"> <a href="RegiForraskod/FileS/DBConnector_Setup.exe">DBConnector_Setup.exe</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
<?php list($v,$d)=get_ver_info('DBCONNECTORAPI'); ?>
<tr>
<td><img src="RegiForraskod/kepek/dbconnectorapi.jpg" alt="DBCONNECTORAPI"> <a href="RegiForraskod/FileS/DbConnectorApi.jar">DbConnectorApi.jar</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
<?php list($v,$d)=get_ver_info('QSBACKUPFDBSERVICE'); ?>
<tr>
<td><img src="RegiForraskod/kepek/qsfdb.png" alt="QSBACKUPFDBSERVICE"> <a href="RegiForraskod/FileS/QsBackupFdbService.zip">QsBackupFdbService.zip</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
<?php list($v,$d)=get_ver_info('RUSTDESK'); ?>
<tr>
<td><img src="RegiForraskod/kepek/tavman.jpg" alt="RUSTDESK"> <a href="RegiForraskod/FileS/RustDeskQsoft.exe">RustDeskQsoft.exe</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
<?php list($v,$d)=get_ver_info('FIREBIRD'); ?>
<tr>
<td><img src="RegiForraskod/kepek/firebird.jpg" alt="FIREBIRD"> <a href="RegiForraskod/FileS/FB30_QSoft_Setup.exe">FB30_QSoft_Setup.exe</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
<?php list($v,$d)=get_ver_info('WEBUPDATE'); ?>
<tr>
<td><img src="RegiForraskod/kepek/webupdate.jpg" alt="WEBUPDATE"> <a href="RegiForraskod/FileS/WebUpdate.exe">WebUpdate.exe</a></td>
<td><ul><li>Verzió: <?php echo $v; ?></li><li>A feltöltés dátuma: <?php echo $d; ?></li></ul></td>
</tr>
</table>
</body>
</html>

