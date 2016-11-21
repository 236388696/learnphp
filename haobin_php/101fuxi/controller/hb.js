function setCookie(name, value, expires){
    var date = new Date();
    date.setTime(date.getTime() + expires * 24 * 3600 * 1000);
    document.cookie = name + "=" + value + ";expires=" + date.toUTCString();
}
function getCookie(name){
    var cookie = document.cookie;
    var cookieArr = cookie.split(";");
    for (var i = 0; i < cookieArr.length; i++){
        var cookies = cookieArr[i].split("=");
    }
//        trim() 防止2边有空格
    if (cookies[0].trim() == name){
        return cookies[1].trim();
    }
}
