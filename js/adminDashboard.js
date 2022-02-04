$(document).ready(function () {
    addTable();
    $('#example').DataTable();
})
function addTable() {

    var myobj = {};
    myobj["type"] = "data";

    $.ajax({
        type: "POST",
        async: false,
        url: "php/adminDBTable.php",
        contentType: "application/json",
        data: JSON.stringify(myobj),
        success: function (data) {
            var divList = JSON.parse(data);
            var html = '';
            $.each(divList, function (index, element) {

                // $("#table").empty();
                html += '<tr><td> ' + element.id + '</td>'
                    + '<td>' + element.city + '</td>'
                    + '<td>' + element.emission + '</td>'
                    + '<td>' + element.data + '</td>'
                    + '</tr>';

            });

            $("#example").append(html);

        }
    });


}
