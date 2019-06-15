$(window).on('load', function() {
    $('[data-edit-log-button]').on('click', (e) => {
        $('.history').find('[data-edit-log]').each((i, el) => {
            if($(el).hasClass('hide')) {
                $(el).removeClass('hide');
                $(el).addClass('show');
            } else {
                $(el).addClass('hide');
                $(el).removeClass('show');
            }
        })
    })
})
