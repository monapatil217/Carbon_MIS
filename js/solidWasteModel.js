
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

                        html = '<div id="faq_pp" class="faq section-bg_pp">'
                            + '<div class="faq-list faq_list_e">'
                            + '<ul>'

                            + '<li data-aos="fade-up">'
                            + '<a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Municipal Solid Waste <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                            + '<div id="faq-list-1" class="collapse show extra" data-bs-parent=".faq-list">'
                            + '<h6 class="text-center">Quantity of Municipal Solid Waste </h6> '

                            + '<div class="row">'
                            + '    <div class="col-md-6 col-lg-4 col-xl-4 col-10 mt-3">'
                            + '        <label for="generated" class="form-label">Generation </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="generated" name="generated" class="form-control" placeholder="Generation" aria-label="Generation" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-4 col-xl-4 col-10 mt-3">'
                            + '        <label for="collection" class="form-label"> Collection</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="collection" name="collection" class="form-control" placeholder="Collection" aria-label="Collection" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10 mt-3">'
                            + '        <label for="treatment" class="form-label">Treatment</label>'
                            + '        <div class="form-group col-md-2  col-xl-10">'
                            + '             <select class="form-control" id = "treatment" onchange = "addTreatmentType();" >'
                            + '                 <option disabled selected> Treatment Type</option>'
                            + '                 <option value="Composted">Composted</option>'
                            + '                 <option value="Disposal">Disposal</option>'
                            + '                 <option value="Incineration">Incineration</option>'
                            + '             </select >'
                            + '         </div >'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row">'
                            + '<div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '<div id="comp">'

                            + '   </div>'
                            + '   </div>'

                            + '<div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '<div id="disp">'

                            + '   </div>'
                            + '   </div>'

                            + '<div class="col-md-6 col-lg-6 col-xl-4 col-10">'

                            + '<div id="incine">'

                            + '   </div>'
                            + '   </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'
                            + '<label for="dumpingYard" class="form-label">No. of Dumping Yard</label>'
                            + '<div class="input-group mb-2">'
                            + '<input type="text" id="dumpingYard" name="dumpingYard" class="form-control" placeholder="Dumping Yard"  onchange="addDumpingYard();" aria-label="Dumping Yard" aria-describedby="basic-addon2">'
                            // + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                            + '</div>'
                            + '</div>'
                            + '</div>'

                            + '<div class="row justify-content-center" id="adddDYard"> </div>'

                            + ' <div class="row">'
                            + '<div class="col-md-12 mb-3 mt-3 text-center">'
                            + ' <button class="btn btn-primary " type="button"  onclick="showMSWData();">SAVE</button>'
                            + ' </div>'
                            + ' </div >'

                            + ' </div>'
                            + '</li>'

                            + '<li data-aos="fade-up" data-aos-delay="100">'
                            + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Biomedical Waste <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                            + '<div id="faq-list-2" class="collapse extra" data-bs-parent=".faq-list">'
                            + '<h6 class="text-center">Quantity of Biomedical Waste </h6> '

                            + '<div class="row">'
                            + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '        <label for="generated" class="form-label"> Generated </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="generated" name="generated" class="form-control" placeholder="Generated" aria-label="Generated" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '        <label for="collected" class="form-label"> Collected</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="collected" name="collected" class="form-control" placeholder="Collected" aria-label="Collected" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '        <label for="treated" class="form-label"> Treated </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="treated" name="treated" class="form-control" placeholder="Treated" aria-label="Treated" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + ' <div class="row">'
                            + '<div class="col-md-12 mb-3 text-center">'
                            + ' <button class="btn btn-primary " type="button"  onclick="showBMWData();">SAVE</button>'
                            + ' </div>'
                            + ' </div >'

                            + '</div>'
                            + '</li>'

                            + '<li data-aos="fade-up" data-aos-delay="200">'
                            + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Hazardous Waste<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                            + '<div id="faq-list-3" class="collapse extra" data-bs-parent=".faq-list">'
                            + '<h6 class="text-center">Quantity of Hazardous Waste </h6> '

                            + '<div class="row">'
                            + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '        <label for="generated" class="form-label"> Generated </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="generated" name="generated" class="form-control" placeholder="Generated" aria-label="Generated" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '        <label for="collected" class="form-label"> Collected</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="collected" name="collected" class="form-control" placeholder="Collected" aria-label="Collected" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '        <label for="treated" class="form-label"> Treated </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="treated" name="treated" class="form-control" placeholder="Treated" aria-label="Treated" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + ' <div class="row">'
                            + '<div class="col-md-12 mb-3 mt-3 text-center">'
                            + ' <button class="btn btn-primary " type="button"  onclick="showHWData();">SAVE</button>'
                            + ' </div>'
                            + ' </div >'

                            + '</div>'
                            + '</li>'

                            + '</div>'
                            + '</li>'
                            + '</ul>'
                            + '</div> </div>';
                    });
                }
                else {

                    html = '<div id="faq_pp" class="faq section-bg_pp">'
                        + '<div class="faq-list faq_list_e">'
                        + '<ul>'

                        + '<li data-aos="fade-up">'
                        + '<a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Municipal Solid Waste <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                        + '<div id="faq-list-1" class="collapse show extra" data-bs-parent=".faq-list">'
                        + '<h6 class="text-center">Quantity of Municipal Solid Waste </h6> '

                        + '<div class="row">'
                        + '    <div class="col-md-6 col-lg-4 col-xl-4 col-10 mt-3">'
                        + '        <label for="generated" class="form-label">Generation </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="generated" name="generated" class="form-control" placeholder="Generation" aria-label="Generation" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-4 col-xl-4 col-10 mt-3">'
                        + '        <label for="collection" class="form-label"> Collection</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="collection" name="collection" class="form-control" placeholder="Collection" aria-label="Collection" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10 mt-3">'
                        + '        <label for="treatment" class="form-label">Treatment</label>'
                        + '        <div class="form-group col-md-2  col-xl-10">'
                        + '             <select class="form-control" id = "treatment" onchange = "addTreatmentType();" >'
                        + '                 <option disabled selected> Treatment Type</option>'
                        + '                 <option value="Composted">Composted</option>'
                        + '                 <option value="Disposal">Disposal</option>'
                        + '                 <option value="Incineration">Incineration</option>'
                        + '             </select >'
                        + '         </div >'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row">'
                        + '<div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '<div id="comp">'

                        + '   </div>'
                        + '   </div>'

                        + '<div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '<div id="disp">'

                        + '   </div>'
                        + '   </div>'

                        + '<div class="col-md-6 col-lg-6 col-xl-4 col-10">'

                        + '<div id="incine">'

                        + '   </div>'
                        + '   </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'
                        + '<label for="dumpingYard" class="form-label">No. of Dumping Yard</label>'
                        + '<div class="input-group mb-2">'
                        + '<input type="text" id="dumpingYard" name="dumpingYard" class="form-control" placeholder="Dumping Yard"  onchange="addDumpingYard();" aria-label="Dumping Yard" aria-describedby="basic-addon2">'
                        // + '<span class="input-group-text" id="basic-addon2">CMD</span>'
                        + '</div>'
                        + '</div>'
                        + '</div>'

                        + '<div class="row justify-content-center" id="adddDYard"> </div>'

                        + ' <div class="row">'
                        + '<div class="col-md-12 mb-3 mt-3 text-center">'
                        + ' <button class="btn btn-primary " type="button" onclick="showMSWData();">SAVE</button>'
                        + ' </div>'
                        + ' </div >'

                        + ' </div>'
                        + '</li>'

                        + '<li data-aos="fade-up" data-aos-delay="100">'
                        + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Biomedical Waste <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                        + '<div id="faq-list-2" class="collapse extra" data-bs-parent=".faq-list">'
                        + '<h6 class="text-center">Quantity of Biomedical Waste </h6> '

                        + '<div class="row">'
                        + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '        <label for="generated" class="form-label"> Generated </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="generated" name="generated" class="form-control" placeholder="Generated" aria-label="Generated" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '        <label for="collected" class="form-label"> Collected</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="collected" name="collected" class="form-control" placeholder="Collected" aria-label="Collected" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '        <label for="treated" class="form-label"> Treated </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="treated" name="treated" class="form-control" placeholder="Treated" aria-label="Treated" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + ' <div class="row">'
                        + '<div class="col-md-12 mb-3 text-center">'
                        + ' <button class="btn btn-primary " type="button" onclick="showBMWData();">SAVE</button>'
                        + ' </div>'
                        + ' </div >'

                        + '</div>'
                        + '</li>'

                        + '<li data-aos="fade-up" data-aos-delay="200">'
                        + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Hazardous Waste<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                        + '<div id="faq-list-3" class="collapse extra" data-bs-parent=".faq-list">'
                        + '<h6 class="text-center">Quantity of Hazardous Waste </h6> '

                        + '<div class="row">'
                        + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '        <label for="generated" class="form-label"> Generated </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="generated" name="generated" class="form-control" placeholder="Generated" aria-label="Generated" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '        <label for="collected" class="form-label"> Collected</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="collected" name="collected" class="form-control" placeholder="Collected" aria-label="Collected" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '        <label for="treated" class="form-label"> Treated </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="treated" name="treated" class="form-control" placeholder="Treated" aria-label="Treated" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">MTD</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + ' <div class="row">'
                        + '<div class="col-md-12 mb-3 mt-3 text-center">'
                        + ' <button class="btn btn-primary " type="button" onclick="showHWData();">SAVE</button>'
                        + ' </div>'
                        + ' </div >'

                        + '</div>'
                        + '</li>'

                        + '</div>'
                        + '</li>'
                        + '</ul>'
                        + '</div> </div>';
                }
            });
        }
    });

    $("#solidInput").append(html);

}

