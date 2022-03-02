$(document).ready(function () {
    actionchart();

    var rangeE1 = $('.input-rangeE1'),
        valueE1 = $('.range-valueE1');
    valueE1.html(rangeE1.attr('value'));
    rangeE1.on('input', function () {
        var value = document.getElementById("ele1").value;
        alert(value);
    })






    // var rangeE1 = $('.input-rangeE1'),
    //     valueE1 = $('.range-valueE1');
    // valueE1.html(rangeE1.attr('value'));
    // rangeE1.on('input', function () {
    //     var myArray = [];
    //     myArray.push(document.getElementById("ele1").max - document.getElementById("ele1").value);
    //     myArray.push(document.getElementById("ele2").max - document.getElementById("ele2").value);
    //     myArray.push(document.getElementById("ele3").max - document.getElementById("ele3").value);

    //     valueE1.html(this.value);

    //     reduceElect(myArray);
    // });
    // var rangeE2 = $('.input-rangeE2'),
    //     valueE2 = $('.range-valueE2');
    // valueE2.html(rangeE2.attr('value'));
    // rangeE2.on('input', function () {
    //     var myArray = [];
    //     myArray.push(document.getElementById("ele1").max - document.getElementById("ele1").value);
    //     myArray.push(document.getElementById("ele2").max - document.getElementById("ele2").value);
    //     myArray.push(document.getElementById("ele3").max - document.getElementById("ele3").value);

    //     valueE2.html(this.value);
    //     reduceElect(myArray);
    // });
    // var rangeE3 = $('.input-rangeE3'),
    //     valueE3 = $('.range-valueE3');
    // valueE3.html(rangeE3.attr('value'));
    // rangeE3.on('input', function () {
    //     var myArray = [];
    //     myArray.push(document.getElementById("ele1").max - document.getElementById("ele1").value);
    //     myArray.push(document.getElementById("ele2").max - document.getElementById("ele2").value);
    //     myArray.push(document.getElementById("ele3").max - document.getElementById("ele3").value);

    //     valueE3.html(this.value);
    //     reduceElect(myArray);
    // });
})

function actionchart() {

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
            panX: true,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            layout: root.verticalLayout
        }));

        // Add scrollbar
        // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
        chart.set("scrollbarX", am5.Scrollbar.new(root, {
            orientation: "horizontal"
        }));

        var data = [{
            "Sectore": "Electricity",
            "emission": 3,
            "changeemi": 4.2
        }, {
            "Sectore": "Transport",
            "emission": 1.7,
            "changeemi": 3.1
        }, {
            "Sectore": "AFOLU",
            "emission": 2.8,
            "changeemi": 2.9
        }, {
            "Sectore": "Waste",
            "emission": 2.6,
            "changeemi": 2.3
        },
        {
            "Sectore": "Industry",
            "emission": 2.6,
            "changeemi": 4.9
        }];

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "Sectore",
            // renderer: am5xy.AxisRendererX.new(root, {}),
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {
                themeTags: ["axis"],
                animationDuration: 200
            })
        }));
        xAxis.children.moveValue(am5.Label.new(root, {
            text: "Sectors",
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
            min: 0,
            // renderer: am5xy.AxisRendererY.new(root, {})
            renderer: yRenderer
        }));
        yAxis.children.moveValue(am5.Label.new(root, {
            rotation: -90,
            text: "Emissions(milliontons/year)",
            fill: am5.color(0xFFFFFF),
            y: am5.p50,
            centerX: am5.p50
        }), 0);

        yRenderer.grid.template.setAll({
            strokeDasharray: [2, 2],

        });
        yRenderer.labels.template.setAll({
            fill: am5.color(0xFFFFFF)
        });

        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/

        var series0 = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: "Income",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "emission",
            categoryXField: "Sectore",
            clustered: false,
            tooltip: am5.Tooltip.new(root, {
                labelText: "Emission: {valueY}"
            })
        }));

        series0.columns.template.setAll({
            width: am5.percent(80),
            tooltipY: 0
        });


        series0.data.setAll(data);


        var series1 = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: "Income",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "changeemi",
            categoryXField: "Sectore",
            clustered: false,
            tooltip: am5.Tooltip.new(root, {
                labelText: "Post Intervention: {valueY}"
            })
        }));

        series1.columns.template.setAll({
            width: am5.percent(50),
            tooltipY: 0
        });

        series1.data.setAll(data);

        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);
        series0.appear();
        series1.appear();

    }); // end am5.ready())


}

