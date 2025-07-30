<?php
include_once __DIR__.'/qsVersion.php';

$modules = [
    // first row
    ["id" => "SUP", "name" => "SUP Pénzügyi és számviteli modul", "file" => "SUP_Upd_Setup.exe", "img" => "sup.jpg", "row" => 1],
    ["id" => "RAKTAR", "name" => "SUP Raktári készlet és áruforgalmi modul", "file" => "RA_Upd_Setup.exe", "img" => "raktar.jpg", "row" => 1],
    ["id" => "MERLEG", "name" => "SUP Mérleg és elemzés modul", "file" => "LM_Upd_Setup.exe", "img" => "merleg.jpg", "row" => 1],
    ["id" => "TIP", "name" => "Titkársági Programcsomag", "file" => "TIP_Upd_Setup.exe", "img" => "tip.jpg", "row" => 1],
    // second row
    ["id" => "XLS", "name" => "SUP XLS.NET függvénycsomag", "file" => "SUP_XLS_NET_Setup.exe", "img" => "xls.jpg", "row" => 2],
    ["id" => "DBCONNECTOR", "name" => "DBConnector ütemezett feladatok", "file" => "DBConnector_Setup.exe", "img" => "dbconnector.jpg", "row" => 2],
    ["id" => "DBCONNECTORAPI", "name" => "DBConnector API", "file" => "DbConnectorApi.jar", "img" => "dbconnectorapi.jpg", "row" => 2],
    ["id" => "QSBACKUPFDBSERVICE", "name" => "QsFdbBackUpService adatbázismentő", "file" => "QsBackupFdbService.zip", "img" => "qsfdb.png", "row" => 2],
    // third row
    ["id" => "RUSTDESK", "name" => "Távmenedzselés (RustDesk)", "file" => "RustDeskQsoft.exe", "img" => "tavman.jpg", "row" => 3],
    ["id" => "FIREBIRD", "name" => "Firebird SQL 3.0 adatbáziskezelő", "file" => "FB30_QSoft_Setup.exe", "img" => "firebird.jpg", "row" => 3],
    ["id" => "WEBUPDATE", "name" => "Internetes frissítés", "file" => "WebUpdate.exe", "img" => "webupdate.jpg", "row" => 3]
];
?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="utf-8">
<title>SUP Követés letöltés</title>
<link rel="stylesheet" href="style.css">
<script>
function showDetails(id){
  document.getElementById('d_'+id).style.display='flex';
}
function hideDetails(id){
  document.getElementById(id).style.display='none';
}
window.addEventListener('keydown', function(e){
  if(e.key === 'Escape') document.querySelectorAll('.details').forEach(d=>d.style.display='none');
});
</script>
</head>
<body>
<?php $imgBase = '../RegiForraskod/kepek/'; ?>
<header>
  <img src="<?php echo $imgBase; ?>suplogo.jpg" alt="SUP logo">
</header>
<div id="tiles">
<?php foreach($modules as $m): ?>
  <div class="tile<?php echo $m['row']==1?' large':''; ?>" onclick="showDetails('<?php echo $m['id']; ?>')">
    <img src="<?php echo $imgBase . $m['img']; ?>" alt="<?php echo $m['id']; ?>">
    <div class="title"><?php echo $m['name']; ?></div>
  </div>
<?php endforeach; ?>
</div>
<?php foreach($modules as $m): $verfile = in_array($m['id'], ['XLS','FIREBIRD','QSBACKUPFDBSERVICE','RUSTDESK','DBCONNECTORAPI']) ? 'sup_fix.ver' : 'sup.ver'; ?>
<div id="d_<?php echo $m['id']; ?>" class="details" onclick="hideDetails('d_<?php echo $m['id']; ?>')">
  <div class="details-content" onclick="event.stopPropagation();">
    <img src="<?php echo $imgBase . $m['img']; ?>" alt="<?php echo $m['id']; ?>" class="modal-img">
    <h2><?php echo $m['name']; ?></h2>
    <table>
      <tr><td>File neve:</td><td><a href="FileS/<?php echo $m['file']; ?>"><?php echo $m['file']; ?></a></td></tr>
      <tr><td>Verzió:</td><td><?php echo qsGetVersion($verfile, $m['id']); ?></td></tr>
      <tr><td>Feltöltés dátuma:</td><td><?php echo qsGetDate($verfile, $m['id']); ?></td></tr>
      <tr><td>Letöltés mérete:</td><td><?php echo qsGetFileSize('FileS/'.$m['file']); ?></td></tr>
    </table>
    <div class="close"><button onclick="hideDetails('d_<?php echo $m['id']; ?>')">Bezárás</button></div>
  </div>
</div>
<?php endforeach; ?>
<footer>&copy;QSoft Kft. 1991-2025. Minden jog fenntartva.</footer>
</body>
</html>
