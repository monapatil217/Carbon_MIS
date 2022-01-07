$(document).ready(function () {
    getCity();
})

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