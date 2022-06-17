$(document).ready(function () {
    addDesign();

})

$(function () {
    $('.chart').easyPieChart({
    });
});


function addDesign() {
    // var html = '';
    // \\\\\\\\

    var basicId = document.getElementById("basicId").value;
    $("#cropInput").empty();

    var myobj = {};
    myobj["type"] = "CropLand";
    myobj["basicId"] = basicId;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/gettestimonialsdata.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var html = '';
            var divList = JSON.parse(data);
            $.each(divList, function (index, element) {



                html += '<div class="swiper-slide card">'
                    + '<div class="testimonial-item card-body" >'
                    + '<a href="eletricityEnergy.php" style="display: block">'
                    + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
                    + '<div class="chart text-center" data-percent="' + element.value + '" data-scale-color="#67b7dc">' + element.value + '</div>'
                    + '<div>' + element.type + '</div>'
                    + '</div>'
                    + '</a>'
                    + '</div>'
                    + '</div>'


            });
            $("#addDesign").append(html);

        }
    });

}