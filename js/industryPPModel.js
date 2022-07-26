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
    showCementInput();
    showChemicalInput();
    showOtherInput();
})

function showCementInput() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#cementInput").empty();

    var myobj = {};
    myobj["type"] = "Cement";
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

                        html = '<div class="row">' +
                            '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">' +
                            '        <label for="opc" class="form-label"> O.P.C.</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="opc" name="opc" value="' + element1.cem_opc + '" class="form-control" placeholder=" O.P.C." aria-label="O.P.C." aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">' +
                            '        <label for="ppc" class="form-label"> P.P.C.</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="ppc" name="ppc" value="' + element1.cem_ppc + '" class="form-control" placeholder="P.P.C." aria-label="P.P.C." aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">' +
                            '        <label for="pbfs" class="form-label"> P.B.F.S.</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="pbfs" name="pbfs" value="' + element1.cem_pbfs + '" class="form-control" placeholder="S.R.C." aria-label="P.B.F.S." aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '</div>' +
                            '<div class="row ">' +
                            '    <div class="col-md-6 col-lg-4 col-xl-3 col-10">' +
                            '        <label for="src" class="form-label">S.R.C.</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="src" name="src" value="' + element1.cem_src + '" class="form-control" placeholder="S.R.C.." aria-label="S.R.C." aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-4 col-xl-3 col-10">' +
                            '        <label for="irst" class="form-label"> I.R.S.T.40</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="irst" name="irst" value="' + element1.cem_irst40 + '" class="form-control" placeholder="I.R.S.T.40" aria-label="I.R.S.T.40" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-4 col-xl-6 col-10">' +
                            '    </div>' +
                            '</div>' +
                            ' <div class="row">' +
                            '<div class="col-md-12 mb-3 mt-3 text-center">' +
                            ' <button class="btn btn-primary " type="button" onclick="showCementData();">SAVE</button>' +
                            ' </div>' +
                            ' </div>';
                    });
                    // addChart();
                } else {

                    html = '<div class="row">' +
                        '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">' +
                        '        <label for="opc" class="form-label"> O.P.C.</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="opc" name="opc" class="form-control" placeholder=" O.P.C." aria-label="O.P.C." aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">' +
                        '        <label for="ppc" class="form-label"> P.P.C.</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="ppc" name="ppc" class="form-control" placeholder="P.P.C." aria-label="P.P.C." aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">' +
                        '        <label for="pbfs" class="form-label"> P.B.F.S.</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="pbfs" name="pbfs" class="form-control" placeholder="S.R.C." aria-label="P.B.F.S." aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>' +
                        '<div class="row ">' +
                        '    <div class="col-md-6 col-lg-4 col-xl-3 col-10">' +
                        '        <label for="src" class="form-label">S.R.C.</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="src" name="src" class="form-control" placeholder="S.R.C." aria-label="S.R.C." aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-4 col-xl-3 col-10">' +
                        '        <label for="irst" class="form-label"> I.R.S.T.40</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="irst" name="irst" class="form-control" placeholder="I.R.S.T.40" aria-label="I.R.S.T.40" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-4 col-xl-6 col-10">' +
                        '    </div>' +
                        '</div>' +
                        ' <div class="row">' +
                        '<div class="col-md-12 mb-3 mt-3 text-center">' +
                        ' <button class="btn btn-primary " type="button" onclick="showCementData();">SAVE</button>' +
                        ' </div>' +
                        ' </div>';
                }
            });
        }
    });

    $("#cementInput").append(html);
}

