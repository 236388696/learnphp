/**
 * Created by dllo on 16/10/9.
 */

var express = require("express");
var mongoose = require("mongoose");
var app = express();
var db = mongoose.connect("mongodb://127.0.0.1:27017/users");

var UserSchema = new mongoose.Schema({
    firstName:{type:String},
    lastName:{type:String},
    password:{type:String}
},{
    collection:"users"
});

var Model = db.model("users",UserSchema);

// 插入模拟数据
//Model.create([{firstName:"张",lastName:"三",passw:"698d51a19d8a121ce581499d7b701668"},{firstName:"李",lastName:"四",passw:"698d51a19d8a121ce581499d7b701668"},{firstName:"王",lastName:"五",passw:"698d51a19d8a121ce581499d7b701668"}], function (err,doc) {
//    if (err){
//        console.error(err);
//    }else {
//        console.log(doc);
//    }
//});

app.get("/users", function (req,res) {
    var query = req.query;
    var act = query.act;
    switch (act){
        case "all":
            // 获取全部数据
            Model.find({}, function (err,doc) {
                if (err){
                    res.send({err:1});
                    console.error(err);
                }else {
                    console.log(doc);
                    //res.send({err:0,data:doc});
                    res.send(doc);
                }
            });
            break;
        case "add":
            var firstName = query.firstName;
            var lastName = query.lastName;
            var password = query.password;
            Model.create({firstName:firstName,lastName:lastName,password:password},function (err,doc) {
                if (err){
                    res.send({err:1})
                }else{
                    res.send({err:0,msg:"插入成功"})
                }
            })
            break;
        case "update":
            var firstName = query.firstName;
            var lastName = query.lastName;
            var password = query.password;
            Model.update({firstName:firstName,lastName:lastName},{$set:{password:password}},function (err,doc) {
                if (err){
                    res.send({err:1});
                }else{
                    res.send({err:0,msg:"更新成功"})
                }
            })
            break;
    }
});
app.get("*", function (req,res) {
    var path = __dirname + req.path;
    res.sendFile(decodeURI(path));
});
app.listen(8080);