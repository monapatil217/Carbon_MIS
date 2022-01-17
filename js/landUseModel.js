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
                            + '        <label for="defence" class="form-label"> Defence Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="defence" name="defence" class="form-control" value="' + element1.defence + '" placeholder="Defence" aria-label="Defence" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="agriculture" class="form-label"> Agriculture Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="agriculture" name="agriculture" class="form-control" value="' + element1.agri + '" placeholder="Agriculture" aria-label="Agriculture" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="vacentLand" class="form-label"> Vacant Land Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="vacentLand" name="vacentLand" class="form-control" value="' + element1.vaca + '" placeholder="Vacant Land" aria-label="Vacant Land" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="roadArea" class="form-label"> Under Road Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="roadArea" name="roadArea" class="form-control" value="' + element1.u_road + '" placeholder="Under Road" aria-label="Under Road" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                            + '        </div>'
                            + '    </div>'
                            + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '        <label for="greenArea" class="form-label"> Under Green Area</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="greenArea" name="greenArea" class="form-control" value="' + element1.u_green + '" placeholder="Under Green" aria-label="Under Green" aria-describedby="basic-addon2">'
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
                            + '        <label for="slum" class="form-label"> Slum Area</label>'
                            + '            <div class="input-group mb-2">'
                            + '                <input type="text" id="slum" name="slum" class="form-control" value="' + element1.slum + '" placeholder="Slum" aria-label="Slum" aria-describedby="basic-addon2">'
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
                        + '        <label for="defence" class="form-label"> Defence Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="defence" name="defence" class="form-control" placeholder="Defence" aria-label="Defence" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="agriculture" class="form-label"> Agriculture Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="agriculture" name="agriculture" class="form-control" placeholder="Agriculture" aria-label="Agriculture" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="vacentLand" class="form-label"> Vacant Land Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="vacentLand" name="vacentLand" class="form-control" placeholder="Vacant Land" aria-label="Vacant Land" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="roadArea" class="form-label"> Under Road Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="roadArea" name="roadArea" class="form-control" placeholder="Under Road" aria-label="Under Road" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '        </div>'
                        + '    </div>'
                        + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '        <label for="greenArea" class="form-label"> Under Green Area</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="greenArea" name="greenArea" class="form-control" placeholder="Under Green" aria-label="Under Green" aria-describedby="basic-addon2">'
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
                        + '        <label for="slum" class="form-label"> Slum Area</label>'
                        + '            <div class="input-group mb-2">'
                        + '                <input type="text" id="slum" name="slum" class="form-control" placeholder="Slum" aria-label="Slum" aria-describedby="basic-addon2">'
                        + '                <span class="input-group-text" id="basic-addon-2">sq. km</span>'
                        + '            </div>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>';
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

    var defence = document.getElementById("defence").value;

    var agriculture = document.getElementById("agriculture").value;

    var vacentLand = document.getElementById("vacentLand").value;

    var roadArea = document.getElementById("roadArea").value;

    var greenArea = document.getElementById("greenArea").value;

    var industrial = document.getElementById("industrial").value;

    var slum = document.getElementById("slum").value;

    landData["residential"] = residential;
    landData["commercial"] = commercial;
    landData["waterBodies"] = waterBodies;
    landData["defence"] = defence;
    landData["agriculture"] = agriculture;
    landData["vacentLand"] = vacentLand;
    landData["roadArea"] = roadArea;
    landData["greenArea"] = greenArea;
    landData["industrial"] = industrial;
    landData["slum"] = slum;



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
        // + '<li class="popupli">Total Emissions in 2019 = 6,558 Million Metric Tons of CO2 equivalent.</li>'
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