function showChemicalInput() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#chemicalInput").empty();

    var myobj = {};
    myobj["type"] = "Chemical";
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

                        html = '<div class="row">' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="ammonia" class="form-label"> Ammonia </label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="ammonia" name="ammonia" value="' + element1.ammo + '" class="form-control" placeholder="Ammonia" aria-label="Ammonia" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="inorganic" class="form-label"> Inorganic Acids</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="inorganic" name="inorganic" value="' + element1.inorg_a + '" class="form-control" placeholder="Inorganic Acids" aria-label="Inorganic Acids" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="amides" class="form-label"> Amides </label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="amides" name="amides" value="' + element1.amides + '" class="form-control" placeholder="Amides" aria-label="Amides" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '     <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="aldehydes" class="form-label"> Aldehydes </label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="aldehydes" name="aldehydes" value="' + element1.aldeh + '" class="form-control" placeholder="Aldehydes" aria-label="Aldehydes" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '</div>' +
                            '<div class="row">' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="organic" class="form-label"> Organic Acids</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="organic" name="organic" value="' + element1.organic + '" class="form-control" placeholder="Organic Acids" aria-label="Organic Acids" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="carbides" class="form-label"> Carbides </label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="carbides" name="carbides"  value="' + element1.carb + '" class="form-control" placeholder="Carbides" aria-label="Carbides" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="sodaAsh" class="form-label"> Soda Ash</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="sodaAsh" name="sodaAsh" value="' + element1.sodaa + '" class="form-control"  placeholder="Soda Ash" aria-label="Soda Ash" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="alcohols" class="form-label"> Alcohols </label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="alcohols" name="alcohols" value="' + element1.alco + '" class="form-control"  placeholder="Alcohols" aria-label="Alcohols" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '</div>' +
                            '<div class="row">' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="alkenes" class="form-label"> Alkenes</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="alkenes" name="alkenes" value="' + element1.alke + '" class="form-control"  placeholder="Alkenes" aria-label="Alkenes" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="organoc" class="form-label"> Organochlorides </label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="organoc" name="organoc"  value="' + element1.orgo_charo + '" class="form-control" placeholder="Organochlorides" aria-label="Organochlorides" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="oxideC" class="form-label"> Oxide Compounds</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="oxideC" name="oxideC"  value="' + element1.oxideC + '" class="form-control" placeholder="Oxide Compounds" aria-label="Oxide Compounds" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="cyanideC" class="form-label"> Cyanide Compounds </label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="cyanideC" name="cyanideC"  value="' + element1.cyanideC + '" class="form-control" placeholder="Cyanide Compounds" aria-label="Cyanide Compounds" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '</div>' +
                            '<div class="row justify-content-center">' +
                            '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                            '        <label for="carbonB" class="form-label"> Carbon Black</label>' +
                            '        <div class="input-group mb-2">' +
                            '            <input type="number" id="carbonB" name="carbonB"  value="' + element1.carbonB + '" class="form-control" placeholder="Carbon Black" aria-label="Carbon Black" aria-describedby="basic-addon2">' +
                            '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                            '        </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-9 col-10">' +
                            '    </div>' +
                            '</div>' +
                            ' <div class="row">' +
                            '<div class="col-md-12 mb-3 text-center">' +
                            ' <button class="btn btn-primary " type="button" onclick="showChemicalData();">SAVE</button>' +
                            ' </div>' +
                            ' </div >';
                    });
                    // addChart();

                } else {

                    html = '<div class="row">' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="ammonia" class="form-label"> Ammonia </label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="ammonia" name="ammonia" class="form-control" placeholder="Ammonia" aria-label="Ammonia" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="inorganic" class="form-label"> Inorganic Acids</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="inorganic" name="inorganic" class="form-control" placeholder="Inorganic Acids" aria-label="Inorganic Acids" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="amides" class="form-label"> Amides </label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="amides" name="amides" class="form-control" placeholder="Amides" aria-label="Amides" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '     <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="aldehydes" class="form-label"> Aldehydes </label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="aldehydes" name="aldehydes" class="form-control" placeholder="Aldehydes" aria-label="Aldehydes" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>' +
                        '<div class="row">' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="organic" class="form-label"> Organic Acids</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="organic" name="organic" class="form-control" placeholder="Organic Acids" aria-label="Organic Acids" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="carbides" class="form-label"> Carbides </label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="carbides" name="carbides" class="form-control" placeholder="Carbides" aria-label="Carbides" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="sodaAsh" class="form-label"> Soda Ash</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="sodaAsh" name="sodaAsh" class="form-control" placeholder="Soda Ash" aria-label="Soda Ash" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="alcohols" class="form-label"> Alcohols </label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="alcohols" name="alcohols" class="form-control" placeholder="Alcohols" aria-label="Alcohols" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>' +
                        '<div class="row">' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="alkenes" class="form-label"> Alkenes</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="alkenes" name="alkenes" class="form-control" placeholder="Alkenes" aria-label="Alkenes" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="organoc" class="form-label"> Organochlorides </label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="organoc" name="organoc" class="form-control" placeholder="Organochlorides" aria-label="Organochlorides" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="oxideC" class="form-label"> Oxide Compounds</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="oxideC" name="oxideC" class="form-control" placeholder="Oxide Compounds" aria-label="Oxide Compounds" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="cyanideC" class="form-label"> Cyanide Compounds </label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="cyanideC" name="cyanideC" class="form-control" placeholder="Cyanide Compounds" aria-label="Cyanide Compounds" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>' +
                        '<div class="row justify-content-center">' +
                        '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">' +
                        '        <label for="carbonB" class="form-label"> Carbon Black</label>' +
                        '        <div class="input-group mb-2">' +
                        '            <input type="number" id="carbonB" name="carbonB" class="form-control" placeholder="Carbon Black" aria-label="Carbon Black" aria-describedby="basic-addon2">' +
                        '            <span class="input-group-text" id="basic-addon-2">t/year</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-9 col-10">' +
                        '    </div>' +
                        '</div>' +
                        ' <div class="row">' +
                        '<div class="col-md-12 mb-3 text-center">' +
                        ' <button class="btn btn-primary " type="button" onclick="showChemicalData();">SAVE</button>' +
                        ' </div>' +
                        ' </div >';
                }
            });
        }
    });

    $("#chemicalInput").append(html);
}

