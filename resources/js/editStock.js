$(window).on('load', function() {
    $('[data-edit-stock]').on('click', (e) => {
        let parent = $(e.target).closest('.stock');
        parent.find('[data-edit-stock-button]').each((i, el) => {
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
