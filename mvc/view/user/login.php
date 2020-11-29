<?
echo "A";
if (isset($_SESSION['email'])){
    message('success', _already_logged_in, $_SESSION['em<ail']);
}

?>

<div class="tac"><br><br>
    <img src="<?=baseUrl()?>image/user.png.png">
    <br>
    <br>
    <br>

    <form action="/dev/workspace/web/todo/user/login">
        <input type="text" name="email" class="ltr" placeholder="ایمیل" >
        <br>
        <input type="password" name="password" class="ltr" placeholder="رمز عبور">
        <br>
        <br>
        <br>
        <button type="submit" class="btn-blue">ورود</button>
    </form>

</div>
