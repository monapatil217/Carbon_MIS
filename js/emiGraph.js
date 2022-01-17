$(document).ready(function () {
    addsectrolChart();
    addEmiChart();
    addChart();
})

function addsectrolChart() {
    var myobj = {};
    myobj["type"] = "emission";

    $.ajax({
        type: "POST",
        async: false,
        url: "php/allcityData.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);
            viewGraph("allEmiChart", divList);
        }
    });
}

function addEmiChart() {

    $.ajax({
        type: "POST",
        async: false,
        url: "php/cityPoluEmi.php",
        contentType: "application/json",
        success: function (data) {
            var divList = JSON.parse(data);

            am5.ready(function () {

                // Create root element
                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                var root = am5.Root.new("polluEmi");
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
                var data = divList;

                // Create axes
                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                    categoryField: "country",
                    renderer: am5xy.AxisRendererX.new(root, {}),
                    tooltip: am5.Tooltip.new(root, {})
                }));
                xAxis.data.setAll(data);
                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                    min: 0,
                    renderer: am5xy.AxisRendererY.new(root, {})
                }));
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
                        categoryXField: "country"
                    }));
                    series.columns.template.setAll({
                        tooltipText: "{name}, {categoryX}: {valueY}",
                        tooltipY: am5.percent()
                    });
                    series.data.setAll(data);
                    // Make stuff animate on load
                    // https://www.amcharts.com/docs/v5/concepts/animations/
                    series.appear();

                    // series.bullets.push(function () {
                    //     return am5.Bullet.new(root, {
                    //         sprite: am5.Label.new(root, {
                    //             text: "{valueY}",
                    //             fill: root.interfaceColors.get("alternativeText"),
                    //             centerY: am5.p50,
                    //             centerX: am5.p50,
                    //             populateText: true
                    //         })
                    //     });
                    // });
                    legend.data.push(series);
                }
                makeSeries("CO2", "co2");
                makeSeries("CH4", "ch4");
                makeSeries("N2O", "n2o");

                // Make stuff animate on load
                // https://www.amcharts.com/docs/v5/concepts/animations/
                chart.appear(1000, 100);
            }); // end am5.ready()

        }
    });

}


function addChart() {

    $.ajax({
        type: "POST",
        async: false,
        url: "php/cityStackEmi.php",
        contentType: "application/json",
        success: function (data) {
            var divList = JSON.parse(data);

            am5.ready(function () {

                // Create root element
                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                var root = am5.Root.new("allsecEmiChart");
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
                var data = divList;

                // Create axes
                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                    categoryField: "country",
                    renderer: am5xy.AxisRendererX.new(root, {}),
                    tooltip: am5.Tooltip.new(root, {})
                }));
                xAxis.data.setAll(data);
                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                    min: 0,
                    renderer: am5xy.AxisRendererY.new(root, {})
                }));
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
                        categoryXField: "country"
                    }));
                    series.columns.template.setAll({
                        tooltipText: "{name}, {categoryX}: {valueY}",
                        tooltipY: am5.percent()
                    });
                    series.data.setAll(data);
                    // Make stuff animate on load
                    // https://www.amcharts.com/docs/v5/concepts/animations/
                    series.appear();

                    // series.bullets.push(function () {
                    //     return am5.Bullet.new(root, {
                    //         sprite: am5.Label.new(root, {
                    //             text: "{valueY}",
                    //             fill: root.interfaceColors.get("alternativeText"),
                    //             centerY: am5.p50,
                    //             centerX: am5.p50,
                    //             populateText: true
                    //         })
                    //     });
                    // });
                    legend.data.push(series);
                }
                makeSeries("Electricity", "ele_emi");
                makeSeries("CropLand", "crop_emi");
                makeSeries("Forest", "forest_emi");
                makeSeries("Cooking Fuel", "fule_emi");
                makeSeries("Energy", "indu_eng_emi");
                makeSeries("LandUse", "land_emi");
                makeSeries("LiveStock", "live_emi");
                makeSeries("SolidWaste", "solid_emi");
                makeSeries("Transport", "trans_emi");
                makeSeries("WasteWater", "waste_emi");

                // Make stuff animate on load
                // https://www.amcharts.com/docs/v5/concepts/animations/
                chart.appear(1000, 100);
            }); // end am5.ready()

        }
    });

}


function secEmiChart() {

    var sectionType = document.getElementById("sectionType").value;

    $("#secChartDiv").empty();
    var html1 = '  <div id="secEmiChart"></div>';
    $("#secChartDiv").append(html1);

    var myobj = {};
    myobj["type"] = sectionType;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/sectroalEmi.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);
            viewGraph("secEmiChart", divList);
        }
    });
}


