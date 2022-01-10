$(document).ready(function () {
    addChart();
})

function addChart() {

    var type = document.getElementById("sectionType").value;

    am5.ready(function () {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new(type);


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
        var data = [{
            country: "Akola",
            value: 22
        }, {
            country: "Achalpur",
            value: 67
        }, {
            country: "Amravati",
            value: 75
        }, {
            country: "Yavatmal",
            value: 56
        }, {
            country: "Aurangabad",
            value: 46
        }, {
            country: "Beed",
            value: 97
        }, {
            country: "Jalna",
            value: 45
        }, {
            country: "Latur",
            value: 65
        }, {
            country: "Udgir",
            value: 75
        }, {
            country: "Nanded",
            value: 67
        }, {
            country: "Osmanabad",
            value: 62
        }, {
            country: "Parbhani",
            value: 86
        }, {
            country: "Greater Mumbai",
            value: 56
        }, {
            country: "Vasai",
            value: 76
        }, {
            country: "Panvel",
            value: 58
        }, {
            country: "Ambernath",
            value: 76
        }, {
            country: "Badlapur",
            value: 67
        }, {
            country: "Bhiwandi",
            value: 53
        }, {
            country: "Kalyan",
            value: 83
        }, {
            country: "Mira Bhayandar",
            value: 74
        }, {
            country: "Navi Mumbai",
            value: 55
        }, {
            country: "Thane",
            value: 73
        }, {
            country: "Ulhasnagar",
            value: 58
        }, {
            country: "Chandrapur",
            value: 71
        }, {
            country: "Gondia",
            value: 77
        }, {
            country: "Nagpur",
            value: 55
        }, {
            country: "Hinganghat",
            value: 44
        }, {
            country: "Wardha",
            value: 71
        }, {
            country: "Ahmednagar",
            value: 77
        }, {
            country: "Dhule",
            value: 55
        }, {
            country: "Bhusawal",
            value: 44
        }, {
            country: "Jalgaon",
            value: 12
        }, {
            country: "Nandurbar",
            value: 33
        }, {
            country: "Malegaon",
            value: 42
        }, {
            country: "Nashik",
            value: 37
        }, {
            country: "Ichalkaranji",
            value: 14
        }, {
            country: "Kolhapur",
            value: 62
        }, {
            country: "Pimpri-Chinchwad",
            value: 52
        }, {
            country: "Pune",
            value: 64
        }, {
            country: "Sangli Miraj Kupwad",
            value: 87
        }, {
            country: "Satara",
            value: 52
        }, {
            country: "Barshi",
            value: 83
        }, {
            country: "Solapur",
            value: 73
        }];


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

