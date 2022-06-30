$(document).ready(function () {
    getCardData();
    actionchart();


})
//Electricity range bar start
var rangeE1 = $('.range-slider__rangeE1'),
    valueE1 = $('.range-slider__valueE1');
valueEE1 = $('.range-slider__valueEE1');
valueE1.html(rangeE1.attr('value'));
valueEE1.html(rangeE1.attr('valueE1'));
rangeE1.on('input', function () {

    valueEE1.html(document.getElementById("ele1").max - this.value);
    valueE1.html(this.value);
    valueE2.html(this.value);
    valueE3.html(this.value);
    document.getElementById("ele2").max = this.value;
    document.getElementById("ele3").max = this.value;
    document.getElementById("ele2").value = this.value;
    document.getElementById("ele3").value = this.value;

    valueEE2.html(0);
    valueEE3.html(0);

    valueRemainEle1 = document.getElementById("ele1").max - this.value;
    valueRemainEle2 = document.getElementById("ele2").max - document.getElementById("ele2").value;
    valueRemainEle3 = document.getElementById("ele3").max - document.getElementById("ele3").value;



    setEleGraph();
});

var rangeE2 = $('.range-slider__rangeE2'),
    valueEE2 = $('.range-slider__valueEE2');
valueE2 = $('.range-slider__valueE2');

valueEE2.html(rangeE2.attr('valueE2'));
valueE2.html(rangeE2.attr('value'));

rangeE2.on('input', function () {
    valueEE2.html(document.getElementById("ele2").max - this.value);
    valueE2.html(this.value);
    valueE3.html(this.value);
    document.getElementById("ele3").max = this.value;
    document.getElementById("ele3").value = this.value;
    valueEE3.html(0);

    valueRemainEle1 = document.getElementById("ele1").max - document.getElementById("ele1").value;
    valueRemainEle2 = document.getElementById("ele2").max - this.value;
    valueRemainEle3 = document.getElementById("ele3").max - document.getElementById("ele3").value;
    setEleGraph();
});


var rangeE3 = $('.range-slider__rangeE3'),
    valueE3 = $('.range-slider__valueE3');
valueEE3 = $('.range-slider__valueEE3');

valueE3.html(rangeE3.attr('value'));
valueEE3.html(rangeE3.attr('valueE3'));

rangeE3.on('input', function () {
    valueE3.html(this.value);
    valueEE3.html(document.getElementById("ele3").max - this.value);


    valueRemainEle1 = document.getElementById("ele1").max - document.getElementById("ele1").value;
    valueRemainEle2 = document.getElementById("ele2").max - document.getElementById("ele2").value;
    valueRemainEle3 = document.getElementById("ele3").max - this.value;
    setEleGraph();
});


function setEleGraph() {

    var myArray = [];
    myArray["pOne"] = valueRemainEle1;
    myArray["pTwo"] = valueRemainEle2;
    myArray["pThree"] = valueRemainEle3;

    var basicId = document.getElementById("basicId").value;
    var rangeBarValue = {};
    rangeBarValue["basicId"] = basicId;
    rangeBarValue["sectore"] = "Electricity";
    rangeBarValue["myArray"] = myArray;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/postIntervantionGraph.php",
        contentType: "application/json",
        data: JSON.stringify(rangeBarValue),
        success: function (data) {
            var divList = JSON.parse(data);
            
        }
    });
}
//Electricity range bar end

//Transport range bar start
var rangeT1 = $('.range-slider__rangeT1'),
    valueT1 = $('.range-slider__valueT1');
valueT11 = $('.range-slider__valueTT1');

valueT1.html(rangeT1.attr('value'));
valueT11.html(rangeT1.attr('valueT1'));

rangeT1.on('input', function () {
    valueT11.html(document.getElementById("trans1").max - this.value);
    valueT1.html(this.value);
    valueT2.html(this.value);
    valueT3.html(this.value);
    valueT4.html(this.value);
    valueT5.html(this.value);
    document.getElementById("trans2").max = this.value;
    document.getElementById("trans3").max = this.value;
    document.getElementById("trans4").max = this.value;
    document.getElementById("trans5").max = this.value;

    document.getElementById("trans2").value = this.value;
    document.getElementById("trans3").value = this.value;
    document.getElementById("trans4").value = this.value;
    document.getElementById("trans5").value = this.value;

    valueT12.html(0);
    valueT13.html(0);
    valueT14.html(0);
    valueT15.html(0);

    valueRemainTrans1 = document.getElementById("trans1").max - this.value;
    valueRemainTrans2 = document.getElementById("trans2").max - document.getElementById("trans2").value;
    valueRemainTrans3 = document.getElementById("trans3").max - document.getElementById("trans3").value;
    valueRemainTrans4 = document.getElementById("trans4").max - document.getElementById("trans4").value;
    valueRemainTrans5 = document.getElementById("trans5").max - document.getElementById("trans5").value;

    setTransGraph();
});

