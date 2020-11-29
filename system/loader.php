<?
	session_start();
	date_default_timezone_set('Asia/Tehran');

	global $config;
	require_once('/var/www/html/dev/workspace/web/todo/config.php');
	require_once('/var/www/html/dev/workspace/web/todo/system/core.php');
	require_once('/var/www/html/dev/workspace/web/todo/system/common.php');
	require_once('/var/www/html/dev/workspace/web/todo/system/access.php');
	require_once('/var/www/html/dev/workspace/web/todo/system/db.php');
	require_once('/var/www/html/dev/workspace/web/todo/system/view.php');
	require_once('/var/www/html/dev/workspace/web/todo/locale/' . $config['lang'] . '.php');

?>
