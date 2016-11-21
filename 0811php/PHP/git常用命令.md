# git常用命令
1.初始化当前仓库
   git init
   
2.添加
   git add .         //.是添加所有文件到暂存区
   git add 1.txt     // 可以每次只添加单个文件
   
3.提交
   git commit -m"注释"
   
4.添加远程仓库关联
   git remote add <name> <url>
   //xx是给远程仓库起一个简短的别名
   git remote add xx https://git.oschina.net/pp236388696/gitTest.git 
   
5.拉取
   //前面是远程分支：本地分支
   git pull xx master:master
        
        
6.推送
        git push xx master:master
        