function showOtherInput() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#otherInput").empty();

    var myobj = {};
    myobj["type"] = "otherIndu";
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

                        html = '<div class="row">' +
                            '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">' +
                            '         <label for="aluminium" class="form-label"> Aluminium</label>' +
                            '         <div class="input-group mb-2">' +
                            '              <input type="number" id="aluminium" name="aluminium" value="' + element1.other_aluminium + '"  class="form-control" placeholder="Aluminium" aria-label="Aluminium" aria-describedby="basic-addon2">' +
                            '              <span class="input-group-text" id="basic-addon2">t/year</span>' +
                            '         </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">' +
                            '         <label for="lead" class="form-label"> Lead</label>' +
                            '         <div class="input-group mb-2">' +
                            '              <input type="number" id="lead" name="lead" value="' + element1.other_lead + '"  class="form-control" placeholder="Lead" aria-label="Lead" aria-describedby="basic-addon2">' +
                            '              <span class="input-group-text" id="basic-addon2">t/year</span>' +
                            '         </div>' +
                            '    </div>' +
                            '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">' +
                            '         <label for="zinc" class="form-label"> Zinc</label>' +
                            '         <div class="input-group mb-2">' +
                            '              <input type="number" id="zinc" name="zinc" value="' + element1.other_zinc + '"  class="form-control" placeholder="Zinc" aria-label="Zinc" aria-describedby="basic-addon2">' +
                            '              <span class="input-group-text" id="basic-addon2">t/year</span>' +
                            '         </div>' +
                            '    </div>' +
                            '</div>' +
                            ' <div class="row">' +
                            '<div class="col-md-12 mb-3 text-center">' +
                            ' <button class="btn btn-primary " type="button" onclick="showOtherData();">SAVE</button>' +
                            ' </div>' +
                            ' </div >';
                    });
                    // addChart();
                } else {

                    html += '<div class="row">' +
                        '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">' +
                        '         <label for="aluminium" class="form-label"> Aluminium</label>' +
                        '         <div class="input-group mb-2">' +
                        '              <input type="number" id="aluminium" name="aluminium"  class="form-control" placeholder="Aluminium" aria-label="Aluminium" aria-describedby="basic-addon2">' +
                        '              <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                        '         </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">' +
                        '         <label for="lead" class="form-label"> Lead</label>' +
                        '         <div class="input-group mb-2">' +
                        '              <input type="number" id="lead" name="lead"  class="form-control" placeholder="Lead" aria-label="Lead" aria-describedby="basic-addon2">' +
                        '              <span class="input-group-text" id="basic-addon2">MW/m</span>' +
                        '         </div>' +
                        '    </div>' +
                        '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">' +
                        '         <label for="zinc" class="fornumberm-label"> Zinc</label>' +
                        '         <div class="input-group mb-2">' +
                        '              <input type="number" id="zinc" name="zinc"  class="form-control" placeholder="Zinc" aria-label="Zinc" aria-describedby="basic-addon2">' +
                        '              <span class="input-group-text" id="basic-addon2">t/year</span>' +
                        '         </div>' +
                        '    </div>' +
                        '</div>' +
                        ' <div class="row">' +
                        '<div class="col-md-12 mb-3 text-center">' +
                        ' <button class="btn btn-primary " type="button" onclick="showOtherData();">SAVE</button>' +
                        ' </div>' +
                        ' </div >';
                }
            });
        }
    });

    $("#otherInput").append(html);
}


