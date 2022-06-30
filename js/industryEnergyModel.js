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
    /////
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
    ////
$(document).ready(function() {
    showEnergyIndInput();
})

function showEnergyIndInput() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#energyIndInput").empty();

    var myobj = {};
    myobj["type"] = "Energy";
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

                        html = '<h6 class="text-center">Type and Quantity of Fuel Mix used by Industry</h6>'

                        +
                        '<div class="row justify-content-center">' +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        ' <label for="amtCoal" class="form-label"> Coal</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="amtCoal" name="amtCoal" class="form-control" value="' + element1.coal + '" placeholder="Coal" aria-label="Area" aria-describedby="basic-addon2">' +
                            '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                            '</div>' +
                            '</div>'

                        +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="amtFO" class="form-label"> FO</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="amtFO" name="amtFO" class="form-control" value="' + element1.fo + '" placeholder="FO" aria-label="Area" aria-describedby="basic-addon2">' +
                            '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                            '</div>' +
                            '</div>' +
                            '</div >'

                        +
                        '<div class="row justify-content-center">' +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="amtLDO" class="form-label" >LDO</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="amtLDO" name="amtLDO" class="form-control" value="' + element1.ido + '" placeholder="LDO" aria-label="Area" aria-describedby="basic-addon2">' +
                            '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                            '</div>' +
                            '</div>'

                        +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="amtHSD" class="form-label" >HSD</label>' +
                        ' <div class="input-group mb-2">' +
                        '<input type="number" id="amtHSD" name="amtHSD" class="form-control" value="' + element1.hsd + '" placeholder="HSD" aria-label="Area" aria-describedby="basic-addon2">' +
                            '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>'

                        +
                        '<div class="row justify-content-center">' +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="amtPNG" class="form-label" >PNG</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="amtPNG" name="amtPNG" class="form-control" value="' + element1.png + '" placeholder="PNG" aria-label="Area" aria-describedby="basic-addon2">' +
                            '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                            '</div>' +
                            '</div>'

                        +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="amtNG" class="form-label"> NG</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="amtNG" name="amtNG" class="form-control" value="' + element1.ng + '" placeholder="NG" aria-label="Area" aria-describedby="basic-addon2">' +
                            '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>'

                        +
                        '<div class="row justify-content-center">' +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        '<label for="amtBriquette" class="form-label"> Briquette</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="amtBriquette" name="amtBriquette" class="form-control" value="' + element1.briq + '" placeholder="Briquette" aria-label="Area" aria-describedby="basic-addon2">' +
                            '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                            '</div>' +
                            '</div>'

                        +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                        ' <label for="amtWood" class="form-label"> Wood</label>' +
                        '<div class="input-group mb-2">' +
                        '<input type="number" id="amtWood" class="form-control" value="' + element1.wood + '" placeholder="Wood" aria-label="Area" aria-describedby="basic-addon2">' +
                            '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    });
                    // addChart();
                } else {

                    html = '<h6 class="text-center">Type and Quantity of fuel mix used by industry</h6>'

                    +
                    '<div class="row justify-content-center">' +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                    ' <label for="amtCoal" class="form-label"> Coal</label>' +
                    '<div class="input-group mb-2">' +
                    '<input type="number" id="amtCoal" name="amtCoal" class="form-control" placeholder="Coal" aria-label="Area" aria-describedby="basic-addon2">' +
                    '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                    '</div>' +
                    '</div>'

                    +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                    '<label for="amtFO" class="form-label"> FO</label>' +
                    '<div class="input-group mb-2">' +
                    '<input type="number" id="amtFO" name="amtFO" class="form-control" placeholder="FO" aria-label="Area" aria-describedby="basic-addon2">' +
                    '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                    '</div>' +
                    '</div>' +
                    '</div >'

                    +
                    '<div class="row justify-content-center">' +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                    '<label for="amtLDO" class="form-label"> LDO </label>' +
                    '<div class="input-group mb-2">' +
                    '<input type="number" id="amtLDO" name="amtLDO" class="form-control" placeholder="LDO" aria-label="Area" aria-describedby="basic-addon2">' +
                    '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                    '</div>' +
                    '</div>'

                    +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                    '<label for="amtHSD" class="form-label"> HSD </label>' +
                    ' <div class="input-group mb-2">' +
                    '<input type="number" id="amtHSD" name="amtHSD" class="form-control" placeholder="HSD" aria-label="Area" aria-describedby="basic-addon2">' +
                    '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>'

                    +
                    '<div class="row justify-content-center">' +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                    '<label for="amtPNG" class="form-label"> PNG</label>' +
                    '<div class="input-group mb-2">' +
                    '<input type="number" id="amtPNG" name="amtPNG" class="form-control" placeholder="PNG" aria-label="Area" aria-describedby="basic-addon2">' +
                    '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                    '</div>' +
                    '</div>'

                    +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                    '<label for="amtNG" class="form-label"> NG </label>' +
                    '<div class="input-group mb-2">' +
                    '<input type="number" id="amtNG" name="amtNG" class="form-control" placeholder="NG" aria-label="Area" aria-describedby="basic-addon2">' +
                    '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>'

                    +
                    '<div class="row justify-content-center">' +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                    '<label for="amtBriquette" class="form-label"> Briquette</label>' +
                    '<div class="input-group mb-2">' +
                    '<input type="number" id="amtBriquette" name="amtBriquette" class="form-control" placeholder="Briquette" aria-label="Area" aria-describedby="basic-addon2">' +
                    '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                    '</div>' +
                    '</div>'

                    +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10">' +
                    ' <label for="amtWood" class="form-label"> Wood </label>' +
                    '<div class="input-group mb-2">' +
                    '<input type="number" id="amtWood" class="form-control" placeholder="Wood" aria-label="Area" aria-describedby="basic-addon2">' +
                    '<span class="input-group-text" id="basic-addon2">MTD</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                }
            });
        }
    });

    $("#energyIndInput").append(html);

}


