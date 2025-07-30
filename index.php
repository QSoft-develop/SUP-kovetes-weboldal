<?php
include_once __DIR__.'/RegiForraskod/qsVersion.php';

function module_info($id, $name, $file, $img){
    $fixModules = ['XLS','FIREBIRD','QSBACKUPFDBSERVICE','RUSTDESK','DBCONNECTORAPI'];
    $verFile = in_array($id,$fixModules) ? 'RegiForraskod/sup_fix.ver' : 'RegiForraskod/sup.ver';
    $version = qsGetVersion($verFile, $id);
    $date = qsGetDate($verFile, $id);
    $size = qsGetFileSize($file);
    return [
        'id'=>$id,
        'name'=>$name,
        'file'=>$file,
        'img'=>$img,
        'version'=>$version,
        'date'=>$date,
        'size'=>$size
    ];
}

$mainModules = [
    module_info('SUP','SUP Pénzügyi és számviteli modul','RegiForraskod/FileS/SUP_Upd_Setup.exe','RegiForraskod/kepek/sup.jpg'),
    module_info('RAKTAR','SUP Raktári készlet és áruforgalmi modul','RegiForraskod/FileS/RA_Upd_Setup.exe','RegiForraskod/kepek/raktar.jpg'),
    module_info('MERLEG','SUP Mérleg és elemzés modul','RegiForraskod/FileS/LM_Upd_Setup.exe','RegiForraskod/kepek/merleg.jpg'),
    module_info('TIP','Titkársági Programcsomag','RegiForraskod/FileS/TIP_Upd_Setup.exe','RegiForraskod/kepek/tip.jpg')
];

$extraModules = [
    module_info('XLS','SUP XLS.NET függvénycsomag','RegiForraskod/FileS/SUP_XLS_NET_Setup.exe','RegiForraskod/kepek/xls.jpg'),
    module_info('DBCONNECTOR','DBConnector ütemezett feladatok','RegiForraskod/FileS/DBConnector_Setup.exe','RegiForraskod/kepek/dbconnector.jpg'),
    module_info('DBCONNECTORAPI','DBConnector API','RegiForraskod/FileS/DbConnectorApi.jar','RegiForraskod/kepek/dbconnectorapi.jpg'),
    module_info('QSBACKUPFDBSERVICE','QsFdbBackupService adatbázismentő','RegiForraskod/FileS/QsBackupFdbService.zip','RegiForraskod/kepek/qsfdb.png')
];

$otherSoft = [
    module_info('RUSTDESK','Távmenedzselés (RustDesk)','RegiForraskod/FileS/RustDeskQsoft.exe','RegiForraskod/kepek/tavman.jpg'),
    module_info('FIREBIRD','Firebird SQL adatbáziskezelő','RegiForraskod/FileS/FB30_QSoft_Setup.exe','RegiForraskod/kepek/firebird.jpg'),
    module_info('WEBUPDATE','Internetes frissítés','RegiForraskod/FileS/WebUpdate.exe','RegiForraskod/kepek/webupdate.jpg'),
    // információs link
    ['id'=>'ARAL','name'=>'Aral letöltési oldal','file'=>'https://aral.qsoft.hu/d/d11f48cbc61548619ad0/','img'=>'RegiForraskod/kepek/Blue32x32.png','version'=>'','date'=>'','size'=>'']
];
?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="utf-8">
<title>SUP Követés letöltése</title>
<style>
body{font-family: Arial, sans-serif;background:#f5f5f5;margin:0;padding:0;color:#333;}
header,footer{text-align:center;padding:20px;background:#ddeeff;}
header img{max-width:300px;}
.container{display:flex;flex-direction:column;align-items:center;}
.tiles{display:flex;flex-wrap:wrap;justify-content:center;max-width:1200px;}
.tile{background:#eef;margin:10px;padding:15px;width:220px;height:120px;cursor:pointer;border-radius:8px;box-shadow:0 0 5px rgba(0,0,0,0.2);display:flex;flex-direction:column;align-items:center;justify-content:center;}
.tile.small{width:180px;height:100px;font-size:0.9em;}
.tile img{width:48px;height:48px;margin-bottom:5px;}
.tile span{display:block;text-align:center;}
.modal{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);align-items:center;justify-content:center;}
.modal-content{background:#fff;padding:20px;border-radius:8px;min-width:300px;max-width:90%;}
.close{float:right;font-size:20px;cursor:pointer;}
</style>
</head>
<body>
<header>
<img src="RegiForraskod/kepek/suplogo.jpg" alt="SUP logo">
</header>
<div class="container">
<div class="tiles">
<?php foreach($mainModules as $m): ?>
  <div class="tile" data-module='<?php echo json_encode($m); ?>'>
    <img src="<?php echo $m['img']; ?>" alt="<?php echo $m['id']; ?>">
    <span><b><?php echo $m['name']; ?></b></span>
    <span><?php echo $m['version']; ?> (<?php echo $m['date']; ?>)</span>
  </div>
<?php endforeach; ?>
</div>
<div class="tiles">
<?php foreach($extraModules as $m): ?>
  <div class="tile small" data-module='<?php echo json_encode($m); ?>'>
    <img src="<?php echo $m['img']; ?>" alt="<?php echo $m['id']; ?>">
    <span><b><?php echo $m['id']; ?></b></span>
    <span><?php echo $m['version']; ?></span>
  </div>
<?php endforeach; ?>
</div>
<div class="tiles">
<?php foreach($otherSoft as $m): ?>
  <div class="tile small" data-module='<?php echo json_encode($m); ?>'>
    <img src="<?php echo $m['img']; ?>" alt="<?php echo $m['id']; ?>">
    <span><b><?php echo $m['id']; ?></b></span>
    <span><?php echo $m['version']; ?></span>
  </div>
<?php endforeach; ?>
</div>
</div>
<footer>
<p>&copy; QSoft Kft. <a href="https://www.sup.hu">www.sup.hu</a> | <a href="https://www.facebook.com/sup.hu">Facebook</a></p>
</footer>

<div id="modal" class="modal">
<div class="modal-content" id="modalContent">
<span class="close" onclick="hideModal()">&times;</span>
<div id="details"></div>
</div>
</div>

<script>
function hideModal(){
  document.getElementById('modal').style.display='none';
}
function showDetails(data){
  var d=document.getElementById('details');
  d.innerHTML='<h3>'+data.name+'</h3>'+
              '<p>File neve: <a href="'+data.file+'">'+data.file.split('/').pop()+'</a></p>'+
              '<p>Verzió: '+data.version+'</p>'+
              '<p>Feltöltés dátuma: '+data.date+'</p>'+
              '<p>Letöltés mérete: '+data.size+'</p>'+
              '<p><a href="'+data.file+'">Letöltés</a></p>';
  document.getElementById('modal').style.display='flex';
}
document.querySelectorAll('.tile').forEach(function(el){
  el.addEventListener('click',function(){
    var data=JSON.parse(this.getAttribute('data-module'));
    if(data.file){
      showDetails(data);
    } else if(data.id==='ARAL'){
      window.location.href=data.file;
    }
  });
});
window.addEventListener('keydown',function(e){if(e.key==='Escape'){hideModal();}});
document.getElementById('modal').addEventListener('click',function(e){if(e.target==this){hideModal();}});
</script>
</body>
</html>
