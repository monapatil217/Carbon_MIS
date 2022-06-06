$(document).ready(function () {
    intervchart();
    intactionchart();

})
//////////
function intervchart() {
    var basicId = document.getElementById("basicId").value;

    var myobj = {};
    myobj["basicId"] = basicId;
    $.ajax({
        type: "POST",
        async: false,
        url: "php/getyearwisemi.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var interEmi2022 = 0;
            var interEmi2030 = 0;
            var interEmi2050 = 0;
            var datalist = JSON.parse(data);
            $.each(datalist, function (index, element) {
                var cData = element.data;
                interEmi2022 = cData[0].intervemi;
                interEmi2030 = cData[1].intervemi;
                interEmi2050 = cData[2].intervemi;
                am5.ready(function () {
                    // Create root element
                    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                    var root = am5.Root.new("intervchart");
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
                    var data = cData;
                    // Create axes
                    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                    var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
                    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                        categoryField: "ctcyear",
                        // renderer: am5xy.AxisRendererX.new(root, {}),
                        renderer: xRenderer,
                        tooltip: am5.Tooltip.new(root, {
                            themeTags: ["axis"],
                            animationDuration: 200
                        })
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
                        min: 0,
                        // renderer: am5xy.AxisRendererY.new(root, {})
                        renderer: yRenderer
                    }));
                    yAxis.children.moveValue(am5.Label.new(root, {
                        rotation: -90,
                        text: "Emissions(kt/year)",
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
                        // locationY: 1,
                        // text: "{valueY}",
                        name: "Bussiness As Usal",
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: "bauemi",
                        categoryXField: "ctcyear",
                        clustered: false,
                        tooltip: am5.Tooltip.new(root, {
                            labelText: "BAU: {valueY}"
                        })


                    }));
                    series0.columns.template.setAll({
                        width: am5.percent(70),
                        tooltipY: 0
                    });
                    series0.data.setAll(data);
                    var series1 = chart.series.push(am5xy.ColumnSeries.new(root, {
                        name: "Intervention",
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: "intervemi",
                        categoryXField: "ctcyear",
                        clustered: false,
                        // locationY: 1,
                        // text: "{valueY}",
                        tooltip: am5.Tooltip.new(root, {
                            labelText: "Intervention: {valueY}"
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
                });
            });       // end am5.ready())
            var tottree = (interEmi2050 * 1000000) / 0.021;
            $("#numberOfTree").append(Math.round(tottree, 0));
            $("#emi2022").append(Math.round(interEmi2022, 0));
            $("#emi2030").append(Math.round(interEmi2030, 0));
            $("#emi2050").append(Math.round(interEmi2050, 0));

        }
    })
}



//////////comare all sector with all years
function intactionchart() {
    var basicId = document.getElementById("basicId").value;

    var myobj = {};
    myobj["basicId"] = basicId;


    $.ajax({
        type: "POST",
        async: false,
        url: "php/getintallsec.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var datalist = JSON.parse(data);
            $.each(datalist, function (index, element) {
                var cData = element.data;
                am5.ready(function () {

                    // Create root element
                    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                    var root = am5.Root.new("intactionchart");


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

                    var data = cData;

                    // Create axes
                    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                    var xRenderer = am5xy.AxisRendererX.new(root, {
                        cellStartLocation: 0.1,
                        cellEndLocation: 0.9
                    });
                    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                        categoryField: "year",
                        renderer: xRenderer,
                        // tooltip: am5.Tooltip.new(root, {})
                        text: am5.Tooltip.new(root, {})
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
                    function makeSeries(name, intervemi) {
                        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                            name: name,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            // valueYField: fieldName, 
                            valueYField: intervemi,
                            valueYShow: "valueY",
                            categoryXField: "year",


                        }));
                        series.columns.template.setAll({
                            cornerRadiusTL: 5,
                            cornerRadiusTR: 5
                        });
                        series.columns.template.setAll({
                            tooltipText: "{name}, {categoryX}:{valueY}",
                            // plotToolText: "{name}, {categoryX}:{valueY}",
                            labelText: "{name}, {categoryX}:{valueY}",
                            width: am5.percent(90),
                            tooltipY: 0


                            // labelText: "{name}, {categoryX}:{valueY}",

                        });

                        series.data.setAll(data);

                        // Make stuff animate on load
                        // https://www.amcharts.com/docs/v5/concepts/animations/
                        series.appear();

                        series.bullets.push(function () {
                            // return am5.Bullet.new(root, {
                            //     locationY: 0,
                            //     sprite: am5.Label.new(root, {
                            //         text: "{valueY}",
                            //         fill: root.interfaceColors.get("alternativeText"),
                            //         centerY: 0,
                            //         centerX: am5.p50,
                            //         populateText: true

                            //     })

                            // });
                            return am5.Bullet.new(root, {
                                locationY: 0.93,
                                sprite: am5.Label.new(root, {
                                    text: "{valueY}",
                                    fill: root.interfaceColors.get("alternativeText"),
                                    // centerY: 0,
                                    centerY: am5.p100,
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
                    makeSeries("MSW", "WasteWater");
                    makeSeries("Industries", "energy");
                    // makeSeries("Africa", "africa");


                    // Make stuff animate on load
                    // https://www.amcharts.com/docs/v5/concepts/animations/
                    chart.appear(1000, 100);

                }); // end am5.ready()
            });
        }
    });
}





//line and bar graph combination
function chartdiv2() {

    $("#SectoralChart").empty();
    var html1 = '<div id="chartdiv2"></div>';
    $("#SectoralChart").append(html1);

    var basicId = document.getElementById("basicId").value;
    var myobj = {};
    myobj["basicId"] = basicId;
    var type = document.getElementById("sectionType").value;
    myobj["type"] = type;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/getintervention.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);

            showGraph("chartdiv2", divList);
        }
    });
    // showGraph("chartdiv2");
}