function addTreatmentType() {

    var treatType = document.getElementById("treatment").value;
    var html = '';

    if (treatType == "Composted") {
        $("#comp").empty();
        html = '   <label for="composted" class="form-label"> Composted </label>'
            + '        <div class="input-group mb-2">'
            + '            <input type="text" id="composted" name="composted" class="form-control" placeholder="Composted" aria-label="Composted" aria-describedby="basic-addon2">'
            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
            + '    </div>';
        $("#comp").append(html);
    }

    if (treatType == "Disposal") {
        $("#disp").empty();
        html = '   <label for="disposal" class="form-label"> Disposal on landfill</label>'
            + '        <div class="input-group mb-2">'
            + '            <input type="text" id="disposal" name="disposal" class="form-control" placeholder="Disposal on landfill" aria-label="Disposal on landfill" aria-describedby="basic-addon2">'
            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
            + '    </div>';

        $("#disp").append(html);
    }

    if (treatType == "Incineration") {
        $("#incine").empty();
        html = '   <label for="incinerated" class="form-label"> Incinerated</label>'
            + '        <div class="input-group mb-2">'
            + '            <input type="text" id="incinerated" name="incinerated" class="form-control" placeholder="Incinerated" aria-label="Incinerated" aria-describedby="basic-addon2">'
            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
            + '    </div>';

        $("#incine").append(html);
    }
}