// new graph
// function actionchart() {
//     am5.ready(function () {
//         // Create root element
//         // https://www.amcharts.com/docs/v5/getting-started/#Root_element
//         var root = am5.Root.new("actionchart");
//         // Set themes
//         // https://www.amcharts.com/docs/v5/concepts/themes/
//         root.setThemes([
//             am5themes_Animated.new(root)
//         ]);
//         // Create chart
//         // https://www.amcharts.com/docs/v5/charts/xy-chart/
//         var chart = root.container.children.push(
//             am5xy.XYChart.new(root, {
//                 panX: false,
//                 panY: false,
//                 wheelX: "panX",
//                 wheelY: "zoomX",
//                 layout: root.horizontalLayout,
//                 arrangeTooltips: false
//             })
//         );
//         // Use only absolute numbers
//         root.numberFormatter.set("numberFormat", "#.");
//         // Add legend
//         // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
//         var legend = chart.children.push(
//             am5.Legend.new(root, {
//                 centerX: am5.p50,
//                 x: am5.p50
//             })
//         );
//         // Data
//         var data = [{
//             category: "Electrisity",
//             negative1: -3.2,
//             // negative2: -0.9,
//             positive1: 9.2,
//             positive2: 3.2
//         }, {
//             category: "Transport",
//             negative1: -1.7,
//             // negative2: -4,
//             positive1: 11.2,
//             positive2: 1.7
//         }, {
//             category: "AFOLU",
//             negative1: -2.8,
//             // negative2: -10,
//             positive1: 8.9,
//             positive2: 2.8
//         }, {
//             category: "Waste",
//             negative1: -2.6,
//             // negative2: -13,
//             positive1: 6.2,
//             positive2: 2.6
//         }, {
//             category: "Industry",
//             negative1: -2.6,
//             // negative2: -19,
//             positive1: 15.9,
//             positive2: 2.6
//         }];
//         // Create axes
//         // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
//         var yAxis = chart.yAxes.push(
//             am5xy.CategoryAxis.new(root, {
//                 categoryField: "category",
//                 renderer: am5xy.AxisRendererY.new(root, {
//                     inversed: true,
//                     cellStartLocation: 0.1,
//                     cellEndLocation: 0.9
//                 })
//             })
//         );
//         xRenderer.grid.template.set("visible", false);
//         xRenderer.labels.template.setAll({
//             fill: am5.color(0xFFFFFF)
//         });

//         yAxis.data.setAll(data);

//         var xAxis = chart.xAxes.push(
//             am5xy.ValueAxis.new(root, {
//                 calculateTotals: true,
//                 min: -100,
//                 max: 100,
//                 renderer: am5xy.AxisRendererX.new(root, {
//                     minGridDistance: 50
//                 })
//             })
//         );
//         var xRenderer = yAxis.get("renderer");
//         xRenderer.axisFills.template.setAll({
//             // fill: am5.color(0x000000),
//             fill: am5.color(0xFFFFFF),
//             fillOpacity: 0.05,
//             visible: true
//         });
//         xAxis.children.moveValue(am5.Label.new(root, {
//             text: "Sectors",
//             fill: am5.color(0xFFFFFF),
//             x: am5.p50,
//             centerX: am5.p50
//         }), xAxis.children.length - 1);

//         xRenderer.grid.template.set("visible", false);
//         xRenderer.labels.template.setAll({
//             fill: am5.color(0xFFFFFF)
//         });

//         // Add series
//         // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
//         function createSeries(field, name, color) {
//             var series = chart.series.push(
//                 am5xy.ColumnSeries.new(root, {
//                     xAxis: xAxis,
//                     yAxis: yAxis,
//                     name: name,
//                     valueXField: field,
//                     valueXShow: "valueXTotalPercent",
//                     categoryYField: "category",
//                     sequencedInterpolation: true,
//                     stacked: true,
//                     fill: color,
//                     stroke: color,
//                     calculateAggregates: true
//                 })
//             );
//             series.columns.template.setAll({
//                 height: am5.p100
//             });
//             series.bullets.push(function (root, series) {
//                 return am5.Bullet.new(root, {
//                     locationX: 0.5,
//                     locationY: 0.5,
//                     sprite: am5.Label.new(root, {
//                         fill: am5.color(0xffffff),
//                         centerX: am5.p50,
//                         centerY: am5.p50,
//                         text: "{valueX}",
//                         populateText: true,
//                         oversizedBehavior: "hide"
//                     })
//                 });
//             });
//             series.data.setAll(data);
//             series.appear();
//             return series;
//         }
//         var positiveColor = root.interfaceColors.get("positive");
//         var negativeColor = root.interfaceColors.get("negative");
//         // createSeries("negative2", "Current Emission", am5.Color.lighten(negativeColor, 0.5));
//         createSeries("negative1", "Reduced Emission", am5.Color.lighten(negativeColor, 0.5));
//         createSeries("positive1", "Sometimes", am5.Color.lighten(positiveColor, 0.5));
//         createSeries("positive2", "Post Intervansion", am5.Color.lighten(negativeColor, 0.5));
//         // Add legend
//         // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
//         var legend = chart.children.push(
//             am5.Legend.new(root, {
//                 centerY: am5.p50,
//                 y: am5.p50,
//                 layout: root.verticalLayout,
//                 marginLeft: 50
//             })
//         );
//         legend.data.setAll(chart.series.values);
//         // Make stuff animate on load
//         // https://www.amcharts.com/docs/v5/concepts/animations/
//         chart.appear(1000, 100);
//     }); // end am5.ready()
//     function updateTextInput(val) {
//         document.getElementById('EvSlider').value = val;
//     }
// }


