$(document).ready(function () {
    actionchart();

})
//Electricity range bar start
var rangeE1 = $('.range-slider__rangeE1'),
    valueE1 = $('.range-slider__valueE1');
valueE1.html(rangeE1.attr('value'));
rangeE1.on('input', function () {
    valueE1.html(this.value);
    valueE2.html(this.value);
    valueE3.html(this.value);
    document.getElementById("ele2").max = this.value;
    document.getElementById("ele3").max = this.value;
    // v1 = 100 - this.value;
    // alert(v1);

});
var rangeE2 = $('.range-slider__rangeE2'),
    valueE2 = $('.range-slider__valueE2');
valueE2.html(rangeE2.attr('value'));
rangeE2.on('input', function () {

    valueE2.html(this.value);
    // valueE1.html(this.value);
    valueE3.html(this.value);
    // document.getElementById("ele1").max = this.value;
    document.getElementById("ele3").max = this.value;
    // v1 = 100 - this.value;
    // alert(v1);

});
var rangeE3 = $('.range-slider__rangeE3'),
    valueE3 = $('.range-slider__valueE3');
valueE3.html(rangeE3.attr('value'));
rangeE3.on('input', function () {
    valueE3.html(this.value);
    // valueE2.html(this.value);
    // valueE1.html(this.value);
    // document.getElementById("ele1").max = this.value;
    // document.getElementById("ele2").max = this.value;

    // v1 = 100 - this.value;
    // alert(v1);
});
//Electricity range bar end

//Transport range bar start
var rangeT1 = $('.range-slider__rangeT1'),
    valueT1 = $('.range-slider__valueT1');
valueT1.html(rangeT1.attr('value'));
rangeT1.on('input', function () {
    valueT1.html(this.value);
    valueT2.html(this.value);
    valueT3.html(this.value);
    valueT4.html(this.value);
    valueT5.html(this.value);
    document.getElementById("trans2").max = this.value;
    document.getElementById("trans3").max = this.value;
    document.getElementById("trans4").max = this.value;
    document.getElementById("trans5").max = this.value;
});
var rangeT2 = $('.range-slider__rangeT2'),
    valueT2 = $('.range-slider__valueT2');
valueT2.html(rangeT2.attr('value'));
rangeT2.on('input', function () {
    valueT2.html(this.value);
    valueT3.html(this.value);
    valueT4.html(this.value);
    valueT5.html(this.value);
    document.getElementById("trans3").max = this.value;
    document.getElementById("trans4").max = this.value;
    document.getElementById("trans5").max = this.value;
});
var rangeT3 = $('.range-slider__rangeT3'),
    valueT3 = $('.range-slider__valueT3');
valueT3.html(rangeT3.attr('value'));
rangeT3.on('input', function () {
    valueT3.html(this.value);
    valueT4.html(this.value);
    valueT5.html(this.value);
    document.getElementById("trans4").max = this.value;
    document.getElementById("trans5").max = this.value;
});
var rangeT4 = $('.range-slider__rangeT4'),
    valueT4 = $('.range-slider__valueT4');
valueT4.html(rangeT4.attr('value'));
rangeT4.on('input', function () {
    valueT4.html(this.value);
    valueT5.html(this.value);

    document.getElementById("trans5").max = this.value;
});
var rangeT5 = $('.range-slider__rangeT5'),
    valueT5 = $('.range-slider__valueT5');
valueT5.html(rangeT5.attr('value'));
rangeT5.on('input', function () {

    valueT5.html(this.value);


});

// AFOLU range bar start
var rangeAF1 = $('.range-slider__rangeAF1'),
    valueAF1 = $('.range-slider__valueAF1');
valueAF1.html(rangeAF1.attr('value'));
rangeAF1.on('input', function () {
    valueAF1.html(this.value);
    valueAF2.html(this.value);
    document.getElementById("AFOLU2").max = this.value;
});
var rangeAF2 = $('.range-slider__rangeAF2'),
    valueAF2 = $('.range-slider__valueAF2');
valueAF2.html(rangeAF2.attr('value'));
rangeAF2.on('input', function () {
    valueAF2.html(this.value);
});

// Waste range bar start
var rangew1 = $('.range-slider__rangew1'),
    valuew1 = $('.range-slider__valuew1');
valuew1.html(rangew1.attr('value'));
rangew1.on('input', function () {
    valuew1.html(this.value);
    valuew2.html(this.value);
    document.getElementById("W2").max = this.value;
});
var rangew2 = $('.range-slider__rangew2'),
    valuew2 = $('.range-slider__valuew2');
valuew2.html(rangew2.attr('value'));
rangew2.on('input', function () {
    valuew2.html(this.value);
});

// Industry range bar start
var rangei1 = $('.range-slider__rangei1'),
    valuei1 = $('.range-slider__valuei1');
valuei1.html(rangei1.attr('value'));
rangei1.on('input', function () {
    valuei1.html(this.value);
    valuei2.html(this.value);
    valuei3.html(this.value);
    document.getElementById("indu2").max = this.value;
    document.getElementById("indu3").max = this.value;
});
var rangei2 = $('.range-slider__rangei2'),
    valuei2 = $('.range-slider__valuei2');
valuei2.html(rangei2.attr('value'));
rangei2.on('input', function () {
    valuei2.html(this.value);
    valuei3.html(this.value);
    document.getElementById("indu3").max = this.value;
});
var rangei3 = $('.range-slider__rangei3'),
    valuei3 = $('.range-slider__valuei3');
valuei3.html(rangei3.attr('value'));
rangei3.on('input', function () {
    valuei3.html(this.value);
});






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



