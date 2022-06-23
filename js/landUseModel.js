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

/////
var popup1 = document.getElementById('popup-wrapper1');
var btn1 = document.getElementById("popup-btn1");
var span1 = document.getElementById("close1");
btn1.onclick = function () {
    popup1.classList.add('show');
}
span1.onclick = function () {
    popup1.classList.remove('show');
}

window.onclick = function (event) {
    if (event.target == popup1) {
        popup1.classList.remove('show');
    }
}
////
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
                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '       <label for="residential" class="form-label"> Residential Area</label>'
                            + '       <div class="input-group mb-2">'
                            + '           <input type="text" id="residential" name="residential" class="form-control" value="' + element1.resi + '" placeholder="Residential" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '           <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="commercial" class="form-label"> Commercial Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="commercial" name="commercial" class="form-control" value="' + element1.com + '" placeholder="Commercial" aria-label="Commercial" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'

                            // + '<div class="row justify-content-center">'
                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '       <label for="waterBodies" class="form-label"> Water Bodies Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="waterBodies" name="waterBodies" class="form-control" value="' + element1.w_body + '" placeholder="Water Bodies" aria-label="Water Bodies" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'

                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="public" class="form-label"> Public </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="public" name="public" class="form-control" value="' + element1.public + '" placeholder="Public" aria-label="Public" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'


                            // + '<div class="row justify-content-center">'
                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="pUtility" class="form-label"> Semi Public</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="pUtility" name="pUtility" class="form-control" value="' + element1.p_utility + '" placeholder="Semi Public" aria-label="pUtility" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="transport" class="form-label"> Traffic Transport</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="transport" name="transport" class="form-control" value="' + element1.transport + '" placeholder="Traffic Transport" aria-label="Transport" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="forestArea" class="form-label">Forest</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="forestArea" name="forestArea" class="form-control" value="' + element1.forest_a + '" placeholder="Green" aria-label="Green" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="rCreate" class="form-label"> Recreational  Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="rCreate" name="rCreate" class="form-control" value="' + element1.r_creational + '" placeholder="Recreational  Area" aria-label="Recreational  Area" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            // + '</div>'

                            // + '<div class="row justify-content-center">'
                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="industrial" class="form-label"> Industrial Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="industrial" name="industrial" class="form-control" value="' + element1.indu + '" placeholder="Industrial" aria-label="Industrial" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '    </div>'

                            + '<div class="row justify-content-center">'

                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="hills" class="form-label"> Hills</label>'
                            + '            <div class="input-group mb-2">'
                            + '                <input type="text" id="hills" name="hills" class="form-control" value="' + element1.hills + '" placeholder="Hills" aria-label="Hills and Hill Slopes" aria-describedby="basic-addon2">'
                            + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '            </div>'
                            + '        </div>'

                            ////////
                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="slum" class="form-label"> Slum Area</label>'
                            + '            <div class="input-group mb-2">'
                            + '                <input type="text" id="slum" name="slum" class="form-control" value="' + element1.slum + '" placeholder="Slum Area" aria-label="slum" aria-describedby="basic-addon2">'
                            + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '            </div>'
                            + '        </div>'

                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="service_a" class="form-label"> Services</label>'
                            + '            <div class="input-group mb-2">'
                            + '                <input type="text" id="service_a" name="service_a" class="form-control" value="' + element1.service_a + '" placeholder="service" aria-label="service" aria-describedby="basic-addon2">'
                            + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '            </div>'
                            + '        </div>'
                            + '        </div>'

                            + '<div class="row justify-content-center">'
                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="roads" class="form-label"> Roads</label>'
                            + '            <div class="input-group mb-2">'
                            + '                <input type="text" id="roads" name="roads" class="form-control" value="' + element1.roads + '" placeholder="Roads" aria-label="Roads" aria-describedby="basic-addon2">'
                            + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '            </div>'
                            + '        </div>'

                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="defence" class="form-label"> Defence</label>'
                            + '            <div class="input-group mb-2">'
                            + '                <input type="text" id="defence" name="defence" class="form-control" value="' + element1.defence + '" placeholder="Defence" aria-label="Defence" aria-describedby="basic-addon2">'
                            + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '            </div>'
                            + '        </div>'


                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="agri" class="form-label"> Agriculture</label>'
                            + '            <div class="input-group mb-2">'
                            + '                <input type="text" id="agri" name="agri" class="form-control" value="' + element1.agri + '" placeholder="Agriculture" aria-label="Agriculture" aria-describedby="basic-addon2">'
                            + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '            </div>'
                            + '        </div>'
                            + '<div class="row justify-content-center">'
                            + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                            + '        <label for="other" class="form-label"> Other</label>'
                            + '            <div class="input-group mb-2">'
                            + '                <input type="text" id="other" name="other" class="form-control" value="' + element1.other + '" placeholder="Other" aria-label="Other" aria-describedby="basic-addon2">'
                            + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '            </div>'
                            + '        </div>'

                            ////////
                            + '    </div>'
                            + '</div>';
                    });
                    // addChart();
                }
                else {

                    html = '<div class="row justify-content-center">'
                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '       <label for="residential" class="form-label"> Residential Area</label>'
                        + '       <div class="input-group mb-2">'
                        + '           <input type="text" id="residential" name="residential" class="form-control" placeholder="Residential" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '           <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="commercial" class="form-label"> Commercial Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="commercial" name="commercial" class="form-control" placeholder="Commercial" aria-label="Commercial" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'


                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '       <label for="waterBodies" class="form-label"> Water Bodies Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="waterBodies" name="waterBodies" class="form-control"  placeholder="Water Bodies" aria-label="Water Bodies" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="public" class="form-label"> Public</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="public" name="public" class="form-control" placeholder="Public" aria-label="Public and Semi Public" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'


                        // + '<div class="row justify-content-center">'
                        // + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        // + '        <label for="agriculture" class="form-label"> Semi Public Area</label>'
                        // + '        <div class="input-group mb-2">'
                        // + '            <input type="text" id="agriculture" name="agriculture" class="form-control" placeholder="Semi Public" aria-label="Semi Public" aria-describedby="basic-addon2">'
                        // + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        // + '        </div>'
                        // + '    </div>'

                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="pUtility" class="form-label">Semi Public</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="pUtility" name="pUtility" class="form-control" placeholder="Semi Public" aria-label=" Semi Public" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="transport" class="form-label">Traffic Transport</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="transport" name="transport" class="form-control" placeholder="Traffic Transport " aria-label="Traffic Transport " aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="forestArea" class="form-label"> Forest</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="forestArea" name="forestArea" class="form-control" placeholder="Forest " aria-label="Forest Area " aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="reCreational" class="form-label"> Recreational  Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="rCreate" name="reCreational" class="form-control" placeholder="Recreational " aria-label="Recreational" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'


                        // + '<div class="row justify-content-center">'
                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="industrial" class="form-label"> Industrial Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="industrial" name="industrial" class="form-control" placeholder="Industrial" aria-label="Industrial" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '    </div>'


                        + '<div class="row justify-content-center">'

                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="hills" class="form-label">Hills</label>'
                        + '            <div class="input-group mb-2">'
                        + '                <input type="text" id="hills" name="hills" class="form-control" placeholder="Hills" aria-label="Hills" aria-describedby="basic-addon2">'
                        + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '            </div>'
                        + '        </div>'
                        /////////
                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="slum" class="form-label"> Slum Area</label>'
                        + '            <div class="input-group mb-2">'
                        + '                <input type="text" id="slum" name="slum" class="form-control" placeholder="Slum Area" aria-label="slum" aria-describedby="basic-addon2">'
                        + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '            </div>'
                        + '        </div>'

                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="service_a" class="form-label"> Services</label>'
                        + '            <div class="input-group mb-2">'
                        + '                <input type="text" id="service_a" name="service_a" class="form-control"  placeholder="service" aria-label="service" aria-describedby="basic-addon2">'
                        + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '            </div>'
                        + '        </div>'
                        + '    </div>'

                        + '<div class="row justify-content-center">'

                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="roads" class="form-label"> Roads</label>'
                        + '            <div class="input-group mb-2">'
                        + '                <input type="text" id="roads" name="roads" class="form-control"  placeholder="Roads" aria-label="Roads" aria-describedby="basic-addon2">'
                        + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '            </div>'
                        + '        </div>'

                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="defence" class="form-label"> Defence</label>'
                        + '            <div class="input-group mb-2">'
                        + '                <input type="text" id="defence" name="defence" class="form-control" placeholder="Defence" aria-label="Defence" aria-describedby="basic-addon2">'
                        + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '            </div>'
                        + '        </div>'


                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="agri" class="form-label"> Agriculture</label>'
                        + '            <div class="input-group mb-2">'
                        + '                <input type="text" id="agri" name="agri" class="form-control"  placeholder="Agriculture" aria-label="Agriculture" aria-describedby="basic-addon2">'
                        + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '            </div>'
                        + '        </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'

                        + '    <div class="col-md-4 col-lg-10 col-xl-4 col-10">'
                        + '        <label for="other" class="form-label"> Other</label>'
                        + '            <div class="input-group mb-2">'
                        + '                <input type="text" id="other" name="other" class="form-control"  placeholder="Other" aria-label="Other" aria-describedby="basic-addon2">'
                        + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '            </div>'
                        + '        </div>'

                        ////////

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

    var basicId = document.getElementById("basicId").value;

    var residential = document.getElementById("residential").value;

    var commercial = document.getElementById("commercial").value;

    var waterBodies = document.getElementById("waterBodies").value;

    var public = document.getElementById("public").value;

    var pUtility = document.getElementById("pUtility").value;

    var transport = document.getElementById("transport").value;

    var rCreate = document.getElementById("rCreate").value;

    var forestArea = document.getElementById("forestArea").value;

    var industrial = document.getElementById("industrial").value;

    var hills = document.getElementById("hills").value;


    /////
    var slum = document.getElementById("slum").value;
    var service_a = document.getElementById("service_a").value;
    var roads = document.getElementById("roads").value;
    var defence = document.getElementById("defence").value;
    var agri = document.getElementById("agri").value;
    var other = document.getElementById("other").value;

    ////

    landData["basicId"] = basicId;
    landData["resi"] = residential;
    landData["com"] = commercial;
    landData["w_body"] = waterBodies;
    landData["public"] = public;
    landData["p_utility"] = pUtility;
    landData["transport"] = transport;
    landData["r_creational"] = rCreate;
    landData["forest_a"] = forestArea;
    landData["indu"] = industrial;
    landData["hills"] = hills;

    landData["slum"] = slum;
    landData["service_a"] = service_a;
    landData["roads"] = roads;
    landData["defence"] = defence;
    landData["agri"] = agri;
    landData["other"] = other;




    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveLanduse.php",
            contentType: "application/json",
            data: JSON.stringify(landData),
            success: function (data) {
                // var data1 = JSON.parse(data);
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    addChart();
                    // window.location.replace("solidWaste.php");
                } else {
                    alert("Data not Save Succesfuly")
                }
                // window.location.replace("transport.php");
            }
        });
    }
    // window.location.replace("solidWaste.php");

}

function redirect() {
    window.location.replace("solidWaste.php");
}

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

///calculation steps
function pop() {
    var div = document.getElementById("mypop");
    div.style.display = "block";


    $("#popUpData1").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">calculations </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 infoFont">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli"> India is the third largest producer of electricity in the world .</li>'
        + '<li class="popupli"> The national electric grid in India has an installed capacity of 388.134 GW as of 31 August 2021.</li>'
        + '<li class="popupli"> Renewable power plants, which also include large hydroelectric plants, constitute 37% of India' + "'" + 's total installed capacity. </li>'
        + '</ul>'
        // + '<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>'
        // + '<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'
        + '</div> '
        + '</div>'
        + '</div></div>';
    $("#popUpData1").append(html1);
}
/////