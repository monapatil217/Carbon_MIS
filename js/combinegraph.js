$(document).ready(function () {
    addChart();
})

function addChart() {

    var type = document.getElementById("sectionType").value;
    var basicId = document.getElementById("basicId").value;

    var myobj = {};
    myobj["type"] = type;
    myobj["basicId"] = basicId;

    $.ajax({
        type: "POST",
        async: false,
        // url: "php/getAllEmi.php",
        url: "php/ngetallEmi.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var datalist = JSON.parse(data);

            $.each(datalist, function (index, element) {

                var check = element.check;
                var cityName = "This City";
                var cData = element.cData;


                if (check == "true") {

                    am5.ready(function () {
                        // end am5.ready()
                        var root = am5.Root.new(type);
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
                        // chart.set(
                        //     "scrollbarX",
                        //     am5.Scrollbar.new(root, {
                        //         orientation: "horizontal"
                        //     })
                        // );

                        var data = cData;

                        // Create axes
                        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                        var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });

                        var xAxis = chart.xAxes.push(
                            am5xy.CategoryAxis.new(root, {
                                categoryField: "Pollutant",
                                // renderer: am5xy.AxisRendererX.new(root, {}),
                                renderer: xRenderer,
                                tooltip: am5.Tooltip.new(root, {})
                            })
                        );
                        xAxis.children.moveValue(am5.Label.new(root, {
                            text: "Pollutant",
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
                                // renderer: am5xy.AxisRendererY.new(root, {})
                                renderer: yRenderer

                            })
                        );

                        yAxis.children.moveValue(am5.Label.new(root, {
                            rotation: -90,
                            text: "Emissions(milliontons/year)",
                            fill: am5.color(0xFFFFFF),
                            y: am5.p50,
                            centerX: am5.p50
                        }), 0);


                        yRenderer.labels.template.setAll({
                            fill: am5.color(0xFFFFFF)
                        });


                        var series1 = chart.series.push(
                            am5xy.ColumnSeries.new(root, {
                                name: cityName,
                                xAxis: xAxis,
                                yAxis: yAxis,
                                valueYField: cityName,
                                categoryXField: "Pollutant",

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
                                name: "Maharashtra",
                                xAxis: xAxis,
                                yAxis: yAxis,
                                valueYField: "Maharashtra",
                                categoryXField: "Pollutant",
                                tooltip: am5.Tooltip.new(root, {
                                    pointerOrientation: "horizontal",
                                    labelText: "{name} in {categoryX}: {valueY} {info}"
                                })
                            })
                        );

                        series2.strokes.template.setAll({
                            strokeWidth: 3,
                            templateField: "strokeSettings",

                        });


                        series2.data.setAll(data);

                        series2.bullets.push(function () {
                            return am5.Bullet.new(root, {
                                sprite: am5.Circle.new(root, {
                                    strokeWidth: 3,
                                    stroke: series2.get("stroke"),
                                    radius: 5,
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

                    });
                }
                else {


                }
            });
        }
    });
}