//column & line graph
function showGraph(divId, divList) {

    am5.ready(function () {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new(divId);

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([am5themes_Animated.new(root)]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(
            am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX",
                layout: root.verticalLayout
            })
        );

        // Add scrollbar
        // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
        chart.set(
            "scrollbarX",
            am5.Scrollbar.new(root, {
                orientation: "horizontal"
            })
        );


        var data = divList;


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30
        });
        var xAxis = chart.xAxes.push(
            am5xy.CategoryAxis.new(root, {
                categoryField: "ctcyear",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            })
        );
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
        var yAxis = chart.yAxes.push(
            am5xy.ValueAxis.new(root, {
                min: 0,
                extraMax: 0.1,
                renderer: yRenderer
            })
        );
        yAxis.children.moveValue(am5.Label.new(root, {
            rotation: -90,
            text: "Emissions(MtCO2e/year)",
            fill: am5.color(0xFFFFFF),
            y: am5.p50,
            centerX: am5.p50
        }), 0);



        yRenderer.labels.template.setAll({
            fill: am5.color(0xFFFFFF)
        });



        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/

        var series1 = chart.series.push(
            am5xy.ColumnSeries.new(root, {
                name: "intervention",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "intervemi",
                categoryXField: "ctcyear",
                tooltip: am5.Tooltip.new(root, {
                    pointerOrientation: "horizontal",
                    labelText: "{name} in {categoryX}: {valueY} {info}"
                })

            })
        );

        series1.columns.template.setAll({
            tooltipY: am5.percent(10),
            templateField: "columnSettings"
        });

        series1.data.setAll(data);

        var series2 = chart.series.push(
            am5xy.LineSeries.new(root, {
                name: "Bussiness As usval",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "bauemi",
                categoryXField: "ctcyear",
                tooltip: am5.Tooltip.new(root, {
                    pointerOrientation: "horizontal",
                    labelText: "{name} in {categoryX}: {valueY} {info}"
                })
            })
        );

        series2.strokes.template.setAll({
            strokeWidth: 3,
            templateField: "strokeSettings"
            //    strokeSettings: {
            //     stroke: chart.get("colors").getIndex(1),
            //     strokeWidth: 3,
            //     strokeDasharray: [5, 5]
            // }
        });

        /////

        ////
        series2.data.setAll(data);

        series2.bullets.push(function () {
            return am5.Bullet.new(root, {
                sprite: am5.Circle.new(root, {
                    strokeWidth: 3,
                    stroke: series2.get("stroke"),
                    radius: 7,
                    fill: root.interfaceColors.get("background")
                })
            });
        });

        chart.set("cursor", am5xy.XYCursor.new(root, {}));
        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(
            am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            })
        );
        legend.labels.template.setAll({
            fill: am5.color(0xFFFFFF)
        });
        legend.data.setAll(chart.series.values);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);
        series1.appear();

    }); // end am5.ready()
}
// two column graph
// function showGraph(divId, divList) {
//     am5.ready(function () {

//         // Create root element
//         // https://www.amcharts.com/docs/v5/getting-started/#Root_element
//         var root = am5.Root.new(divId);

//         // Set themes
//         // https://www.amcharts.com/docs/v5/concepts/themes/
//         root.setThemes([
//             am5themes_Animated.new(root)
//         ]);


//         // Create chart
//         // https://www.amcharts.com/docs/v5/charts/xy-chart/
//         var chart = root.container.children.push(am5xy.XYChart.new(root, {
//             panX: false,
//             panY: false,
//             wheelX: "panX",
//             wheelY: "zoomX",
//             layout: root.verticalLayout
//         }));
//         //    chart.labels.template.setAll({
//         //                         fill: am5.color(0xFFFFFF)
//         //                     });

//         // Add legend
//         // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
//         var legend = chart.children.push(
//             am5.Legend.new(root, {
//                 centerX: am5.p50,
//                 x: am5.p50
//             })
//         );
//         legend.labels.template.setAll({
//             fill: am5.color(0xFFFFFF)
//         });

