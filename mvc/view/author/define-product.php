<br>
<form method="post" action="/dev/workspace/web/shop/author/defineProduct"><br><br>

    <input name="title" placeholder="نام محصول" style="border: 1px solid #a1baa1" class="w25"><br>
    <br><br>
    <textarea name="description" placeholder="توضیحات محصول" style="border: 1px solid #a1baa1" class="w50" rows="10"></textarea><br>
    <br>
    <textarea name="brief" placeholder="توضیحات کوتاه محصول" style="border: 1px solid #a1baa1" class="w30" rows="5"></textarea><br><br>
    <br><br>
    <input type="number" id="prPrice" class="w17" onkeydown="validate(event)" name="price" placeholder="قیمت محصـول" style="border: 1px solid #a1baa1" min="0" max="100"><br>
    <br>
    <input type="number" id="prPrice" class="w17" name="discount" onkeydown="validate(event)" placeholder="تخفیف محصـول" style="border: 1px solid #a1baa1" min="0" max="100"><br><br>
    <br><br>
    <button type="submit" style="padding: 7px; cursor: pointer;">درج محصول</button>
    <button type="reset" style="padding: 7px; cursor: pointer;">خالی کردن فرم</button>

</form>

<img class="add" src="<?=baseUrl()?>image/product/+.png">

<script>

    function validate(event) {
        if (event.keyCode < 48 || event.keyCode > 57) {
            document.getElementById('prPrice').append('<div>Only digit is valid</div>')
        }
    }

</script>