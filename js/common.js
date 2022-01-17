window.onload = function () {
    abc(); //Make sure the function fires as soon as the page is loaded
    // setTimeout(abc, 6000); //Then set it to run again after ten minutes
}
function customInputValidator(eleValue, eleName) {
    var flag = 0;
    if (eleValue == "") {
        if (eleName[0] == '#') {
            $(eleName).addClass("is-invalid");

        } else {
            $("input[name=" + eleName + "]").addClass("is-invalid");
        }
        flag--;

    } else {
        if (eleName[0] == '#') {
            $(eleName).removeClass("is-invalid");
        } else {
            $("input[name=" + eleName + "]").removeClass("is-invalid");
        }
    }
    return flag;
}
function abc() {
    var msg = "<div class='progress'>"
        + "<div class='progress-bar' role='progressbar' style='width: 25%;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>25%</div>"
        + "</div>"
    jBoxBottomRightBigNotice("Warning", msg, "yellow", "2000000");
}

function jBoxBottomRightBigNotice(title, msg, color, time) {
    new jBox('Notice', {
        attributes: {
            x: 'right',
            y: 'top'
        },
        animation: {
            open: 'slide',
            close: 'zoomIn'
        },
        // responsiveWidth:true,
        width: 300,
        // //maxWidth: 600000,
        // delayOnHover: true,
        // showCountdown: true,
        closeButton: true,
        // closeOnClick:true,
        audio: 'assets/vendor/jbox/audio/beep3',
        autoClose: time,
        color: color,
        title: title,
        content: msg
    });

}
