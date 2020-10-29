<div class="Prreview-cart">
    <? $totalPrice = 0; ?>

    <table id="cartDetail">
        <colgroup>
            <col style="width: 10.5%; min-width: 10%;">
            <col style="width: 70%; min-width: 70%;">
            <col style="width: 4%; min-width: 4%;">
            <col style="width: 5%; min-width: 5%;">
            <col style="width: 15%; min-width: 15%;">
            <col style="width: 3.5%; min-width: 3.5%;">
        </colgroup>
        <br>
        <br>

        <thead>
        <tr>
            <th>تصویر محصول</th>
            <th>نام محصول</th>
            <th>تعداد</th>
            <th>فی&nbsp;<span style="color: #f80">(ریال)</span></th>
            <th>قیمت کل&nbsp;<span style="color: #f80">(ریال)</span></th>
            <th>حذف</th>
        </tr>
        </thead>

        <? foreach ($orders as $order){ ?>
            <tr style="width: 100%;" class="cartItem">
                <?
                $productPriceWithDiscount = $order['price'] - ($order['price'] * $order['discount'] / 100);
                $totalPrice += $order['quantity'] * $productPriceWithDiscount;
                if ($order['hasCover'] != 1){
                    $path = "/dev/workspace/web/shop/image/product/default.jpg";
                } else {
                    $path = "/dev/workspace/web/shop/image/product/" . $order['product_id'] . ".jpg";
                }
                ?>

                <td>
                    <div class="cartProductThumbWrapper">
                        <img class="cartProductThumb" src="<?=$path?>">
                    </div>
                </td>

                <td style="text-align: center">
                    <span class="cartProductName"><?=$order['title']?></span>
                </td>

                <td class="tac">
                    <input class="ltr itemQuantity" data-order-id="<?=$order['order_id']?>" value="<?=$order['quantity']?>" type="number" style="width: 56px;" min="1" max="20" width="50px;" autocomplete="off">
                </td>

                <td class="tac">
                    <span class="cartCurrentPrice"><?=$productPriceWithDiscount?></span>
                </td>

                <td class="tac">
                    <span class="cartTotalOrderPrice"><?=$productPriceWithDiscount?></span>
                </td>

                <td class="tac">
                    <span class="cartRemove" onclick="removeOrder2(this, <?=$order['order_id']?>)">❌</span>
                </td>

            </tr>

        <? } ?>
    </table>

    <br>
    <br>
    <br>
    <br>
    <a href="http://www.zarinpal.com" target="_blank" class="addCartPayment"><span>💳&nbsp;&nbsp;</span><span>پرداخت سبدخرید</span></a>
    <div id="cartTotal"><br>
        <div class="finalPrice">مبلغ نهایی سبد خرید شما : </div><Br><br><span class="priceFinally"><?=$totalPrice?>&nbsp;<span style="color: #f80">(ریال)</span></span><br><br>
    </div>

</div>

<script>

    function updateTotalOrderPrice(control){
        var quantity = control.val();

        var parent = control.parentsUntil(".cartItem").parent();
        var price = parent.find('.cartCurrentPrice').text();
        parent.find('.cartTotalOrderPrice').text(price * quantity);
    }

    function updateTotalCartPrice() {
        $("#cartDetail").each(function(){
            var cartDetail = $(this);

            var totalCartPrice = 0;
            cartDetail.find(".cartTotalOrderPrice").each(function(){
                var totalOrderPrice = $(this).text();
                totalCartPrice += parseInt(totalOrderPrice);
            });

            $("#cartTotal").find('span').html(totalCart);
        });
    }

    $(function (){
        $(".itemQuantity").each(function () {
            var control = $(this);
            updateTotalOrderPrice(control);
        });

        $(".itemQuantity").on('change', function(){
            var control = $(this);
            updateTotalOrderPrice(control);
            updateTotalCartPrice();

            var quantity = control.val();
            var orderId = control.data('order-id');

            $.ajax({
                url: "/dev/workspace/web/shop/product/changeQuantity/",
                method: 'POST',
                data: {
                    orderId: orderId,
                    quantity: quantity
                }
            }).done(function(output) {
                // alert(output);
            });
        });

        updateTotalCartPrice();
    });


    function removeOrder2(sender, productId)
    {
        $(sender).parentsUntil("tr").parent().remove();
        $.ajax({
            url: "/dev/workspace/web/shop/product/removeFromCart" + productId,
            method: 'POST',
            dataType: "json"
        }).done(function(output) {
            sender.parentsUntil(".cartItem").parent().remove();
            updateTotalCartPrice();
        });
    }

</script>

