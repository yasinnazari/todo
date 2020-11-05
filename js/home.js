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

    refreshCartPreview();
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

    refreshCartPreview();
}

$(function(){
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

    reloadData();
});
