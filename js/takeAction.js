$(document).ready(function () {
    // actionchart();
    // showEleInput();
})

/////////
//     < style >
// #chartdiv {
//     width: 100 %;
//     height: 500px;
// }
// </style >

// <!--Chart code-- >

am5.ready(function () {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("actionchart");


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "panX",
        wheelY: "zoomX",
        layout: root.verticalLayout
    }));
    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    // chart.set("scrollbarX", am5.Scrollbar.new(root, {
    //     orientation: "horizontal"
    // }));


    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(
        am5.Legend.new(root, {
            centerX: am5.p50,
            x: am5.p50
        })
    );

    var data = [{
        "year": "2022",
        "Electricity": 2.5,
        "Transport": 2.5,
        "AFOLU": 2.1,
        "MSW": 1,
        "Industries": 0.8
    }, {
        "year": "2022 with Action plan",
        "Electricity": 2.6,
        "Transport": 2.7,
        "AFOLU": 2.2,
        "MSW": 0.5,
        "Industries": 0.4
    },
    {
        "year": "2030  with Action plan",
        "Electricity": 3.6,
        "Transport": 1.7,
        "AFOLU": 2.5,
        "MSW": 1.5,
        "Industries": 1.4
    },
    {
        "year": "2050  with Action plan",
        "Electricity": 2.8,
        "Transport": 2.9,
        "AFOLU": 2.4,
        "MSW": 0.3,
        "Industries": 0.9
    }]


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xRenderer = am5xy.AxisRendererX.new(root, {
        cellStartLocation: 0.1,
        cellEndLocation: 0.9
    });
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        categoryField: "year",
        renderer: xRenderer,
        tooltip: am5.Tooltip.new(root, {})
    }));
    xAxis.children.moveValue(am5.Label.new(root, {
        text: "Year",
        fill: am5.color(0xFFFFFF),
        x: am5.p50,
        centerX: am5.p50
    }), xAxis.children.length - 1);

    xRenderer.grid.template.set("visible", false);
    xRenderer.labels.template.setAll({
        fill: am5.color(0xFFFFFF)
    });
    xAxis.data.setAll(data);

    var yRenderer = am5xy.AxisRendererY.new(root, {});
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        renderer: yRenderer
    }));

    yAxis.children.moveValue(am5.Label.new(root, {
        rotation: -90,
        text: "Emissions(ktons/year)",
        fill: am5.color(0xFFFFFF),
        y: am5.p50,
        centerX: am5.p50
    }), 0);

    yRenderer.grid.template.set("visible", false);
    yRenderer.labels.template.setAll({
        fill: am5.color(0xFFFFFF)
    });


    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: name,
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: fieldName,
            categoryXField: "year"
        }));

        series.columns.template.setAll({
            tooltipText: "{name}, {categoryX}:{valueY}",
            width: am5.percent(90),
            tooltipY: 0
        });

        series.data.setAll(data);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();

        series.bullets.push(function () {
            return am5.Bullet.new(root, {
                locationY: 0,
                sprite: am5.Label.new(root, {
                    text: "{valueY}",
                    fill: root.interfaceColors.get("alternativeText"),
                    centerY: 0,
                    centerX: am5.p50,
                    populateText: true
                })
            });
        });
        legend.labels.template.setAll({
            fill: am5.color(0xFFFFFF)
        });

        legend.data.push(series);
    }

    makeSeries("Electricity", "Electricity");
    makeSeries("Transport", "Transport");
    makeSeries("AFOLU", "AFOLU");
    makeSeries("MSW", "MSW");
    makeSeries("Industries", "Industries");
    // makeSeries("Africa", "africa");


    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);

}); // end am5.ready()






////////


