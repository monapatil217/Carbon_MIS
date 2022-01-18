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
    showTransInput();
})

function showTransInput() {
    var html = '';

    var basicId = document.getElementById("basicId").value;
    $("#IndPPLand").empty();

    var myobj = {};
    myobj["type"] = "Transport";
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
                            + '<a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Cement <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                            + '<div id="faq-list-1" class="collapse show extra" data-bs-parent=".faq-list">'

                            + '<div class="row">'
                            + '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">'
                            + '        <label for="opc" class="form-label"> O.P.C.</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="opc" name="opc" class="form-control" placeholder=" O.P.C." aria-label="O.P.C." aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">'
                            + '        <label for="ppc" class="form-label"> P.P.C.</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="ppc" name="ppc" class="form-control" placeholder="P.P.C." aria-label="P.P.C." aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">'
                            + '        <label for="pbfs" class="form-label"> P.B.F.S.</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="pbfs" name="pbfs" class="form-control" placeholder="S.R.C." aria-label="P.B.F.S." aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row ">'
                            + '    <div class="col-md-6 col-lg-4 col-xl-3 col-10">'
                            + '        <label for="src" class="form-label">S.R.C.</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="src" name="src" class="form-control" placeholder="S.R.C.." aria-label="S.R.C." aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-4 col-xl-3 col-10">'
                            + '        <label for="irst" class="form-label"> I.R.S.T.40</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="irst" name="irst" class="form-control" placeholder="I.R.S.T.40" aria-label="I.R.S.T.40" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-4 col-xl-6 col-10">'
                            + '    </div>'

                            + '</div>'

                            + ' <div class="row">'
                            + '<div class="col-md-12 mb-3 mt-3 text-center">'
                            + ' <button class="btn btn-primary " type="button" >SAVE</button>'
                            + ' </div>'
                            + ' </div >'

                            + ' </div>'
                            + '</li>'

                            + '<li data-aos="fade-up" data-aos-delay="100">'
                            + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Chemical <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                            + '<div id="faq-list-2" class="collapse extra" data-bs-parent=".faq-list">'

                            + '<div class="row">'
                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="ammonia" class="form-label"> Ammonia </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="ammonia" name="ammonia" class="form-control" placeholder="Ammonia" aria-label="Ammonia" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="inorganic" class="form-label"> Inorganic Acids</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="inorganic" name="inorganic" class="form-control" placeholder="Inorganic Acids" aria-label="Inorganic Acids" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="amides" class="form-label"> Amides </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="amides" name="amides" class="form-control" placeholder="Amides" aria-label="Amides" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'
                            + '     <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="aldehydes" class="form-label"> Aldehydes </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="aldehydes" name="aldehydes" class="form-control" placeholder="Aldehydes" aria-label="Aldehydes" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row">'
                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="organic" class="form-label"> Organic Acids</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="organic" name="organic" class="form-control" placeholder="Organic Acids" aria-label="Organic Acids" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'
                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="carbides" class="form-label"> Carbides </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="carbides" name="carbides" class="form-control" placeholder="Carbides" aria-label="Carbides" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="sodaAsh" class="form-label"> Soda Ash</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="sodaAsh" name="sodaAsh" class="form-control" placeholder="Soda Ash" aria-label="Soda Ash" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'
                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="alcohols" class="form-label"> Alcohols </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="alcohols" name="alcohols" class="form-control" placeholder="Alcohols" aria-label="Alcohols" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row">'
                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="alkenes" class="form-label"> Alkenes</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="alkenes" name="alkenes" class="form-control" placeholder="Alkenes" aria-label="Alkenes" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'
                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="organoc" class="form-label"> Organochlorides </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="organoc" name="organoc" class="form-control" placeholder="Organochlorides" aria-label="Organochlorides" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="oxideC" class="form-label"> Oxide Compounds</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="oxideC" name="oxideC" class="form-control" placeholder="Oxide Compounds" aria-label="Oxide Compounds" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'
                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="cyanideC" class="form-label"> Cyanide Compounds </label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="cyanideC" name="cyanideC" class="form-control" placeholder="Cyanide Compounds" aria-label="Cyanide Compounds" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'
                            + '</div>'

                            + '<div class="row justify-content-center">'
                            + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                            + '        <label for="carbonB" class="form-label"> Carbon Black</label>'
                            + '        <div class="input-group mb-2">'
                            + '            <input type="text" id="carbonB" name="carbonB" class="form-control" placeholder="Carbon Black" aria-label="Carbon Black" aria-describedby="basic-addon2">'
                            + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                            + '        </div>'
                            + '    </div>'
                            + '    <div class="col-md-6 col-lg-6 col-xl-9 col-10">'

                            + '    </div>'
                            + '</div>'

                            + ' <div class="row">'
                            + '<div class="col-md-12 mb-3 text-center">'
                            + ' <button class="btn btn-primary " type="button" >SAVE</button>'
                            + ' </div>'
                            + ' </div >'

                            + '</div>'
                            + '</li>'

                            + '<li data-aos="fade-up" data-aos-delay="200">'
                            + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Aluminium<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                            + '<div id="faq-list-3" class="collapse extra" data-bs-parent=".faq-list">'

                            + '<div class="row">'
                            + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '         <label for="aluminium" class="form-label"> Aluminium</label>'
                            + '         <div class="input-group mb-2">'
                            + '              <input type="text" id="aluminium" name="aluminium"  class="form-control" placeholder="Aluminium" aria-label="Aluminium" aria-describedby="basic-addon2">'
                            + '              <span class="input-group-text" id="basic-addon2">MW/m</span>'
                            + '         </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-9 col-10">'

                            + '    </div>'
                            + '</div>'

                            + ' <div class="row">'
                            + '<div class="col-md-12 mb-3 mt-3 text-center">'
                            + ' <button class="btn btn-primary " type="button" >SAVE</button>'
                            + ' </div>'
                            + ' </div >'

                            + '</div>'
                            + '</li>'

                            + '<li data-aos="fade-up" data-aos-delay="300">'
                            + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Lead <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                            + '<div id="faq-list-4" class="collapse extra" data-bs-parent=".faq-list">'

                            + '<div class="row">'
                            + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '         <label for="lead" class="form-label"> Lead</label>'
                            + '         <div class="input-group mb-2">'
                            + '              <input type="text" id="lead" name="lead"  class="form-control" placeholder="Lead" aria-label="Lead" aria-describedby="basic-addon2">'
                            + '              <span class="input-group-text" id="basic-addon2">MW/m</span>'
                            + '         </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-9 col-10">'

                            + '    </div>'
                            + '</div>'

                            + ' <div class="row">'
                            + '<div class="col-md-12 mb-3 mt-3 text-center">'
                            + ' <button class="btn btn-primary " type="button" >SAVE</button>'
                            + ' </div>'
                            + ' </div >'

                            + '</div>'
                            + '</li>'

                            + '<li data-aos="fade-up" data-aos-delay="300">'
                            + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Zinc <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                            + '<div id="faq-list-5" class="collapse extra" data-bs-parent=".faq-list">'

                            + '<div class="row">'
                            + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                            + '         <label for="zinc" class="form-label"> Zinc</label>'
                            + '         <div class="input-group mb-2">'
                            + '              <input type="text" id="zinc" name="zinc"  class="form-control" placeholder="Zinc" aria-label="Zinc" aria-describedby="basic-addon2">'
                            + '              <span class="input-group-text" id="basic-addon2">MW/m</span>'
                            + '         </div>'
                            + '    </div>'

                            + '    <div class="col-md-6 col-lg-6 col-xl-9 col-10">'

                            + '    </div>'
                            + '</div>'

                            + ' <div class="row">'
                            + '<div class="col-md-12 mb-3 mt-3 text-center">'
                            + ' <button class="btn btn-primary " type="button" >SAVE</button>'
                            + ' </div>'
                            + ' </div >'
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
                        + '<a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Cement <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                        + '<div id="faq-list-1" class="collapse show extra" data-bs-parent=".faq-list">'

                        + '<div class="row">'
                        + '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">'
                        + '        <label for="opc" class="form-label"> O.P.C.</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="opc" name="opc" class="form-control" placeholder=" O.P.C." aria-label="O.P.C." aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">'
                        + '        <label for="ppc" class="form-label"> P.P.C.</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="ppc" name="ppc" class="form-control" placeholder="P.P.C." aria-label="P.P.C." aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-4 col-xl-3 col-10 mt-3">'
                        + '        <label for="pbfs" class="form-label"> P.B.F.S.</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="pbfs" name="pbfs" class="form-control" placeholder="S.R.C." aria-label="P.B.F.S." aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row ">'
                        + '    <div class="col-md-6 col-lg-4 col-xl-3 col-10">'
                        + '        <label for="src" class="form-label">S.R.C.</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="src" name="src" class="form-control" placeholder="S.R.C.." aria-label="S.R.C." aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-4 col-xl-3 col-10">'
                        + '        <label for="irst" class="form-label"> I.R.S.T.40</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="irst" name="irst" class="form-control" placeholder="I.R.S.T.40" aria-label="I.R.S.T.40" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-4 col-xl-6 col-10">'
                        + '    </div>'

                        + '</div>'

                        + ' <div class="row">'
                        + '<div class="col-md-12 mb-3 mt-3 text-center">'
                        + ' <button class="btn btn-primary " type="button" >SAVE</button>'
                        + ' </div>'
                        + ' </div >'

                        + ' </div>'
                        + '</li>'

                        + '<li data-aos="fade-up" data-aos-delay="100">'
                        + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Chemical <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                        + '<div id="faq-list-2" class="collapse extra" data-bs-parent=".faq-list">'

                        + '<div class="row">'
                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="ammonia" class="form-label"> Ammonia </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="ammonia" name="ammonia" class="form-control" placeholder="Ammonia" aria-label="Ammonia" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="inorganic" class="form-label"> Inorganic Acids</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="inorganic" name="inorganic" class="form-control" placeholder="Inorganic Acids" aria-label="Inorganic Acids" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="amides" class="form-label"> Amides </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="amides" name="amides" class="form-control" placeholder="Amides" aria-label="Amides" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'
                        + '     <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="aldehydes" class="form-label"> Aldehydes </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="aldehydes" name="aldehydes" class="form-control" placeholder="Aldehydes" aria-label="Aldehydes" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row">'
                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="organic" class="form-label"> Organic Acids</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="organic" name="organic" class="form-control" placeholder="Organic Acids" aria-label="Organic Acids" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'
                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="carbides" class="form-label"> Carbides </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="carbides" name="carbides" class="form-control" placeholder="Carbides" aria-label="Carbides" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="sodaAsh" class="form-label"> Soda Ash</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="sodaAsh" name="sodaAsh" class="form-control" placeholder="Soda Ash" aria-label="Soda Ash" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'
                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="alcohols" class="form-label"> Alcohols </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="alcohols" name="alcohols" class="form-control" placeholder="Alcohols" aria-label="Alcohols" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row">'
                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="alkenes" class="form-label"> Alkenes</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="alkenes" name="alkenes" class="form-control" placeholder="Alkenes" aria-label="Alkenes" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'
                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="organoc" class="form-label"> Organochlorides </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="organoc" name="organoc" class="form-control" placeholder="Organochlorides" aria-label="Organochlorides" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="oxideC" class="form-label"> Oxide Compounds</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="oxideC" name="oxideC" class="form-control" placeholder="Oxide Compounds" aria-label="Oxide Compounds" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'
                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="cyanideC" class="form-label"> Cyanide Compounds </label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="cyanideC" name="cyanideC" class="form-control" placeholder="Cyanide Compounds" aria-label="Cyanide Compounds" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'
                        + '</div>'

                        + '<div class="row justify-content-center">'
                        + '    <div class="col-md-6 col-lg-6 col-xl-3 col-10">'
                        + '        <label for="carbonB" class="form-label"> Carbon Black</label>'
                        + '        <div class="input-group mb-2">'
                        + '            <input type="text" id="carbonB" name="carbonB" class="form-control" placeholder="Carbon Black" aria-label="Carbon Black" aria-describedby="basic-addon2">'
                        + '            <span class="input-group-text" id="basic-addon-2">t/year</span>'
                        + '        </div>'
                        + '    </div>'
                        + '    <div class="col-md-6 col-lg-6 col-xl-9 col-10">'

                        + '    </div>'
                        + '</div>'

                        + ' <div class="row">'
                        + '<div class="col-md-12 mb-3 text-center">'
                        + ' <button class="btn btn-primary " type="button" >SAVE</button>'
                        + ' </div>'
                        + ' </div >'

                        + '</div>'
                        + '</li>'

                        + '<li data-aos="fade-up" data-aos-delay="200">'
                        + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Aluminium<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                        + '<div id="faq-list-3" class="collapse extra" data-bs-parent=".faq-list">'

                        + '<div class="row">'
                        + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '         <label for="aluminium" class="form-label"> Aluminium</label>'
                        + '         <div class="input-group mb-2">'
                        + '              <input type="text" id="aluminium" name="aluminium"  class="form-control" placeholder="Aluminium" aria-label="Aluminium" aria-describedby="basic-addon2">'
                        + '              <span class="input-group-text" id="basic-addon2">MW/m</span>'
                        + '         </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-9 col-10">'

                        + '    </div>'
                        + '</div>'

                        + ' <div class="row">'
                        + '<div class="col-md-12 mb-3 mt-3 text-center">'
                        + ' <button class="btn btn-primary " type="button" >SAVE</button>'
                        + ' </div>'
                        + ' </div >'

                        + '</div>'
                        + '</li>'

                        + '<li data-aos="fade-up" data-aos-delay="300">'
                        + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Lead <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                        + '<div id="faq-list-4" class="collapse extra" data-bs-parent=".faq-list">'

                        + '<div class="row">'
                        + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '         <label for="lead" class="form-label"> Lead</label>'
                        + '         <div class="input-group mb-2">'
                        + '              <input type="text" id="lead" name="lead"  class="form-control" placeholder="Lead" aria-label="Lead" aria-describedby="basic-addon2">'
                        + '              <span class="input-group-text" id="basic-addon2">MW/m</span>'
                        + '         </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-9 col-10">'

                        + '    </div>'
                        + '</div>'

                        + ' <div class="row">'
                        + '<div class="col-md-12 mb-3 mt-3 text-center">'
                        + ' <button class="btn btn-primary " type="button" >SAVE</button>'
                        + ' </div>'
                        + ' </div >'

                        + '</div>'
                        + '</li>'

                        + '<li data-aos="fade-up" data-aos-delay="300">'
                        + '<a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Zinc <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>'
                        + '<div id="faq-list-5" class="collapse extra" data-bs-parent=".faq-list">'

                        + '<div class="row">'
                        + '    <div class="col-md-6 col-lg-6 col-xl-4 col-10">'
                        + '         <label for="zinc" class="form-label"> Zinc</label>'
                        + '         <div class="input-group mb-2">'
                        + '              <input type="text" id="zinc" name="zinc"  class="form-control" placeholder="Zinc" aria-label="Zinc" aria-describedby="basic-addon2">'
                        + '              <span class="input-group-text" id="basic-addon2">MW/m</span>'
                        + '         </div>'
                        + '    </div>'

                        + '    <div class="col-md-6 col-lg-6 col-xl-9 col-10">'

                        + '    </div>'
                        + '</div>'

                        + ' <div class="row">'
                        + '<div class="col-md-12 mb-3 mt-3 text-center">'
                        + ' <button class="btn btn-primary " type="button" >SAVE</button>'
                        + ' </div>'
                        + ' </div >'
                        + '</div>'
                        + '</li>'
                        + '</ul>'
                        + '</div> </div>';
                }
            });
        }
    });

    $("#IndPPLand").append(html);

}

