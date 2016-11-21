/**
 * Created by dllo on 16/10/8.
 */

var express =require("express");

var app = express();

app.get("/jsonp",function (req,res) {
    var query =  req.query;
    var name = query.name;
    var age  = query.age;
    var passw = query.passw;
    var cb = query.cb;
    var usrJson = {
        "usr":"用户名"+name,
        "passw":"密码"+passw,
        "age":"年龄"+age
    }
    res.send(cb+"("+ JSON.stringify(usrJson) +")")
})

app.listen(8080);