var rangeT2 = $('.range-slider__rangeT2'),
    valueT2 = $('.range-slider__valueT2');
valueT12 = $('.range-slider__valueTT2');

valueT2.html(rangeT2.attr('value'));
valueT12.html(rangeT2.attr('valueT'));

rangeT2.on('input', function () {
    valueT12.html(document.getElementById("trans2").max - this.value);
    valueT2.html(this.value);
    valueT3.html(this.value);
    valueT4.html(this.value);
    valueT5.html(this.value);
    document.getElementById("trans3").max = this.value;
    document.getElementById("trans4").max = this.value;
    document.getElementById("trans5").max = this.value;

    document.getElementById("trans3").value = this.value;
    document.getElementById("trans4").value = this.value;
    document.getElementById("trans5").value = this.value;

    valueT13.html(0);
    valueT14.html(0);
    valueT15.html(0);

    valueRemainTrans1 = document.getElementById("trans1").max - document.getElementById("trans1").value;
    valueRemainTrans2 = document.getElementById("trans2").max - this.value;
    valueRemainTrans3 = document.getElementById("trans3").max - document.getElementById("trans3").value;
    valueRemainTrans4 = document.getElementById("trans4").max - document.getElementById("trans4").value;
    valueRemainTrans5 = document.getElementById("trans5").max - document.getElementById("trans5").value;

    setTransGraph();

});

var rangeT3 = $('.range-slider__rangeT3'),
    valueT3 = $('.range-slider__valueT3');
valueT13 = $('.range-slider__valueTT3');

valueT3.html(rangeT3.attr('value'));
valueT13.html(rangeT3.attr('valueT'));
rangeT3.on('input', function () {
    valueT13.html(document.getElementById("trans3").max - this.value);
    valueT3.html(this.value);
    valueT4.html(this.value);
    valueT5.html(this.value);
    document.getElementById("trans4").max = this.value;
    document.getElementById("trans5").max = this.value;

    document.getElementById("trans4").value = this.value;
    document.getElementById("trans5").value = this.value;

    valueT14.html(0);
    valueT15.html(0);

    valueRemainTrans1 = document.getElementById("trans1").max - document.getElementById("trans1").value;
    valueRemainTrans2 = document.getElementById("trans2").max - document.getElementById("trans2").value;
    valueRemainTrans3 = document.getElementById("trans3").max - this.value;
    valueRemainTrans4 = document.getElementById("trans4").max - document.getElementById("trans4").value;
    valueRemainTrans5 = document.getElementById("trans5").max - document.getElementById("trans5").value;

    setTransGraph();
});

var rangeT4 = $('.range-slider__rangeT4'),
    valueT4 = $('.range-slider__valueT4');
valueT14 = $('.range-slider__valueTT4');
valueT4.html(rangeT4.attr('value'));
valueT14.html(rangeT4.attr('valueT'));

rangeT4.on('input', function () {
    valueT14.html(document.getElementById("trans4").max - this.value);
    valueT4.html(this.value);
    valueT5.html(this.value);
    document.getElementById("trans5").max = this.value;
    document.getElementById("trans5").value = this.value;

    valueT15.html(0);

    valueRemainTrans1 = document.getElementById("trans1").max - document.getElementById("trans1").value;
    valueRemainTrans2 = document.getElementById("trans2").max - document.getElementById("trans2").value;
    valueRemainTrans3 = document.getElementById("trans3").max - document.getElementById("trans3").value;
    valueRemainTrans4 = document.getElementById("trans4").max - this.value;
    valueRemainTrans5 = document.getElementById("trans5").max - document.getElementById("trans5").value;

    setTransGraph();
});

var rangeT5 = $('.range-slider__rangeT5'),
    valueT5 = $('.range-slider__valueT5');
valueT15 = $('.range-slider__valueTT5');
valueT5.html(rangeT5.attr('value'));
valueT15.html(rangeT5.attr('valueT'));

