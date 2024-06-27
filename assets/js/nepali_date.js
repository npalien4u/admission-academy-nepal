var nepaliUnicodeNumber = function(value) {
    //console.log("reached here");
    var strValue = value.toString();
    var unicodeChars = "१२३४५६७८९०";
    var normalChars = "1234567890";
    var strLen = strValue.length;

    var unicodeValue = strValue;

    for (x = 0; x < strLen; x++) {
        var pos = normalChars.indexOf(unicodeValue.charAt(x));
        unicodeValue = unicodeValue.replace(normalChars.charAt(pos), unicodeChars.charAt(pos));
    }

    return unicodeValue;
}