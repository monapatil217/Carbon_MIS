
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
    showSolidInput();
})

function showSolidInput() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#solidInput").empty();

    var myobj = {};
    myobj["type"] = "SolidWaste";
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
                            + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '<label for="solidGen" class="form-label">Solid waste Generation</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="solidGen" name="solidGen" class="form-control" value="' + element1.sw_gen + '" placeholder="Generation" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">MTD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '<label for="solidColl" class="form-label">Solid Waste Collection</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="solidColl" name="solidColl" class="form-control" value="' + element1.sw_col + '" placeholder="Collection" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">MTD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '<label for="solidTreat" class="form-label">Solid Waste Treatement</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="solidTreat" name="solidTreat" class="form-control" value="' + element1.sw_treat + '" placeholder="Treatement"aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">MTD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '<label for="dumpingYard" class="form-label">Dumping yard Present</label>'
                            + ' <div class="input-group mb-2">'
                            + '<input type="text" id="dumpingYard" name="dumpingYard" class="form-control" value="' + element1.n_yard + '" placeholder=" Dumping yard" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">MTD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>';
                    });
                }
                else {

                    html = '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="solidGen" class="form-label">Solid waste Generation</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="solidGen" name="solidGen" class="form-control" placeholder="Generation" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">MTD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="solidColl" class="form-label">Solid Waste Collection</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="solidColl" name="solidColl" class="form-control" placeholder="Collection" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">MTD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="solidTreat" class="form-label">Solid Waste Treatement</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="solidTreat" name="solidTreat" class="form-control" placeholder="Treatement"aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">MTD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="dumpingYard" class="form-label">Dumping yard Present</label>'
                        + ' <div class="input-group mb-2">'
                        + '<input type="text" id="dumpingYard" name="dumpingYard" class="form-control" placeholder=" Dumping yard" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">MTD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>';
                }
            });
        }
    });

    $("#solidInput").append(html);

}


function saveSolidData() {

    var flag = 0;
    var solidData = {};

    var solidGen = document.getElementById("solidGen").value;

    var solidColl = document.getElementById("solidColl").value;

    var solidTreat = document.getElementById("solidTreat").value;

    var dumpingYard = document.getElementById("dumpingYard").value;

    solidData["solidGen"] = solidGen;
    solidData["solidColl"] = solidColl;
    solidData["solidTreat"] = solidTreat;
    solidData["dumpingYard"] = dumpingYard;



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
    //             
    //         }
    //     });
    // }
    window.location.replace("wasteWater.php");

}

// var div = document.getElementById("moreInfo");
// div.style.display = "none";

// function redirect() {

//     window.location.replace("wasteWater.php");

// }

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
