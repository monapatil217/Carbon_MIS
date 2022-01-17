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
    showForestLand();
})

function showForestLand() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#forestLand").empty();

    var myobj = {};
    myobj["type"] = "Forest";
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
                            + '<label for="areaForest" class="form-label"> Area under Forest Land </label >'
                            + '<div class="input-group mb-3">'
                            + '<input type="text" id="areaForest" class="form-control" value="' + element1.area + '" placeholder="Area" aria-label="Area" aria-describedby="basic-addon2">'
                            + '<span class="input-group-text" id="basic-addon2">sq.km </span >'
                            + '</div>'
                            + '</div>'
                            + '</div>';
                    });
                }
                else {

                    html = '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '<label for="areaForest" class="form-label"> Area under Forest Land </label >'
                        + '<div class="input-group mb-3">'
                        + '<input type="text" id="areaForest" class="form-control" placeholder="Area" aria-label="Area" aria-describedby="basic-addon2">'
                        + '<span class="input-group-text" id="basic-addon2">sq.km </span >'
                        + '</div>'
                        + '</div>'
                        + '</div>';
                }
            });
        }
    });

    $("#forestLand").append(html);

}

function saveForestData() {

    window.location.replace("landUSe.php");
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

function redirect() {

    window.location.replace(".php");

}

function showforestLInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Forest Land </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli">An assessment by the Forest Survey of India (FSI) last year had projected that, by 2030, the carbon stock in forests as well as tree cover was likely to reach 31.87 billion tonnes of CO2 equivalent.</li>'
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

function customSelectValidator(eleValue, eleName) {
    var flag = 0;
    var errSelector = ".invalid-feedback";
    if (eleValue == "") {
        if (eleName[0] == '#') {
            $(eleName).parent().find(errSelector).addClass("d-block");
        } else {
            $("[name=" + eleName + "]").parent().find(errSelector).addClass("d-block");
        }
        flag--;
    } else {
        if (eleName[0] == '#') {
            $("#" + eleName).parent().find(errSelector).removeClass("d-block");
        } else {
            $("[name=" + eleName + "]").parent().find(errSelector).removeClass("d-block");
        }
    }
    return flag;
}

function customInputValidator(eleValue, eleName) {
    var flag = 0;
    if (eleValue == "") {
        if (eleName[0] == '#') {
            $(eleName).addClass("is-invalid");

        } else {
            $("input[name=" + eleName + "]").addClass("is-invalid");
        }
        flag--;

    } else {
        if (eleName[0] == '#') {
            $(eleName).removeClass("is-invalid");
        } else {
            $("input[name=" + eleName + "]").removeClass("is-invalid");
        }
    }
    return flag;
}
