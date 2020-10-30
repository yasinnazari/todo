<? if ($products == null) { $products = []; } ?>
<? foreach ($products as $product){ ?>
    <div class="productPanel-linear">
    <div class="tac">

            <?
                if ($product['hasCover'] != 1){
                    $path = "/dev/workspace/web/shop/image/product/default.jpg";
                } else {
                    $path = "/dev/workspace/web/shop/image/product/" . $product['product_id'] . ".jpg";
                }
            ?>

            <img class="productThumb-linear" src="<?=$path?>"><br><br>
        </div>
        <span class="productName-linear"><?=$product['title']?></span>
        <p class="productBrief-Linear tal" style="margin-left: 50px; margin-top: 50px"><?=$product['brief']?></p>
        <div class="productPanelRightSide">
            <div class="priceWrapper-linear">
                <span class="currentPrice-linear"><?=$product['price'] - ($product['price'] * $product['discount'] / 100)?> ریال</span>
                <? if ($product['discount'] > 0 ){ ?>
                    <span class="oldPrice-linear"><?=$product['price']?> ریال</span>
                <? } ?>
            </div>

            <div class="addToCartBtn-linear" onclick="addProduct(<?=$product['product_id']?>)">
                <span>
                <span>➕ افزودن به سبد خرید</span>
            </div>
            </span>
            <span class="wishBtn-linear">❤️</span>
        </div>
    </div>

<? } ?>


