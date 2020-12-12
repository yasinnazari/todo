<?
if (isset($_SESSION['email'])){
    message('success', _already_logged_in, $_SESSION['email']);
}

?>

<div class="tac"><br>
    <br><br>
    <img src="<?=baseUrl()?>image/hd2do.png">&nbsp&nbsp&nbsp
    <br><br>
    <br><br>

    <form action="/dev/workspace/web/todo/user/login" method="post">
        <br><br>
        <input type="text" name="email" class="ltr" placeholder="ایمیل">
        <br>
        <input type="password" name="password" class="ltr" placeholder="رمز عبور"><br>
        <br><br>
        <br>
        <button type="submit" class="btn-blue">ورود</button>
    </form><br>
    <br><br>
    <a href="/dev/workspace/web/todo/register" class="link">ساخت حساب جدید</a>

</div>
