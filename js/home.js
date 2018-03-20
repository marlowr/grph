$(document).ready(function() {
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show')
    });


    //Shows active first by default.
    $('#allprojects').DataTable( {
        "order": [[ 4, "desc" ]]
    });
    $('#activeprojects').DataTable();
    $('#pendingprojects').DataTable();
    $('#maintenanceprojects').DataTable();
    $('#retiredprojects').DataTable();

    //add another site url
    $("#add-url").click(function() {
        $("#add-url-box").append("<div class=\"input-group mb-3\">" +
            "<div class=\"input-group-prepend\">\n" +
            "<span class=\"input-group-text\" id=\"basic-addon\">https://</span>\n" +
            "</div>\n" +
            "<input type=\"text\" class=\"form-control\" id=\"basicurl\" name=\"siteurl[]\"\n" +
            "aria-describedby=\"basic-addon\">\n" +
            "</div>");
    });

    //add another trello url
    $("#add-trello").click(function() {
        $("#add-trello-box").append("<div class=\"input-group mb-3\">" +
            "<div class=\"input-group-prepend\">\n" +
            "<span class=\"input-group-text\" id=\"basic-addon2\">https://trello.com/</span>\n" +
            "</div>\n" +
            "<input type=\"text\" class=\"form-control\" id=\"trello-url\" name=\"trello[]\"\n" +
            "aria-describedby=\"basic-addon2\">\n" +
            "</div>");
    });

    //add another github url
    $("#add-github").click(function() {
        $("#add-github-box").append("<div class=\"input-group mb-3\">" +
            "<div class=\"input-group-prepend\">\n" +
            "<span class=\"input-group-text\" id=\"basic-addon3\">https://github.com/</span>\n" +
            "</div>\n" +
            "<input type=\"text\" class=\"form-control\" id=\"github-url\" name=\"github[]\"\n" +
            "aria-describedby=\"basic-addon3\">\n" +
            "</div>");
    });
});