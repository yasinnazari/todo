<?

if (!defined('test')){ echo "Forbidden Request"; exit; }

global $config;
$config['db']['host'] = 'localhost';
$config['db']['user'] = 'root';
$config['db']['pass'] = 'password';
$config['db']['name'] = 'x_shop';

$config['lang'] = 'fa';

$config['salt'] = '25kdeisoq3locedfDFsa487Aasesfxg4lsdfdf6ds';
$config['base'] = '/dev/workspace/web/shop/';

$config['route'] = array(
    '/dev/workspace/web/login' => "dev/workspace/web/shop/user/login",
    '/dev/workspace/web/profile/*' => "dev/workspace/web/shop/user/profile/$1",
    '/dev/workspace/web/ورود' => "dev/workspace/web/shop/user/login",
    '/dev/workspace/web/register' => "dev/workspace/web/shop/user/register",
    '/dev/workspace/web/logout' => "dev/workspace/web/shop/user/register",
    '/dev/workspace/web/خروج' => "dev/workspace/web/shop/user/register",
    '/dev/workspace/web/ثبت نام' => "dev/workspace/web/shop/user/register",
    '/dev/workspace/web/home' => "dev/workspace/web/shop/page/home",
    '/dev/workspace/web/خانه' => "dev/workspace/web/shop/page/home",
);

// 'cart_id' => $cart['cart_id'],
