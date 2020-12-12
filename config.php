<?

if (!defined('test')){ echo "Forbidden Request"; exit; }

global $config;
$config['db']['host'] = 'localhost';
$config['db']['user'] = 'root';
$config['db']['pass'] = 'password';
$config['db']['name'] = 'x_notes';

$config['lang'] = 'fa';

$config['salt'] = '25kdeisoq3locedfDFsa487Aasesfxg4lsdfdf6ds';
$config['base'] = '/dev/workspace/web/todo/';

$config['route'] = array(
    '/dev/workspace/web/login' => "dev/workspace/web/todo/user/login",
    '/dev/workspace/web/profile/*' => "dev/workspace/web/todo/user/profile/$1",
    '/dev/workspace/web/ورود' => "dev/workspace/web/todo/user/login",
    '/dev/workspace/web/register' => "dev/workspace/web/todo/user/register",
    '/dev/workspace/web/ثبت نام' => "dev/workspace/web/todo/user/register",
    '/dev/workspace/web/home' => "dev/workspace/web/todo/page/home",
    '/dev/workspace/web/خانه' => "dev/workspace/web/todo/page/home",
    '/dev/workspace/web/logout' => "dev/workspace/web/todo/user/logout",
    '/dev/workspace/web/خروج' => "dev/workspace/web/todo/user/logout",
    '/dev/workspace/web/link' => "dev/workspace/web/todo/page/link",
    '/dev/workspace/web/لینک' => "dev/workspace/web/todo/page/link",
);