function showCementData() {
    var flag = 0;
    var cementData = {};
    var basicId = document.getElementById("basicId").value;

    var opc = document.getElementById("opc").value;
    flag += customInputValidator(opc, "opc");

    var ppc = document.getElementById("ppc").value;
    flag += customInputValidator(ppc, "ppc");

    var pbfs = document.getElementById("pbfs").value;
    flag += customInputValidator(pbfs, "pbfs");

    var src = document.getElementById("src").value;
    flag += customInputValidator(src, "src");

    var irst = document.getElementById("irst").value;
    flag += customInputValidator(irst, "irst");

    cementData["basicId"] = basicId;
    cementData["cem_opc"] = opc;
    cementData["cem_ppc"] = ppc;
    cementData["cem_pbfs"] = pbfs;
    cementData["cem_src"] = src;
    cementData["cem_irst40"] = irst;

    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveIndCem.php",
            contentType: "application/json",
            data: JSON.stringify(cementData),
            success: function(data) {
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    $("#faq-list-1").removeClass("show");
                    $("#fa1").addClass("collapsed");
                    $("#fa2").removeClass("collapsed");
                    $("#faq-list-2").addClass("show");
                    // addChart();
                } else {
                    alert("Data not Save Succesfuly")
                }
            }
        });
    } else {
        alert("Data not Save Succesfuly Please enter valid data")
    }

}

function redirect() {
    window.location.replace("fueluseincity.php");
}

function showChemicalData() {

    var flag = 0;
    var chemicalData = {};

    var basicId = document.getElementById("basicId").value;


    var ammonia = document.getElementById("ammonia").value;
    flag += customInputValidator(ammonia, "ammonia");

    var inorganic = document.getElementById("inorganic").value;
    flag += customInputValidator(inorganic, "inorganic");

    var amides = document.getElementById("amides").value;
    flag += customInputValidator(amides, "amides");

    var aldehydes = document.getElementById("aldehydes").value;
    flag += customInputValidator(aldehydes, "aldehydes");

    var organic = document.getElementById("organic").value;
    flag += customInputValidator(organic, "organic");

    var carbides = document.getElementById("carbides").value;
    flag += customInputValidator(carbides, "carbides");

    var sodaAsh = document.getElementById("sodaAsh").value;
    flag += customInputValidator(sodaAsh, "sodaAsh");

    var alcohols = document.getElementById("alcohols").value;
    flag += customInputValidator(alcohols, "alcohols");

    var alkenes = document.getElementById("alkenes").value;
    flag += customInputValidator(alkenes, "alkenes");

    var organoc = document.getElementById("organoc").value;
    flag += customInputValidator(organoc, "organoc");

    var oxideC = document.getElementById("oxideC").value;
    flag += customInputValidator(oxideC, "oxideC");

    var cyanideC = document.getElementById("cyanideC").value;
    flag += customInputValidator(cyanideC, "cyanideC");

    var carbonB = document.getElementById("carbonB").value;
    flag += customInputValidator(carbonB, "carbonB");

    chemicalData["basicId"] = basicId;
    chemicalData["ammo"] = ammonia;
    chemicalData["inorg_a"] = inorganic;
    chemicalData["amides"] = amides;
    chemicalData["aldeh"] = aldehydes;
    chemicalData["organic"] = organic;
    chemicalData["carb"] = carbides;
    chemicalData["sodaa"] = sodaAsh;
    chemicalData["alco"] = alcohols;
    chemicalData["alke"] = alkenes;
    chemicalData["orgo_charo"] = organoc;
    chemicalData["oxideC"] = oxideC;
    chemicalData["cyanideC"] = cyanideC;
    chemicalData["carbonB"] = carbonB;

    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveIndChem.php",
            contentType: "application/json",
            data: JSON.stringify(chemicalData),
            success: function(data) {
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    $("#faq-list-2").removeClass("show");
                    $("#fa2").addClass("collapsed");
                    $("#fa3").removeClass("collapsed");
                    $("#faq-list-3").addClass("show");
                    // addChart();
                } else {
                    alert("Data not Save Succesfuly")
                }
            }
        });
    } else {
        alert("Data not Save Succesfuly Please enter valid data")
    }



}

