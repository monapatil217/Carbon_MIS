$(document).ready(function () {
    actionchart();
    
})
var range1 = $('.range-slider__range1'),
value1 = $('.range-slider__value1');
value1.html(range1.attr('value'));
range1.on('input', function () {
    // alert("hii");
    value1.html(this.value);
    value2.html(this.value);
    document.getElementById("ele2").max= this.value;
    document.getElementById("ele2").value= this.value;
});
var range2 = $('.range-slider__range2'),
value2 = $('.range-slider__value2');
value2.html(range1.attr('value'));


function actionchart() {
    var basicId = document.getElementById("basicId").value;
    var myobj = {};
    myobj["basicId"] = basicId;
    $.ajax({
        type: "POST",
        async: false,
        url: "php/actiongraph.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var datalist = JSON.parse(data);
            $.each(datalist, function (index, element) {
                var cData = element.data;
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
                    var data = cData;
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
                        text: "Sectores",
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
                });
            });       // end am5.ready())
        }
    });
}



