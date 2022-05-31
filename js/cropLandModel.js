var popup = document.getElementById('popup-wrapper');
var btn = document.getElementById("popup-btn");
var span = document.getElementById("close");
btn.onclick = function () {
    popup.classList.add('show');
}
span.onclick = function () {
    popup.classList.remove('show');
}

window.onclick = function (event) {
    if (event.target == popup) {
        popup.classList.remove('show');
    }
}
$(document).ready(function () {
    showCropLand();
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
})

function showCropLand() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#cropInput").empty();

    var myobj = {};
    myobj["type"] = "CropLand";
    myobj["basicId"] = basicId;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/getAllData.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);
            $.each(divList, function (index, element) {
                var check = element.check;

                if (check == "true") {
                    var eledata = element.cData;
                    $.each(eledata, function (index, element1) {

                        html = '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '<label for="perennial" class="form-label">Woody Perennial Cover </label>'
                            + '<i class="bi-info-circle-fill" data-toggle="tooltip" data-placement="top" title="This is the area occupied by woody\n perennial crops like mango, citrus crops,\n cashew , coconut, bael, jackfruit, banana."></i>'
                            + '<div class="input-group mb-3">'
                            + '<input type="text" id="perennial" name="perennial" value="' + element1.perennial + '"  class="form-control" placeholder="Woody Perennial Cover" aria-label="Woody Perennial Cover" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">sq.km</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'
                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '<label for="harwested" class="form-label"> Harwested Land  </label>'
                            + '<i class="bi-info-circle-fill" data-toggle="tooltip" data-placement="top" title=" It is the land used to produce agricultural \ncrops like rice, bajra,wheat,pulses,\nsugarcane,cotton,vegetables,etc."></i>'
                            + '<div class="input-group mb-3">'
                            + '<input type="text" id="harwested" name="harwested" value="' + element1.harwested + '"  class="form-control" placeholder=" Harwested Land " aria-label=" Harwested Land " aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">sq.km</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>';
                        // + '<div class="row justify-content-center">'
                        // + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        // + '<label for="mineralS" class="form-label"> Area of cropland on mineral soil </label>'
                        // + '<div class="input-group mb-3">'
                        // + '<input type="text" id="mineralS" name="mineralS" value="' + element1.mineralS + '"  class="form-control" placeholder="Mineral soil" aria-label="Mineral soil" aria-describedby="basic-addon2">'
                        // + '<span class="input-group-text" id="basic-addon2">sq.km</span>'
                        // + '</div>'
                        // + '</div>'
                        // + '</div>'
                        // + '<div class="row justify-content-center">'
                        // + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        // + '<label for="organicS" class="form-label"> Area of cropland on organic soil </label>'
                        // + '<div class="input-group mb-3">'
                        // + '<input type="text" id="organicS" name="organicS" value="' + element1.organicS + '"  class="form-control" placeholder="Organic Soil" aria-label="Organic Soil" aria-describedby="basic-addon2">'
                        // + '<span class="input-group-text" id="basic-addon2">sq.km</span>'
                        // + '</div>'
                        // + '</div>'
                        // + '</div>';
                    });

                }
                else {

                    html = '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="perennial" class="form-label">Woody Perennial Cover </label>'
                        + '<i class="bi-info-circle-fill" data-toggle="tooltip" data-placement="top" title="This is the area occupied by woody\n perennial crops like mango, citrus crops,\n cashew , coconut, bael, jackfruit, banana."></i>'
                        + '<div class="input-group mb-3">'
                        + '<input type="text" id="perennial" name="perennial" class="form-control" placeholder="Woody Perennial Cover" aria-label="Woody Perennial Cover" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">sq.km</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'
                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="harwested" class="form-label"> Harvested Land  </label>'
                        + '<i class="bi-info-circle-fill" data-toggle="tooltip" data-placement="top" title=" It is the land used to produce agricultural \ncrops like rice, bajra,wheat,pulses,\nsugarcane,cotton,vegetables,etc."></i>'
                        + '<div class="input-group mb-3">'
                        + '<input type="text" id="harwested" name="harwested" class="form-control" placeholder=" Harvested Land " aria-label=" Harwested Land " aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">sq.km</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>';
                    // + '<div class="row justify-content-center">'
                    // + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                    // + '<label for="mineralS" class="form-label"> Area of cropland on mineral soil </label>'
                    // + '<div class="input-group mb-3">'
                    // + '<input type="text" id="mineralS" name="mineralS" class="form-control" placeholder="Mineral soil" aria-label="Mineral soil" aria-describedby="basic-addon2">'
                    // + '<span class="input-group-text" id="basic-addon2">sq.km</span>'
                    // + '</div>'
                    // + '</div>'
                    // + '</div>'
                    // + '<div class="row justify-content-center">'
                    // + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                    // + '<label for="organicS" class="form-label"> Area of cropland on organic soil </label>'
                    // + '<div class="input-group mb-3">'
                    // + '<input type="text" id="organicS" name="organicS" class="form-control" placeholder="Organic Soil" aria-label="Organic Soil" aria-describedby="basic-addon2">'
                    // + '<span class="input-group-text" id="basic-addon2">sq.km</span>'
                    // + '</div>'
                    // + '</div>'
                    // + '</div>';
                }
            });
        }
    });

    $("#cropInput").append(html);

}

function saveCropData() {


    var flag = 0;

    var cropData = {};

    var basicId = document.getElementById("basicId").value;

    var perennial = document.getElementById("perennial").value;

    var harwested = document.getElementById("harwested").value;

    // var mineralS = document.getElementById("mineralS").value;

    // var organicS = document.getElementById("organicS").value;

    cropData["basicId"] = basicId;
    cropData["perennial"] = perennial;
    cropData["harwested"] = harwested;
    // cropData["mineralS"] = mineralS;
    // cropData["organicS"] = organicS;



    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/savecropland.php",
            contentType: "application/json",
            data: JSON.stringify(cropData),
            success: function (data) {
                // var data1 = JSON.parse(data);
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    addChart();
                    aflouData();
                    // window.location.replace("livestock.php");
                } else {
                    alert("Data not Save Succesfuly")
                }

            }
        });
    }

    // window.location.replace("livestock.php");

}
function redirect() {

    window.location.replace("livestock.php");

}

function showCropLInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Crop Land </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
        + '<ul style="margin-left: 10px;">'
        // + '<li class="popupli">Total Emissions in 2019 = 6,558 Million Metric Tons of CO2 equivalent.</li>'
        // + '<li class="popupli">Globally cotton cultivation accounts for 220 million metric tons of CO2 per year.</li>'
        + '<li class="popupli">Cropland-based agricultural activities account for 24.17 percent of India’s total methane and 95.84 percent of the total nitrous oxide emission from the agricultural sector.</li>'
        + '</ul>'
        // +'<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
        // +'<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>' 
        // +'<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

        + '</div> '
        + '</div>'
        + '</div></div>';
    $("#popUpData").append(html1);
}