function showInput() {
    var html = '';

    var city = document.getElementById("cityList").value;
    $("#eleInput").empty();

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

                $.each(electricity, function (index, element2) {
                    if (element2.check == "true") {

                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '    <div class="in-sec">'
                                + '        <h3 class="text-center mb-2"> Input Values of Electricity Sector</h3>'
                                + '        <table class="table text-center">'
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

                                + '  </div>'
                                + '   </div>'
                                + ' </div> ';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }

                });
                $.each(transport, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + ' <div class="in-sec">'
                                + '     <h3 class="text-center mb-2"> Input Values of Transport Sector</h3>'
                                + '    <table class="table text-center">'
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

                                + '  </div>'
                                + '   </div>'
                                + ' </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(cropland, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '  <div class="in-sec">'
                                + '      <h3 class="text-center mb-2"> Input Values of Crop Land Sector</h3>'
                                + '      <table class="table text-center">'
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
                                + '                    <td>Area Occupied by Agricultural Land</td>'
                                + '                    <td>' + element.area + '</td>'
                                + '                 </tr>'
                                + '             </tbody>'
                                + '         </table>'
                                + '      </div>'
                                + '</div>'
                                + ' </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(livestock, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += ' <div class="row  align-items-center justify-content-center mt-3">'
                                + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '  <div class="in-sec">'
                                + '     <h3 class="text-center mb-2"> Input Values of Livestock Sector</h3>'
                                + '    <table class="table text-center">'
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

                                + ' </div>'
                                + '  </div>'
                                + '   </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(forest, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html + '<div class="row  align-items-center justify-content-center mt-3">'
                                + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '     <div class="in-sec">'
                                + '      <h3 class="text-center mb-2"> Input Values of Forest Land Sector</h3>'
                                + '      <table class="table text-center">'
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
                                + '               <td>Area under Forest Land</td>'
                                + '               <td>' + element.area + '</td>'
                                + '            </tr>'
                                + '        </tbody>'
                                + '     </table>'
                                + '    </div>'
                                + '    </div>'
                                + '   </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(landuse, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '  <div class="row  align-items-center justify-content-center mt-3">'
                                + '  <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '     <div class="in-sec">'
                                + '       <h3 class="text-center mb-2"> Input Values of Land Use Sector</h3>'
                                + '      <table class="table text-center">'
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
                                + '  </div>'
                                + ' </div>'
                                + '  </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(solidwaste, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '      <div class="in-sec">'
                                + '        <h3 class="text-center mb-2"> Input Values of Municipal Solid Waste Sector</h3>'
                                + '      <table class="table text-center">'
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
                                + '     </div>'
                                + '   </div>'
                                + ' </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(yard, function (index, element2) {
                    if (element2.check == "true") {

                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '      <div class="in-sec">'
                            + '       <h3 class="text-center mb-2"> Input Values of Dumping Yards</h3>'
                            + '      <table class="table text-center">'
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
                            + '   </div>'
                            + '   </div>'
                            + '   </div>';

                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(biomwaste, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '       <div class="in-sec">'
                                + '          <h3 class="text-center mb-2"> Input Values of Biomedical Waste Sector</h3>'
                                + '        <table class="table text-center">'
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
                                + '      </div>'
                                + '     </div>'
                                + '     </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(hazwaste, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '     <div class="row  align-items-center justify-content-center mt-3">'
                                + '      <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '      <div class="in-sec">'
                                + '        <h3 class="text-center mb-2"> Input Values of Hazardous Waste Sector</h3>'
                                + '     <table class="table text-center">'
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
                                + '      </div>'
                                + '   </div>'
                                + '  </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(wastewater, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '    <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '   <div class="in-sec">'
                                + '     <h3 class="text-center mb-2"> Input Values of Wastewater Sector</h3>'
                                + '    <table class="table text-center">'
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
                                + '   </div>'
                                + '   </div>'
                                + '     </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(stp, function (index, element2) {
                    if (element2.check == "true") {

                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '   <div class="col-md-8 col-lg-8 mb-3" data-aos-delay="200">'
                            + '    <div class="in-sec">'
                            + '        <h3 class="text-center mb-2"> Input Values of STP</h3>'
                            + '       <table class="table text-center">'
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
                            + '  </div>'
                            + '   </div>'
                            + '  </div>';

                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(energyindu, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '     <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '<div class="in-sec">'
                                + '    <h3 class="text-center mb-2"> Input Values of Industrial Energy Use Sector</h3>'
                                + '    <table class="table text-center">'
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

                                + '       </div>'
                                + '    </div>'
                                + ' </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(ppcement, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '     <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '       <div class="in-sec">'
                                + '          <h3 class="text-center mb-2"> Input Values of Industrial Process and Product (Cement) Sector</h3>'
                                + '         <table class="table text-center">'
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

                                + '      </div>'
                                + '    </div>'
                                + '  </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(ppchemical, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '    <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '     <div class="in-sec">'
                                + '        <h3 class="text-center mb-2"> Input Values of Industrial Process and Product (Chemical) Sector</h3>'
                                + '        <table class="table text-center">'
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
                                + '   </div>'
                                + '   </div>'
                                + '  </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });
                $.each(indu_other, function (index, element2) {
                    if (element2.check == "true") {
                        $.each(element2.cData, function (index, element) {
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '    <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '   <div class="in-sec">'
                                + '       <h3 class="text-center mb-2"> Input Values of Industrial Process and Product (Aluminium) Sector</h3>'
                                + '      <table class="table text-center">'
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
                                + '   </div>'
                                + '   </div>'
                                + '     </div>';
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '   <div class="in-sec">'
                                + '      <h3 class="text-center mb-2"> Input Values of Industrial Process and Product (Lead) Sector</h3>'
                                + '       <table class="table  text-center">'
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
                                + '   </div>'
                                + '   </div>'
                                + ' </div>';
                            html += '<div class="row  align-items-center justify-content-center mt-3">'
                                + '   <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                                + '     <div class="in-sec">'
                                + '       <h3 class="text-center mb-2"> Input Values of Industrial Process and Product (Zinc) Sector</h3>'
                                + '        <table class="table text-center">'
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
                                + '     </div>'
                                + '    </div>'
                                + '  </div>';
                        });
                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });

                $.each(cooking, function (index, element2) {

                    if (element2.check == "true") {

                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + ' <div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '    <div class="in-sec">'
                            + '       <h3 class="text-center mb-2"> Input Values of Cooking Fuel Sector</h3>'
                            + '      <table class="table text-center">'
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

                            + ' </div>'
                            + '   </div>'
                            + ' </div>';

                    }
                    else {
                        html += '<div class="row  align-items-center justify-content-center mt-3">'
                            + '<div class="col-md-6 col-lg-6 mb-3" data-aos-delay="200">'
                            + '  <div class="in-sec">'
                            + '      <h3 class="text-center mb-2"> Data NOT Found</h3>'
                            + '      </div>'
                            + '</div>'
                            + ' </div>';
                    }
                });

            });
        }
    });

    $("#sectorInfo").append(html);

}