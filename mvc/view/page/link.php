<Br><div class="tac">
    <span class="gstuser" style="margin-right: 10px; margin-top: 0px;"> ** این صفحه پیوند دعوت یا لینک معرف و کد معرف شما هست ** </span>
    <br>
</div>

<div class="svg-wrapper" style="margin-right: 1030px; position: absolute; top: 0;"><br>
    <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
        <rect id="shape" height="40" width="150"/>
        <div id="text">
            <a href="/dev/workspace/web/todo/home"><span class="spot">بازگشت به صفحه قبل</span></a>
        </div>
    </svg>
</div>
<hr><br>
<br><br><br>

<input onkeypress="event.preventDefault();" id="input" type="text" value="http://localhost/dev/workspace/web/todo/register" style="width: 400px;"/>
<br><br><br>
<div onclick="showToast()" class="button_cont tar" id="copy" align="center"><a class="example_a" target="_blank" rel="nofollow noopener" style="font-weight: bold">کپی کردن پیوند دعوت</a></div>
<br><br>

<div class="tar" style="position: absolute; top: 85px; left: 90px;">
    <span style="font-size: 20px; color: #d56fec"><br><br><br>
        طبق مراحل زیر کار را انجام دهید :
    </span><br><br><br>
    <span class="gstuser1">
    1 - ابتدا دکمه کپی را فشار دهید تا پیوند دعوت کپی شود
    </span>
    <br>
    <br>
    <span class="gstuser1">
        2 -  سپس به دوست خود بدهید تا در سایت عضو شود
    </span>
    <br>
    <br>
    <span class="gstuser1">
        3 - اکنون پیوند دعوت را یا در تلگرام یا در واتساپ و یا ... به دوست خود دهید
    </span>
    <br>
</div>

<div id="toast">کپی شد</div>

<script>

    function copy() {
        var copyText = document.querySelector("#input");
        console.log(copyText);
        copyText.select();
        document.execCommand("copy");
    }

    document.querySelector("#copy").addEventListener("click", copy);

    function showToast(){
        var x = document.getElementById("toast");
        x.classList.add("show");

        setTimeout(function(){
            x.classList.remove("show");
        }, 4000);
    }

</script>

