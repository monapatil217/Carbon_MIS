$(document).ready(function () {
    getCity();

})

function addCityChart() {

    var city = document.getElementById("cityList").value;

    $("#chartName").empty();
    var html1 = '<h3>Sectors wise graph of ' + city + ' </h3>';
    $("#chartName").append(html1);

    $("#chartDiv").empty();
    var html1 = '  <div id="secChart"></div>';
    $("#chartDiv").append(html1);

    var myobj = {};
    myobj["city"] = city;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/sectorGraph.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);

            am5.ready(function () {

                // Create root element
                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                var root = am5.Root.new("secChart");

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
                    categoryField: "sector",
                    renderer: am5xy.AxisRendererX.new(root, {}),
                    tooltip: am5.Tooltip.new(root, {})
                }));

                xAxis.children.moveValue(am5.Label.new(root, {
                    text: "sectors",
                    fill: am5.color(0xFFFFFF),
                    x: am5.p50,
                    centerX: am5.p50
                }), xAxis.children.length - 1);


                xAxis.data.setAll(data);
                var yRenderer = am5xy.AxisRendererY.new(root, {});
                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                    min: 0,
                    renderer: yRenderer
                }));
                yAxis.children.moveValue(am5.Label.new(root, {
                    rotation: -90,
                    text: "Emissions(milliontons/year)",
                    fill: am5.color(0xFFFFFF),
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
                makeSeries("CH4", "ch4");
                makeSeries("N2O", "n2o");
                makeSeries("CO2", "co2");

                // Make stuff animate on load
                // https://www.amcharts.com/docs/v5/concepts/animations/
                chart.appear(1000, 100);
            }); // end am5.ready()
        }
    })

    showInput();
    openCity('Electricity', this, '#A8E6CE');
}

function getCity() {
    $("#cityList").empty();
    var cityName = getCityList();
    var html = '<option selected disabled value="">Choose City</option>'
        + cityName;

    $("#cityList").append(html);

}
function getCityList() {
    var myobj = {};
    myobj["type"] = "district";
    var cityName = "";
    $.ajax({
        type: "POST",
        async: false,
        url: "php/getcity.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);
            $.each(divList, function (index, element) {

                cityName += "<option value='" + element.name + "'>" + element.name + "</option>";

            });
        }
    });
    return cityName;
}