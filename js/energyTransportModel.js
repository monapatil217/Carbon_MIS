
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
    showTransInput();
})

function showTransInput() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    // var cityName = document.getElementById("cityName").value;
    $("#transportInput").empty();

    var myobj = {};
    myobj["type"] = "Transport";
    myobj["basicId"] = basicId;
    // myobj["cityName"] = cityName;

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

                        html = '<h6 class="text-center"> Enter Total No. of Register Vehicles</h6>'

                            + ' <div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="w2" class="form-label"> Two wheeler</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="w2" name="w2" class="form-control" value="' + element1.w2 + '" placeholder="Two wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="w3" class="form-label"> Three wheeler</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="w3" name="w3" class="form-control" value="' + element1.w3 + '" placeholder="Three wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '</div >'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="w4" class="form-label"> Four wheeler</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="w4" name="w4" class="form-control" value="' + element1.w4 + '" placeholder="Four wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="bus" class="form-label"> Bus</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="bus" name="bus" class="form-control" value="' + element1.bus + '" placeholder="Bus" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="tempo" class="form-label"> LCV </label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="tempo" name="tempo" class="form-control" value="' + element1.tempo + '" placeholder="Tempo" aria-label="Tempo" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="truck" class="form-label"> HCV </label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="truck" name="truck" class="form-control" value="' + element1.truck + '" placeholder="Truck" aria-label="Truck" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + ' </div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + ' <label for="train" class="form-label"> Train</label>'
                            + '<div class="input-group mb-2">'
                            + ' <input type="text" id="train" class="form-control" value="' + element1.train + '" placeholder="Train" aria-label="Train" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="flight" class="form-label"> Flight</label>'
                            + ' <div class="input-group mb-2">'
                            + '<input type="text" id="flight" name="flight" class="form-control" value="' + element1.flight + '" placeholder="Flight" aria-label="Flight" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '</div>';

                    });
                    // addChart();
                }
                else {

                    html = '<h6 class="text-center mb-3"> Enter Total No. of Register Vehicles </h6>'

                        + ' <div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="w2" class="form-label"> Two wheeler</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="w2" name="w2" class="form-control" placeholder="Two wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="w3" class="form-label"> Three wheeler</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="w3" name="w3" class="form-control" placeholder="Three wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '</div >'
                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="w4" class="form-label"> Four wheeler</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="w4" name="w4" class="form-control" placeholder="Four wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="bus" class="form-label"> Bus</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="bus" name="bus" class="form-control" placeholder="Bus" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="tempo" class="form-label">LCV </label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="tempo" name="tempo" class="form-control" placeholder="Tempo" aria-label="Tempo" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="truck" class="form-label"> HCV </label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="truck" id="truck" name="truck" class="form-control" placeholder="Truck" aria-label="Truck" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + ' </div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + ' <label for="train" class="form-label"> Train</label>'
                        + '<div class="input-group mb-2">'
                        + ' <input type="text" id="train" name="train" class="form-control" placeholder="Train" aria-label="Train" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="flight" class="form-label"> Flight</label>'
                        + ' <div class="input-group mb-2">'
                        + '<input type="text" id="flight" name="flight" class="form-control" placeholder="Flight" aria-label="Flight" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '</div>';
                }
            });
        }
    });

    $("#transportInput").append(html);

}

function saveTransData() {


    var flag = 0;
    var transData = {};

    var basicId = document.getElementById("basicId").value;

    var w2 = document.getElementById("w2").value;

    var w3 = document.getElementById("w3").value;

    var w4 = document.getElementById("w4").value;

    var bus = document.getElementById("bus").value;

    var tempo = document.getElementById("tempo").value;

    var truck = document.getElementById("truck").value;

    var train = document.getElementById("train").value;

    var flight = document.getElementById("flight").value;

    transData["basicId"] = basicId;
    transData["w2"] = w2;
    transData["w3"] = w3;
    transData["w4"] = w4;
    transData["bus"] = bus;
    transData["tempo"] = tempo;
    transData["truck"] = truck;
    transData["train"] = train;
    transData["flight"] = flight;



    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveTransport.php",
            contentType: "application/json",
            data: JSON.stringify(transData),
            success: function (data) {
                // var data1 = JSON.parse(data);
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    addChart();
                    // window.location.replace("cropLand.php");
                } else {
                    alert("Data not Save Succesfuly")
                }

            }
        });
    }
    // window.location.replace("cropLand.php");
}

function redirect() {

    window.location.replace("cropLand.php");

}

// var div = document.getElementById("moreInfo");
// div.style.display = "none";

function showVehiInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Transport </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 infoFont">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli"> Between 2019-20 and 2020-21, the share of diesel cars in the market fell from 29.5 per cent to 17 per cent while the share of petrol cars rose from 66 per cent to 76 per cent. CNG cars, running mainly in big metros, jumped from 4 to 6 per cent. The share of electric and hybrid vehicles also rose marginally.</li>'
        + '<li class="popupli">The greenhouse gas (GHG) emissions in India consisted of 70 % CO2 and 30 % non - CO2 (methane, nitrous oxide, F - gas) emissions(Olivier and Peters 2020).</li > '
        // + '<li class="popupli">Around 60.9% installed generation capacity is due to fossil fuel. </li>'
        // + '<li class="popupli">Around 37.9% installed generation capacity is due to renewable energy sources.</li>'
        // + '<li class="popupli">Around 1.7% installed generation capacity is due to Nuclear Fuel.</li>'
        + '</ul>'
        // + '<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
        + '<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>'
        + '<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

        + '</div> '
        + '</div>'
        + '</div></div>';
    $("#popUpData").append(html1);
}
