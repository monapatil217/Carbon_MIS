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
        showEleInput();
        $("body").delegate('#myInputNumber', 'focusout', function() {
            if ($(this).val() < 0) {
                $(this).val('0');
            }
        });


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
        success: function(data) {
            var divList = JSON.parse(data);
            $.each(divList, function(index, element) {
                var check = element.check;

                if (check == "true") {
                    var eledata = element.cData;
                    $.each(eledata, function(index, element1) {
                        html = '<div class="row justify-content-center">' +
                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">'

                        +
                        ' <label for="relec" class="form-label"> Residential</label>' +
                        ' <div class="input-group mb-2">' +
                        ' <input type="number" min="0" id="relec" name="relec" class="form-control"  value="' + element1.r_elec + '"   placeholder="Residential" aria-label="Residential" aria-describedby="basic-addon2" >' +
                            ' <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                            '</div>' +
                            '</div>'
                            // + '</div>'

                        // + '<div class="row justify-content-center">'
                        +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                        '           <label for="celec" class="form-label"> Commercial</label>' +
                        '               <div class="input-group mb-2">' +
                        '                 <input type="number" min="0" id="celec" name="celec"  class="form-control"   value="' + element1.c_elec + '"  placeholder="Commercial" aria-label="Commercial" aria-describedby="basic-addon2" >' +
                            '         <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                            ////////////////////
                            // + '<div class="row justify-content-center">'
                            // + '              <div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                            // + '                   <label for="selec" class="form-label"> Slum area</label>'
                            // + '                  <div class="input-group mb-2">'
                            // + '                   <input type="text" id="selec" name="selec"  class="form-control"   value="' + element1.s_elec + '"   placeholder="Slum area " aria-label="Slum" aria-describedby="basic-addon2">'
                            // + '                       <span class="input-group-text" id="basic-addon2">MW/m</span>'
                            // + ' </div>'
                            // + '</div>'
                            // + '</div>'
                            //////////////
                            +
                            '<div class="row justify-content-center">' +
                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                            '                   <label for="agri" class="form-label"> Agriculture</label>' +
                            '                  <div class="input-group mb-2">' +
                            '                   <input type="number" min="0" id="agri" name="agri"  class="form-control"   value="' + element1.agree_elec + '"   placeholder="Agriculture" aria-label="Agriculture" aria-describedby="basic-addon2" >' +
                            '                       <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                            ' </div>' +
                            '</div>'
                            // + '</div>'

                        // + '<div class="row justify-content-center">'
                        +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                        '                   <label for="indu" class="form-label"> Industrial</label>' +
                        '                  <div class="input-group mb-2">' +
                        '                   <input type="number" min="0" id="indu" name="indu"  class="form-control"   value="' + element1.indu_elec + '"   placeholder="Industrial" aria-label="Agriculture" aria-describedby="basic-addon2">' +
                            '                       <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                            ' </div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row justify-content-center">' +
                            '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                            '                   <label for="munci" class="form-label"> Municipal</label>' +
                            '                  <div class="input-group mb-2">' +
                            '                   <input type="number" min="0" id="munci" name="munci"  class="form-control"   value="' + element1.munc_elec + '"   placeholder="Municipal" aria-label="Agriculture" aria-describedby="basic-addon2" >' +
                            '                       <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                            ' </div>' +
                            '</div>'
                            // + '</div>'

                        //////////////

                        // + '<div class="row justify-content-center">'
                        +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                        '          <label for="slelec" class="form-label"> Other</label>' +
                        '          <div class="input-group mb-2">' +
                        '              <input type="number" min="0" id="slelec" name="slelec"   class="form-control"   value="' + element1.sl_elec + '"    placeholder="Street light" aria-label="Slum" aria-describedby="basic-addon2" >' +
                            '                  <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    });
                } else {

                    html = '<div class="row justify-content-center">' +
                        '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                        '       <label for="relec" class="form-label"> Residential</label>' +
                        '       <div class="input-group mb-2">' +
                        '           <input type="number" min="0" id="relec" name="relec" class="form-control" placeholder="Residential" aria-label="Residential" aria-describedby="basic-addon2" >' +
                        '                <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                        '       </div>' +
                        '        </div>'
                        // + '     </div>'

                    // + '     <div class="row justify-content-center">'
                    +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                    '           <label for="celec" class="form-label"> Commercial</label>' +
                    '               <div class="input-group mb-2">' +
                    '                 <input type="number" min="0" id="celec" name="celec"  class="form-control" placeholder="Commercial" aria-label="Commercial" aria-describedby="basic-addon2" >' +
                    '         <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                    '   </div>' +
                    '             </div>' +
                    '            </div>'

                    // + '           <div class="row justify-content-center">'
                    // + '              <div class="col-md-6 col-lg-10 col-xl-9 col-10">'
                    // + '                   <label for="selec" class="form-label"> Slum area</label>'
                    // + '                  <div class="input-group mb-2">'
                    // + '                   <input type="number" id="selec" name="selec"  class="form-control" placeholder="Slum area " aria-label="Slum" aria-describedby="basic-addon2">'
                    // + '                       <span class="input-group-text" id="basic-addon2">MW/m</span>'
                    // + '  </div>'
                    // + '                </div>'
                    // + '          </div>'
                    ////////////
                    +
                    '<div class="row justify-content-center">' +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                    '<label for="agri" class="form-label"> Agriculture</label>' +
                    '                  <div class="input-group mb-2">' +
                    '                   <input type="number" min="0" id="agri" name="agri"  class="form-control"   placeholder="Agriculture" aria-label="Agriculture" aria-describedby="basic-addon2">' +
                    '                       <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                    ' </div>' +
                    '</div>'
                    // + '</div>'

                    // + '<div class="row justify-content-center">'
                    +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                    '<label for="indu" class="form-label"> Industrial</label>' +
                    '                  <div class="input-group mb-2">' +
                    '                   <input type="number" min="0" id="indu" name="indu"  class="form-control"     placeholder="Industrial" aria-label="Industrial" aria-describedby="basic-addon2" >' +
                    '                       <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                    ' </div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row justify-content-center">' +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                    '<label for="munci" class="form-label"> Municipal</label>' +
                    '                  <div class="input-group mb-2">' +
                    '                   <input type="number" min="0" id="munci" name="munci"  class="form-control" placeholder="Municipal" aria-label="Munciple" aria-describedby="basic-addon2" >' +
                    '                       <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                    ' </div>' +
                    '</div>'
                    // + '</div>'
                    /////////////

                    // + '  <div class="row justify-content-center">'
                    +
                    '<div class="col-md-6 col-lg-10 col-xl-6 col-10 mt-2">' +
                    '          <label for="slelec" class="form-label"> Other</label>' +
                    '          <div class="input-group mb-2">' +
                    '              <input type="number" min="0" id="slelec" name="slelec"   class="form-control" placeholder="Street light" aria-label="Slum" aria-describedby="basic-addon2">' +
                    '                  <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                    '    </div>' +
                    '            </div>' +
                    '     </div>';
                }
            });
        }
    });

    $("#eleInput").append(html);

}


