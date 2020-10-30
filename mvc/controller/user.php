<?
// /user/loginCheck/

class UserController{
    
    public function __construct(){
    }

    public function logout() {
        session_destroy();
        header("Location: /dev/workspace/web/shop/login");

        session_start();
        session_regenerate_id();

        $_SESSION['viewType'] = 'grid';
    }

    public function profile($userId){
        echo "User Profile: " . $userId;
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

        $email = post('email');
        $password = post('password');

        $record = UserModel::fetch_by_email($email);
        if ($record == null){
            message('fail', _email_not_registered, true);
        } else {
            $hashedPassword = encryptPassword($password);
            if ($hashedPassword == $record['password']){
                $_SESSION['email'] = $record['email'];
                $_SESSION['user_id'] = $record['user_id'];
                $_SESSION['access'] = $record['access'];
                message('success', _login_welcome, true);
            } else {
                message('fail', _invalid_password, true);
            }
        }

        return;
    }

    private function loginForm(){
        View::render("/user/login.php", $data = []);
        $data['test'] = [];
    }

    public function register(){
        if (isset($_POST['email'])){
            $this->registerCheck();
        } else {
            $this->registerForm();
        }
    }

    private function registerCheck() {
        $email = post('email');
        $password1 = post('password1');
        $password2 = post('password2');
        $firstname = post('name');
        $lastname = post('lastname');
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
        View::render("/user/register.php", []);
    }

}
