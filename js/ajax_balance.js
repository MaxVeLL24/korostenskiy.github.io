$(document).ready(function () {
    $('a[name=ajax-details]').click(function (e) {
        var detID = $(this).attr('data-id');
        var input = $('#ajax-input');
        input.children().remove();
        $.ajax({
            url: "verajax.php",
            type: "post",
            data: {
                'detID': detID
            },
            success: function (response) {
                if (response) {
                    var input = $('#ajax-input');
                    input.append(response);
                }
                else {
                    var input = $('#ajax-input');
                    var otboy = '<h2>Операцій ще не здійснювалось</h2>';
                    input.append(otboy);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
    $('a[name=ajax-pmm]').click(function (e) {
        var pmmID = $(this).attr('data-id');
        var input = $('#ajax-input');
        input.children().remove();
        $.ajax({
            url: "verajax.php",
            type: "post",
            data: {
                'pmmID': pmmID
            },
            success: function (response) {
                if (response) {
                    var input = $('#ajax-input');
                    input.append(response);
                }
                else {
                    var input = $('#ajax-input');
                    var otboy = '<h2>Операцій ще не здійснювалось</h2>';
                    input.append(otboy);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});