// var div = document.getElementById("popup-btn");
// div.style.display = "block";

function saveIndPPData() {

    var flag = 0;
    var ppData = {};

    var relec = document.getElementById("relec").value;

    var celec = document.getElementById("celec").value;

    var selec = document.getElementById("selec").value;

    var slelec = document.getElementById("slelec").value;

    ppData["relec"] = relec;
    ppData["celec"] = celec;
    ppData["selec"] = selec;
    ppData["slelec"] = slelec;

    // if (flag == 0) {
    //     $.ajax({
    //         type: "POST",
    //         async: false,
    //         url: "php/.php",
    //         contentType: "application/json",
    //         data: JSON.stringify(ppData),
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

    window.location.replace("fueluseincity.php");

}

// function redirect() {

//     window.location.replace("fueluseincity.php");

// }

function showPPInfo() {
    var div = document.getElementById("moreInfo");
    div.style.display = "block";

    $("#popUpData").empty();
    var html1 = '<div class="row" >'

        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Process and Product </h5></center>'

        + '<div class="row mt-2 mb-3">'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
        + '<ul style="margin-left: 10px;">'
        + '<li class="popupli">Over the past few years, GHG emissions from the manufacturing activities in India have increased at a rapid rate of 8 per cent (CAGR); rising from ~315 Million Tonnes (MMT) of carbon dioxide equivalent (CO2e) in 2005, to ~623 MMT in 2013. This includes combined emissions from energy use, as well as industrial process and product use (IPPU).</li>'
        // + '<li class="popupli">CO2 accounts for about 76 percent of total greenhouse gas emissions. Methane, primarily from agriculture, contributes 16 percent of greenhouse . </li>'
        // + '<li class="popupli">Gas emissions and nitrous oxide, mostly from industry and agriculture, contributes 6 percent to global emissions.</li>'
        // + '<li class="popupli">Carbon dioxide emissions from fossil fuel and industrial purposes in India totaled 2,412 million metric tons in 2020.</li>'
        // + '<li class="popupli">This was a reduction of six percent compared with 2019 levels, a year in which emissions in India peaked.</li>'
        + '</ul>'
        // +'<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
        // +'<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>' 
        // +'<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

        + '</div> '
        + '</div>'
        + '</div></div>';
    $("#popUpData").append(html1);
}