function addDumpingYard() {

    $("#adddDYard").empty();

    var dumpingYard = document.getElementById("dumpingYard").value;
    var html = '';
    for (var i = 1; i <= dumpingYard; i++) {
        html += '<hr>'
            + '<div class="row  text-center ">'
            + '<h4>Details About Dumping Yard ' + i + ' </h4>'

            + ' </div>'
            + '<div class="row justify-content-center">'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '<label for="area" class="form-label"> Arera of Dumping Yard</label>'
            + '<div class="input-group mb-2">'
            + '<input type="text" id="area" name="area" class="form-control" placeholder="Arera of Dumping Yard" aria-label="Arera of Dumping Yard" aria-describedby="basic-addon2">'
            + ' <span class="input-group-text" id="basic-addon2">sq.km</span>'
            + '</div>'

            + '</div>'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '<label for="latitude" class="form-label"> Latitude</label>'
            + '<div class="input-group mb-2">'
            + '<input type="text" id="latitude" name="latitude" class="form-control" placeholder="Latitude" aria-label="Residential" aria-describedby="basic-addon2">'
            + '</div>'

            + '</div>'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '<label for="logitude" class="form-label"> Logitude</label>'
            + '<div class="input-group mb-2">'
            + '<input type="text" id="logitude" name="logitude" class="form-control" placeholder="Logitude" aria-label="Residential" aria-describedby="basic-addon2">'
            + '</div>'

            + '</div>'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '<label for="apxWaste" class="form-label"> Approximate Waste</label>'
            + '<div class="input-group mb-2">'
            + '<input type="text" id="apxWaste" name="apxWaste" class="form-control" placeholder="Approximate Waste" aria-label="Approximate Waste" aria-describedby="basic-addon2">'
            + ' <span class="input-group-text" id="basic-addon2">MTD</span>'
            + '</div>'

            + '</div>'
            + '<div class="col-md-6 col-lg-10 col-xl-3 col-10">'

            + '  </div>';
    }

    $("#adddDYard").append(html);

}

