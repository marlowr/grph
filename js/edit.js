//This file handles the editing of projects through Ajax via html content editable.

$(document).ready(function() {
    var editElem = document.getElementsByClassName("edit");

    $("#editButton").click(function () {
        var savedTitle = $('#title').text();
        if($("#editButton").val() == "Edit") {
            $.each(editElem, function () {
                $(this).prop('contenteditable', true)
            });
            $("#editButton").attr("value","Save");
        } else if($("#editButton").val() == "Save") {
            var title = $('#title').text();
            var description = $('#description').text();
            var client = $('#client').text();
            var login = $('#login').text();
            var password = $('#password').text();
            var status = $('#status').text();

            $.ajax({
                type: 'post',
                url:  'model/saveedit.php',
                data:  {    title: title,
                            description: description,
                            client: client,
                            login: login,
                            password: password,
                            status: status,
                            oldtitle: savedTitle
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

