<?
class UserController {

    public function __construct()
    {}

    public function login(){
        if (isset($_POST['email'])){
            $this->loginForm();
            if (!defined('test')){ echo "Forbidden Request"; exit; }
            global $config;
        } else {
            $this->loginCheck();
        }
    }

    public function loginForm()
    {
        $data['test'] = [];
        View::render('/var/www/html/dev/workspace/web/todo/mvc/view/user/login.php', $data);
    }

    public function loginCheck(){
        $_POST['email'];
        $_POST['password'];
    }

}