function saveEnergyIData() {

    var flag = 0;
    var energyData = {};

    var basicId = document.getElementById("basicId").value;


    var amtCoal = document.getElementById("amtCoal").value;
    flag += customInputValidator(amtCoal, "amtCoal");

    var amtFO = document.getElementById("amtFO").value;
    flag += customInputValidator(amtFO, "amtFO");

    var amtLDO = document.getElementById("amtLDO").value;
    flag += customInputValidator(amtLDO, "amtLDO");

    var amtHSD = document.getElementById("amtHSD").value;
    flag += customInputValidator(amtHSD, "amtHSD");

    var amtPNG = document.getElementById("amtPNG").value;
    flag += customInputValidator(amtPNG, "amtPNG");

    var amtNG = document.getElementById("amtNG").value;
    flag += customInputValidator(amtNG, "amtNG");

    var amtBriquette = document.getElementById("amtBriquette").value;
    flag += customInputValidator(amtBriquette, "amtBriquette");

    var amtWood = document.getElementById("amtWood").value;
    flag += customInputValidator(amtWood, "amtWood");

    energyData["basicId"] = basicId;
    energyData["coal"] = amtCoal;
    energyData["fo"] = amtFO;
    energyData["ido"] = amtLDO;
    energyData["hsd"] = amtHSD;
    energyData["png"] = amtPNG;
    energyData["ng"] = amtNG;
    energyData["briq"] = amtBriquette;
    energyData["wood"] = amtWood;



    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveInduEng.php",
            contentType: "application/json",
            data: JSON.stringify(energyData),
            success: function(data) {
                // var data1 = JSON.parse(data);
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    addChart();
                    // window.location.replace("industryPP.php");
                } else {
                    alert("Data not Save Succesfuly")
                }

            }
        });
    } else {
        alert("Data not Save Succesfuly Please enter valid data")
    }

    // window.location.replace("industryPP.php");

}


// var div = document.getElementById("popup-btn");
// div.style.display = "block";
// function redirect() {

//     window.location.replace("fueluseincity.php");

// }

function showIndFInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

    +'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Energy </h5></center>'

    +
    '<div class="row mt-2 mb-3">' +
    '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' +
    '<ul style="margin-left: 10px;">' +
    '<li class="popupli">Total Emissions in 2019 = 6,558 Million Metric Tons of CO2 equivalent.</li>' +
    '<li class="popupli">CO2 accounts for about 76 percent of total greenhouse gas emissions. Methane, primarily from agriculture, contributes 16 percent of greenhouse . </li>' +
    '<li class="popupli">Gas emissions and nitrous oxide, mostly from industry and agriculture, contributes 6 percent to global emissions.</li>' +
    '<li class="popupli">Carbon dioxide emissions from fossil fuel and industrial purposes in India totaled 2,412 million metric tons in 2020.</li>' +
    '<li class="popupli">This was a reduction of six percent compared with 2019 levels, a year in which emissions in India peaked.</li>' +
    '</ul>'
    // +'<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
    // +'<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>' 
    // +'<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

    +
    '</div> ' +
    '</div>' +
    '</div></div>';
    $("#popUpData").append(html1);
}
///calculation steps
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
    '<li class="popupli"> India is the third largest producer of electricity in the world .</li>' +
    '<li class="popupli"> The national electric grid in India has an installed capacity of 388.134 GW as of 31 August 2021.</li>' +
    '<li class="popupli"> Renewable power plants, which also include large hydroelectric plants, constitute 37% of India' + "'" + 's total installed capacity. </li>' +
    '</ul>'
    // + '<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>'
    // + '<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'
    +
    '</div> ' +
    '</div>' +
    '</div></div>';
    $("#popUpData1").append(html1);
}
/////

function redirect() {

    window.location.replace("industryPP.php");

}