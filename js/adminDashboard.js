$(document).ready(function () {
    addTable();
    $('#example').DataTable();
})

function addTable() {

    // var myobj = {};
    // myobj["type"] = "data";

    // $.ajax({
    //     type: "POST",
    //     async: false,
    // url: "php/allcityData.php",
    // contentType: "application/json",
    //     data: JSON.stringify(myobj),
    //         success: function (data) {
    // var divList = JSON.parse(data);

    var city = "Vasai";
    var emission = "20 mton/day";
    var indexNo = 20;
    var html = '';
    // $("#table").empty();
    for (var i = 0; i <= indexNo; i++) {
        html += '<tr><td> ' + i + '</td>'
            + '<td>' + city + '</td>'
            + '<td>' + emission + '</td>'
            + '</tr>';
    }
    $("#example").append(html);



    // }
    // });
}
