//This file handles the editing of projects through Ajax via html content editable.

$(document).ready(function() {

    //hides all content buttons
    $(".add-link-button").hide();
    $("#add-note-button").hide();

    $("#editButton").click(function () {
        var editElem = document.getElementsByClassName("edit");

        if($("#editButton").val() == "Edit") {

            //shows all add-link and add-note buttons
            $(".add-link-button").show();
            $("#add-note-button").show();



            $.each(editElem, function () {
                var id = $(this).attr("id");

                if($(this).html() != "") {
                    $(this).prop('contenteditable', true);
                } else if($(this).html() === "") {
                    var addedButton = $("<button type=\"button\" class=\"btn btn-outline-success btn-sm\">Add " + id + "</button>");

                    $(this).html(addedButton);
                    addedButton.attr("id", "add-" + id + "-button" );
                    $(this).prop('contenteditable', false);
                }

            });

            var selectedStatus = $("#status").html();
            selectedStatus = selectedStatus.trim();
            selectedStatus = selectedStatus.toLowerCase();

            //add edit-status radio buttons according to status value
            if(selectedStatus == "active")
            {
                $("#status").html("<div class=\"btn-group btn-group-toggle\" id=\"status\" data-toggle=\"buttons\">\n" +
                    "  <label class=\"btn btn-outline-success active\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"active\" autocomplete=\"off\" checked=\"\"> Active\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"pending\" autocomplete=\"off\"> Pending\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"maintenance\" autocomplete=\"off\"> Maintenance\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"retired\" autocomplete=\"off\"> Retired\n" +
                    "  </label>\n" +
                    "</div>");
            } else if(selectedStatus == "pending") {
                $("#status").html("<div class=\"btn-group btn-group-toggle\" id=\"status\" data-toggle=\"buttons\">\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"active\" autocomplete=\"off\"> Active\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success active\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"pending\" autocomplete=\"off\" checked=\"\"> Pending\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"maintenance\" autocomplete=\"off\"> Maintenance\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"retired\" autocomplete=\"off\"> Retired\n" +
                    "  </label>\n" +
                    "</div>");
            } else if(selectedStatus == "maintenance") {
                $("#status").html("<div class=\"btn-group btn-group-toggle\" id=\"status\" data-toggle=\"buttons\">\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"active\" autocomplete=\"off\"> Active\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"pending\" autocomplete=\"off\"> Pending\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success active\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"maintenance\" autocomplete=\"off\" checked=\"\"> Maintenance\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"retired\" autocomplete=\"off\"> Retired\n" +
                    "  </label>\n" +
                    "</div>");
            } else if(selectedStatus == "retired") {
                $("#status").html("<div class=\"btn-group btn-group-toggle\" id=\"status\" data-toggle=\"buttons\">\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"active\" autocomplete=\"off\"> Active\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"pending\" autocomplete=\"off\"> Pending\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"maintenance\" autocomplete=\"off\"> Maintenance\n" +
                    "  </label>\n" +
                    "  <label class=\"btn btn-outline-success active\">\n" +
                    "    <input type=\"radio\" name=\"status\" value=\"retired\" autocomplete=\"off\" checked=\"\"> Retired\n" +
                    "  </label>\n" +
                    "</div>");
            }

            //if add buttons are clicked
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

            //add input boxes for every clicked input button
            $("#add-note-button").click(function() {
                $("#add-note").append("<textarea class=\"form-control\" id=\"notes\"\n" +
                    "                                  name=\"notes[]\" rows=\"5\" placeholder=\"\"></textarea><br />");
            });

            $("#add-description-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"description\"\n" +
                                            "name=\"description\" placeholder=\"Description\">");
            });

            $("#add-username-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"username\"\n" +
                    "name=\"username\" placeholder=\"Username\">");
            });

            $("#add-password-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"password\"\n" +
                    "name=\"password\" placeholder=\"Password\">");
            });

            $("#add-client-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"client\"\n" +
                    "name=\"client\" placeholder=\"Client/Company Name\">");
            });
            $("#add-location-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"location\"\n" +
                    "name=\"location\" placeholder=\"Location\">");
            });
            $("#add-contactname-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"contactname\"\n" +
                    "name=\"contactname\" placeholder=\"Contact Name\">");
            });
            $("#add-contactemail-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"contactemail\"\n" +
                    "name=\"contactemail\" placeholder=\"Contact Email\">");
            });
            $("#add-contactphone-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"contactphone\"\n" +
                    "name=\"contactphone\" placeholder=\"Contact Phone\">");
            });
            $("#add-companyurl-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"companyurl\"\n" +
                    "name=\"companyurl\" placeholder=\"Company URL\">");
            });
            $("#add-class-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"class\"\n" +
                    "name=\"class\" placeholder=\"IT Class\">");
            });
            $("#add-instructor-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"instructor\"\n" +
                    "name=\"instructor\" placeholder=\"Instructor Name\">");
            });
            $("#add-quarter-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"quarter\"\n" +
                    "name=\"quarter\" placeholder=\"Quarter\">");
            });
            $("#add-year-button").click(function() {
                $(this).parent().html("<input type=\"text\" class=\"form-control\" id=\"year\"\n" +
                    "name=\"year\" placeholder=\"Year\">");
            });



            $("#editButton").attr("value","Save");
        } else if($("#editButton").val() == "Save") {
            var title = $('#title').text();
            var status = $('#status label.active input').val()
            var description = $("input[name=description]").val();
            if (description == null) {
                description = $('#description').text();
                if(description === "Add description") {
                    description = "";
                }
            }
            var client = $("input[name=client]").val();
            if (client == null) {
                client = $('#client').text();
                if(client === "Add client") {
                    client = "";
                }
            }
            var location = $("input[name=location]").val();
            if (location == null) {
                location = $('#location').text();
                if(location === "Add location") {
                    location = "";
                }
            }
            var contactname = $("input[name=contactname]").val();
            if (contactname == null) {
                contactname = $('#contactname').text();
                if(contactname === "Add contactname") {
                    contactname = "";
                }
            }

            var contactphone = $("input[name=contactphone]").val();
            if (contactphone == null) {
               contactphone = $('#contactphone').text();
                if(contactphone === "Add contactphone") {
                    contactphone = "";
                }
            }
            var contactemail = $("input[name=contactemail]").val();
            if (contactemail == null) {
                contactemail = $('#contactemail').text();
                if(contactemail === "Add contactemail") {
                    contactemail = "";
                }
            }
            var companyurl = $("input[name=companyurl]").val();
            if (companyurl == null) {
                companyurl = $('#companyurl').text();
                if(companyurl === "Add companyurl") {
                    companyurl = "";
                }
            }
            var classs = $("input[name=class]").val();
            if (classs == null) {
                classs = $('#class').text();
                if(classs === "Add class") {
                    classs = "";
                }
            }
            var instructor = $("input[name=instructor]").val();
            if (instructor == null) {
                instructor = $('#instructor').text();
                if(instructor === "Add instructor") {
                    instructor = "";
                }
            }
            var quarter = $("input[name=quarter]").val();
            if (quarter == null) {
                quarter = $('#quarter').text();
                if(quarter === "Add quarter") {
                    quarter = "";
                }
            }
            var year = $("input[name=year]").val();
            if (year == null) {
                year = $('#year').text();
                if(year === "Add year") {
                    year = "";
                }
            }

            var login = $("input[name=username]").val();
            if (login == null) {
                login = $('#username').text();
                if(login === "Add username") {
                    login = "";
                }
            }
            var password = $("input[name=password]").val();
            if (password == null) {
                password = $('#password').text();
                if(password === "Add password") {
                    password = "";
                }
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
                    status: status
                },
                success: function () {
                    window.location.reload();
                }
            });

            $.each(editElem, function () {
                $(this).prop('contenteditable', false)
            });
            $("#editButton").attr("value","Edit");
        }
    })
});