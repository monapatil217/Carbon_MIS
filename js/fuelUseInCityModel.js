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
    showCookingFuel();
})

function showCookingFuel() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#cookingFuelInput").empty();

    var myobj = {};
    myobj["type"] = "Cooking";
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
                        var type = element1.type;
                        if (type == "LPG") {

                            html = '<div class="row">'
                                + '<h6 class="text-center mt-2 mb-2">No. Of LPG Cylinder Used per Month</h6>'
                                + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                                + '<label for="lpginr" class="form-label"> Residential</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="lpginr" name="lpginr" value="' + element1.resi + '" class="form-control" placeholder="Residential LPG" aria-label="Residential LPG" aria-describedby="basic-addon2">'
                                + '</div>'
                                + '</div>'

                                + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                                + '<label for="lpginc" class="form-label"> Commercial</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="lpginc" name="lpginc" value="' + element1.comm + '"  class="form-control" placeholder="Commercial LPG" aria-label="Commercial LPG" aria-describedby="basic-addon2">'
                                + '</div>'
                                + '</div></div>';
                        }
                        if (type == "MNGL") {
                            html += '<div class="row">'
                                + '<h6 class="text-center mt-2 mb-2">Qty of Natural Gas ( MNGL ) Used</h6>'
                                + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                                + '<label for="mnglinr" class="form-label"> Residential</label>'
                                + ' <div class="input-group mb-2">'
                                + '<input type="text" id="mnglinr" name="mnglinr" value="' + element1.resi + '" class="form-control" placeholder="Residential MNGL" aria-label="Residential MNGL" aria-describedby="basic-addon2">'
                                + '<span class="input-group-text" id="basic-addon-2">SCM/m</span>'
                                + '</div>'
                                + '</div>'

                                + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                                + '<label for="mnglinc" class="form-label"> Commercial</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="mnglinc" name="mnglinc"  value="' + element1.comm + '" class="form-control" placeholder="Commercial MNGL" aria-label="Commercial MNGL" aria-describedby="basic-addon2">'
                                + '<span class="input-group-text" id="basic-addon-2">SCM/m</span>'
                                + '</div>'
                                + '</div>'
                                + '</div>';
                        }

                        if (type == "KERO") {
                            html += '<div class="row">'
                                + '<h6 class="text-center mt-2 mb-2">Qty of Kerosene Used</h6>'
                                + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                                + '<label for="keroseneinr" class="form-label"> Residential</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="keroseneinr" name="keroseneinr" value="' + element1.resi + '" class="form-control" placeholder="Residential Kerosene" aria-label="Residential Kerosene" aria-describedby="basic-addon2">'
                                + '<span class="input-group-text" id="basic-addon-2">liter/m</span>'
                                + '</div>'
                                + '</div>'
                                + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                                + ' <label for="keroseneinc" class="form-label"> Commercial</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="keroseneinc" name="keroseneinc"  value="' + element1.comm + '" class="form-control" placeholder="Commercial Kerosene" aria-label="Commercial Kerosene" aria-describedby="basic-addon2">'
                                + '<span class="input-group-text" id="basic-addon-2">liter/m</span>'
                                + '</div>'
                                + '</div>'
                                + '</div>';
                        }
                        if (type == "WOOD") {
                            html += '<div class="row">'
                                + '<h6 class="text-center mt-2 mb-2">Qty of Wood Used</h6>'
                                + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                                + '  <label for="woodinr" class="form-label"> Residential</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="woodinr" name="woodinr" value="' + element1.resi + '"  class="form-control" placeholder="Residential Wood" aria-label="Residential Wood" aria-describedby="basic-addon2">'
                                + '<span class="input-group-text" id="basic-addon-2">t/year</span>'
                                + '</div>'
                                + '</div>'
                                + ' <div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                                + '<label for="woodinc" class="form-label"> Commercial</label>'
                                + '<div class="input-group mb-2">'
                                + '<input type="text" id="woodinc" name="woodinc" value="' + element1.comm + '" class="form-control" placeholder="Commercial Wood" aria-label="Commercial Wood" aria-describedby="basic-addon2">'
                                + '<span class="input-group-text" id="basic-addon-2">t/year</span>'
                                + '</div>'
                                + '</div>'
                                + ' </div>';
                        }
                    });
                }
                else {

                    html = '<div class="row">'
                        + '<h6 class="text-center mt-2 mb-2">No. Of LPG Cylinder Used per Month</h6>'
                        + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                        + '<label for="lpginr" class="form-label"> Residential</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="lpginr" name="lpginr" class="form-control" placeholder="Residential LPG" aria-label="Residential LPG" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                        + '<label for="lpginc" class="form-label"> Commercial</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="lpginc" name="lpginc" class="form-control" placeholder="Commercial LPG" aria-label="Commercial LPG" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '</div>'

                        + '<div class="row">'
                        + '<h6 class="text-center mt-2 mb-2">Qty of Natural Gas ( MNGL ) Used</h6>'
                        + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                        + '<label for="mnglinr" class="form-label"> Residential</label>'
                        + ' <div class="input-group mb-2">'
                        + '<input type="text" id="mnglinr" name="mnglinr" class="form-control" placeholder="Residential MNGL" aria-label="Residential MNGL" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon-2">SCM/m</span>'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                        + '<label for="mnglinc" class="form-label"> Commercial</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="mnglinc" name="mnglinc" class="form-control" placeholder="Commercial MNGL" aria-label="Commercial MNGL" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon-2">SCM/m</span>'
                        + '</div>'
                        + '</div>'

                        + '</div>'

                        + '<div class="row">'
                        + '<h6 class="text-center mt-2 mb-2">Qty of Kerosene Used</h6>'
                        + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                        + '<label for="keroseneinr" class="form-label"> Residential</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="keroseneinr" name="keroseneinr" class="form-control" placeholder="Residential Kerosene" aria-label="Residential Kerosene" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon-2">liter/m</span>'
                        + '</div>'
                        + '</div>'
                        + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                        + ' <label for="keroseneinc" class="form-label"> Commercial</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="keroseneinc" name="keroseneinc" class="form-control" placeholder="Commercial Kerosene" aria-label="Commercial Kerosene" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon-2">liter/m</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row">'
                        + '<h6 class="text-center mt-2 mb-2">Qty of Wood Used</h6>'
                        + '<div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                        + '  <label for="woodinr" class="form-label"> Residential</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="woodinr" name="woodinr" class="form-control" placeholder="Residential Wood" aria-label="Residential Wood" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '</div>'
                        + '</div>'
                        + ' <div class="col-md-6 col-lg-6 col-xl-6 col-10">'
                        + '<label for="woodinc" class="form-label"> Commercial</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="woodinc" name="woodinc" class="form-control" placeholder="Commercial Wood" aria-label="Commercial Wood" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '</div>'
                        + '</div>'
                        + ' </div>';
                }
            });
        }
    });
    $("#cookingFuelInput").append(html);

}

