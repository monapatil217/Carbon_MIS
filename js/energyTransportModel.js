
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
    $("#transportInput").empty();

    var myobj = {};
    myobj["type"] = "Transport";
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

                        html = '<h6 class="text-center"> Enter Total No of Vehicles in your Region</h6>'

                            + ' <div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="2Wheeler" class="form-label"> Two wheeler</label>'
                            + '<div class="input-group mb-3">'
                            + '<input type="text" id="2Wheeler" class="form-control" value="' + element1.w2 + '" placeholder="Two wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="3Wheeler" class="form-label"> Three wheeler</label>'
                            + '<div class="input-group mb-3">'
                            + '<input type="text" id="3Wheeler" class="form-control" value="' + element1.w3 + '" placeholder="Three wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '</div >'
                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="4Wheeler" class="form-label"> Four wheeler</label>'
                            + '<div class="input-group mb-3">'
                            + '<input type="text" id="4Wheeler" class="form-control" value="' + element1.w4 + '" placeholder="Four wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="bus" class="form-label"> Bus</label>'
                            + '<div class="input-group mb-3">'
                            + '<input type="text" id="bus" class="form-control" value="' + element1.bus + '" placeholder="Bus" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="bus" class="form-label"> Tempo</label>'
                            + '<div class="input-group mb-3">'
                            + '<input type="text" id="bus" class="form-control" value="' + element1.tempo + '" placeholder="Tempo" aria-label="Tempo" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="tempo" class="form-label"> Truck</label>'
                            + '<div class="input-group mb-3">'
                            + '<input type="text" id="tempo" class="form-control" value="' + element1.truck + '" placeholder="Truck" aria-label="Truck" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + ' </div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + ' <label for="train" class="form-label"> Train</label>'
                            + '<div class="input-group mb-3">'
                            + ' <input type="text" id="train" class="form-control" value="' + element1.train + '" placeholder="Train" aria-label="Train" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="flight" class="form-label"> Flight</label>'
                            + ' <div class="input-group mb-3">'
                            + '<input type="text" id="flight" class="form-control" value="' + element1.flight + '" placeholder="Flight" aria-label="Flight" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '</div>';

                    });
                }
                else {

                    html = '<h6 class="text-center"> Enter Total No of Vehicles in your Region</h6>'

                        + ' <div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="2Wheeler" class="form-label"> Two wheeler</label>'
                        + '<div class="input-group mb-3">'
                        + '<input type="text" id="2Wheeler" class="form-control" placeholder="Two wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="3Wheeler" class="form-label"> Three wheeler</label>'
                        + '<div class="input-group mb-3">'
                        + '<input type="text" id="3Wheeler" class="form-control" placeholder="Three wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '</div >'
                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="4Wheeler" class="form-label"> Four wheeler</label>'
                        + '<div class="input-group mb-3">'
                        + '<input type="text" id="4Wheeler" class="form-control" placeholder="Four wheeler" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="bus" class="form-label"> Bus</label>'
                        + '<div class="input-group mb-3">'
                        + '<input type="text" id="bus" class="form-control" placeholder="Bus" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="bus" class="form-label"> Tempo</label>'
                        + '<div class="input-group mb-3">'
                        + '<input type="text" id="bus" class="form-control" placeholder="Tempo" aria-label="Tempo" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="tempo" class="form-label"> Truck</label>'
                        + '<div class="input-group mb-3">'
                        + '<input type="text" id="tempo" class="form-control" placeholder="Truck" aria-label="Truck" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + ' </div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + ' <label for="train" class="form-label"> Train</label>'
                        + '<div class="input-group mb-3">'
                        + ' <input type="text" id="train" class="form-control" placeholder="Train" aria-label="Train" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="flight" class="form-label"> Flight</label>'
                        + ' <div class="input-group mb-3">'
                        + '<input type="text" id="flight" class="form-control" placeholder="Flight" aria-label="Flight" aria-describedby="basic-addon2">'
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

    window.location.replace("cropLand.php");
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


// var div = document.getElementById("moreInfo");
// div.style.display = "none";

function showVehiInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Transport </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli"> After burning 1 liter of diesel 2.62 kg of co2 is release in enviroment .</li>'
        + '<li class="popupli">Whereas petrol has a lower carbon content and produces about 2.39 kgs of co2 per liter.</li>'
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