//         // Set data
//         var data = divList;
//         // Create axes
//         // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
//         var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 80 });
//         var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
//             categoryField: "xlabel",
//             //   renderer: am5xy.AxisRendererX.new(root, {
//             //     cellStartLocation: 0.1,
//             //     cellEndLocation: 0.9
//             //      }),
//             renderer: xRenderer,
//             tooltip: am5.Tooltip.new(root, {})
//         }));
//         xAxis.children.moveValue(am5.Label.new(root, {
//             text: "Year",
//             fill: am5.color(0xFFFFFF),
//             x: am5.p50,
//             centerX: am5.p50
//         }), xAxis.children.length - 1);

//         xRenderer.grid.template.set("visible", false);
//         xRenderer.labels.template.setAll({
//             fill: am5.color(0xFFFFFF)
//         });

//         xAxis.data.setAll(data);

//         var yRenderer = am5xy.AxisRendererY.new(root, {});
//         var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
//             renderer: yRenderer

//         }));
//         yAxis.children.moveValue(am5.Label.new(root, {
//             rotation: -90,
//             text: "Emissions(MtCO2e/year)",
//             fill: am5.color(0xFFFFFF),
//             y: am5.p50,
//             centerX: am5.p50
//         }), 0);


//         yRenderer.labels.template.setAll({
//             fill: am5.color(0xFFFFFF)
//         });


//         // Add series
//         // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
//         function makeSeries(name, fieldName) {
//             var series = chart.series.push(am5xy.ColumnSeries.new(root, {
//                 name: name,
//                 xAxis: xAxis,
//                 yAxis: yAxis,
//                 valueYField: fieldName,
//                 categoryXField: "xlabel"

//             }));

//             series.columns.template.setAll({
//                 tooltipText: "{categoryX} {name}: {valueY}",
//                 width: am5.percent(90),
//                 tooltipY: 0
//             });

//             series.data.setAll(data);

//             // Make stuff animate on load
//             // https://www.amcharts.com/docs/v5/concepts/animations/
//             series.appear();

//             series.bullets.push(function () {
//                 return am5.Bullet.new(root, {
//                     locationY: 0,
//                     sprite: am5.Label.new(root, {
//                         text: "{valueY}",
//                         fill: root.interfaceColors.get("alternativeText"),
//                         centerY: 0,
//                         centerX: am5.p50,
//                         populateText: true
//                     })
//                 });
//             });


//             legend.data.push(series);
//         }


//         makeSeries("intervention", "intervemi");
//         makeSeries("Bussiness As usval", "bauemi");



//         // Make stuff animate on load
//         // https://www.amcharts.com/docs/v5/concepts/animations/#Forcing_appearance_animation
//         chart.appear(1000, 100);
//     });
// }













////////////////////////////////////////////////////////////
// Create root and chart
// var root = am5.Root.new("chartdiv1");

// root.setThemes([
//     am5themes_Animated.new(root)
// ]);

// var chart = root.container.children.push(
//     am5xy.XYChart.new(root, {
//         panY: false,
//         wheelY: "zoomX",
//         layout: root.verticalLayout,
//         maxTooltipDistance: 0
//     })
// );

// // Define data
// var data = [{
//     date: new Date(2022, 1, 1).getTime(),
//     value: 5.4,
//     value2: 8.5
// }, {
//     date: new Date(2030, 1, 1).getTime(),
//     value: 9.1,
//     value2: 8.2
// }, {
//     date: new Date(2050, 1).getTime(),
//     value: 10.5,
//     value2: 0.5
// }];


// // Create Y-axis
// var yAxis = chart.yAxes.push(
//     am5xy.ValueAxis.new(root, {
//         extraTooltipPrecision: 1,
//         renderer: am5xy.AxisRendererY.new(root, {})
//     })
// );

// // Create X-Axis
// var xAxis = chart.xAxes.push(
//     am5xy.DateAxis.new(root, {
//         baseInterval: { timeUnit: "year", count: 10 },
//         renderer: am5xy.AxisRendererX.new(root, {
//             minGridDistance: 20
//         }),
//     })
// );

// // Create series
// function createSeries(name, field) {
//     var series = chart.series.push(
//         am5xy.SmoothedXLineSeries.new(root, {
//             name: name,
//             xAxis: xAxis,
//             yAxis: yAxis,
//             valueYField: field,
//             valueXField: "date",
//             tooltip: am5.Tooltip.new(root, {})
//         })
//     );

//     series.strokes.template.set("strokeWidth", 4);

//     series.get("tooltip").label.set("text", "[bold]{name}[/]\n{valueX.formatDate()}: {valueY}")
//     series.data.setAll(data);
// }

// createSeries("Series #1", "value");
// createSeries("Series #2", "value2");

// // Add cursor
// chart.set("cursor", am5xy.XYCursor.new(root, {
//     behavior: "zoomXY",
//     xAxis: xAxis
// }));

// xAxis.set("tooltip", am5.Tooltip.new(root, {
//     themeTags: ["axis"]
// }));

// yAxis.set("tooltip", am5.Tooltip.new(root, {
//     themeTags: ["axis"]
// }));





