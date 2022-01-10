$(document).ready(function () {
    
})
function user(){
    $("#loginfrom").empty();
    var html = '<div class="row mx-auto mt-5  justify-content-center">'
               +'<div class="col-md-6 mb-3">'
               +'<label for="username" class="form-label">City</label>'
               +'<select class="form-select" id="username" name="username" required>'
               + '<option selected disabled value="">Choose City</option>'
               + '</select>'
               + '<div class="invalid-feedback">Please select a City.</div>'
               + '</div>'
               + '</div>'
               $("#loginfrom").append(html);
               getCity();
}
function admin(){
    $("#loginfrom").empty();
    var html = '<div class="row mt-5 justify-content-center">'
               +'<div class="col-md-6 mb-3">'
               +'<label for="username">User Id</label>'
               +'<input type="text" class="form-control"  id="username" name="username" required>'
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