// function showEleInput() {
//     var html = '';
//     html = html = '<div class="row justify-content-center">'
//         + ' <h3 class="text-center mt-3">Take Action for 2022   </h3>'
//         + ' <h4 class="text-center mt-3">Electricity</h4>'
//         + '   <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '       <label for="residential" class="form-label">Renewable Energy.</label>'
//         + '       <div class="input-group mb-2">'
//         + '           <input type="text" id="residential" name="residential" class="form-control" placeholder="" aria-label="Residential" aria-describedby="basic-addon2">'
//         + '           <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '        <label for="commercial" class="form-label">Carbon Capture in TPP.</label>'
//         + '        <div class="input-group mb-2">'
//         + '            <input type="text" id="commercial" name="commercial" class="form-control" placeholder="  " aria-label="Commercial" aria-describedby="basic-addon2">'
//         + '            <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '</div>'
//         + '<div class="row justify-content-center">'
//         + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '        <label for="waterBodies" class="form-label"> Smart homes & utilities.</label>'
//         + '        <div class="input-group mb-2">'
//         + '            <input type="text" id="waterBodies" name="waterBodies" class="form-control" placeholder="" aria-label="Water Bodies" aria-describedby="basic-addon2">'
//         + '            <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '</div>'
//         + ' <h4 class="text-center mt-3">Transport</h4>'
//         + '   <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '       <label for="residential" class="form-label">EV Policy.</label>'
//         + '       <div class="input-group mb-2">'
//         + '           <input type="text" id="residential" name="residential" class="form-control" placeholder="" aria-label="Residential" aria-describedby="basic-addon2">'
//         + '           <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '        <label for="commercial" class="form-label">Public Transport.</label>'
//         + '        <div class="input-group mb-2">'
//         + '            <input type="text" id="commercial" name="commercial" class="form-control" placeholder="  " aria-label="Commercial" aria-describedby="basic-addon2">'
//         + '            <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '   <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '       <label for="residential" class="form-label">NMT</label>'
//         + '       <div class="input-group mb-2">'
//         + '           <input type="text" id="residential" name="residential" class="form-control" placeholder="" aria-label="Residential" aria-describedby="basic-addon2">'
//         + '           <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '        <label for="commercial" class="form-label">Intro of Congestion tax.</label>'
//         + '        <div class="input-group mb-2">'
//         + '            <input type="text" id="commercial" name="commercial" class="form-control" placeholder="  " aria-label="Commercial" aria-describedby="basic-addon2">'
//         + '            <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + ' <h4 class="text-center mt-3">AFOLU</h4>'
//         + '   <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '       <label for="residential" class="form-label">Sustainable Agricultural</label>'
//         + '       <div class="input-group mb-2">'
//         + '           <input type="text" id="residential" name="residential" class="form-control" placeholder="" aria-label="Residential" aria-describedby="basic-addon2">'
//         + '           <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '        <label for="commercial" class="form-label">Manage Livestock </label>'
//         + '        <div class="input-group mb-2">'
//         + '            <input type="text" id="commercial" name="commercial" class="form-control" placeholder="  " aria-label="Commercial" aria-describedby="basic-addon2">'
//         + '            <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + ' <h4 class="text-center mt-3">Waste Sector</h4>'
//         + '   <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '       <label for="residential" class="form-label">Reducing waste</label>'
//         + '       <div class="input-group mb-2">'
//         + '           <input type="text" id="residential" name="residential" class="form-control" placeholder="" aria-label="Residential" aria-describedby="basic-addon2">'
//         + '           <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '        <label for="commercial" class="form-label">Increase waste compost</label>'
//         + '        <div class="input-group mb-2">'
//         + '            <input type="text" id="commercial" name="commercial" class="form-control" placeholder="  " aria-label="Commercial" aria-describedby="basic-addon2">'
//         + '            <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + ' <h4 class="text-center mt-3">Industry Sector</h4>'
//         + '   <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '       <label for="residential" class="form-label">Coal Policy.</label>'
//         + '       <div class="input-group mb-2">'
//         + '           <input type="text" id="residential" name="residential" class="form-control" placeholder="" aria-label="Residential" aria-describedby="basic-addon2">'
//         + '           <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '        <label for="commercial" class="form-label">FO Policy.</label>'
//         + '        <div class="input-group mb-2">'
//         + '            <input type="text" id="commercial" name="commercial" class="form-control" placeholder="  " aria-label="Commercial" aria-describedby="basic-addon2">'
//         + '            <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '</div>'
//         + '<div class="row justify-content-center">'
//         + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '        <label for="waterBodies" class="form-label">Eradication of Wood.</label>'
//         + '        <div class="input-group mb-2">'
//         + '            <input type="text" id="waterBodies" name="waterBodies" class="form-control" placeholder="" aria-label="Water Bodies" aria-describedby="basic-addon2">'
//         + '            <span class="input-group-text" id="basic-addon-2">%</span>'
//         + '        </div>'
//         + '    </div>'
//         + '    <div class="col-md-6 col-lg-10 col-xl-6 col-10">'
//         + '</div>'
//         + '    </div>'
//     $("#eleInputTakeAction").append(html);
// }



