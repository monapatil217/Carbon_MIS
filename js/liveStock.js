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
    showLiveStock();
})

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
        success: function (data) {
            var divList = JSON.parse(data);
            $.each(divList, function (index, element) {
                var check = element.check;

                if (check == "true") {
                    var eledata = element.cData;
                    $.each(eledata, function (index, element1) {

                        html = '<h6 class="text-center mt-3"> Enter Number of Animals </h6>'
                            + ' <div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="indCattle" class="form-label"> Indigenous Cattle</label>'
                            + ' <div class="input-group mb-2">'
                            + '<input type="text" id="indCattle" class="form-control"  value="' + element1.ind_cat + '" placeholder="Indigenous Cattle" aria-label="Indigenous Cattle" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="crossBread" class="form-label"> Cross-bred cattle</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="crossBread" class="form-control"  value="' + element1.cross_cat + '" placeholder="Cross-bred cattle" aria-label="Cross-bred cattle" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="buffalo" class="form-label"> Buffalo</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="buffalo" class="form-control"  value="' + element1.buff + '" placeholder="Buffalo" aria-label="Buffalo" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="Sheep" class="form-label"> Sheep</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="Sheep" class="form-control" value="' + element1.sheep + '" placeholder="Sheep" aria-label="Sheep" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="goat" class="form-label"> Goat</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="goat" class="form-control" value="' + element1.goat + '" placeholder="Goat" aria-label="Goat" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div >'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="horses" class="form-label"> Horses</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="horses" class="form-control" value="' + element1.hors + '" placeholder="Horses" aria-label="Horses" aria-describedby="basic-addon2">'
                            + '</div>'
                            + ' </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="donkeys" class="form-label"> Donkeys</label>'
                            + '<div class="input-group mb-2">'
                            + ' <input type="text" id="donkeys" class="form-control" value="' + element1.donk + '" placeholder="Donkeys" aria-label="Donkeys" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="camels" class="form-label"> Camels </label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="camels" class="form-control" value="' + element1.came + '" placeholder="Camels" aria-label="Camels" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="pig" class="form-label"> Pig</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="pig" class="form-control" value="' + element1.pig + '" placeholder="Pig" aria-label="Pig" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'

                            + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                            + '<label for="poultry" class="form-label"> Poultry </label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="poultry" class="form-control" value="' + element1.poul + '" placeholder="Poultry" aria-label="Poultry" aria-describedby="basic-addon2">'
                            + '</div>'
                            + '</div>'
                            + '</div>';
                    });
                }
                else {
                    '<h6 class="text-center mt-3"> Enter Number of Animals </h6>'
                        + ' <div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="indCattle" class="form-label"> Indigenous Cattle</label>'
                        + ' <div class="input-group mb-2">'
                        + '<input type="text" id="indCattle" class="form-control" placeholder="Indigenous Cattle" aria-label="Indigenous Cattle" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="crossBread" class="form-label"> Cross-bred cattle</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="crossBread" class="form-control" placeholder="Cross-bred cattle" aria-label="Cross-bred cattle" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="buffalo" class="form-label"> Buffalo</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="buffalo" class="form-control" placeholder="Buffalo" aria-label="Buffalo" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="Sheep" class="form-label"> Sheep</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="Sheep" class="form-control" placeholder="Sheep" aria-label="Sheep" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="goat" class="form-label"> Goat</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="goat" class="form-control" placeholder="Goat" aria-label="Goat" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div >'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="horses" class="form-label"> Horses</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="horses" class="form-control" placeholder="Horses" aria-label="Horses" aria-describedby="basic-addon2">'
                        + '</div>'
                        + ' </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="donkeys" class="form-label"> Donkeys</label>'
                        + '<div class="input-group mb-2">'
                        + ' <input type="text" id="donkeys" class="form-control" placeholder="Donkeys" aria-label="Donkeys" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="camels" class="form-label"> Camels </label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="camels" class="form-control" placeholder="Camels" aria-label="Camels" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="pig" class="form-label"> Pig</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="pig" class="form-control" placeholder="Pig" aria-label="Pig" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'

                        + '<div class="col-md-6 col-lg-10 col-xl-6 col-10">'
                        + '<label for="poultry" class="form-label"> Poultry </label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="poultry" class="form-control" placeholder="Poultry" aria-label="Poultry" aria-describedby="basic-addon2">'
                        + '</div>'
                        + '</div>'
                        + '</div>';
                }
            });
        }
    });

    $("#liveStockInput").append(html);

}

function saveLiveData() {

    window.location.replace("forestLand.php");
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

    //         }
    //     });
    // }

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

// function redirect() {

//     window.location.replace("forestLand.php");

// }