function showOtherData() {

    var flag = 0;
    var aluminiumData = {};
    var basicId = document.getElementById("basicId").value;

    var aluminium = document.getElementById("aluminium").value;
    flag += customInputValidator(aluminium, "aluminium");

    var lead = document.getElementById("lead").value;
    flag += customInputValidator(lead, "lead");

    var zinc = document.getElementById("zinc").value;
    flag += customInputValidator(zinc, "zinc");

    aluminiumData["basicId"] = basicId;
    aluminiumData["other_aluminium"] = aluminium;
    aluminiumData["other_lead"] = lead;
    aluminiumData["other_zinc"] = zinc;

    if (flag == 0) {
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveIndOther.php",
            contentType: "application/json",
            data: JSON.stringify(aluminiumData),
            success: function(data) {
                // var data1 = JSON.parse(data);
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    addChart();
                    // window.location.replace("menuPage.php");
                    window.location.replace("fueluseincity.php");
                } else {
                    alert("Data not Save Succesfuly")
                }

            }
        });
    } else {
        alert("Data not Save Succesfuly Please enter valid data")
    }
}

// function redirect() {

//     window.location.replace("fueluseincity.php");

// }

function showPPInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

    +'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Process and Product </h5></center>'

    +
    '<div class="row mt-2 mb-3">' +
    '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' +
    '<ul style="margin-left: 10px;">' +
    '<li class="popupli">Over the past few years, GHG emissions from the manufacturing activities in India have increased at a rapid rate of 8 per cent (CAGR); rising from ~315 Million Tonnes (MMT) of carbon dioxide equivalent (CO2e) in 2005, to ~623 MMT in 2013. This includes combined emissions from energy use, as well as industrial process and product use (IPPU).</li>'
    // + '<li class="popupli">CO2 accounts for about 76 percent of total greenhouse gas emissions. Methane, primarily from agriculture, contributes 16 percent of greenhouse . </li>'
    // + '<li class="popupli">Gas emissions and nitrous oxide, mostly from industry and agriculture, contributes 6 percent to global emissions.</li>'
    // + '<li class="popupli">Carbon dioxide emissions from fossil fuel and industrial purposes in India totaled 2,412 million metric tons in 2020.</li>'
    // + '<li class="popupli">This was a reduction of six percent compared with 2019 levels, a year in which emissions in India peaked.</li>'
    +
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
    '<li class="popupli"> The major driver for industrial processes and product use is the emissions arising from cement production.The other drivers of IPPU emissions are ammonia production and iron and steel production.</li>' +
    '<li class="popupli"> Emissions = Total Quantity of industrial product * Unit covnersion * Emission Factor </li>' +
    '<li class="popupli"> Unit conversion is necessary to convert the activity data into equivalent mass in tonnes. </li>' +
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