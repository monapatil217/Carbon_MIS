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
                            + '<label for="areaCrop" class="form-label"> Area Occupied by Agricultural Land </label>'
                            + '<div class="input-group mb-3">'
                            + '<input type="text" id="areaCrop" class="form-control" value="' + element1.area + '" placeholder="Area" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">sq.km</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>';
                    });
                }
                else {

                    html = '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="areaCrop" class="form-label"> Area Occupied by Agricultural Land </label>'
                        + '<div class="input-group mb-3">'
                        + '<input type="text" id="areaCrop" class="form-control" placeholder="Area" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">sq.km</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>';
                }
            });
        }
    });

    $("#cropInput").append(html);

}

function saveCropData() {

    window.location.replace("livestock.php");
    // var flag = 0;
    // var userData = {};

    // var relec = document.getElementById("relec").value;
    // flag += customInputValidator(relec, "relec");

    // var celec = document.getElementById("celec").value;
    // flag += customInputValidator(celec, "celec");

    // var selec = document.getElementById("selec").value;
    // flag += customInputValidator(selec, "selec");

    // var slelec = document.getElementById("slelec").value;
    // flag += customInputValidator(slelec, "slelec");

    // userData["relec"] = relec;
    // userData["celec"] = celec;
    // userData["selec"] = selec;
    // userData["slelec"] = slelec;



    // if (flag == 0) {
    //     $.ajax({
    //         type: "POST",
    //         async: false,
    //         url: "php/.php",
    //         contentType: "application/json",
    //         data: JSON.stringify(userData),
    //         success: function (data) {
    //             // var data1 = JSON.parse(data);
    //             // if (data1 == "success") {
    //             //     alert("Data Save Succesfuly");
    //             //     window.location.replace("menuPage.php");
    //             // } else {
    //             //     alert("Data not Save Succesfuly")
    //             // }

    //         }
    //     });
    // }

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