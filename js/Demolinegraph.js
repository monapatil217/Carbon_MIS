//This is Sample page 
//line and bar graph combination
function chartdiv2() {

    // var sectionType = document.getElementById("sectionType").value;

    $("#SectoralChart").empty();
    var html1 = '<div id="chartdiv2"></div>';
    $("#SectoralChart").append(html1);

    var basicId = document.getElementById("basicId").value;
    var myobj = {};
    myobj["basicId"] = basicId;
    var Type = document.getElementById("sectionType").value;
    myobj["Type"] = Type;
    // myobj["type"] = sectionType;

    // $.ajax({
    //     type: "POST",
    //     async: false,
    //     url: "php/sectroalEmi.php",
    //     contentType: "application/json",
    //     data: JSON.stringify(myobj),
    //     success: function (data) {
    // var divList = JSON.parse(data);
    // showGraph("chartdiv2",divlist);
    //     }
    // });
    showGraph("chartdiv2");
}



//column & line graph
function showGraph(divId) {

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


        var data = [
            {
                year: "2022",
                income: 23.5,
                expenses: 21.1,
                strokeSettings: {
                    stroke: chart.get("colors").getIndex(1),
                    strokeWidth: 3,
                    strokeDasharray: [5, 5]
                }
            },

            {
                year: "2030",
                income: 30.6,
                expenses: 28.2,
                columnSettings: {
                    strokeWidth: 1,
                    strokeDasharray: [5],
                    fillOpacity: 0.2
                },
                info: "(projection)"
            },
            {
                year: "2050",
                income: 34.1,
                expenses: 32.9,
                columnSettings: {
                    strokeWidth: 1,
                    strokeDasharray: [5],
                    fillOpacity: 0.2
                },
                info: "(projection)"
            }
        ];

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30
        });
        var xAxis = chart.xAxes.push(
            am5xy.CategoryAxis.new(root, {
                categoryField: "year",
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

        xAxis.data.setAll(data);
        xRenderer.grid.template.set("visible", false);
        xRenderer.labels.template.setAll({
            fill: am5.color(0xFFFFFF)
        });

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
                name: "Intervention",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "income",
                categoryXField: "year",
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
                valueYField: "expenses",
                categoryXField: "year",
                tooltip: am5.Tooltip.new(root, {
                    pointerOrientation: "horizontal",
                    labelText: "{name} in {categoryX}: {valueY} {info}"
                })
            })
        );

        series2.strokes.template.setAll({
            strokeWidth: 3,
            templateField: "strokeSettings"
        });


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





