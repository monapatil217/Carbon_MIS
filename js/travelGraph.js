$(document).ready(function () {
    addTravelChart();
})

function addTravelChart() {

    am5.ready(function () {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("transChart");

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
        chart.set("scrollbarX", am5.Scrollbar.new(root, {
            orientation: "horizontal"
        }));

        var data = [{
            "sector": "2W",
            "ch4": 25,
            "n2o": 31,
            "co2": 47
        }, {
            "sector": "3W",
            "ch4": 12,
            "n2o": 34,
            "co2": 64
        }, {
            "sector": "4W",
            "ch4": 32,
            "n2o": 59,
            "co2": 23
        }, {
            "sector": "Bus",
            "ch4": 24,
            "n2o": 62,
            "co2": 54
        }, {
            "sector": "LCV",
            "ch4": 36,
            "n2o": 51,
            "co2": 22
        }, {
            "sector": "HCV",
            "ch4": 58,
            "n2o": 29,
            "co2": 44
        }, {
            "sector": "Train",
            "ch4": 58,
            "n2o": 29,
            "co2": 44
        }, {
            "sector": "Flight",
            "ch4": 58,
            "n2o": 29,
            "co2": 44
        }]

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "sector",
            renderer: am5xy.AxisRendererX.new(root, {}),
            tooltip: am5.Tooltip.new(root, {})
        }));
        xAxis.data.setAll(data);


        xAxis.children.moveValue(am5.Label.new(root, {
            text: "Vehicles",
            x: am5.p50,
            centerX: am5.p50
        }), xAxis.children.length - 1);

        // xRenderer.grid.template.set("visible", false);



        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            min: 0,
            renderer: am5xy.AxisRendererY.new(root, {})
        }));

        yAxis.children.moveValue(am5.Label.new(root, {
            rotation: -90,
            text: "Emissions(tons/month)",
            y: am5.p50,
            centerX: am5.p50
        }), 0);

        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(am5.Legend.new(root, {
            centerX: am5.p50,
            x: am5.p50
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName) {
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: name,
                stacked: true,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: fieldName,
                categoryXField: "sector"
            }));

            series.columns.template.setAll({
                tooltipText: "{name}, {categoryX}: {valueY}",
                tooltipY: am5.percent(10)
            });
            series.data.setAll(data);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();

            series.bullets.push(function () {
                return am5.Bullet.new(root, {
                    sprite: am5.Label.new(root, {
                        text: "{valueY}",
                        fill: root.interfaceColors.get("alternativeText"),
                        centerY: am5.p50,
                        centerX: am5.p50,
                        populateText: true
                    })
                });
            });

            legend.data.push(series);
        }

        makeSeries("Ch4", "ch4");
        makeSeries("N2O", "n2o");
        makeSeries("Co2", "co2");


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);

    }); // end am5.ready()

}

