<?
	session_start();
	date_default_timezone_set('Asia/Tehran');

	global $config;
	require_once('/var/www/html/dev/workspace/web/shop/config.php');
	require_once('/var/www/html/dev/workspace/web/shop/system/core.php');
	require_once('/var/www/html/dev/workspace/web/shop/system/common.php');
	require_once('/var/www/html/dev/workspace/web/shop/system/access.php');
	require_once('/var/www/html/dev/workspace/web/shop/system/db.php');
	require_once('/var/www/html/dev/workspace/web/shop/system/view.php');
	require_once('/var/www/html/dev/workspace/web/shop/locale/' . $config['lang'] . '.php');

	initializeSettings();

?>
