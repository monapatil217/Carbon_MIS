var popup = document.getElementById('popup-wrapper');
var btn = document.getElementById("popup-btn");
var span = document.getElementById("close");
btn.onclick = function() {
    popup.classList.add('show');
}
span.onclick = function() {
    popup.classList.remove('show');
}

window.onclick = function(event) {
    if (event.target == popup) {
        popup.classList.remove('show');
    }
}

var popup1 = document.getElementById('popup-wrapper1');
var btn1 = document.getElementById("popup-btn1");
var span1 = document.getElementById("close1");
btn1.onclick = function() {
    popup1.classList.add('show');
}
span1.onclick = function() {
    popup1.classList.remove('show');
}

window.onclick = function(event) {
    if (event.target == popup1) {
        popup1.classList.remove('show');
    }
}
$(document).ready(function() {
    showLiveStock();
})

function validateNumber(e) {
    const pattern = /^[0-9]$/;

    return pattern.test(e.key)
}

function showLiveStock() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#liveStockInput").empty();

    var myobj = {};
    myobj["type"] = "Livestock";
    myobj["basicId"] = basicId;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/getAllData.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function(data) {
            var divList = JSON.parse(data);
            $.each(divList, function(index, element) {
                var check = element.check;

                if (check == "true") {
                    var eledata = element.cData;
                    $.each(eledata, function(index, element1) {

                        html = '<h6 class="text-center mt-3"> Enter Number of Animals </h6>' +
                            ' <div class="row justify-content-center">' +
                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                            '<label for="indCattle" class="form-label"> Indigenous Cattles</label>' +
                            ' <div class="input-group mb-2">' +
                            '<input type="number" id="indCattle" name="indCattle" class="form-control"  value="' + element1.ind_cat + '" placeholder="Indigenous Cattle" aria-label="Indigenous Cattle" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                            '</div>' +
                            '</div>' +

                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                            '<label for="crossBread" class="form-label"> Cross-breed cattles</label>' +
                            '<div class="input-group mb-2">' +
                            '<input type="number" id="crossBread" name="crossBread" class="form-control"  value="' + element1.cross_cat + '" placeholder="Cross-bred cattle" aria-label="Cross-bred cattle" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +

                            '<div class="row justify-content-center">' +
                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                            '<label for="buffalo" class="form-label"> Buffalo</label>' +
                            '<div class="input-group mb-2">' +
                            '<input type="number" id="buffalo" name="buffalo" class="form-control"  value="' + element1.buff + '" placeholder="Buffalo" aria-label="Buffalo" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                            '</div>' +
                            '</div>' +

                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                            '<label for="Sheep" class="form-label"> Sheep</label>' +
                            '<div class="input-group mb-2">' +
                            '<input type="number" id="Sheep" name="Sheep" class="form-control" value="' + element1.sheep + '" placeholder="Sheep" aria-label="Sheep" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +

                            '<div class="row justify-content-center">' +
                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                            '<label for="goat" class="form-label"> Goat</label>' +
                            '<div class="input-group mb-2">' +
                            '<input type="number" id="goat" name="goat" class="form-control" value="' + element1.goat + '" placeholder="Goat" aria-label="Goat" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                            '</div>' +
                            '</div >' +

                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                            '<label for="horses" class="form-label"> Horses</label>' +
                            '<div class="input-group mb-2">' +
                            '<input type="number" id="horses" name="horses" class="form-control" value="' + element1.hors + '" placeholder="Horses" aria-label="Horses" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                            '</div>' +
                            ' </div>' +
                            '</div>' +

                            '<div class="row justify-content-center">' +
                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                            '<label for="donkeys" class="form-label"> Donkeys</label>' +
                            '<div class="input-group mb-2">' +
                            ' <input type="number" id="donkeys" name="donkeys" class="form-control" value="' + element1.donk + '" placeholder="Donkeys" aria-label="Donkeys" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                            '</div>' +
                            '</div>' +

                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                            '<label for="camels" class="form-label"> Camels </label>' +
                            '<div class="input-group mb-2">' +
                            '<input type="number" id="camels" name="camels" class="form-control" value="' + element1.came + '" placeholder="Camels" aria-label="Camels" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row justify-content-center">' +
                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                            '<label for="pig" class="form-label"> Pig</label>' +
                            '<div class="input-group mb-2">' +
                            '<input type="number" id="pig" name="pig" class="form-control" value="' + element1.pig + '" placeholder="Pig" aria-label="Pig" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                            '</div>' +
                            '</div>' +

                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                            '<label for="poultry" class="form-label"> Poultry </label>' +
                            '<div class="input-group mb-2">' +
                            '<input type="number" id="poultry" name="poultry" class="form-control" value="' + element1.poul + '" placeholder="Poultry" aria-label="Poultry" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    });
                    addChart();
                } else {
                    html = '<h6 class="text-center mt-3"> Enter Number of Animals </h6>' +
                        ' <div class="row justify-content-center">' +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="indCattle" class="form-label"> Indigenous Cattles</label>' +
                        ' <div class="input-group mb-2">' +
                        '<input type="number" id="indCattle" name="indCattle" class="form-control" placeholder="Indigenous Cattle" aria-label="Indigenous Cattle" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                        '</div>' +
                        '</div>' +

                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="crossBread" class="form-label"> Cross-breed cattles</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="crossBread" name="crossBread" class="form-control" placeholder="Cross-bred cattle" aria-label="Cross-bred cattle" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +

                        '<div class="row justify-content-center">' +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="buffalo" class="form-label"> Buffalo</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="buffalo" name="buffalo" class="form-control" placeholder="Buffalo" aria-label="Buffalo" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                        '</div>' +
                        '</div>' +

                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="Sheep" class="form-label"> Sheep</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="Sheep" name="Sheep" class="form-control" placeholder="Sheep" aria-label="Sheep" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +

                        '<div class="row justify-content-center">' +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="goat" class="form-label"> Goat</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="goat" name="goat" class="form-control" placeholder="Goat" aria-label="Goat" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                        '</div>' +
                        '</div >' +

                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="horses" class="form-label"> Horses</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="horses" name="horses" class="form-control" placeholder="Horses" aria-label="Horses" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                        '</div>' +
                        ' </div>' +
                        '</div>' +

                        '<div class="row justify-content-center">' +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="donkeys" class="form-label"> Donkeys</label>' +
                        '<div class="input-group mb-2">' +
                        ' <input type="number" id="donkeys" name="donkeys" class="form-control" placeholder="Donkeys" aria-label="Donkeys" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                        '</div>' +
                        '</div>' +

                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="camels" class="form-label"> Camels </label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="camels" name="camels" class="form-control" placeholder="Camels" aria-label="Camels" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +

                        '<div class="row justify-content-center">' +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="pig" class="form-label"> Pig</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="pig" name="pig" class="form-control" placeholder="Pig" aria-label="Pig" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                        '</div>' +
                        '</div>' +

                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="poultry" class="form-label"> Poultry </label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="poultry" name="poultry" class="form-control" placeholder="Poultry" aria-label="Poultry" aria-describedby="basic-addon2" onkeypress="return validateNumber(event)">' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                }
            });
        }
    });

    $("#liveStockInput").append(html);

}

