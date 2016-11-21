<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/1
 * Time: 下午2:41
 */

header("Content-type:text/html;charset=utf8");
//类class
class person{
    //定义完的东西不能变，就叫常量;类中的常量，声明之后不能改变，在外部用Person::num访问
    const num=20;

    //静态变量：通过类可以直接访问，不需要实例化      函数里的：static，只初始化一次
    public static $a=30;

    //静态方法:通过类直接访问
    static  function sayHello(){
        echo "hello";
    }


    //属性的可见度
    //public公开的(可见度的)，在类的外部可以看访问
    public $name="大耳朵图图";
    //受保护的，只在本类和子类中可以访问，外界无法访问
    protected $age=20;
    //私有的，只在本类中可以访问，子类和外界都无法访问
    private $sex="男";

    //function类里面叫做方法，拿出来就叫函数
    //在类的外部如果要获取受保护的或者私有的属性，只能通过方法得到
    public function sayHi(){
        echo "嗨";
        //$this表示当前的对象
        echo $this->sex;
    }
}


//声明了一个人类的子类，子类，继承于上面的person类；extends继承
class Man extends person {
   function getAge(){
       echo $this->age;
   }
}


//新建一个对象(实例出一个对象)
$per=new Person();
//取属性通过箭头，获取对象的属性
 echo $per->name;

//取方法也通过箭头，调用对象的方法
$per->sayHi();


$man=new Man();
echo $man->name;
$man->getAge();

//访问类中的常量
echo person::num;
//访问类中的静态常量
echo person::$a;

PDO::FETCH_ASSOC;

Person::sayHello();


