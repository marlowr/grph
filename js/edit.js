//This file handles the editing of projects through Ajax via html content editable.

$(document).ready(function() {

    //hides all content add buttons
    $(".add-link-button").hide();
    $("#add-note-button").hide();
    $("#add-description-button").hide();
    $("#add-username-button").hide();
    $("#add-password-button").hide();
    $("#add-client-button").hide();
    $("#add-location-button").hide();
    $("#add-contactname-button").hide();
    $("#add-contactemail-button").hide();
    $("#add-contactphone-button").hide();
    $("#add-companyurl-button").hide();
    $("#add-class-button").hide();
    $("#add-instructor-button").hide();
    $("#add-quarter-button").hide();
    $("#add-year-button").hide();
    $("#status-bar").hide();

    //hides all content input text box
    $("#description-input").hide();
    $("#username-input").hide();
    $("#password-input").hide();
    $("#client-input").hide();
    $("#location-input").hide();
    $("#contactname-input").hide();
    $("#contactemail-input").hide();
    $("#contactphone-input").hide();
    $("#companyurl-input").hide();
    $("#class-input").hide();
    $("#instructor-input").hide();
    $("#quarter-input").hide();
    $("#year-input").hide();


    $("#editButton").click(function () {
        var editElem = document.getElementsByClassName("edit");

        if($("#editButton").val() == "Edit") {

            //shows all add-link and add-note buttons as well as status button group
            $(".add-link-button").show();
            $("#add-note-button").show();
            $("#status-bar").show();

            //hide status value
            $("#status").hide();

            $.each(editElem, function () {
                var id = $(this).attr("id");

                if(!$(this).is(':empty')) {
                    $(this).prop('contenteditable', true);


                } else if($(this).is(':empty')) {

                    //shows all content add buttons
                    $("#add-" + id + "-button").show();

                    $(this).prop('contenteditable', false);
                }

            });

            //make status value checked and active in button group
            var selectedStatus = $("#status").html();
            selectedStatus = selectedStatus.trim();
            selectedStatus = selectedStatus.toLowerCase();

            if(selectedStatus == "active") {

                $("label#active").addClass("active");

            } else if(selectedStatus == "pending") {
                $("label#pending").addClass("active");

            } else if(selectedStatus == "maintenance") {
                $("label#maintenance").addClass("active");

            } else if(selectedStatus == "retired") {
                $("label#retired").addClass("active");

            }

            //dynamically adds multiple links
            $(".add-link-button").click(function() {
                var id = $(this).attr("id");

                if(id === "link-button") {
                    //add another site url
                    $("#add-link").append("<div class=\"input-group mb-3\">" +
                        "<div class=\"input-group-prepend\">\n" +
                        "<span class=\"input-group-text\" id=\"basic-addon\">https://</span>\n" +
                        "</div>\n" +
                        "<input type=\"text\" class=\"form-control\" id=\"basicurl\" name=\"siteurl[]\"\n" +
                        "aria-describedby=\"basic-addon\">\n" +
                        "</div>");
                } else if (id === "trello-button") {
                    //add another trello url
                    $("#add-trello").append("<div class=\"input-group mb-3\">" +
                        "<div class=\"input-group-prepend\">\n" +
                        "<span class=\"input-group-text\" id=\"basic-addon2\">https://trello.com/</span>\n" +
                        "</div>\n" +
                        "<input type=\"text\" class=\"form-control\" id=\"trello-url\" name=\"trello[]\"\n" +
                        "aria-describedby=\"basic-addon2\">\n" +
                        "</div>");
                } else if (id === "github-button") {
                    //add another github url{
                    $("#add-github").append("<div class=\"input-group mb-3\">" +
                        "<div class=\"input-group-prepend\">\n" +
                        "<span class=\"input-group-text\" id=\"basic-addon3\">https://github.com/</span>\n" +
                        "</div>\n" +
                        "<input type=\"text\" class=\"form-control\" id=\"github-url\" name=\"github[]\"\n" +
                        "aria-describedby=\"basic-addon3\">\n" +
                        "</div>");
                }

            });

            //dynamically adds multiple notes
            $("#add-note-button").click(function() {
                $("#add-note").append("<textarea class=\"form-control\" id=\"notes\"\n" +
                            "name=\"notes[]\" rows=\"5\" placeholder=\"\"></textarea><br />");
            });


            $("#add-description-button").click(function() {
                $(this).hide();

                $("#description-input").show();
            });
            $("#add-username-button").click(function() {
                $(this).hide();

                $("#username-input").show();
            });
            $("#add-password-button").click(function() {
                $(this).hide();

                $("#password-input").show();
            });
            $("#add-client-button").click(function() {
                $(this).hide();

                $("#client-input").show();
            });
            $("#add-location-button").click(function() {
                $(this).hide();

                $("#location-input").show();
            });
            $("#add-contactname-button").click(function() {
                $(this).hide();

                $("#contactname-input").show();
            });
            $("#add-contactemail-button").click(function() {
                $(this).hide();

                $("#contactemail-input").show();
            });
            $("#add-contactphone-button").click(function() {
                $(this).hide();

                $("#contactphone-input").show();
            });
            $("#add-companyurl-button").click(function() {
                $(this).hide();

                $("#companyurl-input").show();
            });
            $("#add-class-button").click(function() {
                $(this).hide();

                $("#class-input").show();
            });
            $("#add-instructor-button").click(function() {
                $(this).hide();

                $("#instructor-input").show();
            });
            $("#add-quarter-button").click(function() {
                $(this).hide();

                $("#quarter-input").show();

            });
            $("#add-year-button").click(function() {
                $(this).hide();

                $("#year-input").show();
            });


            $("#editButton").attr("value","Save");
        } else if($("#editButton").val() == "Save") {
            var title = $('#title').text();
            var newSiteurl = $("input[name='siteurl[]']").map(function() {
                return $(this).val();
            }).get();
            var updatedSiteurl = $(".siteurl").map(function() {
                return $(this).text();
            }).get();
            var newTrello = $("input[name='trello[]']").map(function() {
                return $(this).val();
            }).get();
            var updatedTrello = $(".trello").map(function() {
                return $(this).text();
            }).get();
            var newGithub = $("input[name='github[]']").map(function() {
                return $(this).val();
            }).get();
            var updatedGithub = $(".github").map(function() {
                return $(this).text();
            }).get();

            var newNotes = $("textarea[name='notes[]']").map(function() {
                return $(this).val();
            }).get();
            var updatedNotes = $(".note").map(function() {
                return $(this).text();
            }).get();


            var status = $('#status-bar label.active input').val();

            var description = $("input[name=description]").val();
            if (description === "") {
                description = $("#description").text();
            }

            var client = $("input[name=client]").val();
            if (client === "") {
                client = $('#client').text();

            }
            var location = $("input[name=location]").val();
            if (location === "") {
                location = $('#location').text();
            }
            var contactname = $("input[name=contactname]").val();
            if (contactname === "") {
                contactname = $('#contactname').text();
            }

            var contactphone = $("input[name=contactphone]").val();
            if (contactphone === "") {
               contactphone = $('#contactphone').text();
            }
            var contactemail = $("input[name=contactemail]").val();
            if (contactemail === "") {
                contactemail = $('#contactemail').text();
            }
            var companyurl = $("input[name=companyurl]").val();
            if (companyurl === "") {
                companyurl = $('#companyurl').text();
            }
            var classs = $("input[name=class]").val();
            if (classs === "") {
                classs = $('#class').text();
            }
            var instructor = $("input[name=instructor]").val();
            if (instructor === "") {
                instructor = $('#instructor').text();
            }
            var quarter = $("input[name=quarter]").val();
            if (quarter === "") {
                quarter = $('#quarter').text();
            }
            var year = $("input[name=year]").val();
            if (year === "") {
                year = $('#year').text();
            }

            var login = $("input[name=username]").val();
            if (login === "") {
                login = $('#username').text();
            }
            var password = $("input[name=password]").val();
            if (password === "") {
                password = $('#password').text();
            }


            $.ajax({
                type: 'post',
                url:  'model/saveedit.php',
                data:  {    title: title,
                    description: description,
                    client: client,
                    location: location,
                    contactname: contactname,
                    contactemail: contactemail,
                    contactphone: contactphone,
                    companyurl: companyurl,
                    classs: classs,
                    instructor: instructor,
                    quarter: quarter,
                    year: year,
                    login: login,
                    password: password,
                    status: status,
                    newSiteurl: newSiteurl,
                    //oldSiteurl: oldSiteurl,
                    updatedSiteurl: updatedSiteurl,
                    newTrello: newTrello,
                    //oldTrello: oldTrello,
                    updatedTrello: updatedTrello,
                    newGithub: newGithub,
                    //oldGithub: oldGithub,
                    updatedGithub: updatedGithub,
                    newNotes: newNotes,
                    //oldNotes: oldNotes,
                    updatedNotes: updatedNotes
                },
                success: function () {
                    window.location.reload();
                }
            });

            $.each(editElem, function () {
                $(this).prop('contenteditable', false);
            });
            $("#editButton").attr("value","Edit");
        }
    });
});