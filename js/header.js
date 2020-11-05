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
    refreshCartPreview();

    $("#cart_items").on('click', function(){
        reloadData();
    });
});
