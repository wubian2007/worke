<html>

<head>

<title>P3分数表</title>

<meta charset="UTF-8">

<script type="text/javascript" src="ceshi.js"></script>


</head>

<body>

<center>

<form action="" method="post">
<input type="text" class="layui-input" name="startdata" placeholder="请选择开始日期" id="test1" style="min-width: 274px;" lay-key="1" value="<?php echo date('Y-m-d',time())?>">
<input type="text" class="layui-input" name="overdata" placeholder="请选择结束日期" id="test2" style="min-width: 274px;" lay-key="2" value="<?php echo date('Y-m-d',time())?>">
<input type="submit" value="搜索">
</form>
<script src='/src/js/laydate.js'></script>
<script>

//常规用法
laydate.render({
  elem: '#test1'
});
//国际版
laydate.render({
  elem: '#test2'
  
}); 
</script>
<?php



$db_host='localhost';      //MYSQL服务器名

$db_user="cs";       //MYSQL用户名

$db_pass="alibaba998";       //MYSQL用户对应密码

$db_name="cs";      //要操作的数据库

/*$db_host='127.0.0.1';      //MYSQL服务器名

$db_user="root";       //MYSQL用户名

$db_pass="root";       //MYSQL用户对应密码

$db_name="temp_com";      //要操作的数据库*/

//使用mysql_connect()函数对服务器进行连接，如果出错返回相应信息

$link=mysqli_connect($db_host,$db_user,$db_pass)or die("不能连接到服务器".mysqli_error());

mysqli_select_db($link,$db_name);   //选择相应的数据库，这里选择test库

$overdata = date('Y-m-d',strtotime('+1 day'));
$startdata = date('Y-m-d',time());

$sql="select * from p3zx where data>='{$startdata}' and data<='{$overdata}'";;     //先执行SQL语句显示所有记录以与插入后相比较

$result=mysqli_query($link,$sql);   //使用mysql_query()发送SQL请求

if($_POST['startdata'] and $_POST['overdata']){
	$sql="select * from p3zx where data>='{$_POST['startdata']}' and data<='{$_POST['overdata']}'";
	//echo $sql;
	$result=mysqli_query($link,$sql);
}
if($_POST['del']){ //点击提交按钮后才执行  

        $sql2 = "truncate p3zx";//从数据库中查询数据

        	$query = mysqli_query($link,$sql2);

        	$row = mysqli_fetch_assoc($query);//数据结果集

        	header("location:./cs2.php");

    }
if(@$_GET['act'] =='update'){ //更新是否点击
	$id = $_GET['id'];
   
	$sql="update p3zx set clicked=1 where id=".$id;     //先执行SQL语句显示所有记录以与插入后相比较

	$result=mysqli_query($link,$sql);   //使用mysql_query()发送SQL请求
	echo json_encode($result);exit;
}
if ($query2)
    //header("location:delP3ZX.php");
    //header("location:zxjsq.html");

echo "当前表中的记录有：";

echo "<table border=1 style=word-break:break-all; word-wrap:break-all;>";     //使用表格格式化数据

echo "<tr><td width=50>编号</td><td width='600px'>学号</td><td width=70>积分</td><td width=70>是否统计</td><td width=70>是否点击</td><td width=120>日期</td><td width=100>一键复制</td></tr>";

while($row=mysqli_fetch_array($result))  //遍历SQL语句执行结果把值赋给数组

{

 echo "<tr>";

 echo "<td>".$row['id']."</td>";   //显示ID

 echo "<td><p id=p".$row['id'].">".$row['haoma']." </p ></td>";  //显示姓名

 echo "<td>".$row['beishu']." </td>"; 
if($row['tj']){
	 echo "<td>是</td>";
 }else{
	 echo "<td>否</td>";   
 } 
 if($row['clicked']){
	 echo "<td id='clicked".$row['id']."'>是</td>";
 }else{
	 echo "<td id='clicked".$row['id']."'>否</td>";   
 } 
 echo "<td>".$row['data']." </td>";   
 
 
 echo "<td><button data-id=".$row['id'].">复制</button></td>";  //显示地址

 echo "</tr>";

}

echo "</table>";

?>

<form id="contact-form" method="POST" action="" >

         <input type="submit" name="del" value="一键清空表数据" />

</form>

</center>

<textarea id="input" rows="5" cols="150">这里核对被复制的内容</textarea>

<script>

	var but=document.getElementsByTagName('button');

	 for(i=0;i<but.length;i++){

		 but[i].setAttribute('i',i+1);

		 but[i].onclick=function(){

			 b=this.getAttribute('data-id');

			 //alert('这是第'+b+'个按钮');

			 var pcolor='p'+b;

			 var text = document.getElementById(pcolor).innerText;

			var input = document.getElementById("input");

			input.value = text; // 修改文本框的内容

			input.select(); // 选中文本

			document.execCommand("copy"); // 执行浏览器复制命令

			alert('第'+b+'组复制成功');
			var nid = this.getAttribute('data-id');
			Ajax.get('cs2.php?act=update&id='+nid,nid);
			document.getElementById(pcolor).style.background='red';

			 }

	}
	
	var Ajax={
	  get: function(url,id, fn) {
		// XMLHttpRequest对象用于在后台与服务器交换数据   
		var xhr = new XMLHttpRequest();            
		xhr.open('GET', url, true);
		xhr.onreadystatechange = function() {
			document.getElementById('clicked'+id).innerHTML ='是';
		};
		xhr.send();
	  }
	}

 </script>



</body>

</html>