function saveEleData() {

    var flag = 0;

    var eleData = {};

    var basicId = document.getElementById("basicId").value;

    var relec = document.getElementById("relec").value;
    flag += customInputValidator(relec, "relec");

    var celec = document.getElementById("celec").value;
    flag += customInputValidator(celec, "celec");
    // var selec = document.getElementById("selec").value;

    var agri = document.getElementById("agri").value;
    flag += customInputValidator(agri, "agri");

    var indu = document.getElementById("indu").value;
    flag += customInputValidator(indu, "indu");

    var munci = document.getElementById("munci").value;
    flag += customInputValidator(munci, "munci");


    var slelec = document.getElementById("slelec").value;
    flag += customInputValidator(slelec, "slelec");


    eleData["basicId"] = basicId;
    eleData["r_elec"] = relec;
    eleData["c_elec"] = celec;
    // eleData["s_elec"] = selec;
    eleData["agree_elec"] = agri;
    eleData["indu_elec"] = indu;
    eleData["munc_elec"] = munci;

    eleData["sl_elec"] = slelec;

    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveElectricity.php",
            contentType: "application/json",
            data: JSON.stringify(eleData),
            success: function(data) {

                if (data == "success") {
                    alert("Data Save Succesfuly");
                    addChart();

                } else {
                    alert("Data not Save Succesfuly")
                }

            }
        });
    } else {
        alert("Data not Save Succesfuly Please enter valid data")
    }


}




function showEleInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

    +'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Electricity </h5></center>'

    +
    '<div class="row mt-2 mb-3">' +
    '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 infoFont">' +
    '<ul style="margin-left: 10px;">' +
    '<li class="popupli"> India is the third largest producer of electricity in the world .</li>' +
    '<li class="popupli"> The national electric grid in India has an installed capacity of 388.134 GW as of 31 August 2021.</li>' +
    '<li class="popupli"> Renewable power plants, which also include large hydroelectric plants, constitute 37% of India' + "'" + 's total installed capacity. </li>' +
    '</ul>' +
    '<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>' +
    '<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

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
    '<li class="popupli"> Amount of coal(kg/month) =  Amt of electricity(MW/month) * coal for 1 MW(700 kg/MW) * % share of coal(0.64)  .</li>' +
    '<li class="popupli"> Emissions(ton/month) = Amt of coal(‘000 tonne/month) * EF(CO2/CH4/N2O) * NCV.</li>' +
    '<li class="popupli"> 1 MW of electricity emits 0.84  ton CO2/month, 0.000009 ton CH4/month and 0.000012 ton N2O/month. </li>' +
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

    window.location.replace("transport.php");

}