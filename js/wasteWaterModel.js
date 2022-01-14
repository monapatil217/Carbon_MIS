
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
    showWaterInput();
})

function showWaterInput() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#waterInput").empty();

    var myobj = {};
    myobj["type"] = "WasteWater";
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
                            + '<label for="waterConsumption" class="form-label">Water Consumption</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="waterConsumption" class="form-control" value="' + element1.w_cons + '" placeholder="Consumption" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '<label for="waterGenration" class="form-label">Waste water Generated</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="waterGenration" class="form-control" value="' + element1.w_gen + '" placeholder="Generated" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '<label for="waterCollection" class="form-label">Waste water Collection</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="waterCollection" class="form-control" value="' + element1.w_coll + '" placeholder="Collection" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '<label for="waterTreat" class="form-label">Qty of treat waste water</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="waterTreat" class="form-control" value="' + element1.q_treat + '" placeholder="Water Treat" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '<label for="noSTP" class="form-label">No of STP</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="noSTP" class="form-control" value="' + element1.n_stp + '" placeholder="STP" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>';
                    });
                }
                else {

                    html = '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="waterConsumption" class="form-label">Water Consumption</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="waterConsumption" class="form-control" placeholder="Consumption" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="waterGenration" class="form-label">Waste water Generated</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="waterGenration" class="form-control" placeholder="Generated" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="waterCollection" class="form-label">Waste water Collection</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="waterCollection" class="form-control" placeholder="Collection" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="waterTreat" class="form-label">Qty of treat waste water</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="waterTreat" class="form-control" placeholder="Water Treat" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="noSTP" class="form-label">No of STP</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="noSTP" class="form-control" placeholder="STP" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>';
                }
            });
        }
    });

    $("#waterInput").append(html);

}


function saveWaterData() {

    window.location.replace("industryEnergy.php");
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
    //             
    //         }
    //     });
    // }

}


// function redirect() {

//     window.location.replace("industryPP.php");

// }

function showWaterInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Waste Water </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli"> Currently, India has the capacity to treat approximately 37% of its wastewater, or 22,963 million litres per day (MLD), against a daily sewage generation of approximately 61, 754 MLD according to the 2015 report of the Central Pollution Control Board..</li>'
        // + '<li class="popupli">Whereas petrol has a lower carbon content and produces about 2.39 kgs of co2 per liter.</li>'
        // + '<li class="popupli">Around 60.9% installed generation capacity is due to fossil fuel. </li>'
        // + '<li class="popupli">Around 37.9% installed generation capacity is due to renewable energy sources.</li>'
        // + '<li class="popupli">Around 1.7% installed generation capacity is due to Nuclear Fuel.</li>'
        + '</ul>'
        // + '<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
        // + '<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>'
        // + '<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

        + '</div> '
        + '</div>'
        + '</div></div>';
    $("#popUpData").append(html1);
}