rangeT5.on('input', function () {
    valueT15.html(document.getElementById("trans5").max - this.value);
    valueT5.html(this.value);

    valueRemainTrans1 = document.getElementById("trans1").max - document.getElementById("trans1").value;
    valueRemainTrans2 = document.getElementById("trans2").max - document.getElementById("trans2").value;
    valueRemainTrans3 = document.getElementById("trans3").max - document.getElementById("trans3").value;
    valueRemainTrans4 = document.getElementById("trans4").max - document.getElementById("trans4").value;
    valueRemainTrans5 = document.getElementById("trans5").max - this.value;

    setTransGraph();
});

function setTransGraph(){
    var myArray = [];
    myArray["0"] = valueRemainTrans1;
    myArray["1"] = valueRemainTrans2;
    myArray["2"] = valueRemainTrans3;
    myArray["3"] = valueRemainTrans4;
    myArray["4"] = valueRemainTrans5;

    var basicId = document.getElementById("basicId").value;
    var rangeBarValue = {};
    rangeBarValue["basicId"] = basicId;
    rangeBarValue["sectore"] = "Transport";
    rangeBarValue["myArray"] = myArray;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/postIntervantionGraph.php",
        contentType: "application/json",
        data: JSON.stringify(rangeBarValue),
        success: function (data) {
            var divList = JSON.parse(data);

        }
    });
}

// // AFOLU range bar start
var rangeAF1 = $('.range-slider__rangeAF1'),
    valueAF1 = $('.range-slider__valueAF1');
valueAF11 = $('.range-slider__valueAFF1');

valueAF1.html(rangeAF1.attr('value'));

valueAF11.html(rangeAF1.attr('valueAF'));
rangeAF1.on('input', function () {
    valueAF11.html(document.getElementById("AFOLU1").max - this.value);
    valueAF1.html(this.value);
    valueAF2.html(this.value);
    document.getElementById("AFOLU2").max = this.value;
    document.getElementById("AFOLU2").value = this.value;
    valueAF12.html(0);

    valueRemainAfolu1 = document.getElementById("AFOLU1").max - this.value;
    valueRemainAfolu2 = document.getElementById("AFOLU2").max - document.getElementById("AFOLU2").value;

    setAfoluGraph();

});
var rangeAF2 = $('.range-slider__rangeAF2'),
    valueAF2 = $('.range-slider__valueAF2');
valueAF12 = $('.range-slider__valueAFF2');
valueAF2.html(rangeAF2.attr('value'));
valueAF12.html(rangeAF2.attr('valueAF'));
rangeAF2.on('input', function () {
    valueAF12.html(document.getElementById("AFOLU2").max - this.value);
    valueAF2.html(this.value);

    valueRemainAfolu1 = document.getElementById("AFOLU1").max - document.getElementById("AFOLU1").value;
    valueRemainAfolu2 = document.getElementById("AFOLU2").max - this.value;
    setAfoluGraph();
});


function setAfoluGraph() {
    var myArray = [];
    myArray["0"] = valueRemainAfolu1;
    myArray["1"] = valueRemainAfolu2;

    var basicId = document.getElementById("basicId").value;
    var rangeBarValue = {};
    rangeBarValue["basicId"] = basicId;
    rangeBarValue["sectore"] = "AFOLU";
    rangeBarValue["myArray"] = myArray;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/postIntervantionGraph.php",
        contentType: "application/json",
        data: JSON.stringify(rangeBarValue),
        success: function (data) {
            var divList = JSON.parse(data);

        }
    });

}

// // Waste range bar start
var rangew1 = $('.range-slider__rangew1'),
    valuew1 = $('.range-slider__valuew1');
valuew11 = $('.range-slider__valueww1');

valuew1.html(rangew1.attr('value'));
valuew11.html(rangew1.attr('valueW'));

rangew1.on('input', function () {
    valuew11.html(document.getElementById("W1").max - this.value);
    valuew1.html(this.value);
    valuew2.html(this.value);
    document.getElementById("W2").max = this.value;
    document.getElementById("W2").value = this.value;
    valuew12.html(0);

    valueRemainWaste1 = document.getElementById("W1").max - this.value;
    valueRemainWaste2 = document.getElementById("W2").max - document.getElementById("W2").value;
    setWasteGraph();
});
var rangew2 = $('.range-slider__rangew2'),
    valuew2 = $('.range-slider__valuew2');
valuew12 = $('.range-slider__valueww2');

valuew2.html(rangew2.attr('value'));
valuew12.html(rangew2.attr('valueW'));

rangew2.on('input', function () {
    valuew12.html(document.getElementById("W2").max - this.value);
    valuew2.html(this.value);

    valueRemainWaste1 = document.getElementById("W1").max - document.getElementById("W1").value;
    valueRemainWaste2 = document.getElementById("W2").max - this.value;
    setWasteGraph();
});

