function saveBasic(){
    
    var flag = 0;
    var userData = {};


    var popu = document.getElementById("popu").value;
    flag += customInputValidator(popu, "popu");
    var female = document.getElementById("female").value;
    flag += customInputValidator(female, "female");
    var male = document.getElementById("male").value;
    flag += customInputValidator(male, "male");
    var city = document.getElementById("city").value;
    flag += customInputValidator(city, "city");

    var gArea = document.getElementById("gArea").value;
    flag += customInputValidator(gArea, "gArea");
    var tArea = document.getElementById("tArea").value;
    flag += customInputValidator(tArea, "tArea");
    var lite = document.getElementById("lite").value;
    flag += customInputValidator(lite, "lite");

    var gdp = document.getElementById("gdp").value;
    flag += customInputValidator(gdp, "gdp");
    var edu = document.getElementById("edu").value;
    flag += customInputValidator(edu, "edu");
    var hospital = document.getElementById("hospital").value;
    flag += customInputValidator(hospital, "hospital");

    userData["popu"] = popu;
    userData["female"] = female;
    userData["male"] = male;
    userData["city"] = city;
    userData["tArea"] = tArea;
    userData["gArea"] = gArea;
    userData["lite"] = lite;
    userData["gdp"] = gdp;
    userData["edu"] = edu;
    userData["hospital"] = hospital;
    if(flag == 0){
        $.ajax({
            type: "POST",
            async: false,
            url: "php/saveBasicInfo.php",
            contentType: "application/json",
            data: JSON.stringify(userData),
            success: function (data) {
                if (data == "success") {
                    alert("Data Save Succesfuly");
                    window.location.replace("./index.php");
                } else {
                    alert("Data not Save Succesfuly")
                }

            }
        });
    }

}