function poluEmiChart() {

    var pollutantType = document.getElementById("pollutantType").value;

    $("#poluChartDiv").empty();
    var html1 = '  <div id="poluEmiChart"></div>';
    $("#poluChartDiv").append(html1);

    var myobj = {};
    myobj["type"] = "pollutant";
    myobj["polluType"] = pollutantType;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/allcityData.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);
            viewGraph("poluEmiChart", divList);
        }
    });
}


function viewGraph(divId, divList) {

    am5.ready(function () {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new(divId);
        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);
        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "none",
            wheelY: "none"
        }));
        // We don't want zoom-out button to appear while animating, so we hide it
        chart.zoomOutButton.set("forceHidden", true);
        // Add scrollbar
        // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
        chart.set("scrollbarX", am5.Scrollbar.new(root, {
            orientation: "horizontal"
        }));
        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30
        });
        xRenderer.labels.template.setAll({
            rotation: -90,
            centerY: am5.p50,
            centerX: 0,
            paddingRight: 15
        });
        xRenderer.grid.template.set("visible", false);
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            maxDeviation: 0.3,
            categoryField: "country",
            renderer: xRenderer
        }));
        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 0.3,
            min: 0,
            renderer: am5xy.AxisRendererY.new(root, {})
        }));
        //     // Add cursor
        //     // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);
        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            categoryXField: "country"
        }));
        // Rounded corners for columns
        series.columns.template.setAll({
            cornerRadiusTL: 5,
            cornerRadiusTR: 5
        });
        // Make each column to be of a different color
        series.columns.template.adapters.add("fill", function (fill, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });
        series.columns.template.adapters.add("stroke", function (stroke, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });
        // Add Label bullet
        series.bullets.push(function () {
            return am5.Bullet.new(root, {
                locationY: 1,
                sprite: am5.Label.new(root, {
                    text: "{valueYWorking.formatNumber('#.')}",
                    fill: root.interfaceColors.get("alternativeText"),
                    centerY: 0,
                    centerX: am5.p50,
                    populateText: true
                })
            });
        });
        // Set data
        var data = divList;

        xAxis.data.setAll(data);
        series.data.setAll(data);
        // update data with random values each 1.5 sec
        setInterval(function () {
            updateData();
        }, 2000)
        function updateData() {
            am5.array.each(series.dataItems, function (dataItem) {
                var value = dataItem.get("valueY");
                if (value < 0) {
                    value = 10;
                }
                // both valueY and workingValueY should be changed, we only animate workingValueY
                dataItem.set("valueY", value);
                dataItem.animate({
                    key: "valueYWorking",
                    to: value,
                    duration: 600,
                    easing: am5.ease.out(am5.ease.cubic)
                });
            })
            sortCategoryAxis();
        }
        // Get series item by category
        function getSeriesItem(category) {
            for (var i = 0; i < series.dataItems.length; i++) {
                var dataItem = series.dataItems[i];
                if (dataItem.get("categoryX") == category) {
                    return dataItem;
                }
            }
        }
        // Axis sorting
        function sortCategoryAxis() {
            // Sort by value
            series.dataItems.sort(function (x, y) {
                return y.get("valueY") - x.get("valueY"); // descending
                //return y.get("valueY") - x.get("valueY"); // ascending
            })
            // Go through each axis item
            am5.array.each(xAxis.dataItems, function (dataItem) {
                // get corresponding series item
                var seriesDataItem = getSeriesItem(dataItem.get("category"));

                if (seriesDataItem) {
                    // get index of series data item
                    var index = series.dataItems.indexOf(seriesDataItem);
                    // calculate delta position
                    var deltaPosition = (index - dataItem.get("index", 0)) / series.dataItems.length;
                    // set index to be the same as series data item index
                    dataItem.set("index", index);
                    // set deltaPosition instanlty
                    dataItem.set("deltaPosition", -deltaPosition);
                    // animate delta position to 0
                    dataItem.animate({
                        key: "deltaPosition",
                        to: 0,
                        duration: 1000,
                        easing: am5.ease.out(am5.ease.cubic)
                    })
                }
            });
            // Sort axis items by index.
            // This changes the order instantly, but as deltaPosition is set,
            // they keep in the same places and then animate to true positions.
            xAxis.dataItems.sort(function (x, y) {
                return x.get("index") - y.get("index");
            });
        }
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        chart.appear(1000, 100);
    }); // end am5.ready()


}