
    <div class="tac">
        <img src="<?=baseUrl()?>image/user2.png"><br>
        <br>
        <br>

        <form action="/dev/workspace/web/notes-v3/user/register" method="post">
            <input type="text" class="ltr" placeholder="<?=_ph_email?>" name="email"><br>
            <br>
            <input type="password" class="ltr" placeholder="<?=_ph_password?>" name="password1"><br>
            <input type="password" class="ltr" placeholder="<?=_ph_confirm_password?>" name="password2"><br>
            <br>
            <input type="text" placeholder="<?=_ph_firstname?>" name="name"><br>
            <input type="text" placeholder="<?=_ph_lastname?>" name="lastname"><br>
            <br>
            <br>
            <button type="submit" class="btn-blue"><?=_btn_register?></button><br>
            <br>
            <br>
            <br>
            <a href="/dev/workspace/web/notes-v3/user/login" class="btn"><?=_btn_exit?></a>
            <br>
            <br>
        <form>

    </div>
