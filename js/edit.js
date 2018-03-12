//This file handles the editing of projects through Ajax via html content editable.

$(document).ready(function() {
    var editElem = document.getElementsByClassName("edit");

    $("#editButton").click(function () {
        if($("#editButton").val() == "Edit") {
            $.each(editElem, function () {
                $(this).prop('contenteditable', true)
            });
            $("#editButton").attr("value","Save");
        } else if($("#editButton").val() == "Save") {
            var title = $('#title').text();
            var description = $('#description').text();
            var client = $('#client').text();
            var siteurl = $('#siteurl').text();
            var trello = $('#trello').text();
            var github = $('#github').text();
            var login = $('#login').text();
            var password = $('#password').text();
            var status = $('#status').text();
            var notes = $('#notes').text();
            $.ajax({
                type: 'post',
                url:  'model/saveedit.php',
                data:  {    title: title,
                            description: description,
                            client: client,
                            siturl: siteurl,
                            trello: trello,
                            github: github,
                            login: login,
                            password: password,
                            status: status,
                            notes: notes
                },
                success: function () {
                    location.reload();
                }
            });

            $.each(editElem, function () {
                $(this).prop('contenteditable', false)
            });
            $("#editButton").attr("value","Edit");
        }
    })
});

