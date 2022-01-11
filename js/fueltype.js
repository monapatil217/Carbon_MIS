
function redirect() {

    window.location.replace("graph.php");

}


function addTypeDiv() {
    var fuelType = document.getElementById("fuelType").value;

    if (fuelType == "LPG") {

        var html = '<div class="row">'
            + '  <div class="form-floating col-6 mt-3 mb-3">'
            + '      <input type="text" class="form-control" id="lpginr" placeholder="Residential LPG" required>'
            + '       <div class="invalid-feedback">'
            + '           Please provide a valid data.'
            + '        </div>'
            + '        <label for="lpginr">Residential LPG</label>'
            + '    </div>'

            + '      <div class="form-floating col-6 mt-3 mb-3">'
            + '           <input type="text" class="form-control" id="lpginc" placeholder="Commercial LPG" required>'
            + '          <div class="invalid-feedback">'
            + '             Please provide a valid data.'
            + '         </div>'
            + '          <label for="lpginc">Commercial LPG</label>'
            + '       </div>'
            + '     </div>';

        $("#lpg").append(html);

    }
    if (fuelType == "MNGL") {

        var html = '  <div class="row">'
            + '  <div class="form-floating col-6 mt-3 mb-3">'
            + '    <input type="text" class="form-control" id="mnglinr" placeholder="Residential MNGL" required>'
            + '    <div class="invalid-feedback">'
            + '        Please provide a valid data.'
            + '    </div>'
            + '    <label for="mnglinr">Residential MNGL</label>'
            + '  </div>'

            + '  <div class="form-floating col-6 mt-3 mb-3">'
            + '     <input type="text" class="form-control" id="mnglinc" placeholder="Commercial MNGL" required>'
            + '    <div class="invalid-feedback">'
            + '        Please provide a valid data.'
            + '     </div>'
            + '     <label for="mnglinc">Commercial MNGL</label>'
            + '  </div>'
            + '  </div>';

        $("#mngl").append(html);
    }
    if (fuelType == "Kerosene") {

        var html = '<div class="row">'
            + '  <div class="form-floating col-6 mt-3 mb-3">'
            + '     <input type="text" class="form-control" id="keroseneinr" placeholder="Residential Kerosene" required>'
            + '  <div class="invalid-feedback">'
            + '      Please provide a valid data.'
            + '   </div>'
            + '  <label for="keroseneinr">Residential Kerosene</label>'
            + '  </div>'

            + '  <div class="form-floating col-6 mt-3 mb-3">'
            + '     <input type="text" class="form-control" id="keroseneinc" placeholder="Commercial Kerosene" required>'
            + '     <div class="invalid-feedback">'
            + '         Please provide a valid data.'
            + '    </div>'
            + '    <label for="keroseneinc">Commercial Kerosene</label>'
            + ' </div>'
            + '  </div>';

        $("#kerosene").append(html);

    }
    if (fuelType == "Wood") {

        var html = '  <div class="row">'
            + '  <div class="form-floating col-6 mt-3 mb-3">'
            + '  <input type="text" class="form-control" id="woodinr" placeholder="Residential Wood" required>'
            + '  <div class="invalid-feedback">'
            + '        Please provide a valid data.'
            + '    </div>'
            + '     <label for="woodinr">Residential Wood</label>'
            + '   </div>'

            + '  <div class="form-floating col-6 mt-3 mb-3">'
            + '     <input type="text" class="form-control" id="woodinc" placeholder="Commercial Wood" required>'
            + '    <div class="invalid-feedback">'
            + '        Please provide a valid data.'
            + '    </div>'
            + '    <label for="woodinc">Commercial wood</label>'
            + '  </div>'
            + ' </div>';

        $("#wood").append(html);

    }

}