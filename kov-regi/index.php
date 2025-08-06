<?php

function Modul($nev, $file, $mkod, $str)
{
if (($mkod == 'XLS') || ($mkod == 'FIREBIRD') || ($mkod == 'QSBACKUPFDBSERVICE') || ($mkod == 'RUSTDESK') || ($mkod == 'DBCONNECTORAPI'))
  {$versionfile = "sup_fix.ver";}
else
  {$versionfile = "sup.ver";}
echo'	
<div id="program">
   <h2><a name="'.$mkod.'"><a href="FileS/'.$file.'">'.$nev.'</a></a></h2>
   <br>
	   <table width="100%">
	   <tr>	
	   <td>
         <img src="kepek/letolteshatter.jpg" align="left" valign="center">
	   </td>
	   <td>
			<table "cellspacing="0" cellpadding="7" width="350" style="border:1px #ddd solid;">
				<tr style="background-color:#ddeeff">
		         <td>File neve:</td>
		         <td style="color:#c20;"><a href="FileS/'.$file.'">'.$file.'</a></td>
		        </tr>
		        
				<tr style="background-color:#d0e0f0">
				 <td>Verzió:</td>
				 <td style="color:#c20;">'.qsGetVersion($versionfile, $mkod).'</td>
		        </tr>
		        
				<tr style="background-color:#ddeeff">
				 <td>A feltöltés dátuma:</td>
				 <td style="color:#c20;">'.qsGetDate($versionfile, $mkod).'</td>
		        </tr>
		        
				<tr style="background-color:#d0e0f0">
				 <td>Letöltés mérete:</td>
				 <td style="color:#c20;">'.qsGetFileSize ("FileS/$file").'</td>
		        </tr>
		        
				<tr style="background-color:#ddeeff">
				 <td>&nbsp;</td>
				 <td style="color:#c20;text-align:center;"><a href="FileS/'.$file.'"><b>Letöltés</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="kepek/letoltes.png" alt="letöltés ikon"></a></td>
		        </tr>
	        </table>
	        
	       <br>
	       <br>
	       <br>
		   Letöltés menete:<br>
			<ul>
			<li>Kattintson a "Letöltés" gombra.</li>
			<li>Ezután kattintson a "Mentés" gombra.</li>
			<li>Tallózza ki a mentés helyét! Ajánlott a C:\QSoft\SUP\Install.dsk könyvtárba való mentés.</li>
			<li>Nyomja meg a "Mentés" gombot.</li>
			<li>A letöltés befejeztével a követés célkönyvtárából '.$str.' a program. ('.$file.')</li>
			</ul>
			<br><br>
	   </td>
	   </tr>	
	   </table>
</div>';
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<head><title>Követés letöltése | QSoft Kft.</title>
  <link rel="stylesheet" type="text/css" href="kov.css">
  <!-- <link rel="icon" href="http://ICON.png" type="image/png"> -->
  <meta name="robots" content="noindex, nofollow, noarchive">
</head>
<body>
<?php
include("qsVersion.php");
?>


<div id="fejlec">
<!-- <a href="http://www.sup.hu/kov"><img src="kepek/suptitle.png" alt="SUPTTź Integrált Számviteli Rendszer" width="600"></a>
-->
 
	<div id="figyelem">
	   Figyelem!!! A követéseket csak <b><a href="https://dl.sup.hu/dl/?file=supa016iso">A016</a></b>-s adatbázisverzióhoz telepítse fel! <br>
	   (Csak az adatbázis teljes mentése és a <b>2019. szeptember 4</b>-i követés CD telepítése után!!!) 
	</div>
<br><img src="kepek/suplogo.png">
</div> 
<br>
<br>

<table "cellspacing="0" cellpadding="7"  bgcolor="#ddeeff" align="center" width="80%">
<tr>
	<td>
<h2>
SUP<sup>®</sup> Rendszerrel kapcsolatos frissítések letöltése
</h2>
	</td>
</tr>
</table>

<table "cellspacing="4" cellpadding="0"  bgcolor="#d0e0f0" align="center" width="80%">
<tr width="100%">
<td width="25%" style="border-style: solid; border-width: 1px" align="left" >
	<table>
	<td><a href="#SUP"><img src="kepek/sup.jpg"></a>
	</td>
	<td >
	<a href="#SUP">SUP Pénzügyi és számviteli modul</a>
	</td>
	</table>
</td>
<td width="25%" style="border-style: solid; border-width: 1px" align="left" >
	<table>
	<td><a href="#RAKTAR"><img src="kepek/raktar.jpg"></a>
	</td>
	<td >
	<a href="#RAKTAR">SUP Raktári készlet és áruforgalmi modul</a>
	</td>
	</table>
</td>
<td width="25%" style="border-style: solid; border-width: 1px" align="left" >
	<table>
	<td><a href="#MERLEG"><img src="kepek/merleg.jpg"></a>
	</td>
	<td >
	<a href="#MERLEG">SUP Mérleg és elemzés modul</a>
	</td>
	</table>
</td>
<td width="25%" style="border-style: solid; border-width: 1px" align="left">	
	<table>
	<td><a href="#TIP"><img src="kepek/tip.jpg"></a>
	</td>
	<td >
	<a href="#TIP">Titkársági Programcsomag</a>
	</td>
	</table>
</td>
</tr>
</td>
</tr>
<td width="25%" style="border-style: solid; border-width: 1px" align="left">	
	<table>
	<td><a href="#XLS"><img src="kepek/xls.jpg"></a>
	</td>
	<td >
	<a href="#XLS">SUP XLS.NET függvénycsomag</a>
	</td>
	</table>
</td>
<td width="25%" style="border-style: solid; border-width: 1px" align="left">	
	<table>
	<td><a href="#DBCONNECTOR"><img src="kepek/dbconnector.jpg"></a>
	</td>
	<td >
	<a href="#DBCONNECTOR">DBConnector ütemezett feladatok</a>
	</td>
	</table>
</td>
<td width="25%" style="border-style: solid; border-width: 1px" align="left">	
	<table>
	<td><a href="#DBCONNECTORAPI"><img src="kepek/dbconnectorapi.jpg"></a>
	</td>
	<td >
	<a href="#DBCONNECTORAPI">DBConnector API</a>
	</td>
	</table>
</td>
<td width="25%" style="border-style: solid; border-width: 1px" align="left">	
	<table>
	<td><a href="#QSBACKUPFDBSERVICE"><img src="kepek/qsfdb.png"></a>
	</td>
	<td >
	<a href="#QSBACKUPFDBSERVICE">QsFdbBackUpService adatbázismentő</a>
	</td>
	</table>
</td>
</tr>
</table>

<table "cellspacing="0" cellpadding="7"  bgcolor="#ddeeff" align="center" width="80%">
<tr>
	<td>
<h2>
Kiegészítő szoftverek letöltése
</h2>
	</td>
</tr>
</table>

<table "cellspacing="4" cellpadding="0"  bgcolor="#d0e0f0" align="center" width="80%">
<tr widht="100%">
<td width="25%" style="border-style: solid; border-width: 1px" align="left" >
	<table>
	<td><a href="#RUSTDESK"><img src="kepek/tavman.jpg"></a>
	</td>
	<td >
	<a href="#RUSTDESK"> Távmenedzselés (RustDesk)</a>
	</td>
	</table>
</td>
<td width="25%"  style="border-style: solid; border-width: 1px" align="left" >
<table>
	<td><a href="#FIREBIRD"><img src="kepek/firebird.jpg"></a>
	</td>
	<td >
	<a href="#FIREBIRD"> Firebird SQL adatbáziskezelő</a>
	</td>
	</table>
</td>
<td width="25%" style="border-style: solid; border-width: 1px" align="left">	
	<table>
	<td><a href="#WEBUPDATE"><img src="kepek/webupdate.jpg"></a>
	</td>
	<td >
	<a href="#WEBUPDATE">Internetes frissítés</a>
	</td>
	</table>
</td>
<td width="25%"  style="border-style: solid; border-width: 1px" align="center" >
<table>
	<td><a href="https://aral.qsoft.hu/d/d11f48cbc61548619ad0/"><img src="kepek/Blue32x32.png"></a>
	</td>
	</table>
</td>
</table>
<br>
<br>
<br>
<br>


<?Modul('SUP Pénzügyi és számviteli modul frissítése', 'SUP_Upd_Setup.exe', 'SUP', 'installálható');?>
<?Modul('SUP Raktári készlet és áruforgalomi modul frissítése', 'RA_Upd_Setup.exe', 'RAKTAR', 'installálható');?>
<?Modul('SUP Mérleg és elemzés modul frissítése', 'LM_Upd_Setup.exe', 'MERLEG', 'installálható');?>
<?Modul('TIP Titkársági Programcsomag frissítése', 'TIP_Upd_Setup.exe', 'TIP', 'installálható');?>
<?Modul('SUP XLS.NET függvénycsomag frissítése', 'SUP_XLS_NET_Setup.exe', 'XLS', 'installálható');?>
<?Modul('DBConnector ütemezett feladatok', 'DBConnector_Setup.exe', 'DBCONNECTOR', 'installálható');?>
<?Modul('DBConnector API', 'DbConnectorApi.jar', 'DBCONNECTORAPI', 'indítható');?>
<?Modul('QsBackupFdbService adatbázismentő', 'QsBackupFdbService.zip', 'QSBACKUPFDBSERVICE', 'installálható');?>
<?Modul('Távmenedzselés (RustDesk)', 'RustDeskQsoft.exe', 'RUSTDESK', 'indítható');?>
<?Modul('Firebird SQL 3.0 adatbáziskezelő (32 és 64 bites változat)', 'FB30_QSoft_Setup.exe', 'FIREBIRD', 'installálható');?>
<?Modul('Internetes frissítés', 'WebUpdate.exe', 'WEBUPDATE', 'installálható');?>


<div id="program">
<p><i>&copy;QSoft Kft. 1991-2023. Minden jog fenntartva.</i></p> 
</div> 
</body></html>
