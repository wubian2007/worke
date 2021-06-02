<html>

<head>

<title>P3原始订单</title>

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

$sql="select * from P3";     //先执行SQL语句显示所有记录以与插入后相比较

$result=mysqli_query($link,$sql);   //使用mysql_query()发送SQL请求

if(!empty($_POST['del'])){ //点击提交按钮后才执行  

        $sql2 = "truncate P3";//从数据库中查询数据

        	$query = mysqli_query($link,$sql2);

        	$row = mysqli_fetch_assoc($query);//数据结果集

        	header("location:P3.php");

    }

echo "当前表中的记录有：";

echo "<table border=1 style=word-break:break-all; word-wrap:keep-all;>";     //使用表格格式化数据

echo "<tr><td width=40>编号</td><td width='160px'>收单时间</td><td width=560>原始单信息</td><td width=80>统计金额</td><td width=80>确认金额</td><td width=70>是否中奖</td>";

while($row=mysqli_fetch_array($result))  //遍历SQL语句执行结果把值赋给数组

{

 echo "<tr>";

 echo "<td>".$row['id']."</td>";   //显示ID

 echo "<td><p id=p".$row['id'].">".$row['crtime']." </p></td>";  //显示姓名

 echo "<td>".$row['message']." </td>";   //显示倍数
  echo "<td>".$row['jiner']." </td>";   //显示倍数
   echo "<td>".$row['qrjiner']." </td>";   //显示倍数
    echo "<td>".$row['zj']." </td>";   //显示倍数


 echo "</tr>";

}

echo "</table>";

?>





<form name="biao1" id="biao1" method="POST" action="">
<p>提交订单</p>

<p>金额（可以不写）<input type="text" style="width:150px; height:30px;" name="num3" id="num3" />
订单：<input type="text" style="width:250px; height:100px;" name="beishu3" id="beishu3"  /></p>
</center>
<p style="text-align:center;"><input type="submit" value="提交" class="btn btn-default" style="width:100px; height:30px;" onclick="javascript:this.form.action='msgp3.php';"></p>
</form>
</center>
</body>

</html>





<?php

$servername = "localhost";

$username = "3dp3";

$password = "aabb8899";

$dbname = "3dp3";

 

// 创建连接

$conn = new mysqli('localhost', $username, $password, $dbname);

// 检测连接

if ($conn->connect_error) {

    die("连接失败: " . $conn->connect_error);

} 



$num3=$_POST["num1"];

$beishu3=$_POST["beishu1"];

$sq4 = "INSERT INTO 3DZX (haoma,beishu)

VALUES ('$num3','$beishu3')";

if ($conn->query($sq4) === TRUE) {

    echo "<script>history.go(-1);</script>";

} else {

    echo "Error: " . $sq4 . "<br>" . $conn->error;

}

$conn->close();

?>






0=2

121

211
112