
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
                    var i = 1;
                    var eledata = element.cData;

                    $.each(eledata, function (index, element1) {
                        var n_stp = element1.n_stp;
                        var stpdata = element1.stpData;

                        html = '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '<label for="waterCon" class="form-label">Water Consumption</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="waterCon" name="waterCon"  class="form-control" value="' + element1.w_cons + '" placeholder="Consumption" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '<label for="waterGen" class="form-label">Wastewater Generated</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="waterGen" name="waterGen" class="form-control" value="' + element1.w_gen + '" placeholder="Generation" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'
                            + '<label for="waterTreat" class="form-label">Qty of wastewater treated</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="waterTreat" name="waterTreat" class="form-control" value="' + element1.q_treat + '" placeholder="Treatment" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'
                            + '<label for="noSTP" class="form-label">No of STP</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="noSTP" name="noSTP" class="form-control" value="' + element1.n_stp + '" placeholder="STP" onchange="addSTP();" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'


                            + '<div class="row justify-content-center" id="adddstp">';
                        var stpi = 1;
                        $.each(stpdata, function (index, element2) {
                            html += '<hr>'
                                + '<div class="row  text-center ">'
                                + '<h4>Details About STP ' + stpi + ' </h4>'

                                + ' </div>'
                                + '<div class="row justify-content-center">'
                                + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

                                + '<label for="capacity" class="form-label"> Capacity</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="capacity' + stpi + '" name="capacity" class="form-control" placeholder="Capacity" value="' + element2.cap + '"  aria-label="Residential" aria-describedby="basic-addon2">'
                                + '</div>'

                                + '</div>'
                                + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

                                + '<label for="latitude" class="form-label"> Latitude</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="latitude' + stpi + '" name="latitude" class="form-control" placeholder="Latitude" value="' + element2.lat + '"  aria-label="Residential" aria-describedby="basic-addon2">'
                                + '</div>'

                                + '</div>'
                                + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

                                + '<label for="longitude" class="form-label"> Longitude</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="longitude' + stpi + '" name="longitude" class="form-control" placeholder="Longitude" value="' + element2.long + '"  aria-label="Residential" aria-describedby="basic-addon2">'
                                + '</div>'

                                + '</div>'
                                + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

                                + '<label for="technology" class="form-label"> Technology</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="technology' + stpi + '" name="technology" class="form-control" placeholder="Technology" value="' + element2.tech + '"   aria-label="Residential" aria-describedby="basic-addon2">'
                                + '</div>'

                                + '</div>'
                                + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

                                + '<label for="waterRecycle" class="form-label"> Qty of Recycled Water</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="waterRecycle' + stpi + '" name="waterRecycle" class="form-control" placeholder="Recycled Water" value="' + element2.recycle + '"  aria-label="Residential" aria-describedby="basic-addon2">'
                                + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                                + '</div>'

                                + '</div>'
                                + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

                                + '<label for="waterDisposal" class="form-label">Qty of Water Disposal </label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="waterDisposal' + stpi + '" name="waterDisposal" class="form-control" placeholder="Disposal of Waste" value="' + element2.dispose + '"  aria-label="Residential" aria-describedby="basic-addon2">'
                                + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                                + '</div>'

                                + ' </div>'
                                + '  </div>';
                            stpi++;

                        });

                        html += '</div>';
                    });

                }
                else {

                    html = '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'
                        + '<label for="waterCon" class="form-label">Water Consumption</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="waterCon" name="waterCon" class="form-control" placeholder="Consumption" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'
                        + '<label for="waterGen" class="form-label">Wastewater Generated</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="waterGen" name="waterGen" class="form-control" placeholder="Generated" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'
                        + '<label for="waterTreat" class="form-label">Qty of wastewater treated</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="waterTreat" name="waterTreat" class="form-control" placeholder="Water Treat" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'
                        + '<label for="noSTP" class="form-label">No of STP</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="noSTP" name="noSTP" class="form-control" placeholder="STP"  onchange="addSTP();" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center" id="adddstp"> </div>';
                }
            });
        }
    });

    $("#waterInput").append(html);

}


