<?
class UserController {

    public function __construct()
    {}

    public function login(){
        if (isset($_POST['email'])){
            $this->loginCheck();
            if (!defined('test')){ echo "Forbidden Request"; exit; }
            global $config;
        } else {
            $this->loginForm();
        }
    }

    public function loginCheck(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $record = UserModel::fetch_by_email($email);
        $hashedPassword = encryptPassword($password);
        if ($hashedPassword == $record['password']){
            $_SESSION['email'] = $record['email'];
            $_SESSION['password'] = $record['password'];
            $_SESSION['access'] = $record['access'];
            message('success', _login_welcome, true);
        } else {
            message('fail', _invalid_password, true);
        }

        return;
    }

    public function loginForm()
    {
        $data['test'] = [];
        View::render('/var/www/html/dev/workspace/web/todo/mvc/view/user/login.php', $data);
    }

    public function register()
    {
        if (isset($_POST['email'])) {
            $this->registerCheck();
            if (!defined('test')) {
                echo "Forbidden Request";
                exit;
            }
            global $config;
        } else {
            $this->registerForm();
        }
    }

    public function registerForm(){
        View::render("/var/www/html/dev/workspace/web/todo/register.php", []);
    }

    public function registerCheck(){
        $email = $_POST[''];
    }

}

