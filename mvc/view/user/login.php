<?php

if (isset($_SESSION['email'])){
    message('success', _already_logged_in, $_SESSION['email']);
}

?>

    <div class="tac">
        <img src="<?=baseUrl()?>image/user2.png">
        <br>
        <br>
        <br>

        <form action="/dev/workspace/web/notes-v3/user/login" method="post">
            <input type="text" class="ltr" placeholder="<?=_ph_email?>" name="email">
            <br>
            <input type="password" class="ltr" placeholder="<?=_ph_password?>" name="password"><br>
            <br>
            <br>
            <br>
            <button type="submit" class="btn-blue"><?=_btn_login?></button><br>
        <form>

        <br>
        <br>
        <br>
        <a href="/dev/workspace/web/notes-v3/user/register" class="link"><?=_btn_signup?></a>
    </div>
    <br>
    <br>
    <br>
    <br>

    <div class="arz tac"><p>From Arzypto</p>
