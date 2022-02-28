<html>
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");

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
  "Sectore": "USA",
  "emission": 3.5,
  "changeemi": 4.2
}, {
  "Sectore": "UK",
  "emission": 1.7,
  "changeemi": 3.1
}, {
  "Sectore": "Canada",
  "emission": 2.8,
  "changeemi": 2.9
}, {
  "Sectore": "Japan",
  "emission": 2.6,
  "changeemi": 2.3
}, {
  "Sectore": "France",
  "emission": 1.4,
  "changeemi": 2.1
}, {
  "Sectore": "Brazil",
  "emission": 2.6,
  "changeemi": 4.9
}];

// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  categoryField: "Sectore",
  renderer: am5xy.AxisRendererX.new(root, {}),
  tooltip: am5.Tooltip.new(root, {
    themeTags: ["axis"],
    animationDuration: 200
  })
}));

xAxis.data.setAll(data);

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  min: 0,
  renderer: am5xy.AxisRendererY.new(root, {})
}));

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

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
</html>