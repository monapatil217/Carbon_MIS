

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
    showEleInput();
})

function showEleInput() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#eleInput").empty();

    var myobj = {};
    myobj["type"] = "Electricity";
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
                            + '   <div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '       <label for="relec" class="form-label"> Residential Electricity use</label>'
                            + '       <div class="input-group mb-3">'
                            + '           <input type="text" id="relec" name="relec" class="form-control"  value="' + element1.r_elec + '"   placeholder="Residential" aria-label="Residential" aria-describedby="basic-addon2">'
                            + '                <span class="input-group-text" id="basic-addon2">MW/m</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '       <div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '           <label for="celec" class="form-label"> Commercial Electricity use</label>'
                            + '               <div class="input-group mb-3">'
                            + '                 <input type="text" id="celec" name="celec"  class="form-control"   value="' + element1.c_elec + '"  placeholder="Commercial" aria-label="Commercial" aria-describedby="basic-addon2">'
                            + '         <span class="input-group-text" id="basic-addon2">MW/m</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '              <div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '                   <label for="selec" class="form-label"> Slum area Electricity use</label>'
                            + '                  <div class="input-group mb-3">'
                            + '                   <input type="text" id="selec" name="selec"  class="form-control"   value="' + element1.s_elec + '"   placeholder="Slum area " aria-label="Slum" aria-describedby="basic-addon2">'
                            + '                       <span class="input-group-text" id="basic-addon2">MW/m</span>'
                            + ' </div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '      <div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            + '          <label for="slelec" class="form-label"> Street light Electricity use</label>'
                            + '          <div class="input-group mb-3">'
                            + '              <input type="text" id="slelec" name="slelec"   class="form-control"   value="' + element1.sl_elec + '"    placeholder="Street light" aria-label="Slum" aria-describedby="basic-addon2">'
                            + '                  <span class="input-group-text" id="basic-addon2">MW/m</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'
                            ;
                    });
                }
                else {

                    html = '<div class="row justify-content-center">'
                        + '   <div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '       <label for="relec" class="form-label"> Residential Electricity use</label>'
                        + '       <div class="input-group mb-3">'
                        + '           <input type="text" id="relec" name="relec" class="form-control" placeholder="Residential" aria-label="Residential" aria-describedby="basic-addon2">'
                        + '                <span class="input-group-text" id="basic-addon2">MW/m</span>'
                        + '       </div>'
                        + '        </div>'
                        + '     </div>'

                        + '     <div class="row justify-content-center">'
                        + '       <div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '           <label for="celec" class="form-label"> Commercial Electricity use</label>'
                        + '               <div class="input-group mb-3">'
                        + '                 <input type="text" id="celec" name="celec"  class="form-control" placeholder="Commercial" aria-label="Commercial" aria-describedby="basic-addon2">'
                        + '         <span class="input-group-text" id="basic-addon2">MW/m</span>'
                        + '   </div>'
                        + '             </div>'
                        + '            </div>'

                        + '           <div class="row justify-content-center">'
                        + '              <div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '                   <label for="selec" class="form-label"> Slum area Electricity use</label>'
                        + '                  <div class="input-group mb-3">'
                        + '                   <input type="text" id="selec" name="selec"  class="form-control" placeholder="Slum area " aria-label="Slum" aria-describedby="basic-addon2">'
                        + '                       <span class="input-group-text" id="basic-addon2">MW/m</span>'
                        + '  </div>'
                        + '                </div>'
                        + '          </div>'

                        + '  <div class="row justify-content-center">'
                        + '      <div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                        + '          <label for="slelec" class="form-label"> Street light Electricity use</label>'
                        + '          <div class="input-group mb-3">'
                        + '              <input type="text" id="slelec" name="slelec"   class="form-control" placeholder="Street light" aria-label="Slum" aria-describedby="basic-addon2">'
                        + '                  <span class="input-group-text" id="basic-addon2">MW/m</span>'
                        + '    </div>'
                        + '            </div>'
                        + '     </div>'
                        ;
                }
            });
        }
    });

    $("#eleInput").append(html);

}


function saveEleData() {

    window.location.replace("transport.php");

    var flag = 0;
    var userData = {};

    var relec = document.getElementById("relec").value;
    flag += customInputValidator(relec, "relec");

    var celec = document.getElementById("celec").value;
    flag += customInputValidator(celec, "celec");

    var selec = document.getElementById("selec").value;
    flag += customInputValidator(selec, "selec");

    var slelec = document.getElementById("slelec").value;
    flag += customInputValidator(slelec, "slelec");

    userData["relec"] = relec;
    userData["celec"] = celec;
    userData["selec"] = selec;
    userData["slelec"] = slelec;

    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/.php",
            contentType: "application/json",
            data: JSON.stringify(userData),
            success: function (data) {
                // var data1 = JSON.parse(data);
                // if (data1 == "success") {
                //     alert("Data Save Succesfuly");
                //     window.location.replace("menuPage.php");
                // } else {
                //     alert("Data not Save Succesfuly")
                // }
                window.location.replace("transport.php");
            }
        });
    }

}




function showEleInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Electricity </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli"> Electricity Act 2003 has been enacted and came into force from 15.06.2003.</li>'
        + '<li class="popupli"> The objective is to introduce competition, protect consumer’s interests and provide power for all.</li>'
        + '<li class="popupli">Around 60.9% installed generation capacity is due to fossil fuel. </li>'
        + '<li class="popupli">Around 37.9% installed generation capacity is due to renewable energy sources.</li>'
        + '<li class="popupli">Around 1.7% installed generation capacity is due to Nuclear Fuel.</li>'
        + '</ul>'
        // +'<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
        + '<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>'
        + '<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

        + '</div> '
        + '</div>'
        + '</div></div>';
    $("#popUpData").append(html1);
}

function redirect() {

    window.location.replace("transport.php");

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
