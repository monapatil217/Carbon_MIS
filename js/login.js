$(document).ready(function () {
    showLoginDesign('user');
})

function showLoginDesign(id) {
    $("#addUserDesign").empty();
    if (id == "user") {
        var html = '<input type="hidden" id="userId" name="userId" value="user">'
            + '<div class="form-group mt-3">'
            // + '<label for="username" class="form-label">City</label>'
            + '<select class="form-select" id="username" name="username" required>'
            + '<option selected disabled value="">Choose City</option>'
            + '</select>'
            + '<div class="invalid-feedback">Please select a City.</div>'
            + '</div>'
            + '</div>'
            + '<div class="form-group">'
            + '<input id="password-field" type="password" class="form-control" placeholder="Password" required>'
            + '<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>'
            + '</div>'
            + '<div class="form-group">'
            + '<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>'
            + '</div >';
        // + '<div class="row mb-3 px-3 justify-content-center"> <button type="submit" id="myBtn" class="btn btn-blue text-center" onclick=loginDetail("number")>Login</button> </div>';
        $("#addUserDesign").append(html);
        getCity();
    }

    $("#addAdminDesign").empty();
    if (id == "admin") {
        var html = '<input type="hidden" id="admin" name="admin" value="admin">'
            + '<div class="form-group mt-3">'
            + '<input type="text" class="form-control"  id="userId" name="userId" placeholder="User Id" required>'
            + '</div>'
            + '<div class="form-group">'
            + '<input id="password-field" type="password" class="form-control" placeholder="Password" required>'
            + '<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>'
            + '</div>'
            + '<div class="form-group">'
            + '<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>'
            + '</div >';
        // + '<div class="row mb-3 px-3 justify-content-center"> <button type="submit" id="myBtn" class="btn btn-blue text-center" onclick=loginDetail("number")>Login</button> </div>';

        $("#addAdminDesign").append(html);
    }

}
function user() {
    $("#loginfrom").empty();
    var html = '<div class="row mx-auto mt-5  justify-content-center">'
        + '<div class="col-md-6 mb-3">'
        + '<label for="username" class="form-label">City</label>'
        + '<select class="form-select" id="username" name="username" required>'
        + '<option selected disabled value="">Choose City</option>'
        + '</select>'
        + '<div class="invalid-feedback">Please select a City.</div>'
        + '</div>'
        + '</div>'
    $("#loginfrom").append(html);
    getCity();
}
function admin() {
    $("#loginfrom").empty();
    var html = '<div class="row mt-5 justify-content-center">'
        + '<div class="col-md-6 mb-3">'
        + '<label for="username">User Id</label>'
        + '<input type="text" class="form-control"  id="username" name="username" required>'
        + '<div class="invalid-feedback">Please provide user Id.</div>'
        + '</div>'
        + '</div>'
    $("#loginfrom").append(html);
    // getCity();
}
function getCity() {
    $("#username").empty();
    var cityName = getCityList();
    var html = '<option selected disabled value="">Choose City</option>'
        + cityName;

    $("#username").append(html);

}
function getCityList() {
    var myobj = {};
    myobj["type"] = "district";
    var cityName = "";
    $.ajax({
        type: "POST",
        async: false,
        url: "php/getcity.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);
            $.each(divList, function (index, element) {

                cityName += "<option value='" + element.name + "'>" + element.name + "</option>";

            });
        }
    });
    return cityName;
}