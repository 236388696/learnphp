/**
 * Created by dllo on 16/11/2.
 */
function ajax(method,url,dataObj,success) {
    var dataArr=[];
    //把｛a:1,b:2}变成a=1&b=2
    for(var prop in dataObj){
        //dataArr->["a=1","b=2"]
        dataArr.push(prop+"="+dataObj[prop]);

    }
    //join函数，把数组中的元素以某个字符连接成字符串
    var dataStr=dataArr.join("&");
    //ajax 异步的js和xml（ Asynchronous JavaScript and XML）；
    //XMLHttpRequest网络请求
    //针对的是现代浏览器
    var xhr;
    if(window.XMLHttpRequest){
        xhr= new XMLHttpRequest();
    }else{
        //IE浏览器
        xhr= new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open(method,url,true);
    if(method.toUpperCase()=="GET"){
        xhr.open(method,url+"?"+dataStr,true);
        xhr.send();
    }else if(method.toUpperCase()=="POST"){
        xhr.open(method,url,true);
        //post必须加的，设置请求头，即告诉后台发送的内容的格式
        //1.打开网络请求
        //参数1请求方法  参数2请求路径  参数3是否异步，true异步，false同步
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        //2.发送
        xhr.send(dataStr);
    }





    //3.监听状态
    xhr.onreadystatechange=function () {
        //readyState状态
        console.log(xhr.readyState);
        //4.代表请求完成
        if(xhr.readyState==4){
            //http协议状态码：2xx成功  3xx表示重定向  4xx表示客户端错误  5xx表示服务器错误
            console.log(xhr.status);
            if(xhr.status==200){
                success(xhr.responseText);
            }
        }
    }


}


