$(document).ready(function () {
    addTable();
    $('#example').DataTable();
})
function addTable() {
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
    $("#example").append(html);//monali


}
