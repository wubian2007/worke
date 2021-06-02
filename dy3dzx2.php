<html>

<head>

<title>3D直选2表展示</title>

<meta charset="UTF-8">

<script type="text/javascript" src="ceshi.js"></script>



</head>

<body>

<center>

<?php



$db_host='localhost';      //MYSQL服务器名

$db_user="3dp3";       //MYSQL用户名

$db_pass="aabb8899";       //MYSQL用户对应密码

$db_name="3dp3";      //要操作的数据库

//使用mysql_connect()函数对服务器进行连接，如果出错返回相应信息

$link=mysqli_connect($db_host,$db_user,$db_pass)or die("不能连接到服务器".mysqli_error());

mysqli_select_db($link,$db_name);   //选择相应的数据库，这里选择test库

$sql="select * from 3DZX2";     //先执行SQL语句显示所有记录以与插入后相比较

$result=mysqli_query($link,$sql);   //使用mysql_query()发送SQL请求

if(!empty($_POST['del'])){ //点击提交按钮后才执行  

        $sql2 = "truncate 3DZX2";//从数据库中查询数据

        	$query = mysqli_query($link,$sql2);

        	$row = mysqli_fetch_assoc($query);//数据结果集

        	header("location:dy3dzx.php");

    }
else if(!empty($_POST['touzhu']))//点击提交按钮delone后才执行
{
    $sql3 = "update  P3ZX3 set  tj='YES' where ID='{$_POST[ID]}';
    $query2 = mysqli_query($link,$sql3);
    $row = mysqli_fetch_assoc($query2);
    if ($query2)
    //header("location:del3dzx.php");
    //header("location:zxjsq.html");

echo "当前表中的记录有：";

echo "<table border=1 style=word-break:break-all; word-wrap:break-all;>";     //使用表格格式化数据

echo "<tr><td width=50>编号</td><td width='600px'>号码</td><td width=50>倍数</td><td width=100>一键复制</td></tr>";

while($row=mysqli_fetch_array($result))  //遍历SQL语句执行结果把值赋给数组

{

 echo "<tr>";

 echo "<td>".$row['id']."</td>";   //显示ID

 echo "<td><p id=p".$row['id'].">".$row['haoma']." </p></td>";  //显示姓名

 echo "<td>".$row['beishu']." </td>";   //显示邮箱

 echo "<td><button>复制</button></td>";  //显示地址

 echo "</tr>";

}

echo "</table>";

?>

<form id="contact-form" method="POST" action="" >

         <input type="submit" name="del" value="一键清空表数据" />

</form>
<form id="contact-form" method="post" action="" >

         <input type="submit" name="touzhu" value="一键投注" />

</form>
</center>

<textarea id="input" rows="5" cols="150">这里核对被复制的内容</textarea>

<script>

             var but=document.getElementsByTagName('button');

             for(i=0;i<but.length;i++){

                 but[i].setAttribute('i',i+1);

                 but[i].onclick=function(){

                     b=this.getAttribute('i');

                     //alert('这是第'+b+'个按钮');

                     var pcolor='p'+b;

                     var text = document.getElementById(pcolor).innerText;

                    var input = document.getElementById("input");

                    input.value = text; // 修改文本框的内容

                    input.select(); // 选中文本

                    document.execCommand("copy"); // 执行浏览器复制命令

                     alert('第'+b+'组复制成功');

                     document.getElementById(pcolor).style.background='red';

                     }

             }

         </script>



</body>

</html>