// function actionchart() {
//     var basicId = document.getElementById("basicId").value;
//     var myobj = {};
//     myobj["basicId"] = basicId;
//     $.ajax({
//         type: "POST",
//         async: false,
//         url: "php/actiongraph.php",
//         contentType: "application/json",
//         data: JSON.stringify(myobj),
//         success: function (data) {
//             var datalist = JSON.parse(data);
//             $.each(datalist, function (index, element) {
//                 var cData = element.data;
//                 am5.ready(function () {
//                     // Create root element
//                     // https://www.amcharts.com/docs/v5/getting-started/#Root_element
//                     var root = am5.Root.new("actionchart");
//                     // Set themes
//                     // https://www.amcharts.com/docs/v5/concepts/themes/
//                     root.setThemes([
//                         am5themes_Animated.new(root)
//                     ]);
//                     // Create chart
//                     // https://www.amcharts.com/docs/v5/charts/xy-chart/
//                     var chart = root.container.children.push(am5xy.XYChart.new(root, {
//                         panX: true,
//                         panY: false,
//                         wheelX: "panX",
//                         wheelY: "zoomX",
//                         layout: root.verticalLayout
//                     }));
//                     // Add scrollbar
//                     // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
//                     chart.set("scrollbarX", am5.Scrollbar.new(root, {
//                         orientation: "horizontal"
//                     }));
//                     var data = cData;
//                     // Create axes
//                     // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
//                     var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
//                     var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
//                         categoryField: "Sectore",
//                         // renderer: am5xy.AxisRendererX.new(root, {}),
//                         renderer: xRenderer,
//                         tooltip: am5.Tooltip.new(root, {
//                             themeTags: ["axis"],
//                             animationDuration: 200
//                         })
//                     }));
//                     xAxis.children.moveValue(am5.Label.new(root, {
//                         text: "Sectores",
//                         fill: am5.color(0xFFFFFF),
//                         x: am5.p50,
//                         centerX: am5.p50
//                     }), xAxis.children.length - 1);
//                     xRenderer.grid.template.set("visible", false);
//                     xRenderer.labels.template.setAll({
//                         fill: am5.color(0xFFFFFF)
//                     });
//                     xAxis.data.setAll(data);
//                     var yRenderer = am5xy.AxisRendererY.new(root, {});
//                     var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
//                         min: 0,
//                         // renderer: am5xy.AxisRendererY.new(root, {})
//                         renderer: yRenderer
//                     }));
//                     yAxis.children.moveValue(am5.Label.new(root, {
//                         rotation: -90,
//                         text: "Emissions(kt/year)",
//                         fill: am5.color(0xFFFFFF),
//                         y: am5.p50,
//                         centerX: am5.p50
//                     }), 0);
//                     yRenderer.grid.template.setAll({
//                         strokeDasharray: [2, 2],
//                     });
//                     yRenderer.labels.template.setAll({
//                         fill: am5.color(0xFFFFFF)
//                     });
//                     // Add series
//                     // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
//                     var series0 = chart.series.push(am5xy.ColumnSeries.new(root, {
//                         name: "Income",
//                         xAxis: xAxis,
//                         yAxis: yAxis,
//                         valueYField: "emission",
//                         categoryXField: "Sectore",
//                         clustered: false,
//                         tooltip: am5.Tooltip.new(root, {
//                             labelText: "Emission: {valueY}"
//                         })
//                     }));
//                     series0.columns.template.setAll({
//                         width: am5.percent(80),
//                         tooltipY: 0
//                     });
//                     series0.data.setAll(data);
//                     var series1 = chart.series.push(am5xy.ColumnSeries.new(root, {
//                         name: "Income",
//                         xAxis: xAxis,
//                         yAxis: yAxis,
//                         valueYField: "changeemi",
//                         categoryXField: "Sectore",
//                         clustered: false,
//                         tooltip: am5.Tooltip.new(root, {
//                             labelText: "Post Intervention: {valueY}"
//                         })
//                     }));
//                     series1.columns.template.setAll({
//                         width: am5.percent(50),
//                         tooltipY: 0
//                     });
//                     series1.data.setAll(data);
//                     var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
//                     // Make stuff animate on load
//                     // https://www.amcharts.com/docs/v5/concepts/animations/
//                     chart.appear(1000, 100);
//                     series0.appear();
//                     series1.appear();
//                 });
//             });       // end am5.ready())
//         }
//     });
// }

