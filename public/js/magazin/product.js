///////////////////////////////////////////////////////////////////////////////
/* Set values + misc */
var fadeTime = 300;

/* Assign actions */
$('.number input').change(function() {
    updateQuantity(this);

});
updateQuantity($('.number input'));
/* Recalculate cart */


/* Update quantity */
function updateQuantity(quantityInput) {
    /* Calculate line price */
    var price = parseFloat($('.product-container .product .information-box  .number .price').text());
    var quantity = $(quantityInput).val();
if (quantity <= 0){
    $('.number input').val(1)
     quantity =1;
}

    let t =parseFloat($('.number .count span').html())
    if (quantity > t){
        $('.number input').val(t)
          quantity = t;
    }
    var linePrice = price * quantity;
    /* Update line price display and recalc cart totals */
    $('.subtotal').each(function() {
        $(this).fadeOut(fadeTime, function() {
            $(this).text(linePrice.toFixed(2));
            $(this).fadeIn(fadeTime);
            // console.log(linePrice.toFixed(2)) subtime
        });
    });
    // product_price_ap
    // productRow.find('.item-quantity').text(quantity);
    updateSumItems();
}
updateSumItems()
function updateSumItems() {
    var sumItems = 0;
    $('.number input').each(function() {
        sumItems += parseInt($(this).val());
    });
}


