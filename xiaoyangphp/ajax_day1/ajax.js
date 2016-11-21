/**
 * Created by dllo on 16/8/15.
 */

// 用来处理url,以及传入的参数
// par 为传入的参数--> 对象{xx:xx,xx:xx}
function addPath(url,type,par) {
    var arr = [];
    // 把对象形式转为 [xx=xx,xx=xx]
    for(prop in par){
        arr.push(prop+"="+par[prop]);
    }
    // 把数组的元素通过 &符号 拼接成 xx=xx&xx=xx
    var str = arr.join("&");
    if (type == "get"){
        return url+"?"+str;
    }else if(type == "post"){
        return str;
    }
}

function ajaxFn(obj) {
    var ajaxObj;
    if(window.XMLHttpRequest){
        ajaxObj = new XMLHttpRequest();
    }else{
        ajaxObj = ActiveXObject("Microsoft.XMLHTTP");
    }
    // 默认为get
    obj.type = obj.type || "get";
    if(obj.type.toUpperCase() == "GET"){
        ajaxObj.open("GET",addPath(obj.url,"get",obj.data),true);
        ajaxObj.send();
    }else if (obj.type.toUpperCase() == "POST"){
        ajaxObj.open("POST",obj.url,true);
        // 设置请求头文件
        ajaxObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajaxObj.send(addPath(obj.url,"post",obj.data));
    }

    ajaxObj.onreadystatechange = function () {
        // console.log(ajaxObj.readyState);
        if(ajaxObj.readyState == 4){
            if(ajaxObj.status == 200){
                if (obj.success){
                    obj.success(ajaxObj.responseText);
                }
            }
        }
    }
}