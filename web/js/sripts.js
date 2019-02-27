$(function () {
    $('#search-button').on('click', function() {
        var search = $('#search').val();
        window.location = '?search=' + search;
        /*$.ajax({
            'url': '/',
            'method': 'get',
            'data': {
                'search': search
            },
            success: function(data){
                console.log(data);
            },
            error: function(data) {
                console.log("Error");
            }
        });*/
    });

    $('#like').on('click', function () {
        var id = $(this).data('id');
        var token = $('meta[name=csrf-token]').attr("content");
        var like = $('#like');
        $.ajax({
            'url': '/site/like',
            'method': 'post',
            'data': {
                'id': id,
                '_csrf': token
            },
            success: function(data){
                data = JSON.parse(data);
                if (!data.message) {
                    like.text(' ' + data.like_count);
                    if (data.action !== 'like') {
                        like.attr('class', 'fa fa-heart-o');
                    } else {
                        like.attr('class', 'fa fa-heart');
                    }
                } else {
                    alert(data.message);
                }
            },
            error: function(data) {
                console.log("Error" + data);
            }
        });
        return false;
    });
});