function showMSWData() {
    var flag = 0;
    var mswData = {};

    var generated = document.getElementById("generated").value;

    var collected = document.getElementById("collected").value;

    var treated = document.getElementById("treated").value;

    var dumpingYard = document.getElementById("dumpingYard").value;


    mswData["generated"] = generated;
    mswData["collected"] = collected;
    mswData["treated"] = treated;
    mswData["dumpingYard"] = dumpingYard;

    // if (flag == 0) {
    //     $.ajax({
    //         type: "POST",
    //         async: false,
    //         url: "php/.php",
    //         contentType: "application/json",
    //         data: JSON.stringify(mswData),
    //         success: function (data) {
    //             // var data1 = JSON.parse(data);
    //             // if (data1 == "success") {
    //             //     alert("Data Save Succesfuly");
    //             //     window.location.replace("menuPage.php");
    //             // } else {
    //             //     alert("Data not Save Succesfuly")
    //             // }
    //             window.location.replace("fueluseincity.php");
    //         }
    //     });
    // }
    $("#faq-list-1").removeClass("show");
    $("#faq-list-2").addClass("show");
}

function showBMWData() {

    var flag = 0;
    var bmwData = {};

    var generated = document.getElementById("generated").value;

    var collected = document.getElementById("collected").value;

    var treated = document.getElementById("treated").value;


    bmwData["generated"] = generated;
    bmwData["collected"] = collected;
    bmwData["treated"] = treated;

    // if (flag == 0) {
    //     $.ajax({
    //         type: "POST",
    //         async: false,
    //         url: "php/.php",
    //         contentType: "application/json",
    //         data: JSON.stringify(bmwData),
    //         success: function (data) {
    //             // var data1 = JSON.parse(data);
    //             // if (data1 == "success") {
    //             //     alert("Data Save Succesfuly");
    //             //     window.location.replace("menuPage.php");
    //             // } else {
    //             //     alert("Data not Save Succesfuly")
    //             // }
    //             window.location.replace("fueluseincity.php");
    //         }
    //     });
    // }
    $("#faq-list-2").removeClass("show");
    $("#faq-list-3").addClass("show");

}

function showHWData() {

    var flag = 0;
    var hwData = {};

    var generated = document.getElementById("generated").value;

    var collected = document.getElementById("collected").value;

    var treated = document.getElementById("treated").value;


    hwData["generated"] = generated;
    hwData["collected"] = collected;
    hwData["treated"] = treated;

    // if (flag == 0) {
    //     $.ajax({
    //         type: "POST",
    //         async: false,
    //         url: "php/.php",
    //         contentType: "application/json",
    //         data: JSON.stringify(hwData),
    //         success: function (data) {
    //             // var data1 = JSON.parse(data);
    //             // if (data1 == "success") {
    //             //     alert("Data Save Succesfuly");
    //             //     window.location.replace("menuPage.php");
    //             // } else {
    //             //     alert("Data not Save Succesfuly")
    //             // }
    //             window.location.replace("fueluseincity.php");
    //         }
    //     });
    // }
    // $("#faq-list-3").removeClass("show");
    // $("#faq-list-4").addClass("show");

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
