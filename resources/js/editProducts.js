$(window).on('load', function() {
    $('[data-edit-products-button]').on('click', (e) => {
        $('.products').find('[data-edit-products]').each((i, el) => {
            if($(el).hasClass('hide')) {
                $(el).removeClass('hide');
                $(el).addClass('show-inherit');
            } else {
                $(el).addClass('hide');
                $(el).removeClass('show-inherit');
            }
        })
    })
})
