<?php

if (isset($_SESSION['email'])){
    message('success', _already_logged_in, $_SESSION['email']);
}

?>

    <div class="tac"><br><br>
        <img class="image-syl" src="<?=baseUrl()?>image/shopping-cart.png"><br>
        <br>
        <br>
        <br>

        <form action="/dev/workspace/web/shop/user/login" method="post">
            <input type="text" class="ltr" placeholder="<?=_ph_email?>" name="email">
            <br>
            <input type="password" class="ltr" placeholder="<?=_ph_password?>" name="password"><br>
            <br>
            <br>
            <br>
            <br>
            <button type="submit" class="btn-blue"><?=_btn_login?></button><br>
        <form>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="/dev/workspace/web/shop/user/register" style="margin-left: 17px;" class="link"><?=_btn_signup?></a>
    </div>
    <br><br><br><br>

        <div style="margin-left: 10px; margin-top: 6px;" class="arz tac">From <a style="color: #635f71; margin-top: 6px;" target="_blank" href="https://www.arzypto.com/">ARZYPTO</a></div>
