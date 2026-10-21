$(function () {
    var page = 1;

    function load() {
        var url = 'list/?q=' + $('#support-search').val() + '&page=' + page + '&limit=20';

        $.get(url, function (response) {
            var $list = $('#support-list').empty();

            $.each(response.data, function (i, t) {
                $list.append(
                    '<div class="ticket">' +
                        '<h3><a href="' + t.id + '/">' + t.subject + '</a></h3>' +
                        '<span class="status">' + t.status + '</span>' +
                        '<span class="comments">' + t.comments + '</span>' +
                    '</div>'
                );
            });
        }, 'json');
    }

    $('#support-search').on('input', function () {
        page = 1;
        load();
    });

    $('#support-create').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'create/',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json',
            success: load
        });
    });
});
