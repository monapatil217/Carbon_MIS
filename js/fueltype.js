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

function redirect() {

    window.location.replace("graph.php");

}


function addTypeDiv() {
    var fuelType = document.getElementById("fuelType").value;

    if (fuelType == "LPG") {

        var html = '<div class="row">' +
            '  <div class="form-floating col-6 mt-3 mb-3">' +
            '      <input type="text" class="form-control" id="lpginr" placeholder="Residential LPG" required>' +
            '       <div class="invalid-feedback">' +
            '           Please provide a valid data.' +
            '        </div>' +
            '        <label for="lpginr">Residential LPG</label>' +
            '    </div>'

            + '      <div class="form-floating col-6 mt-3 mb-3">' +
            '           <input type="text" class="form-control" id="lpginc" placeholder="Commercial LPG" required>' +
            '          <div class="invalid-feedback">' +
            '             Please provide a valid data.' +
            '         </div>' +
            '          <label for="lpginc">Commercial LPG</label>' +
            '       </div>' +
            '     </div>';

        $("#lpg").append(html);

    }
    if (fuelType == "MNGL") {

        var html = '  <div class="row">' +
            '  <div class="form-floating col-6 mt-3 mb-3">' +
            '    <input type="text" class="form-control" id="mnglinr" placeholder="Residential MNGL" required>' +
            '    <div class="invalid-feedback">' +
            '        Please provide a valid data.' +
            '    </div>' +
            '    <label for="mnglinr">Residential MNGL</label>' +
            '  </div>'

            + '  <div class="form-floating col-6 mt-3 mb-3">' +
            '     <input type="text" class="form-control" id="mnglinc" placeholder="Commercial MNGL" required>' +
            '    <div class="invalid-feedback">' +
            '        Please provide a valid data.' +
            '     </div>' +
            '     <label for="mnglinc">Commercial MNGL</label>' +
            '  </div>' +
            '  </div>';

        $("#mngl").append(html);
    }
    if (fuelType == "Kerosene") {

        var html = '<div class="row">' +
            '  <div class="form-floating col-6 mt-3 mb-3">' +
            '     <input type="text" class="form-control" id="keroseneinr" placeholder="Residential Kerosene" required>' +
            '  <div class="invalid-feedback">' +
            '      Please provide a valid data.' +
            '   </div>' +
            '  <label for="keroseneinr">Residential Kerosene</label>' +
            '  </div>'

            + '  <div class="form-floating col-6 mt-3 mb-3">' +
            '     <input type="text" class="form-control" id="keroseneinc" placeholder="Commercial Kerosene" required>' +
            '     <div class="invalid-feedback">' +
            '         Please provide a valid data.' +
            '    </div>' +
            '    <label for="keroseneinc">Commercial Kerosene</label>' +
            ' </div>' +
            '  </div>';

        $("#kerosene").append(html);

    }
    if (fuelType == "Wood") {

        var html = '  <div class="row">' +
            '  <div class="form-floating col-6 mt-3 mb-3">' +
            '  <input type="text" class="form-control" id="woodinr" placeholder="Residential Wood" required>' +
            '  <div class="invalid-feedback">' +
            '        Please provide a valid data.' +
            '    </div>' +
            '     <label for="woodinr">Residential Wood</label>' +
            '   </div>'

            + '  <div class="form-floating col-6 mt-3 mb-3">' +
            '     <input type="text" class="form-control" id="woodinc" placeholder="Commercial Wood" required>' +
            '    <div class="invalid-feedback">' +
            '        Please provide a valid data.' +
            '    </div>' +
            '    <label for="woodinc">Commercial wood</label>' +
            '  </div>' +
            ' </div>';

        $("#wood").append(html);

    }

}

function showCookingFuelInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Land Use </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli"> 454 grammes of carbon per liter of LPG. In order to combust this carbon to CO2, 1211 grammes of oxygen is needed .</li>'
        + '<li class="popupli">The sum is then 454 + 1211 = 1665 grammes of CO2/liter of LPG.</li>'
        + '</ul>'
        // +'<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
        // +'<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>' 
        // +'<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

        + '</div> '
        + '</div>'
        + '</div></div>';
    $("#popUpData").append(html1);
}