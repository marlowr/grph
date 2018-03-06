$(document).ready(function() {
    var editElem = document.getElementsByClassName("edit");

    $("#editButton").click(function () {
        if($("#editButton").val() == "Edit") {
            $.each(editElem, function () {
                $(this).prop('contenteditable', true)
            });
            $("#editButton").attr("value","Save");
        } else if($("#editButton").val() == "Save") {
            $.each(editElem, function () {
                $(this).prop('contenteditable', false)
            });
            $("#editButton").attr("value","Edit");
        }
    })
});

