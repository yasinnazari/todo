<? if ($orders == null) { $orders = []; } ?>
<div class="preview-cart">
    <? $totalPrice = 0; ?>
    <? foreach ($orders as $order){ ?>
        <?
            $productPriceWithDiscount = $order['price'] - ($order['price'] * $order['discount'] / 100);
            $totalPrice += $order['quantity'] * $productPriceWithDiscount;
        ?>

        <div class="cartPreviewPanel">
            <div class="cartPreviewProductThumbWrapper">

                <?
                    if ($order['hasCover'] != 1){
                        $path = "/dev/workspace/web/shop/image/product/default.jpg";
                    } else {
                        $path = "/dev/workspace/web/shop/image/product/" . $order['product_id'] . ".jpg";
                    }
                ?>

                <img class="cartPreviewProductThumb" src="<?=$path?>">
            </div>
            <div class="cartPreviewPanelRightSide">
                <span class="cartPreviewProductName"><?=$order['title']?></span>
                <div style="display: flex; flex-direction: row-reverse;">
                    <span class="cartPreviewQuantity"><?=$order['quantity']?></span>&nbsp<span style="color: #7f7f7f;">&nbspx</span>
                    <span class="cartPreviewCurrentPrice"><?=$productPriceWithDiscount?> ریال</span>
                </div>
            </div>
            <span class="cartPreviewRemove" onclick="removeOrder2(this, <?=$order['order_id']?>)">❌</span>
        </div>

    <? } ?>

    <div class="cartPreviewTotal"><Br>
        <span style="color: #6a426d; position: absolute; bottom: 6%; right: 2%; font-size: 128%;">مبلغ نهایی سبد خرید شما : </span><Br><br><span style="color: #a05; position: absolute; bottom: 6%; right: 54%;"><?=$totalPrice?> ریال</span><br><br>
        <div class="addToCartPayment tac"><span>💳&nbsp;&nbsp;</span><span>پرداخت سبدخرید</span></div>
            <a href="/dev/workspace/web/shop/product/cartAddress" class="cartBtn">🛒&nbsp;مشاهده سبد خرید </a>
</div>
