<?

class UserController {

    // Exit the page ------------------
    public function logout() {
        session_destroy();
        header("Location: /dev/workspace/web/shop/login");

        session_start();
        session_regenerate_id();

        initializeSettings();
    }

    // login Site ------------------
    public function login(){
        $email = post('email');

        if (!isGuest()){
            header("Location: " . baseUrl() . "page/home");
            return;
        }

        // show login form if email not provided
        if ($email == null) {
            View::render("/mvc/view/user/login.php");
            return;
        }

        // Check Login information to be valid
        $email = post('email');
        $password = post('password');

        $record = UserModel::fetch_by_email($email);
        if ($record == null){
            message('fail', _email_not_registered, true);
        } else {
            $hashedPassword = encryptPassword($password);
            if ($hashedPassword == $record['password']){

                session_set('email', $record['email']);
                session_set('user_id', $record['user_id']);
                session_set('first_name', $record['first_name']);
                session_set('last_name', $record['last_name']);
                session_set('access', $record['access']);

                message('success', _login_welcome, true);
            } else {
                message('fail', _invalid_password, true);
            }
        }
    }

    public function register(){
        $email = post('email');

        // show registration form if email not provided
        if ($email == null) {
            View::render("/mvc/view/user/register.php", []);
            return;
        }

        // check registration info and register if is valid information
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

}
