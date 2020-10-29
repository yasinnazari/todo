<br><br>
<div>
    <strong style="color: #61003f; font-size: 130%;">مرتب سازی بر اساس </strong>&nbsp
    <select id="sortType">
        <option value="price ASC">از ارزان به گران</option>
        <option value="price DESC">از گران به ارزان</option>
        <option value="rate DESC">محبوبیت</option>
        <option value="creationTime ASC">ابتدا قدیمی تر سپس جدید تر</option>
        <option value="creationTime DESC">ابتدا جدید تر سپس قدیمی تر</option>
    </select>

    <strong style="color: #61003f; margin-right: 18px; font-size: 130%;">جستجو محصول</strong>&nbsp
    <input value="" placeholder="جستجو 🔎" id="keyword">

    <a id="displayAsList" style="color: #8e3d3d; cursor: pointer;"><img class="nt-cls" src="<?=baseUrl()?>image/product/notes.png"></a>
    <a id="displayAsGrid" style="color: black; cursor: pointer;"><img class="li-cls" src="<?=baseUrl()?>image/product/list.png"></a>
    <input id="viewType" type="hidden" value="grid">
</div>

<br><br>

<script>
    $("#sortType").on('change', function(){
        reloadData();
    })

    $("#displayAsList").on('click', function(){
        $('#viewType').val('list');
        reloadData();
    });

    $("#displayAsGrid").on('click', function(){
        $('#viewType').val('grid');
        reloadData();
    });

    $("#keyword").on('keyup', function(){
        reloadData();
    });

    function reloadData(){
        var sortType = $("#sortType").val();
        var keyword = $("#keyword").val();
        var viewType = $("#viewType").val();

        $.ajax({
            url: "/dev/workspace/web/shop/product/search",
            method: 'POST',
            data: {
                sortType: sortType,
                keyword: keyword,
                viewType: viewType
            }
        }).done(function(output) {
            $("#products").empty();
            $("#products").append(output);
        });
    }

    function addProduct(productId)
    {
        $.ajax({
            url: "/dev/workspace/web/shop/product/addToCart" + productId,
            method: 'POST',
            dataType: "json"
        }).done(function(output) {
            $("#cart_items").text(output.cartItemsCount);
            $("#cartPreviewHolder").html(output.cartPreview);
        });
    }

    function removeOrder(productId)
    {
        $.ajax({
            url: "/dev/workspace/web/shop/product/removeFromCart" + productId,
            method: 'POST',
            dataType: "json"
        }).done(function(output) {
            $("#cart_items").text(output.cartItemsCount);
            $("#cartPreviewHolder").html(output.cartPreview);
        });
    }

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

<div id="products">

</div>
