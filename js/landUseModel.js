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
    showlandUse();
})

function showlandUse() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#landUseInput").empty();

    var myobj = {};
    myobj["type"] = "LandUse";
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
                            + '   <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '       <label for="residential" class="form-label"> Residential Area</label>'
                            + '       <div class="input-group mb-2">'
                            + '           <input type="text" id="residential" name="residential" class="form-control" value="' + element1.resi + '" placeholder="Residential" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '           <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="commercial" class="form-label"> Commercial Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="commercial" name="commercial" class="form-control" value="' + element1.com + '" placeholder="Commercial" aria-label="Commercial" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="waterBodies" class="form-label"> Water Bodies Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="waterBodies" name="waterBodies" class="form-control" value="' + element1.w_body + '" placeholder="Water Bodies" aria-label="Water Bodies" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="public" class="form-label"> Public </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="public" name="public" class="form-control" value="' + element1.public + '" placeholder="Public" aria-label="Public" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="pUtility" class="form-label"> Public Utilities Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="pUtility" name="pUtility" class="form-control" value="' + element1.p_utility + '" placeholder="pUtility" aria-label="pUtility" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="transport" class="form-label"> Transport</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="transport" name="transport" class="form-control" value="' + element1.transport + '" placeholder="Transport" aria-label="Transport" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="greenArea" class="form-label">Green Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="greenArea" name="greenArea" class="form-control" value="' + element1.green_a + '" placeholder="Green" aria-label="Green" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="rCreational" class="form-label"> Recreational  Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="rCreational" name="rCreational" class="form-control" value="' + element1.r_creational + '" placeholder="Recreational  Area" aria-label="Recreational  Area" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="industrial" class="form-label"> Industrial Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="industrial" name="industrial" class="form-control" value="' + element1.indu + '" placeholder="Industrial" aria-label="Industrial" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="hills" class="form-label"> Hills and Hill Slopes Area</label>'
                            + '            <div class="input-group mb-2">'
                            + '                <input type="text" id="hills" name="hills" class="form-control" value="' + element1.hills + '" placeholder="Hills and Hill Slopes" aria-label="Hills and Hill Slopes" aria-describedby="basic-addon2">'
                            + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '            </div>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>';
                    });
                }
                else {

                    html = '<div class="row justify-content-center">'
                        + '   <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '       <label for="residential" class="form-label"> Residential Area</label>'
                        + '       <div class="input-group mb-2">'
                        + '           <input type="text" id="residential" name="residential" class="form-control" placeholder="Residential" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '           <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="commercial" class="form-label"> Commercial Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="commercial" name="commercial" class="form-control" placeholder="Commercial" aria-label="Commercial" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="waterBodies" class="form-label"> Water Bodies Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="waterBodies" name="waterBodies" class="form-control" placeholder="Water Bodies" aria-label="Water Bodies" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="public" class="form-label"> Public and Semi Public</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="public" name="public" class="form-control" placeholder="Public and Semi Public" aria-label="Public and Semi Public" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        // + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        // + '        <label for="agriculture" class="form-label"> Semi Public Area</label>'
                        // + '        <div class="input-group mb-2">'
                        // + '            <input type="text" id="agriculture" name="agriculture" class="form-control" placeholder="Semi Public" aria-label="Semi Public" aria-describedby="basic-addon2">'
                        // + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        // + '        </div>'
                        // + '    </div>'

                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="pUtility" class="form-label"> Public Utilities Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="pUtility" name="pUtility" class="form-control" placeholder="Public Utilities" aria-label="Public Utilities" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="transport" class="form-label"> Transport</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="transport" name="transport" class="form-control" placeholder="Transport " aria-label="Transport " aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="green" class="form-label"> Green Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="green" name="green" class="form-control" placeholder="Green Area " aria-label="Green Area " aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="reCreational" class="form-label"> Recreational  Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="reCreational " name="reCreational" class="form-control" placeholder="Recreational " aria-label="Recreational" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="industrial" class="form-label"> Industrial Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="industrial" name="industrial" class="form-control" placeholder="Industrial" aria-label="Industrial" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="hills" class="form-label">Hills and Hill Slopes Area</label>'
                        + '            <div class="input-group mb-2">'
                        + '                <input type="text" id="hills" name="hills" class="form-control" placeholder="Hills" aria-label="Hills" aria-describedby="basic-addon2">'
                        + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '            </div>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'
                        ;
                }
            });
        }
    });

    $("#landUseInput").append(html);

}

function saveLandData() {

    var flag = 0;
    var landData = {};

    var residential = document.getElementById("residential").value;

    var commercial = document.getElementById("commercial").value;

    var waterBodies = document.getElementById("waterBodies").value;

    var public = document.getElementById("public").value;

    var pUtility = document.getElementById("pUtility").value;

    var transport = document.getElementById("transport").value;

    var reCreational = document.getElementById("reCreational").value;

    var greenArea = document.getElementById("greenArea").value;

    var industrial = document.getElementById("industrial").value;

    var hills = document.getElementById("hills").value;

    landData["residential"] = residential;
    landData["commercial"] = commercial;
    landData["waterBodies"] = waterBodies;
    landData["public"] = public;
    landData["pUtility"] = pUtility;
    landData["transport"] = transport;
    landData["reCreational"] = reCreational;
    landData["greenArea"] = greenArea;
    landData["industrial"] = industrial;
    landData["hills"] = hills;



    // if (flag == 0) {
    //     $.ajax({
    //         type: "POST",
    //         async: false,
    //         url: "php/.php",
    //         contentType: "application/json",
    //         data: JSON.stringify(landData),
    //         success: function (data) {
    //             // var data1 = JSON.parse(data);
    //             // if (data1 == "success") {
    //             //     alert("Data Save Succesfuly");
    //             //     window.location.replace("menuPage.php");
    //             // } else {
    //             //     alert("Data not Save Succesfuly")
    //             // }
    //             window.location.replace("transport.php");
    //         }
    //     });
    // }
    window.location.replace("solidWaste.php");

}

// function redirect() {

//     window.location.replace("solidWaste.php");

// }

function showLandUInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Land Use </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli">Human activities impact terrestrial sinks, through land use, land-use change and forestry (LULUCF) activities, consequently, the exchange of CO2 (carbon cycle) between the terrestrial biosphere system and the atmosphere is altered.Mitigation can be achieved through activities in the LULUCF sector that increase the removals of greenhouse gases (GHGs) from the atmosphere or decrease emissions by halting the loss of carbon stocks .</li>'
        // + '<li class="popupli">Globally cotton cultivation accounts for 220 million metric tons of CO2 per year.</li>'
        // + '<li class="popupli">Cropland-based agricultural activities account for 24.17 percent of India’s total methane and 95.84 percent of the total nitrous oxide emission from the agricultural sector.</li>'
        + '</ul>'
        // +'<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
        // +'<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>' 
        // +'<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

        + '</div> '
        + '</div>'
        + '</div></div>';
    $("#popUpData").append(html1);
}