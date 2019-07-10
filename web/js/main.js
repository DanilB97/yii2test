$('.btn-cart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('id'),
        item = $('#' + id),
        url = $(this).attr('href');
    $.ajax({
        url: url,
        data: {id: id},
        type: 'POST',
        success: function () {
            // item.hasClass('btn-cart-added') ?
            //     item.removeClass('btn-cart-added') : item.addClass('btn-cart-added');
            item.toggleClass('btn-cart-added');
        },
        error: function () {
            alert('You haven\'t logged yet or this product isn\'t available!');
        }
    });
});
