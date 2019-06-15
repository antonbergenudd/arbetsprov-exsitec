$(window).on('load', function() {
    $('#log_stocks').on('change', (e) => {
        let parent = $(e.target).closest('#log_form');
        let selected = $(e.target).find('option:selected');
        let target = $('#log_products');

        target.empty();

        $(selected.data('stockProducts')).each((i, el) => {
            target.append(`<option value="${el.id}">${el.name}</option>`)
        })
    }).trigger('change');
})
