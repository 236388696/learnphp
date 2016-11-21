<?php

$testFloat = 0.58;
// 我在这里使用html作为定界符标识（定界符标识是可以自定义的）
echo <<<html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>$testFloat
</head>
<body>
    
</body>
</html>
html;

echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Document</title>$testFloat
</head>
<body>
    
</body>
</html>";