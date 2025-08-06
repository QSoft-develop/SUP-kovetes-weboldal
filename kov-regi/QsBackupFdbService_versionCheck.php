<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: text/html');

if (!isset($_REQUEST['local_version']))
{
	echo '[Missing params] This is an automated script. Please refer to QsBackupFdbService for more information.';
	return;
}

date_default_timezone_set('Europe/Budapest');

$LOGGING 		= true;
$LOGDIR 		= "./log/";
$LOGFILE 		= "QsBackupFdbService_versionCheck.log";
$LOGDELIMITER 	= ",";
$ADDR 			= $_SERVER['REMOTE_ADDR'];

function getLogMessage() {
	global $ADDR, $LOGDELIMITER;
	$msg = '['.date('Y-m-d H:i:s').']'.$LOGDELIMITER.$ADDR.$LOGDELIMITER;
	if (versionEquals())
		$msg = $msg.'Client is up to date.';
	else
		$msg = $msg.'Client is outdated: '.getRemoteVersion().$LOGDELIMITER.'Current version is: '.getLocalVersion();
	$msg = $msg.$LOGDELIMITER."QsBackupFdbService version check completed.";
	return $msg.PHP_EOL;
}


function logHandler() {
	global $LOGGING, $LOGDIR, $LOGFILE;
	if (!$LOGGING)
		return;
	$fname = $LOGDIR.$LOGFILE;
	if (file_exists($fname))
		@file_put_contents($fname, getLogMessage(), FILE_APPEND | LOCK_EX);
}


$FILENAME = './FileS/wu_backupsrv.inf';
$OPTIONNAME = 'BuildVer';
$MSG_SUCCESS = 'Your version is up to date.';
$MSG_ERROR = 'Your version is outdated!';
if (isset($_REQUEST['msg_success']))
	$MSG_SUCCESS = $_REQUEST['msg_success'];
if (isset($_REQUEST['msg_error']))
	$MSG_ERROR = $_REQUEST['msg_error'];
$CONTENTS = @file_get_contents($FILENAME);
if (!$CONTENTS) {
	echo "Update version info not available.";
	return;
}

function getLocalVersion() {
	global $FILENAME, $OPTIONNAME, $CONTENTS;
	$local_version = $CONTENTS;
	$local_version = substr($local_version, strpos($local_version, $OPTIONNAME) + strlen($OPTIONNAME));
	$local_version = substr($local_version, strpos($local_version, '=') + 1);
	return trim(substr($local_version, 0, strpos($local_version, ']') + 1));
}

function getRemoteVersion() {
	return trim($_REQUEST['local_version']);
}

function versionEquals() {
	if (strtolower(getLocalVersion()) == strtolower(getRemoteVersion()))
		return true;
	return false;
}

function versionCheck() {
	global $MSG_SUCCESS, $MSG_ERROR;
	if (versionEquals())
		return $MSG_SUCCESS;
    return $MSG_ERROR;
}

logHandler();
echo versionCheck();
?>