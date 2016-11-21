<?php
    //定义一个person类
    class Person{
        //在这里定义属性用var
        var $sex;//默认是public类型(任何地方都能访问)
        //公用的属性
        public $name;
        //受保护的属性
        protected $size;//只有子类和自己能访问,外部不能
        //私有的属性
        private $hiddy;//只有自己能访问
        //常量
        const x = 20;
        //定义一个方法
        function sayHello(){
            echo "你好,欢迎!";
        }
        //构造方法
        function __construct($age)
        {
            $this->age = $age;
            //一般在new Person()的时候调用
        }
        //析构方法(一般在对象被销毁的时候自动调用)
        function __destruct()
        {
            // TODO: Implement __destruct() method.
        }
    }
    //2.使用person类
    //如果构造方法有参数,则需要传递参数
    $per = new Person(39);
    //访问属性
    echo $per->age;
    echo "<br>";
    //调用方法
    echo $per->sayHello();
    //3.继承
    class Student extends Person{
        public $grade;
        //get用于获取某个属性的值
        function getName(){
            $this->name;
        }
        //重写父类的方法
        function sayHello()
        {
            //调用父类方法
            parent::sayHello();
            //自己实现一些东西
            echo "hello,学妹";
        }
    }
    //因为Student是继承于Person,所以会继承构造方法
    //所以需要传入年龄
    $stu = new Student(18);
    echo "<br>";
    $stu->sayHello();
    echo "<br>";
    echo $stu->age;
    //访问类中的常量
    echo "<br>";
    //访问Person类中x常量
    echo Person::x;

    //练习
    class Animal{
        var $sex;
        public $name;
        protected $size;
        const x = 20;
        function __construct($age)
        {
            $this->age = $age;
        }
    }
    class Dog extends Animal{
        public $color;
        function __construct($age)
        {
            parent::__construct($age);
        }
    }
    $dog = new Dog(6);
    echo "<br>";
    $dog->__construct(6);
    echo $dog->age;
    //4.抑制符@(慎用)
    //不会把警告/错误信息,显示在前端html网页上
    $arr = [1,2];
    echo @$arr[5];
?>
