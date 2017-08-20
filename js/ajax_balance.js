$(document).ready(function () {
    $("a[name=ajax-details]").click(function (a) {
        var n = $(this).attr("data-id");
        $("#ajax-input").children().remove(), $.ajax({
            url: "verajax.php",
            type: "post",
            data: {detID: n},
            success: function (a) {
                if (a) (n = $("#ajax-input")).append(a); else {
                    var n = $("#ajax-input");
                    n.append("<h2>Операцій ще не здійснювалось</h2>")
                }
            },
            error: function (a, n, e) {
                console.log(n, e)
            }
        })
    }), $("a[name=ajax-pmm]").click(function (a) {
        var n = $(this).attr("data-id");
        var test = $(this).attr("data-id");
        $("#ajax-input").children().remove(),
            $.ajax({
                url: "verajax.php",
                type: "post",
                data: {pmmID: n},
                success: function (a) {
                    if (a) {
                        (n = $("#ajax-input")).append(a);
                        $('ul.check li a').attr('pmm', test)
                    }
                    else {
                        var n = $("#ajax-input");
                        n.append("<h2>Операцій ще не здійснювалось</h2>")
                    }
                },
                error: function (a, n, e) {
                    console.log(n, e)
                }
            })
    });
    $("a.time").click(function (e) {
        var pmmid = $(this).attr("pmm");
        var pmmtime = $(this).attr("data-time");
        $.ajax({
            url: "verajax.php",
            type: "post",
            data: {
                pmm: pmmid,
                pmmtime: pmmtime
            },
            success: function (a) {
                if (a) {
                    console.log(a);
                }
                else {

                }
            },
            error: function (a, n, e) {
                console.log(n, e)
            }
        })
    });
});