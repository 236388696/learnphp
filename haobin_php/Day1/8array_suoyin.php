<?php
$arr = [1, 2, 3, 4, 5];
$arr[3] = "nihao";
print_r($arr);
$arr[] = "再见";//1.不指定下表,会往后追加元素
print_r($arr);

#2.清空某个元素的值,下标不会往前挪
unset($arr[1]);
echo "<br>";
print_r($arr);
echo "<br>";
print_r(count($arr));

#3.array_unique()去重,不会改变原数组,而是返回去重后的新数组
$arr2 = [1, 1, 2, 5, 5, 9, 10, 10];
$arr3 = array_unique($arr2);
echo "<br>";
print_r($arr3);

#4.array_pop()删除最后一个元素
array_pop($arr2);
echo "<br>";
print_r($arr2);
#array_push()添加一个元素到最后
array_push($arr2, "hello");
echo "<br>";
print_r($arr2);

//5.array_shift()
$arr4 = [4, true, "hello", 5];
array_shift($arr4);//删除第一个元素
array_unshift($arr4, "tou");//在数组头部添加元素
echo "<br>";
print_r($arr4);

//6.explode()根据  把字符串拆成数组
$str = "12,34,57";
$arr5 = explode(",", $str);
echo "<br>";
print_r($arr5);

#7.implode()把数组每个元素用,链接成字符串
$arr6 = ["hello", "word", "nihao", "byebye"];
$str2 = implode(",", $arr6);
echo "<br>";
echo $str2;

#8.array_sum()求和
$arr7 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
echo "<br>";
echo array_sum($arr7);

//9.array_reverse()返回一个颠倒顺序的数组
$arr8 = array_reverse($arr7);
echo "<br>";
print_r($arr8);

#10.array_map(方法,数组)函数,在方法里可以拿到每一个元素,惊醒操作
#然后返回一个新的数组(不影响原数组)
$arr9 = [1, 3, 5, 7, 11];
$arr10 = array_map(function ($i) {
    return $i + 100;
}, $arr9);
echo "<br>";
print_r($arr10);
?>
