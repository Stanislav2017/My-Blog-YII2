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
    })
});