function setWasteGraph() {
    var myArray = [];
    myArray["0"] = valueRemainWaste1;
    myArray["1"] = valueRemainWaste2;

    var basicId = document.getElementById("basicId").value;
    var rangeBarValue = {};
    rangeBarValue["basicId"] = basicId;
    rangeBarValue["sectore"] = "Waste";
    rangeBarValue["myArray"] = myArray;

    $.ajax({
        type: "POST",
        async: false,
        url: "php/postIntervantionGraph.php",
        contentType: "application/json",
        data: JSON.stringify(rangeBarValue),
        success: function (data) {
            var divList = JSON.parse(data);

        }
    });
}

// // Industry range bar start
var rangei1 = $('.range-slider__rangei1'),
    valuei1 = $('.range-slider__valuei1');
valuei11 = $('.range-slider__valueii1');

valuei1.html(rangei1.attr('value'));
valuei11.html(rangei1.attr('valueI'));

rangei1.on('input', function () {
    valuei11.html(document.getElementById("indu1").max - this.value);
    valuei1.html(this.value);
    valuei2.html(this.value);
    valuei3.html(this.value);
    document.getElementById("indu2").max = this.value;
    document.getElementById("indu3").max = this.value;
    document.getElementById("indu2").value = this.value;
    document.getElementById("indu3").value = this.value;

    valuei21.html(0);
    valuei31.html(0);

    valueRemainIndu1 = document.getElementById("indu1").max - this.value;
    valueRemainIndu2 = document.getElementById("indu2").max - document.getElementById("indu2").value;
    valueRemainIndu3 = document.getElementById("indu3").max - document.getElementById("indu3").value;


    setInduGraph();

});
var rangei2 = $('.range-slider__rangei2'),
    valuei2 = $('.range-slider__valuei2');
valuei21 = $('.range-slider__valueii2');

valuei2.html(rangei2.attr('value'));
valuei21.html(rangei2.attr('valueI'));
rangei2.on('input', function () {
    valuei21.html(document.getElementById("indu2").max - this.value);
    valuei2.html(this.value);
    valuei3.html(this.value);
    document.getElementById("indu3").max = this.value;
    document.getElementById("indu3").value = this.value;


    valuei3.html(0);

    valueRemainIndu1 = document.getElementById("indu1").max - document.getElementById("indu1").value;
    valueRemainIndu2 = document.getElementById("indu2").max - this.value;
    valueRemainIndu3 = document.getElementById("indu3").max - document.getElementById("indu3").value;


    setInduGraph();
});

var rangei3 = $('.range-slider__rangei3'),
    valuei3 = $('.range-slider__valuei3');
valuei31 = $('.range-slider__valueii3');

valuei3.html(rangei3.attr('value'));
valuei31.html(rangei3.attr('valueI'));

rangei3.on('input', function () {
    valuei31.html(document.getElementById("indu3").max - this.value);
    valuei3.html(this.value);

    valueRemainIndu1 = document.getElementById("indu1").max - document.getElementById("indu1").value;
    valueRemainIndu2 = document.getElementById("indu2").max - document.getElementById("indu2").value;
    valueRemainIndu3 = document.getElementById("indu3").max - this.value;
    setInduGraph();
});

// function setInduGraph(){
//     var myArray = [];
//     myArray.push(valueRemainIndu1);
//     myArray.push(valueRemainIndu2);
//     myArray.push(valueRemainIndu3);

//     var basicId = document.getElementById("basicId").value;
//     var rangeBarValue = {};
//     rangeBarValue["basicId"] = basicId;
//     rangeBarValue["sectore"] = "Industry";
//     rangeBarValue["myArray"] = myArray;

//     $.ajax({
//         type: "POST",
//         async: false,
//         url: "php/postIntervantionGraph.php",
//         contentType: "application/json",
//         data: JSON.stringify(rangeBarValue),
//         success: function (data) {
//             var divList = JSON.parse(data);

//         }
//     });
// }




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

function getCardData() {
    var myobj = {};
    var basicId = document.getElementById("basicId").value;
    myobj["basicId"] = basicId;
    $.ajax({
        type: "POST",
        async: false,
        url: "php/emiPieChart.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);
            $.each(divList, function (index, element) {
                var category = element.category;
                var value = element.value;
                value = value.toFixed(2);
                $("#" + category).append(value + "&nbsp;tons/year");
            })
        }
    });
}



