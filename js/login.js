$(document).ready(function () {
    showLoginDesign('user');
})

function showLoginDesign(id) {
    $("#addUserDesign").empty();
    if (id == "user") {
        var html = '<div class="form-group mx-auto mt-3">'
            + '<input type="hidden" id="role" name="role" value="user">'
            + '<div class=" mb-3 ">'
            + '<select class="form-select" id="username" name="username" required>'
            + '<option selected disabled value="">Choose City</option>'
            + '</select>'
            + '<div class="invalid-feedback">Please select a City. </div>'
            + '</div>'
            + '</div>'
            + '<div class="row">'
            + '<div class="form-group mb-2">'
            + '<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>'
            + '<div class="invalid-feedback">Please provide a valid data.</div>'
            + '</div>'
            + '</div>'
            + '<div class="row ">'
            + '<div class="col-md-12 mb-3 text-center form-group">'
            + '<button class="btn btn-primary btn-get-started scrollto " type="submit"> LOGIN </button>'
            + '</div>'
            + '</div>';
        $("#addUserDesign").append(html);
        getCity();
    }

    $("#addAdminDesign").empty();
    if (id == "admin") {
        var html = '<div class="form-group mt-3">'
            + '<input type="hidden" id="role" name="role" value="Admin">'
            + '<input type="text" class="form-control"  id="username" name="username" placeholder="User Id" required>'
            + '</div>'
            + '<div class="form-group mb-2">'
            + '<input id="password-field" type="password" class="form-control" name="password" placeholder="Password" required>'
            + '<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>'
            + '</div>'
            + '<div class="row ">'
            + '<div class="col-md-12 mb-3 text-center form-group">'
            + '<button class="btn btn-primary btn-get-started scrollto " type="submit"> LOGIN </button>'
            + '</div>'
            + '</div>';
        // + '<div class="form-group mb-3">'
        // + '<button type="submit" class="form-control btn btn-primary submit px-3">LOGIN</button>'
        // + '</div >';
        // + '<div class="row mb-3 px-3 justify-content-center"> <button type="submit" id="myBtn" class="btn btn-blue text-center" onclick=loginDetail("number")>Login</button> </div>';

        $("#addAdminDesign").append(html);
    }
}
// }
// function user() {
//     $("#loginfrom").empty();
//     var html = '<div class="row mx-auto mt-5  justify-content-center">'
//         + '<div class="col-md-6 mb-3">'
//         + '<label for="username" class="form-label">City</label>'
//         + '<select class="form-select" id="username" name="username" required>'
//         + '<option selected disabled value="">Choose City</option>'
//         + '</select>'
//         + '<div class="invalid-feedback">Please select a City.</div>'
//         + '</div>'
//         + '</div>'
//     $("#loginfrom").append(html);
//     getCity();
// }
// function admin() {
//     $("#loginfrom").empty();
//     var html = '<div class="row mt-5 justify-content-center">'
//         + '<div class="col-md-6 mb-3">'
//         + '<label for="username">User Id</label>'
//         + '<input type="text" class="form-control"  id="username" name="username" required>'
//         + '<div class="invalid-feedback">Please provide user Id.</div>'
//         + '</div>'
//         + '</div>'
//     $("#loginfrom").append(html);
//     // getCity();
// }
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