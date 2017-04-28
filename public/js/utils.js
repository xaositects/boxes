function errorMsg(loc, msg) {
    var pop = $('<div class="ui attached warning message"><i class="close icon"></i><div class="header">' + msg + '</div>');
    $(loc).before(pop);
}

function Msg(msg, time) {
    Materialize.toast(msg, (time ? time : 5000));
}

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

var hexDigits = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f");

//Function to convert hex format to a rgb color
function rgb2hex(rgb) {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    if (rgb != null) {
        return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }
}

function hex(x) {
    return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
}

function objToArr(obj) {
    return $.map(obj, function (val, idx) { return [val]; });
}