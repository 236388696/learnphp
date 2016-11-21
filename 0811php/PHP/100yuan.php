<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/27
 * Time: 下午3:51
 */
//100元，每天花一半，几天能花完（1元以下结束），分别用for，whlie实现
$day=0;
$money=100;
 for(;$money>=1;$day++){
      $money/=2;
 }
  echo  $day;

echo "<br>";
$money=100;$day=0;
while ($money>=1){
    $money/=2;
    $day++;
}
echo  $day;

echo "<br>";
function pay($money){
    static  $day=0;
    if($money<1){
        return $day;
    }else{
        $day++;
        return pay($money/2);
    }
}
echo pay(100);