function saveCookingData() {

    var flag = 0;
    var cookingData = {};

    var lpgDetails = {};
    var fuelData = [];
    var mnglDetails = {};
    var keroDetails = {};
    var woodDetails = {};

    var basicId = document.getElementById("basicId").value;

    var lpginr = document.getElementById("lpginr").value;
    var lpginc = document.getElementById("lpginc").value;
    lpgDetails["type"] = "LPG";
    lpgDetails["resi"] = lpginr;
    lpgDetails["comm"] = lpginc;
    fuelData.push(lpgDetails);

    var mnglinr = document.getElementById("mnglinr").value;
    var mnglinc = document.getElementById("mnglinc").value;
    mnglDetails["type"] = "MNGL";
    mnglDetails["resi"] = mnglinr;
    mnglDetails["comm"] = mnglinc;
    fuelData.push(mnglDetails);

    var keroseneinr = document.getElementById("keroseneinr").value;
    var keroseneinc = document.getElementById("keroseneinc").value;
    keroDetails["type"] = "KERO";
    keroDetails["resi"] = keroseneinr;
    keroDetails["comm"] = keroseneinc;
    fuelData.push(keroDetails);

    var woodinr = document.getElementById("woodinr").value;
    var woodinc = document.getElementById("woodinc").value;
    woodDetails["type"] = "WOOD";
    woodDetails["resi"] = woodinr;
    woodDetails["comm"] = woodinc;
    fuelData.push(woodDetails);

    cookingData["basicId"] = basicId;
    cookingData["fuleData"] = fuelData;


    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveCookfule.php",
            contentType: "application/json",
            data: JSON.stringify(cookingData),
            success: function (data) {
                // var data1 = JSON.parse(data);
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    window.location.replace("graph.php");
                } else {
                    alert("Data not Save Succesfuly")
                }
            }
        });
    }
}

function showCookingFuelInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Forest Land </h5></center>'

        +
        '<div class="row mt-2 mb-3">' +
        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' +
        '<ul style="margin-left: 10px;">' +
        '<li class="popupli">Food is widely acknowledged as a major contributor to climate change but estimates of food-related greenhouse gas (GHG) emissions frequently consider supply chain stages only up to the farm gate or regional distribution centres.</li>'
        +
        '</ul>'
        +
        '</div> ' +
        '</div>' +
        '</div></div>';
    $("#popUpData").append(html1);
}