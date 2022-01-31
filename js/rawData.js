
$(document).ready(function () {

    // showInput();

    // Get the element with id="defaultOpen" and click on it
    // document.getElementById("defaultOpen").click();

    document.getElementById("addModel").style.display = "none";

})


function openCity(cityName, elmnt, color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
    elmnt.style.backgroundColor = color;

}


function showInput() {

    document.getElementById("addModel").style.display = "block";

    var html = '';

    var city = document.getElementById("cityList").value;
    $("#sectorInfo").empty();

    var myobj = {};
    myobj["city"] = city;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/viewAllCityData.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);

            $.each(divList, function (index, element1) {
                var electricity = element1.electricity;
                var transport = element1.transport;

                var cropland = element1.cropland;
                var livestock = element1.livestock;
                var forest = element1.forest;
                var landuse = element1.landuse;

                var solidwaste = element1.solidwaste;
                var yard = element1.yard;

                var hazwaste = element1.hazwaste;
                var biomwaste = element1.biomwaste;

                var wastewater = element1.wastewater;
                var stp = element1.stp;

                var energyindu = element1.energyindu;

                var ppcement = element1.ppcement;
                var ppchemical = element1.ppchemical;

                var indu_other = element1.indu_other;

                var cooking = element1.cooking;

                // document.getElementById("dataDownload").style.display = "block";

                $.each(electricity, function (index, element2) {

                    if (element2.check == "true") {

                        $.each(element2.cData, function (index, element) {
                            html += '         <div id="Electricity" class="tabcontent">'
                                // + ' <h1>Electricity</h1>'
                                + '  <div class="row  align-items-center justify-content-center mt-3">'
                                // + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '    <div class="in-sec">'
                                + '        <h3 id="ele-header" class="text-center mb-2"> Electricity </h3>'
                                + '        <table class="table text-center" id="ele-table">'
                                + '           <thead>'
                                + '               <tr>'
                                + '                    <th scope="col">Sr.No</th>'
                                + '                    <th scope="col">Sub-Sector</th>'
                                + '                    <th scope="col">Electricity used(MW/m)</th>'
                                + '                </tr>'
                                + '            </thead>'
                                + '            <tbody>'
                                + '                <tr>'
                                + '                   <th scope="row">1</th>'
                                + '                    <td>Residential ELEC use</td>'
                                + '                    <td>' + element.r_elec + '</td>'
                                + '                </tr>'
                                + '                <tr>'
                                + '                   <th scope="row">2</th>'
                                + '                   <td>Commercial ELEC use</td>'
                                + '                     <td>' + element.c_elec + '</td>'
                                + '              </tr>'
                                + '               <tr>'
                                + '                 <th scope="row">3</th>'
                                + '                 <td>Slum area ELEC use</td>'
                                + '                 <td>' + element.s_elec + '</td>'
                                + '         </tr>'
                                + '       <tr>'
                                + '           <th scope="row">4</th>'
                                + '           <td>Street light ELEC use</td>'
                                + '         <td>' + element.sl_elec + '</td>'
                                + '      </tr>'
                                + '    </tbody>'
                                + '     </table>'

                                // + '  </div>'
                                // + '  </div>'
                                + '   </div> '
                                + '   </div> ';
                        });
                    }
                    else {
                        html += ' <div id="Electricity" class="tabcontent"><div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + ' </div></div>';
                    }

                });
                $.each(transport, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += ' <div id="Transport" class="tabcontent"><div class="row  align-items-center justify-content-center mt-3">'
                                // + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + ' <div class="in-sec">'
                                + '     <h3 id="trans-header" class="text-center mb-2"> Transport </h3>'
                                + '    <table class="table text-center" id="trans-table">'
                                + '       <thead>'
                                + '            <tr>'
                                + '                <th scope="col">Sr.No</th>'
                                + '                 <th scope="col">Type of Vehicle</th>'
                                + '                 <th scope="col">No. Of Vehicles</th>'
                                + '              </tr>'
                                + '         </thead>'
                                + '         <tbody>'
                                + '   <tr>'
                                + '                  <th scope="row">1</th>'
                                + '                   <td>Two Wheeler</td>'
                                + '    <td>' + element.w2 + '</td>'
                                + '   </tr>'
                                + '   <tr>'
                                + '      <th scope="row">2</th>'
                                + '     <td>Three Wheeler</td>'
                                + '     <td>' + element.w3 + '</td>'
                                + '   </tr>'
                                + '  <tr>'
                                + '     <th scope="row">3</th>'
                                + '    <td>Four Wheeler</td>'
                                + '   <td>' + element.w4 + '</td>'
                                + '  </tr>'
                                + '  <tr>'
                                + '      <th scope="row">4</th>'
                                + '      <td>Bus</td>'
                                + '     <td>' + element.bus + '</td>'
                                + '  </tr>'
                                + '  <tr>'
                                + '   <th scope="row">5</th>'
                                + '   <td>LCV</td>'
                                + '   <td>' + element.tempo + '</td>'
                                + '  </tr>'
                                + '  <tr>'
                                + '     <th scope="row">6</th>'
                                + '     <td>HCV</td>'
                                + '     <td>' + element.truck + '</td>'
                                + '   </tr>'
                                + '  <tr>'
                                + '       <th scope="row">7</th>'
                                + '       <td>Train</td>'
                                + '      <td>' + element.train + '</td>'
                                + '   </tr>'
                                + '   <tr>'
                                + '      <th scope="row">8</th>'
                                + '      <td>Flight</td>'
                                + '       <td>' + element.flight + '</td>'
                                + '   </tr>'
                                + '  </tbody>'
                                + ' </table>'

                                // + '  </div>'
                                // + '   </div>'
                                + '  </div></div>';
                        });
                    }
                    else {
                        html += ' <div id="Transport" class="tabcontent"><div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + ' </div></div>';
                    }
                });

                html += '<div id="AFOLU" class="tabcontent">';
                $.each(cropland, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '  <div class="in-sec">'
                                + '      <h3 id="crop-header" class="text-center mb-2">Crop Land</h3>'
                                + '      <table class="table text-center" id="crop-table">'
                                + '           <thead>'
                                + '               <tr>'
                                + '                   <th scope="col">Sr.No</th>'
                                + '                   <th scope="col">Input</th>'
                                + '                   <th scope="col">Area(sq.km)</th>'
                                + '              </tr>'
                                + '          </thead>'
                                + '          <tbody>'
                                + '              <tr>'
                                + '                     <th scope="row">1</th>'
                                + '                    <td>Woody Perennial Cover</td>'
                                + '                    <td>' + element.perennial + '</td>'
                                + '                 </tr>'
                                + '              <tr>'
                                + '                     <th scope="row">1</th>'
                                + '                    <td>Harwested Land</td>'
                                + '                    <td>' + element.harwested + '</td>'
                                + '                 </tr>'
                                + '             </tbody>'
                                + '         </table>'
                                // + '      </div>'
                                // + '</div>'
                                + '</div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });
                $.each(livestock, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '  <div class="in-sec">'
                                + '     <h3  id="live-header" class="text-center mb-2"> Livestock </h3>'
                                + '    <table class="table text-center"  id="live-table">'
                                + '        <thead>'
                                + '            <tr>'
                                + '               <th scope="col">Sr.No</th>'
                                + '               <th scope="col"> Type of Animal</th>'
                                + '               <th scope="col"> Number of Animals</th>'
                                + '           </tr>'
                                + '        </thead>'
                                + '        <tbody>'
                                + '           <tr>'
                                + '              <th scope="row">1</th>'
                                + '             <td>Indigenous Cattles</td>'
                                + '           <td>' + element.ind_cat + '</td>'
                                + '        </tr>'
                                + '        <tr>'
                                + '            <th scope="row">2</th>'
                                + '           <td>Cross-breed cattles</td>'
                                + '           <td>' + element.cross_cat + '</td>'
                                + '       </tr>'
                                + '       <tr>'
                                + '           <th scope="row">3</th>'
                                + '           <td>Buffalo</td>'
                                + '           <td>' + element.buff + '</td>'
                                + '          </tr>'
                                + '         <tr>'
                                + '             <th scope="row">4</th>'
                                + '            <td>Sheep</td>'
                                + '              <td>' + element.sheep + '</td>'
                                + '          </tr>'
                                + '          <tr>'
                                + '            <th scope="row">5</th>'
                                + '           <td>Goat</td>'
                                + '           <td>' + element.goat + '</td>'
                                + '      </tr>'
                                + '     <tr>'
                                + '   <th scope="row">6</th>'
                                + '   <td>Horses</td>'
                                + '   <td>' + element.hors + '</td>'
                                + '  </tr>'
                                + ' <tr>'
                                + '       <th scope="row">7</th>'
                                + '        <td>Donkeys</td>'
                                + '        <td>' + element.donk + '</td>'
                                + '    </tr>'
                                + '    <tr>'
                                + '        <th scope="row">8</th>'
                                + '       <td>Camels</td>'
                                + '       <td>' + element.came + '</td>'
                                + '    </tr>'
                                + '      <tr>'
                                + '       <th scope="row">9</th>'
                                + '      <td>Pig</td>'
                                + '      <td>' + element.pig + '</td>'
                                + '   </tr>'
                                + '  <tr>'
                                + '     <th scope="row">10</th>'
                                + '     <td>Poultry</td>'
                                + '    <td>' + element.poul + '</td>'
                                + '  </tr>'
                                + '  </tbody>'
                                + '  </table>'

                                // + ' </div>'
                                // + '  </div>'
                                + '</div>';
                        });
                    }
                    else {
                        html += '<div id="LiveStock" class="tabcontent"><div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });
                $.each(forest, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '     <div class="in-sec">'
                                + '      <h3 id="forest-header" class="text-center mb-2"> Forest Land </h3>'
                                + '      <table class="table text-center"  id="forest-table">'
                                + '          <thead>'
                                + '             <tr>'
                                + '                 <th scope="col">Sr.No</th>'
                                + '                 <th scope="col">Input</th>'
                                + '                <th scope="col">Area(sq.km)</th>'
                                + '           </tr>'
                                + '       </thead>'
                                + '      <tbody>'
                                + '          <tr>'
                                + '              <th scope="row">1</th>'
                                + '               <td>Green Cover (sq.km)</td>'
                                + '               <td>' + element.areaForest + '</td>'
                                + '            </tr>'
                                + '          <tr>'
                                + '              <th scope="row">1</th>'
                                + '               <td>Annual Timber Removal ( in cubic meter ) </td>'
                                + '               <td>' + element.roundWood + '</td>'
                                + '            </tr>'
                                + '          <tr>'
                                + '              <th scope="row">1</th>'
                                + '               <td>Annual Fire Wood Removal (in cubic meter)</td>'
                                + '               <td>' + element.fuelWood + '</td>'
                                + '            </tr>'
                                + '          <tr>'
                                + '              <th scope="row">1</th>'
                                + '               <td>Forest Area Affected by Disturbances</td>'
                                + '               <td>' + element.disturbance + '</td>'
                                + '            </tr>'
                                + '        </tbody>'
                                + '     </table>'
                                // + '    </div>'
                                // + '    </div>'
                                + ' </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });
                $.each(landuse, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '  <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '     <div class="in-sec">'
                                + '       <h3 id="land-header" class="text-center mb-2"> Land Use </h3>'
                                + '      <table class="table text-center" id="land-table">'
                                + '         <thead>'
                                + '            <tr>'
                                + '              <th scope="col">Sr.No</th>'
                                + '              <th scope="col">Category</th>'
                                + '              <th scope="col">Area(sq.km)</th>'
                                + '        </tr>'
                                + '   </thead>'
                                + '  <tbody>'
                                + '       <tr>'
                                + '           <th scope="row">1</th>'
                                + '            <td>Residential Area</td>'
                                + '           <td>' + element.resi + '</td>'
                                + '      </tr>'
                                + '      <tr>'
                                + '         <th scope="row">2</th>'
                                + '       <td>Commercial Area</td>'
                                + '      <td>' + element.com + '</td>'
                                + '  </tr>'
                                + '   <tr>'
                                + '      <th scope="row">3</th>'
                                + '     <td>Water Bodies Area</td>'
                                + '    <td>' + element.w_body + '</td>'
                                + '  </tr>'
                                + '    <tr>'
                                + '        <th scope="row">4</th>'
                                + '        <td>Public</td>'
                                + '      <td>' + element.public + '</td>'
                                + '    </tr>'
                                + '   <tr>'
                                + '      <th scope="row">5</th>'
                                + '      <td>Public Utilities Area</td>'
                                + '     <td>' + element.p_utility + '</td>'
                                + '   </tr>'
                                + '    <tr>'
                                + '       <th scope="row">6</th>'
                                + '      <td>Transport</td>'
                                + '     <td>' + element.transport + '</td>'
                                + '    </tr>'
                                + ' <tr>'
                                + '     <th scope="row">7</th>'
                                + '    <td>Green Area</td>'
                                + '   <td>' + element.green_a + '</td>'
                                + '  </tr>'
                                + '    <tr>'
                                + '       <th scope="row">8</th>'
                                + '      <td>Recreational Area</td>'
                                + '     <td>' + element.r_creational + '</td>'
                                + '    </tr>'
                                + '  <tr>'
                                + '     <th scope="row">9</th>'
                                + '    <td>Industrial Area</td>'
                                + '   <td>' + element.indu + '</td>'
                                + '  </tr>'
                                + '      <tr>'
                                + '        <th scope="row">10</th>'
                                + '         <td>Hills and Hill Slopes Area</td>'
                                + '      <td>' + element.hills + '</td>'
                                + '    </tr>'

                                + ' </tbody>'
                                + '  </table>'
                                // + '  </div>'
                                // + ' </div>'
                                + ' </div></div>';
                        });
                    }
                    else {
                        html += ' <div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            // + '</div>'
                            + '</div>  </div>';
                    }
                });

                html += '</div>';
                html += '<div id="Solidwaste" class="tabcontent">';
                $.each(solidwaste, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '      <div class="in-sec">'
                                + '        <h3 id="solid-header" class="text-center mb-2"> Municipal Solid Waste </h3>'
                                + '      <table class="table text-center" id="solid-table">'
                                + '          <thead>'
                                + '             <tr>'
                                + '                 <th scope="col">Sr.No</th>'
                                + '                 <th scope="col">Input</th>'
                                + '                 <th scope="col">Quantity</th>'
                                + '             </tr>'
                                + '        </thead>'
                                + '        <tbody>'
                                + '            <tr>'
                                + '                <th scope="row">1</th>'
                                + '                 <td> Solid Waste Generated(MTD)</td>'
                                + '                 <td>' + element.msw_gen + '</td>'
                                + '             </tr>'
                                + '             <tr>'
                                + '               <th scope="row">2</th>'
                                + '               <td> Solid Waste Collected(MTD)</td>'
                                + '              <td>' + element.msw_col + '</td>'
                                + '          </tr>'
                                + '             <tr>'
                                + '               <th scope="row">3</th>'
                                + '               <td> Qty of MSW Composted</td>'
                                + '              <td>' + element.t_comp + '</td>'
                                + '          </tr>'
                                + '             <tr>'
                                + '               <th scope="row">4</th>'
                                + '               <td>Qty of MSW sent to Landfill</td>'
                                + '              <td>' + element.t_disp + '</td>'
                                + '          </tr>'
                                + '             <tr>'
                                + '               <th scope="row">5</th>'
                                + '               <td> Qty of MSW Incinerated</td>'
                                + '              <td>' + element.t_incin + '</td>'
                                + '          </tr>'
                                + '          <tr>'
                                + '                 <th scope="row">6</th>'
                                + '                 <td> No. of Dumping Yards </td>'
                                + '                 <td>' + element.n_yard + '</td>'
                                + '               </tr>'
                                + '            </tbody>'
                                + '        </table>'
                                // + '     </div>'
                                // + '   </div>'
                                + ' </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });
                $.each(yard, function (index, element2) {
                    if (element2.check == "true") {

                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            // + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '      <div class="in-sec">'
                            + '       <h3 id="yard-header" class="text-center mb-2"> Dumping Yards</h3>'
                            + '      <table class="table text-center" id="yard-table">'
                            + '          <thead>'
                            + '             <tr>'
                            + '                <th scope="col">Sr.No.</th>'
                            + '                <th scope="col">Area of Dumping Yard</th>'
                            + '               <th scope="col">Latitude</th>'
                            + '               <th scope="col">Logitude</th>'
                            + '               <th scope="col">Approximate Waste</th>'
                            + '            </tr>'
                            + '        </thead>'
                            + '        <tbody>';
                        var yi = 1;
                        $.each(element2.cData, function (index, element) {
                            html += '           <tr>'
                                + '              <th scope="row">' + yi + '</th>'
                                + '              <td>' + element.area + '</td>'
                                + '             <td>' + element.lat + '</td>'
                                + '             <td>' + element.long + '</td>'
                                + '            <td>' + element.app_waste + '</td>'
                                + '       </tr>';
                            yi++;
                        });

                        html += '      </tbody>'
                            + '   </table>'
                            // + '   </div>'
                            // + '   </div>'
                            + '</div>';

                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });
                $.each(biomwaste, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '       <div class="in-sec">'
                                + '          <h3  id="bio-header" class="text-center mb-2"> Biomedical Waste </h3>'
                                + '        <table class="table text-center"  id="bio-table">'
                                + '            <thead>'
                                + '                <tr>'
                                + '                   <th scope="col">Sr.No</th>'
                                + '                 <th scope="col">Input</th>'
                                + '                 <th scope="col">Amount(MTD)</th>'
                                + '              </tr>'
                                + '           </thead>'
                                + '          <tbody>'
                                + '               <tr>'
                                + '                   <th scope="row">1</th>'
                                + '                    <td> Biomedical Waste Generated</td>'
                                + '                   <td>' + element.bmw_gen + '</td>'
                                + '               </tr>'
                                + '               <tr>'
                                + '                  <th scope="row">2</th>'
                                + '                  <td> Biomedical Waste Collected</td>'
                                + '                 <td>' + element.bmw_coll + '</td>'
                                + '              </tr>'
                                + '              <tr>'
                                + '                  <th scope="row">3</th>'
                                + '                    <td> Biomedical Waste Treated</td>'
                                + '                    <td>' + element.bmw_treat + '</td>'
                                + '                  </tr>'
                                + '              </tbody>'
                                + '        </table>'
                                // + '      </div>'
                                // + '     </div>'
                                + '</div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });
                $.each(hazwaste, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '      <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '      <div class="in-sec">'
                                + '        <h3   id="haz-header" class="text-center mb-2">Hazardous Waste </h3>'
                                + '     <table class="table text-center" id="haz-table">'
                                + '         <thead>'
                                + '                 <tr>'
                                + '                     <th scope="col">Sr.No.</th>'
                                + '                    <th scope="col">Input</th>'
                                + '                    <th scope="col">Amount(MTD)</th>'
                                + '                </tr>'
                                + '            </thead>'
                                + '             <tbody>'
                                + '                 <tr>'
                                + '                     <th scope="row">1</th>'
                                + '                     <td>Generated Quantity of Hazardous Waste</td>'
                                + '                     <td>' + element.hw_gen + '</td>'
                                + '                 </tr>'
                                + '                 <tr>'
                                + '                     <th scope="row">2</th>'
                                + '                     <td>Collected Quantity of Hazardous Waste</td>'
                                + '                    <td>' + element.hw_coll + '</td>'
                                + '                </tr>'
                                + '                 <tr>'
                                + '                     <th scope="row">3</th>'
                                + '                     <td>Treated Quantity of Hazardous Waste</td>'
                                + '                     <td>' + element.hw_treat + '</td>'
                                + '                 </tr>'
                                + '              </tbody>'
                                + '         </table>'
                                // + '      </div>'
                                // + '   </div>'
                                + '</div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });

                html += '</div>';
                html += '<div id="WasteWater" class="tabcontent">';
                $.each(wastewater, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '    <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '   <div class="in-sec">'
                                + '     <h3 id="ww-header" class="text-center mb-2">Wastewater </h3>'
                                + '    <table class="table text-center" id="ww-table">'
                                + '        <thead>'
                                + '          <tr>'
                                + '             <th scope="col">Sr.No</th>'
                                + '             <th scope="col">input</th>'
                                + '             <th scope="col">Value</th>'
                                + '        </tr>'
                                + '     </thead>'
                                + '     <tbody>'
                                + '         <tr>'
                                + '             <th scope="row">1</th>'
                                + '         <td>Water Consumption(CMD)</td>'
                                + '         <td>' + element.w_cons + '</td>'
                                + '     </tr>'
                                + '     <tr>'
                                + '         <th scope="row">2</th>'
                                + '         <td>Wastewater Generated(CMD)</td>'
                                + '        <td>' + element.w_gen + '</td>'
                                + '     </tr>'
                                + '     <tr>'
                                + '        <th scope="row">3</th>'
                                + '        <td>Waste water Collection(CMD)</td>'
                                + '        <td>' + element.w_coll + '</td>'
                                + '    </tr>'
                                + '      <tr>'
                                + '        <th scope="row">4</th>'
                                + '       <td>Qty of treat waste water</td>'
                                + '       <td>' + element.q_treat + '</td>'
                                + '     </tr>'
                                + '    <tr>'
                                + '        <th scope="row">5</th>'
                                + '       <td>No of STP</td>'
                                + '        <td>' + element.n_stp + '</td>'
                                + '     </tr>'
                                + '    </tbody>'
                                + '    </table>'
                                // + '   </div>'
                                // + '   </div>'
                                + '</div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });
                $.each(stp, function (index, element2) {
                    if (element2.check == "true") {

                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            // + '   <div class="col-md-8 col-lg-7 mb-3" data-aos-delay="200">'
                            // + '    <div class="in-sec">'
                            + '        <h3 id="stp-header" class="text-center mb-2"> STP</h3>'
                            + '       <table class="table text-center" id="stp-table">'
                            + '          <thead>'
                            + '             <tr>'
                            + '                <th scope="col">STP No.</th>'
                            + '               <th scope="col">Capacity</th>'
                            + '                <th scope="col">Latitude</th>'
                            + '               <th scope="col">Logitude</th>'
                            + '               <th scope="col">Technology</th>'
                            + '              <th scope="col">Recycling Water</th>'
                            + '              <th scope="col">Disposal of Waste</th>'
                            + '         </tr>'
                            + '      </thead>'
                            + '      <tbody>';
                        var stpi = 1;
                        $.each(element2.cData, function (index, element) {
                            html += '          <tr>'
                                + '              <th scope="row">' + stpi + '</th>'
                                + '              <td>' + element.cap + '</td>'
                                + '              <td>' + element.lat + '</td>'
                                + '              <td>' + element.long + '</td>'
                                + '              <td>' + element.tech + '</td>'
                                + '              <td>' + element.recycle + '</td>'
                                + '           <td>' + element.dispose + '</td>'
                                + '       </tr>';
                            stpi++;
                        });

                        html += '   </tbody>'
                            + '   </table>'
                            // + '  </div>'
                            // + '   </div>'
                            + ' </div>';

                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });

                html += '</div>';
                html += '<div id="Industry" class="tabcontent">';

                $.each(energyindu, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '     <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '<div class="in-sec">'
                                + '    <h3 id="ie-header" class="text-center mb-2"> Industrial Energy </h3>'
                                + '    <table class="table text-center" id="ie-table">'
                                + '        <thead>'
                                + '            <tr>'
                                + '                 <th scope="col">Sr.No</th>'
                                + '                  <th scope="col">Fuel Type</th>'
                                + '                  <th scope="col">Amount(MTD)</th>'
                                + '               </tr>'
                                + '            </thead>'
                                + '             <tbody>'
                                + '                 <tr>'
                                + '                     <th scope="row">1</th>'
                                + '                     <td>Coal</td>'
                                + '                     <td>' + element.coal + '</td>'
                                + '               </tr>'
                                + '                <tr>'
                                + '                    <th scope="row">2</th>'
                                + '                     <td>FO</td>'
                                + '                      <td>' + element.fo + '</td>'
                                + '                  </tr>'
                                + '                  <tr>'
                                + '                     <th scope="row">3</th>'
                                + '                       <td>LDO</td>'
                                + '                      <td>' + element.ido + '</td>'
                                + '                  </tr>'
                                + '                  <tr>'
                                + '                      <th scope="row">4</th>'
                                + '                      <td>HSD</td>'
                                + '                      <td>' + element.hsd + '</td>'
                                + '                  </tr>'
                                + '                  <tr>'
                                + '                      <th scope="row">5</th>'
                                + '                      <td>PNG</td>'
                                + '                      <td>' + element.png + '</td>'
                                + '                  </tr>'
                                + '                  <tr>'
                                + '                      <th scope="row">6</th>'
                                + '                     <td>NG</td>'
                                + '                       <td>' + element.ng + '</td>'
                                + '                   </tr>'
                                + '                   <tr>'
                                + '                      <th scope="row">7</th>'
                                + '                     <td>Briquette</td>'
                                + '                       <td>' + element.briq + '</td>'
                                + '                  </tr>'
                                + '                  <tr>'
                                + '                       <th scope="row">8</th>'
                                + '                       <td>Wood</td>'
                                + '                      <td>' + element.wood + '</td>'
                                + '                  </tr>'
                                + '              </tbody>'
                                + '           </table>'

                                // + '       </div>'
                                // + '    </div>'
                                + '</div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });
                $.each(ppcement, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '     <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '       <div class="in-sec">'
                                + '          <h3 id="cpp-header"  class="text-center mb-2">Industrial Process and Product (Cement) </h3>'
                                + '         <table class="table text-center" id="cpp-table" >'
                                + '               <thead>'
                                + '                  <tr>'
                                + '                      <th scope="col">Sr.No</th>'
                                + '                      <th scope="col">Cement Type</th>'
                                + '                      <th scope="col">Amount(tons/year)</th>'
                                + '                  </tr>'
                                + '              </thead>'
                                + '              <tbody>'
                                + '                  <tr>'
                                + '                       <th scope="row">1</th>'
                                + '                       <td>O.P.C.</td>'
                                + '                      <td>' + element.cem_opc + '</td>'
                                + '                  </tr>'
                                + '                  <tr>'
                                + '                       <th scope="row">2</th>'
                                + '                      <td>P.P.C.</td>'
                                + '                  <td>' + element.cem_ppc + '</td>'
                                + '                </tr>'
                                + '               <tr>'
                                + '                  <th scope="row">3</th>'
                                + '                  <td>P.B.F.S.</td>'
                                + '                  <td>' + element.cem_pbfs + '</td>'
                                + '              </tr>'
                                + '              <tr>'
                                + '                  <th scope="row">4</th>'
                                + '                <td>S.R.C.</td>'
                                + '               <td>' + element.cem_src + '</td>'
                                + '           </tr>'
                                + '           <tr>'
                                + '               <th scope="row">5</th>'
                                + '                <td>I.R.S.T.40</td>'
                                + '               <td>' + element.cem_irst40 + '</td>'
                                + '            </tr>'
                                + '         </tbody>'
                                + '        </table>'

                                // + '      </div>'
                                // + '    </div>'
                                + '</div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });
                $.each(ppchemical, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '    <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '     <div class="in-sec">'
                                + '        <h3 id="chpp-header"  class="text-center mb-2"> Industrial Process and Product (Chemical) </h3>'
                                + '        <table class="table text-center" id="chpp-table">'
                                + '          <thead>'
                                + '              <tr>'
                                + '                  <th scope="col">Sr.No</th>'
                                + '              <th scope="col">Chemical type</th>'
                                + '             <th scope="col">Amount(tons/year)</th>'
                                + '          </tr>'
                                + '      </thead>'
                                + '     <tbody>'
                                + '      <tr>'
                                + '            <th scope="row">1</th>'
                                + '            <td>Ammonia</td>'
                                + '           <td>' + element.chem_ammo + '</td>'
                                + '       </tr>'
                                + '       <tr>'
                                + '            <th scope="row">2</th>'
                                + '            <td>Inorganic Acids</td>'
                                + '            <td>' + element.chem_inorg_a + '</td>'
                                + '        </tr>'
                                + '        <tr>'
                                + '            <th scope="row">3</th>'
                                + '            <td>Amides</td>'
                                + '            <td>' + element.chem_amides + '</td>'
                                + '        </tr>'
                                + '        <tr>'
                                + '          <th scope="row">4</th>'
                                + '         <td>Aldehydes</td>'
                                + '        <td>' + element.chem_aldeh + '</td>'
                                + '      </tr>'
                                + '    <tr>'
                                + '        <th scope="row">5</th>'
                                + '       <td>Organic Acids</td>'
                                + '      <td>' + element.chem_organic + '</td>'
                                + '   </tr>'
                                + '   <tr>'
                                + '       <th scope="row">6</th>'
                                + '       <td>Carbides</td>'
                                + '     <td>' + element.chem_carb + '</td>'
                                + '   </tr>'
                                + '   <tr>'
                                + '     <th scope="row">7</th>'
                                + '    <td>Soda Ash</td>'
                                + '    <td>' + element.chem_sodaa + '</td>'
                                + '    </tr>'
                                + '   <tr>'
                                + '        <th scope="row">8</th>'
                                + '      <td>Alcohols</td>'
                                + '     <td>' + element.chem_alco + '</td>'
                                + '    </tr>'
                                + '   <tr>'
                                + '       <th scope="row">9</th>'
                                + '      <td>Alkenes</td>'
                                + '      <td>' + element.chem_alke + '</td>'
                                + '   </tr>'
                                + '  <tr>'
                                + '     <th scope="row">10</th>'
                                + '     <td>Organochlorides</td>'
                                + '     <td>' + element.chem_orgo_charo + '</td>'
                                + '   </tr>'
                                + '      <tr>'
                                + '        <th scope="row">11</th>'
                                + '       <td>Oxide Compounds</td>'
                                + '      <td>' + element.chem_oxideC + '</td>'
                                + '    </tr>'
                                + '   <tr>'
                                + '      <th scope="row">12</th>'
                                + '     <td>Cyanide Compounds</td>'
                                + '     <td>' + element.chem_cyanideC + '</td>'
                                + '     </tr>'
                                + '   <tr>'
                                + '    <th scope="row">13</th>'
                                + '    <td>Carbon Black</td>'
                                + '    <td>' + element.chem_carbonB + '</td>'
                                + '   </tr>'
                                + '   </tbody>'
                                + '    </table>'
                                // + '   </div>'
                                // + '   </div>'
                                + '</div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });
                $.each(indu_other, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '    <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '   <div class="in-sec">'
                                + '       <h3  id="alu-header"  class="text-center mb-2">Industrial Process and Product (Aluminium) </h3>'
                                + '      <table class="table text-center"  id="alu-table" >'
                                + '          <thead>'
                                + '             <tr>'
                                + '                <th scope="col">Sr.No</th>'
                                + '               <th scope="col">Input</th>'
                                + '              <th scope="col">Amount(tons/year)</th>'
                                + '         </tr>'
                                + '     </thead>'
                                + '   <tbody>'
                                + '      <tr>'
                                + '          <th scope="row">1</th>'
                                + '          <td>Aluminium</td>'
                                + '         <td>' + element.other_aluminium + '</td>'
                                + '        </tr>'
                                + '     </tbody>'
                                + '     </table>'
                                // + '   </div>'
                                // + '   </div>'
                                + '     </div>';
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '   <div class="in-sec">'
                                + '      <h3 id="ld-header" class="text-center mb-2"> Industrial Process and Product (Lead) </h3>'
                                + '       <table class="table  text-center" id="ld-table">'
                                + '       <thead>'
                                + '          <tr>'
                                + '             <th scope="col">Sr.No</th>'
                                + '           <th scope="col">Input</th>'
                                + '            <th scope="col">Amount(tons/year)</th>'
                                + '       </tr>'
                                + '   </thead>'
                                + '   <tbody>'
                                + '       <tr>'
                                + '           <th scope="row">1</th>'
                                + '           <td>Lead</td>'
                                + '           <td>' + element.other_lead + '</td>'
                                + '       </tr>'
                                + '    </tbody>'
                                + '   </table>'
                                // + '   </div>'
                                // + '   </div>'
                                + ' </div>';
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                // + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                // + '     <div class="in-sec">'
                                + '       <h3  id="zg-header" class="text-center mb-2"> Industrial Process and Product (Zinc) </h3>'
                                + '        <table class="table text-center"  id="zg-table">'
                                + '           <thead>'
                                + '               <tr>'
                                + '                   <th scope="col">Sr.No</th>'
                                + '                   <th scope="col">Input</th>'
                                + '                  <th scope="col">Amount(tons/year)</th>'
                                + '              </tr>'
                                + '          </thead>'
                                + '           <tbody>'
                                + '              <tr>'
                                + '                <th scope="row">1</th>'
                                + '                <td>Zinc</td>'
                                + '                <td>' + element.other_zinc + '</td>'
                                + '             </tr>'
                                + '          </tbody>'
                                + '       </table>'
                                // + '     </div>'
                                // + '    </div>'
                                + '</div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + '</div>';
                    }
                });

                html += '</div>';
                $.each(cooking, function (index, element2) {

                    if (element2.check == "true") {

                        html += '  <div id="CookingFuel" class="tabcontent"><div class="row  align-items-center justify-content-center mt-3">'
                            // + ' <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '    <div class="in-sec">'
                            + '       <h3 id="ck-header" class="text-center mb-2">Cooking Fuel </h3>'
                            + '      <table class="table text-center" id="ck-table">'
                            + '          <thead>'
                            + '              <tr>'
                            + '                  <th scope="col">Sr.No</th>'
                            + '                  <th scope="col">Cooking Fuel</th>'
                            + '                  <th scope="col">Amount</th>'
                            + '              </tr>'
                            + '          </thead>'
                            + '          <tbody>';

                        $.each(element2.cData, function (index, element) {

                            if (element.type == "LPG") {
                                html += '              <tr>'
                                    + '                  <th scope="row">1</th>'
                                    + '                   <td>Residential LPG</td>'
                                    + '                   <td>' + element.resi + '</td>'
                                    + '               </tr>'
                                    + '               <tr>'
                                    + '                    <th scope="row">2</th>'
                                    + '                  <td>Commercial LPG</td>'
                                    + '                  <td>' + element.comm + '</td>'
                                    + '              </tr>';
                            }
                            if (element.type == "MNGL") {
                                html += '              <tr>'
                                    + '                   <th scope="row">3</th>'
                                    + '                   <td>Residential MNGL</td>'
                                    + '                   <td>' + element.resi + '</td>'
                                    + '              </tr>'
                                    + '              <tr>'
                                    + '                 <th scope="row">4</th>'
                                    + '                 <td>Commercial MNGL</td>'
                                    + '                <td>' + element.comm + '</td>'
                                    + '            </tr>';
                            }
                            if (element.type == "KERO") {
                                html += '<tr>'
                                    + '  <th scope="row">5</th>'
                                    + '  <td>Residential Kerosene</td>'
                                    + ' <td>' + element.resi + '</td>'
                                    + '  </tr>'
                                    + '  <tr>'
                                    + '      <th scope="row">6</th>'
                                    + '     <td>Commercial Kerosene</td>'
                                    + '    <td>' + element.comm + '</td>'
                                    + '  </tr>';
                            }
                            if (element.type == "WOOD") {
                                html += '   <tr>'
                                    + '     <th scope="row">7</th>'
                                    + '     <td>Residential Wood</td>'
                                    + '     <td>' + element.resi + '</td>'
                                    + ' </tr>'
                                    + '   <tr>'
                                    + '     <th scope="row">8</th>'
                                    + '     <td>Commercial Wood</td>'
                                    + '     <td>' + element.comm + '</td>'
                                    + '   </tr>';
                            }
                        });

                        html += '  </tbody>'
                            + ' </table>'

                            // + ' </div>'
                            // + '   </div>'
                            + ' </div></div>';

                    }
                    else {
                        html += ' <div id="CookingFuel" class="tabcontent"><div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            // + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            // + '      </div>'
                            + '</div>'
                            + ' </div></div>';
                    }
                });

            });
        }
    });


    $("#sectorInfo").append(html);


}