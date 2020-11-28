<?
	session_start();
	date_default_timezone_set('Asia/Tehran');

	global $config;
	require_once('/var/www/html/dev/workspace/web/notes-v3/config.php');
	require_once('/var/www/html/dev/workspace/web/notes-v3/system/core.php');
	require_once('/var/www/html/dev/workspace/web/notes-v3/system/common.php');
	require_once('/var/www/html/dev/workspace/web/notes-v3/system/access.php');
	require_once('/var/www/html/dev/workspace/web/notes-v3/system/db.php');
	require_once('/var/www/html/dev/workspace/web/notes-v3/system/view.php');
	require_once('/var/www/html/dev/workspace/web/notes-v3/locale/' . $config['lang'] . '.php');

?>
