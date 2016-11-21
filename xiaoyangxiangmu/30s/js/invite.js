var up = null;
var down = null;
$("#inf_name").text(nickname);
$("#inf_score span").text(score);
$("#inf_paiming span").text(shenglv);
$("#inf_jingji").on("touchstart",function () {
    $("#invite_friend").hide();
    $("#in_complete").show();
    up = true;
    $.ajax({
        url:"php/invite_api.php",
        type:"post",
        dataType:"json",
        data:{
            type:"up",
            numState:up,
            openid:openid
        }
    });
});
$("#inf_tiaoz").on("touchstart",function () {
    $("#invite_friend").hide();
    $("#in_complete").show();
    down = true;
    $.ajax({
        url:"php/invite_api.php",
        type:"post",
        dataType:"json",
        data:{
            type:"down",
            numState:down,
            openid:openid
        }
    });
});