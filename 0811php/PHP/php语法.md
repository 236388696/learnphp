#php基础语法 （#h1）

##数据类型

1.int
     1.php中＋只能计算，不能拼接
2.double
3.bool
4.string
     1.单引号和js中引号作用相同，纯字符串
     2.双引号中如果有变量，会被解析，使用时为了方便区分变量，变量名套     大括号
     3.字符串拼接用"."

5.array数组
        数组分为两种：
        1.索引数组
        2.关联数组
6.object
7.resource 资源类型

##函数
1.函数内部不能直接使用全局变量，如果使用需要用global在内部声明
2.static关键字，表示静态变量，变量只会初始化一次


##魔术变量


###文件

####文件读取
文件打开有三种方式，前两种需要打开文件之后读取或者写入或者追加
![](/Applications/XAMPP/xamppfiles/htdocs/0811/php2/img1.jpg)
//1.打开文件
$file=fopen("1.txt","r");
//2.根据长度读取文件
echo fread($file,10);
//3.按行读取
echo fgets($file);
//4.关闭文件
fclose($file);

//下面这种不需要打开文件即可获取内容
file_get_contents("xx.txt);


####文件写入
打开文件写入
//1.打开文件,w为覆盖写入，a为追加内容
$file=fopen("1.txt","w");
//2.写入内容
fwrite($file,"内容");
//3.关闭文件
fclose($file);

//不需要打开文件，直接写入
  file_put_contents("1.txt","内容");
  
  
####重命名
  rename("旧名字","新名字");
  
  
  
####拷贝
  copy("源文件","目标路径");
  
  
####删除
  unlink("1.txt");
  
###文件夹

   



