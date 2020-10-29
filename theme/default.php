<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?=baseUrl()?>css/style-2.css">
    <link rel="stylesheet" href="<?=baseUrl()?>css/base.css">
    <link rel="stylesheet" href="<?=baseUrl()?>css/base2.css">
    <script type="text/javascript" src="/dev/workspace/web/shop/js/common.js"></script>
    <script type="text/javascript" src="/dev/workspace/web/shop/js/jquery-3.5.1.min.js"></script>
</head>
<body>

<div id="header-wrapper">
    <div id="header">
        <? if (isset($_SESSION['email'])) { ?>
            <span style="position: absolute; right: 10px; top: 16px; font-size: 130%;"><?=$_SESSION['email']?></span>
            <a href="/dev/workspace/web/shop/user/logout" class="btn1" style="position: absolute; left: 0px; top: 0px;">خروج</a>
            <a href="/dev/workspace/web/shop/home" class="btn1" style="position: absolute; left: 55px; top: 0px">خانه</a>
        <? } else { ?>
            <a href="/dev/workspace/web/shop/login" class="btn1" style="position: absolute; top: 0; right: 10px;">ورود</a>
            <a href="/dev/workspace/web/shop/register" class="btn1" style="position: absolute; top: 0; right: 60px;"">ثبت نام</a>
        <? } ?>

        <div>
            <a href="/dev/workspace/web/shop/product/previewCart" style="position: absolute; right: 155px; top: 8px; cursor: pointer; font-size: 130%;" onclick="loadlist">🛒</a>
            <a href="/dev/workspace/web/shop/product/previewCart" style="padding-top: 4px;" id="cart_items">5</a>
        </div>
    </div>
</div>

<div id="content"><?=$content?></div>
<br>

</body>
</html>

<!--<script>
    // $(function(){
        // $("#cart_items").on('click', function(){
           // $('#cart')
        // });
    // });
</script>
-->

