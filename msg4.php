<?php
$db_host=localhost;      //MYSQL服务器名
$db_user="3dp3";       //MYSQL用户名
$db_pass="aabb8899";       //MYSQL用户对应密码
$db_name="3dp3";  
 
$link=mysqli_connect($db_host,$db_user,$db_pass)or die("不能连接到服务器".mysqli_error());
mysqli_select_db($link,$db_name); 
$sql="select * from P3ZX"; 
$result=mysqli_query($link,$sql);
if(!empty($_POST['delall'])) //点击提交按钮delall后才执行
{
    $sql2 = "truncate P3ZX";
    $query = mysqli_query($link,$sql2);
    $row = mysqli_fetch_assoc($query);//数据结果集
    if ($query) {
    echo "<script>alert('删除P3ZX整表成功，返回');history.go(-1);</script>";
    } 
    //header("location:del3dzx.php");
    //header("location:zxjsq.html");
}
else if(!empty($_POST['delone']))//点击提交按钮delone后才执行
{
    $sql3 = "delete a from P3ZX a ,(select max(id) as max_id from P3ZX) b where a.id=b.max_id";
    $query2 = mysqli_query($link,$sql3);
    $row = mysqli_fetch_assoc($query2);
    if ($query2) {
    echo "<script>alert('删除P3ZX最新一条数据成功，返回');history.go(-1);</script>";
    }
    //header("location:del3dzx.php");
    //header("location:zxjsq.html");