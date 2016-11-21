<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script src="secret.js"></script>
<script>
    //1.base64(可以加密也可以解密)
    var base = new Base64();
    var passWord = "lidongxu520123";
    //加密
    var baseStr = base.encode(passWord);
    console.log(baseStr);
    //解密
    var yuanStr = base.decode(baseStr);
    console.log(yuanStr);
    //2.md5(不可逆,就是不能解密);
    var md5Str = hex_md5(passWord);
    console.log(md5Str);
    //3.sha1(不可逆)
    var sha1Str = hex_sha1(passWord);
    console.log(sha1Str);
</script>
</body>
</html>