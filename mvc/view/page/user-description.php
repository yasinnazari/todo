<br><span class="userdscript"><?=$_SESSION['firstname']?> میتونی اطلاعات وارد شده خودت در سایت رو بدونی !</span>
<br><Br>
<br>

<div class="svg-wrapper" style="margin-right: 1030px; position: absolute; top: 0;"><br>
    <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
        <rect id="shape" height="40" width="150"/>
        <div id="text">
            <a href="/dev/workspace/web/todo/home"><span class="spot">بازگشت به صفحه قبل</span></a>
        </div>
    </svg>
</div>
<hr><br>

<div style="color: #00fff7">
    <?php
        $email = $_SESSION['email'];
        $name = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $access = $_SESSION['access'];
        $user = $_SESSION['user_id'];
    ?>
</div>
<br>

<table class="w3-table">
    <tr>
        <th>ایمیل</th>
        <th>نام کوچک</th>
        <th>نام خانوادگی</th>
        <th>سطح دسترسی</th>
        <th>آی دی شما در سایت</th>
    </tr>
    <tr>
        <td><?=$email?></td>
        <td><?=$name?></td>
        <td><?=$lastname?></td>
        <td><?=$access?></td>
        <td><?=$user?></td>
    </tr>
</table>
<Br><br><br>
<Br><br><br>
<Br><br><br><Br>

<div class="desuser">
    <span class="gstuser1"><span class="gstuser">آدرس ایمیل شما : </span><?=$email?></span><br><Br>
    <br>
    <span class="gstuser1"><span class="gstuser">نام کوچک شما : </span><?=$name?></span><br><br>
    <br>
    <span class="gstuser1"><span class="gstuser">نام خانوادگی شما : </span><?=$lastname?></span><br><br>
    <br>
    <span class="gstuser1"><span class="gstuser">سطح دسترسی شما : </span><?=$access?></span><br><br>
    <br>
    <span class="gstuser1"><span class="gstuser">آی دی شما در سایت : </span><?=$user?></span>
</div>