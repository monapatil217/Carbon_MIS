
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

// var div = document.getElementById("moreInfo");
// div.style.display = "none";

function showSolidInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Solid Waste </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli"> Solid waste generated from the city is 361 kg/day of CO2 equivalent in the environment. </li>'
        + '<li class="popupli">The net annual emission of CH4 from landfills in India increased from 404 Gg in 1999–2000 . </li>'
        + '<li class="popupli">India generates 62 million tonnes of waste each year. About 43 million tonnes (70%) are collected of which about 12 million tonnes are treated and 31 million tonnes are dumped in landfill sites.</li>'
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