function saveLiveData() {
    var flag = 0;
    var liveData = {};

    var basicId = document.getElementById("basicId").value;

    var indCattle = document.getElementById("indCattle").value;
    flag += customInputValidator(indCattle, "indCattle");

    var crossBread = document.getElementById("crossBread").value;
    flag += customInputValidator(crossBread, "crossBread");

    var buffalo = document.getElementById("buffalo").value;
    flag += customInputValidator(buffalo, "buffalo");

    var sheep = document.getElementById("Sheep").value;
    flag += customInputValidator(sheep, "sheep");

    var goat = document.getElementById("goat").value;
    flag += customInputValidator(goat, "goat");

    var horses = document.getElementById("horses").value;
    flag += customInputValidator(horses, "horses");

    var donkeys = document.getElementById("donkeys").value;
    flag += customInputValidator(donkeys, "donkeys");

    var camels = document.getElementById("camels").value;
    flag += customInputValidator(camels, "camels");

    var pig = document.getElementById("pig").value;
    flag += customInputValidator(pig, "pig");

    var poultry = document.getElementById("poultry").value;
    flag += customInputValidator(poultry, "poultry");

    liveData["basicId"] = basicId;
    liveData["ind_cat"] = indCattle;
    liveData["cross_cat"] = crossBread;
    liveData["buff"] = buffalo;
    liveData["sheep"] = sheep;
    liveData["goat"] = goat;
    liveData["hors"] = horses;
    liveData["donk"] = donkeys;
    liveData["came"] = camels;
    liveData["pig"] = pig;
    liveData["poul"] = poultry;

    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveLivestoks.php",
            contentType: "application/json",
            data: JSON.stringify(liveData),
            success: function(data) {
                // var data1 = JSON.parse(data);
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    addChart();
                    aflouData();
                    // window.location.replace("forestLand.php");
                } else {
                    alert("Data not Save Succesfuly")
                }

            }
        });

    } else {
        alert("Data not Save Succesfuly Please enter valid data")
    }
    // window.location.replace("forestLand.php");

}

function showLiveStockInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

    +'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Live Stock </h5></center>'

    +
    '<div class="row mt-2 mb-3">' +
    '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' +
    '<ul style="margin-left: 10px;">'
    // + '<li class="popupli"> The average annual population of animals was taken from the Census of Livestock, which is conducted every five years.</li>'
    // + '<li class="popupli"> Categorization was done as per available categories in the census viz. dairy and non-dairy for cattle . </li>'
    // + '<li class="popupli">It has been estimated that over 200 million tonnes of CO2 equivalents are released by Indian livestock each year.</li>'
    +
    '<li class="popupli">The total GHGs emission from Indian livestock is estimated at 247.2 Mt in terms of CO2 equivalent emissions.</li>' +
    '<li class="popupli">Although the Indian livestock contributes substantially to the methane budget, the per capita emission is only 24.23 kgCH4/animal/year.</li>'
    // + '<li class="popupli"> Categorisation are: Mature dairy cows, Non-dairy cattle, Goats, Sheep, Camels, Horses and ponies, Pigs </li>'
    +
    '</ul>'
    // +'<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
    // + '<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>'
    // + '<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

    +
    '</div> ' +
    '</div>' +
    '</div></div>';
    $("#popUpData").append(html1);
}

function pop() {
    var div = document.getElementById("mypop");
    div.style.display = "block";


    $("#popUpData1").empty();
    var html1 = '<div class="row" >'

    +'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">calculations </h5></center>'

    +
    '<div class="row mt-2 mb-3">' +
    '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 infoFont">' +
    '<ul style="margin-left: 10px;">' +
    '<li class="popupli"> Methane Emissions ( tCH4/year ) = Emissions factor for defines livestock population( kg Ch4 per head per year ) * No. Of livestock species/ 1000 .</li>' +
    '</ul>'
    // + '<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>'
    // + '<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'
    +
    '</div> ' +
    '</div>' +
    '</div></div>';
    $("#popUpData1").append(html1);
}

function redirect() {

    window.location.replace("forestLand.php");

}