function addSTP() {

    $("#adddstp").empty();

    var noSTP = document.getElementById("noSTP").value;
    var html = '';
    for (var i = 1; i <= noSTP; i++) {
        html += '<hr>'
            + '<div class="row  text-center ">'
            + '<h4>Details About STP ' + i + ' </h4>'

            + ' </div>'
            + '<div class="row justify-content-center">'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '<label for="capacity" class="form-label"> Capacity</label>'
            + '<div class="input-group mb-2">'
            + '<input type="text" id="capacity' + i + '" name="capacity" class="form-control" placeholder="Capacity" aria-label="Residential" aria-describedby="basic-addon2">'
            + '<span class="input-group-text" id="basic-addon2">MLD</span>'
            + '</div>'

            + '</div>'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '<label for="latitude" class="form-label"> Latitude</label>'
            + '<div class="input-group mb-2">'
            + '<input type="text" id="latitude' + i + '" name="latitude" class="form-control" placeholder="Latitude" aria-label="Latitude" aria-describedby="basic-addon2">'
            + '</div>'

            + '</div>'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '<label for="longitude" class="form-label"> Longitude</label>'
            + '<div class="input-group mb-2">'
            + '<input type="text" id="longitude' + i + '" name="longitude" class="form-control" placeholder="Longitude" aria-label="Longitude" aria-describedby="basic-addon2">'
            + '</div>'

            + '</div>'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '<label for="technology" class="form-label"> Technology</label>'
            + '<div class="input-group mb-2">'
            + '<input type="text" id="technology' + i + '" name="technology" class="form-control" placeholder="Technology" aria-label="Technology" aria-describedby="basic-addon2">'
            + '</div>'

            + '</div>'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '<label for="waterRecycle" class="form-label"> Qty of Recycled Water</label>'
            + '<div class="input-group mb-2">'
            + '<input type="text" id="waterRecycle' + i + '" name="waterRecycle" class="form-control" placeholder="Recycled Water" aria-label="Recycled Water" aria-describedby="basic-addon2">'
            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
            + '</div>'

            + '</div>'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '<label for="waterDisposal" class="form-label"> Qty of Water Disposal</label>'
            + '<div class="input-group mb-2">'
            + '<input type="text" id="waterDisposal' + i + '" name="waterDisposal" class="form-control" placeholder="Disposal of Waste" aria-label="Residential" aria-describedby="basic-addon2">'
            + '<span class="input-group-text" id="basic-addon2">CMD</span>'
            + '</div>'

            + ' </div>'
            + '  </div>';
    }

    $("#adddstp").append(html);

}

function saveWaterData() {

    var flag = 0;
    var waterData = {};
    var stpData = [];

    var basicId = document.getElementById("basicId").value;

    var waterCon = document.getElementById("waterCon").value;

    var waterGen = document.getElementById("waterGen").value;

    var waterTreat = document.getElementById("waterTreat").value;

    var noSTP = document.getElementById("noSTP").value;

    for (var i = 1; i <= noSTP; i++) {

        var stpDetails = {};

        var capacity = document.getElementById("capacity" + i).value;

        var latitude = document.getElementById("latitude" + i).value;

        var longitude = document.getElementById("longitude" + i).value;

        var technology = document.getElementById("technology" + i).value;

        var waterRecycle = document.getElementById("waterRecycle" + i).value;

        var waterDisposal = document.getElementById("waterDisposal" + i).value;

        stpDetails["cap"] = capacity;
        stpDetails["lat"] = latitude;
        stpDetails["long"] = longitude;
        stpDetails["tech"] = technology;
        stpDetails["recycle"] = waterRecycle;
        stpDetails["dispose"] = waterDisposal;

        stpData.push(stpDetails);
    }


    waterData["basicId"] = basicId;
    waterData["w_cons"] = waterCon;
    waterData["w_gen"] = waterGen;
    waterData["q_treat"] = waterTreat;
    waterData["n_stp"] = noSTP;
    waterData["stpData"] = stpData;
    // console.log(waterData);

    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveWastewater.php",
            contentType: "application/json",
            data: JSON.stringify(waterData),
            success: function (data) {
                // var data1 = JSON.parse(data);
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    window.location.replace("industryEnergy.php");
                } else {
                    alert("Data not Save Succesfuly")
                }

            }
        });
    }
    // window.location.replace("industryEnergy.php");

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
        + '<li class="popupli"> In India, the present treatment plants of capacity 15 997 million litres per day (MLD) contributes towards GHG emissions of 7.3 Mt of CO2-eq/year.</li>'
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
