<? if ($products == null) { $products = []; } ?>
<? foreach ($products as $product){ ?>
    <div class="productPanel">
        <? if ($product['discount'] > 0) { ?>
            <span class="discountFlag tac okms">فروش ویژه</span><br>
        <? } else { ?>
            <span class="saleFlag tac okms">موجود</span><br>
        <? } ?>
        <span class="wishBtn">⭐</span>

        <div class="tac">
            <?
                if ($product['hasCover'] != 1){
                    $path = "/dev/workspace/web/shop/image/product/default.jpg";
                } else {
                    $path = "/dev/workspace/web/shop/image/product/" . $product['product_id'] . ".jpg";
                }
            ?><br><br><br>

            <img class="productThumb" src="<?=$path?>"><br>
        </div><br><br><Br>

        <span class="productName tac"><?=$product['title']?></span><br>

        <div class="tac priceWrapper">
            <span class="currentPrice"><?=$product['price'] - ($product['price'] * $product['discount'] / 100)?></span>&nbsp&nbsp&nbsp
            <? if ($product['discount'] > 0 ){ ?>
                <span class="oldPrice"><?=$product['price']?></span>
            <? } ?>
        </div>

        <div class="addToCartBtn" onclick="addProduct(<?=$product['product_id']?>)">
            <span>
                <span><span>➕</span>&nbsp; افزودن به سبد خرید</span>
        </div>

        </span>
    </div>

<? } ?>
