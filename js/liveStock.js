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

function showLiveStockInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Live Stock </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli"> The average annual population of animals was taken from the Census of Livestock, which is conducted every five years.</li>'
        + '<li class="popupli"> Categorization was done as per available categories in the census viz. dairy and non-dairy for cattle . </li>'
        + '<li class="popupli">It has been estimated that over 200 million tonnes of CO2 equivalents are released by Indian livestock each year.</li>'
        + '<li class="popupli">The total GHGs emission from Indian livestock is estimated at 247.2 Mt in terms of CO2 equivalent emissions.</li>'
        + '<li class="popupli">Although the Indian livestock contributes substantially to the methane budget, the per capita emission is only 24.23 kgCH4/animal/year.</li>'
        + '<li class="popupli"> Categorisation are: Mature dairy cows, Non-dairy cattle, Goats, Sheep, Camels, Horses and ponies, Pigs </li>'
        + '</ul>'
        // +'<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
        // + '<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>'
        // + '<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

        + '</div> '
        + '</div>'
        + '</div></div>';
    $("#popUpData").append(html1);
}

function redirect() {

    window.location.replace("forestLand.php");

}
