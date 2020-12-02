<?
// /user/loginCheck/

class UserController{

    public function __construct(){
    }

    public function logout() {
        session_destroy();
        header("Location: /dev/workspace/web/todo/login");
    }

    public function login(){
        if (isset($_POST['email'])) {
            $this->loginCheck();
            if (!defined('test')){ echo "Forbidden Request"; exit; }
            global $config;
        } else {
            $this->loginForm();
        }
    }

    private function loginCheck(){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $record = UserModel::fetch_by_email($email);
        if ($record == null){
            message('fail', _email_not_registered, true);
        } else {
            $hashedPassword = encryptPassword($password);
            if ($hashedPassword == $record['password']){
                $_SESSION['email'] = $record['email'];
                $_SESSION['user_id'] = $record['user_id'];
                $_SESSION['firstname'] = $record['first_name'];
                $_SESSION['access'] = $record['access'];
                message('success', _login_welcome, true);
            } else {
                message('fail', _invalid_password, true);
            }
        }

        return;
    }

    private function loginForm(){
        $data['test'] = array();
        View::render("/var/www/html/dev/workspace/web/todo/mvc/view/user/login.php", $data);
    }

    public function register(){
        if (isset($_POST['email'])){
            $this->registerCheck();
        } else {
            $this->registerForm();
        }
    }

    private function registerCheck(){

        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $time = getCurrentDateTime();

        $record = UserModel::fetch_by_email($email);
        if ($record != null){
            message('fail', _already_registered, true);
        }

        if (strlen($password1)<5 || strlen($password2)<5){
            message('fail', _weak_password, true);
        }

        if ($password1 != $password2){
            message('fail', _password_not_match, true);
        }

        $hashedPassword = encryptPassword($password1);

        UserModel::insert($email, $hashedPassword, $firstname, $lastname, $time, $time);

        message('success', _successfully_registered);

    }

    private function registerForm(){
        View::render("/var/www/html/dev/workspace/web/todo/mvc/view/user/register.php", []);
    }

}
