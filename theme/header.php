<div id="header-wrapper">
    <div>
        <? if (isGuest()) { ?>
            <a href="/dev/workspace/web/shop/login" class="btn1" style="position: absolute; top: 0; right: 10px;">ورود</a>
            <a href="/dev/workspace/web/shop/register" class="btn1" style="position: absolute; top: 0; right: 60px;"">ثبت نام</a>
            <span class="pon">شماره پشتیبانی : 000-000-000</span>
        <? } else { ?>
            <span style="position: absolute; right: 10px; top: 16px; font-size: 130%; color: #1a1966;">کاربر گرامی <span style="color: #3c6a6a"><?=session_get('first_name');?></span></span>
            <a href="/dev/workspace/web/shop/user/logout" class="btn1" style="position: absolute; left: 0px; top: 0px;">خروج</a>
            <a href="/dev/workspace/web/shop/home" class="btn1" style="position: absolute; left: 55px; top: 0px">خانه</a>
        <? } ?>

        <div>
            <a href="/dev/workspace/web/shop/product/previewCart" style="position: absolute; right: 180px; top: 8px; cursor: pointer; font-size: 130%;" onclick="loadlist">🛒</a>
            <span class="pon">📞 شماره پشتیبانی : 000-000-000</span>
            <a href="/dev/workspace/web/shop/product/previewCart" style="position: absolute; right: 182px; padding-top: 4px;" id="cart_items">5</a>
        </div>
    </div>
</div>

<script>

    function refreshCartPreview()
    {
        $.ajax({
            url: "/dev/workspace/web/shop/product/refreshCartPreview",
            method: 'POST',
            dataType: "json"
        }).done(function(output) {
            console.log(output);
            $("#cart_items").text(output.cartItemsCount);
            $("#cartPreviewHolder").html(output.cartPreviewHolder);
        });
    }

    $(function(){
        $("#viewType").val('<?=$_SESSION['viewType']?>');
        reloadData();
        refreshCartPreview();
    });

</script>
