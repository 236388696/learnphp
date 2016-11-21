<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/9
 * Time: 上午9:03
 */
header("Content-type:text/html;charset=utf-8");
//具有相同特征和行为归为一类
class Person{
    //类里的常量
    const x = 10;
    //公开的
    public $sex = "男";
    //受保护的
    //受保护的属性只能在类和子类中访问,在外部无法访问
    protected $name = "文文";
    //私有的
    //只能在本类中访问,外界和子类都无法访问
    private  $hobby = "苏";

    function sayHi(){
        echo "hi,约吗?";
    }
    var  $age;
    //构造函数
    //在类初始化的时候调用
    function __construct($age)
    {
        $this->age = $age;
    }
    //析构函数
    //在对象被内存回收时调用
    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
    //TODO:这里没写完
}

//子类继承于父类
class Student extends Person{
    //在外界想要访问被保护的属性,只能通过函数访问
    function getName(){
        echo $this->name;
    }
    //函数重载
    //子类中对父类的某一个方法有自己的实现方式,可以重写这个方法。
    function sayHi(){
        //parent::访问父类中的方法
        parent::sayHi();
        echo "不约";
    }
}

//访问类里面的常量
Person::x;
$per = new Person(20);
//公开的属性可以在外界随意访问,或者修改
echo $per ->sex;
$per ->sex = "女";
echo $per ->sex;

//echo $per->name;

//echo $per->hobby;

$stu = new Student(20);
$stu ->getName();
$stu ->sayHi();

$per1 = new Person(20);
echo $per1->age;


$arr = [1,2];
//抑止符 数组越界时使用
echo @$arr[2];