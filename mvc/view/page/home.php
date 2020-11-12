<script type="text/javascript" src="/dev/workspace/web/shop/js/home.js"></script>

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

    <a id="displayAsList" class="cp" style="color: #8e3d3d;"><img class="nt-cls" src="<?=baseUrl()?>image/product/notes.png"></a>
    <a id="displayAsGrid" class="cp" style="color: black;"><img class="li-cls" src="<?=baseUrl()?>image/product/list.png"></a>
    <a href="/dev/workspace/web/shop/author/defineProduct" class="cp" style="color: black;"><img class="dg-cls" src="<?=baseUrl()?>image/product/user2.png"></a>
    <input id="viewType" type="hidden" value="<?=$_SESSION['viewType']?>">
</div>
<br><br>

<?
    $pageIndex = 0;
    $pageCount = 5;
?>

<?= pagination('/dev/workspace/web/shop/home', 2, 'pagination-btn', $pageIndex); ?>

<br><br><br>

<div id="products">

</div>

<script>
    function getPage(pageIndex){
        var sortType = $("#sortType").val();
        var keyword = $("#keyword").val();
        var viewType = $("#viewType").val();

        $.ajax('/dev/workspace/web/shop/product/search/' + pageIndex, {
            type: 'post',
            dataType: 'json',
            success :function(data){
                $("#products").html(data.html);
            }
        });
    }

</script>
