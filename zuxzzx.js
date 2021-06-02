/*
    btn1组选转直选函数
*/
function btn1()  
  {
    var returnsanList = new Array(); //声明个十百三位不同数的数组；
    var returnerList = new Array();//声明个十百有2位相同的数组;
    var isan=0;// 统计returnsanList数组元素个数；
    var ier=0;//统计returnerList数组元素个数；
    var strnum=document.getElementById("strnum1").value;
    if(strnum.length%3==0)
    {
        //var str=strnum;
        var y=0;
        var a=strnum.length/3;
        
    for(var x=0; x<a; x++)
      {
        var str=strnum.substr(y,3);
        y=y+3;
        //document.write(str+"排列组合方式有:");
        if(str[0]!==str[1]&&str[0]!==str[2]&&str[1]!==str[2])
        {
            for(var i=0;i<str.length;i++)
            {
    	        for(var j=0;j<str.length;j++)
    	        {
	    	        for(var k=0;k<str.length;k++)
	    	        {
		    	        if(str[i]!==str[j]&&str[i]!==str[k]&&str[j]!==str[k])
		    	        {
		    	            returnsanList[isan]=str[i]+str[j]+str[k];
		    	            isan=isan+1;
	    	                //document.write(str[i]+str[j]+str[k]+",");
			            }
		            }
	            }
            }
        }
        else if(str[0]==str[1]||str[1]==str[2]||str[0]==str[2])
            {
                //alert(str);
                //alert(str[0]+","+str[1]+","+str[2]);
                //document.write(str[0]+str[1]+str[2]+","+str[0]+str[2]+str[1]+","+str[2]+str[1]+str[0]);
                //document.write("</br>");
                if(str[0]==str[1])
                {
                    //document.write(str[0]+str[1]+str[2]+","+str[2]+str[0]+str[1]+","+str[0]+str[2]+str[1]);
                    //document.write("</br>");
                    returnerList[ier]=str[0]+str[1]+str[2];
                    ier=ier+1;
                    returnerList[ier]=str[2]+str[0]+str[1];
                    ier=ier+1;
                    returnerList[ier]=str[0]+str[2]+str[1];
                    ier=ier+1;
                }
                else if(str[1]==str[2])
                {
                    //document.write(str[0]+str[1]+str[2]+","+str[1]+str[0]+str[2]+","+str[1]+str[2]+str[0]);
                    //document.write("</br>");
                    returnerList[ier]=str[0]+str[1]+str[2];
                    ier=ier+1;
                    returnerList[ier]=str[1]+str[0]+str[2];
                    ier=ier+1;
                    returnerList[ier]=str[1]+str[2]+str[0];
                    ier=ier+1;
                }
                else if(str[0]==str[2])
                {
                    //document.write(str[0]+str[1]+str[2]+","+str[0]+str[2]+str[1]+","+str[1]+str[0]+str[2]);
                    //document.write("</br>");
                    returnerList[ier]=str[0]+str[1]+str[2];
                    ier=ier+1;
                    returnerList[ier]=str[1]+str[0]+str[2];
                    ier=ier+1;
                    returnerList[ier]=str[2]+str[0]+str[1];
                    ier=ier+1;
                }
            }
      }
    }
    else
    {
        alert("请输入长度为3的整数倍的数！");
    }
    var containerDiv1=document.getElementById("divdata");
    var strdiv="";
      for(m=0; m<ier; m++)
	{
		strdiv=strdiv+returnerList[m]+",";
	}
	strdiv=strdiv+"</br>";
	for(n=0; n<isan;n++)
	{
	    strdiv=strdiv+returnsanList[n]+",";
	}
	containerDiv1.innerHTML=strdiv;
  }
  
  /*
    btn2直选复式转单式
*/
 function btn2()
{
	var strnum=document.getElementById("strnum4").value;
	//alert(strnum.trim().split(" ").length);
	var str=""; //将输入的数截取
	if(strnum.indexOf('\\')!=-1)
	{str=strnum.split("\\");}
	else if(strnum.indexOf(',')!=-1)
	{str=strnum.split(",");}
	else if(strnum.indexOf("/")!=-1)
	{str=strnum.split("/");}
	else if(strnum.indexOf('-')!=-1)
	{str=strnum.split("-");}
	else if(strnum.indexOf(' ')!=-1)
	{str=strnum.split(" ");}
	else
	{   
	    alert("请按格式输入！");
	}
	//alert(str);
	if(str.length!=3)
	{
		alert("请输入个十百三组数,并用空格隔开个十百位！");	
	}
	else
	{
		
		var returnList = new Array(); //声明组合的结果数组
		var gewei=str[0]; //截取的个位字符串
		//alert(gewei);
		var shiwei=str[1]; //截取的十位字符串
		//alert(shiwei);
		var baiwei=str[2]; //截取的百位字符串
		//alert(baiwei);
		var index = 0; //声明结果数组的索引下标
		var containerDiv1=document.getElementById("divdata");
		var strdiv=" ";
		for (i = 0; i < baiwei.length; i++) {
        	for (j = 0; j < shiwei.length; j++) {
            	for (k = 0; k < gewei.length; k++) {
				  var tenmArray = new Array();
				  tenmArray[2] = baiwei[i];
				  tenmArray[1] = shiwei[j];
				  tenmArray[0] = gewei[k];
				  returnList[index] = tenmArray;
				  index++;
            }
        }		
    }
	for(x=returnList.length-1; x>=0; x--)
	{
var strreturnList=returnList[x].join("");
strdiv=strdiv+strreturnList+"</br>";
	}
	containerDiv1.innerHTML=strdiv;
	}
}
  /*
    一键复制并清空divdata内容
*/
function copyText()
{
  var text = document.getElementById("divdata").innerText;
  var input = document.getElementById("txtdata");
  input.value = text; // 修改文本框的内容
  input.select(); // 选中文本
  document.execCommand("copy"); // 执行浏览器复制命令
  alert("复制成功");
  document.getElementById("divdata").innerText="";
  document.getElementById("strnum1").value="";
  document.getElementById("strnum2").value="";
  document.getElementById("strnum3").value="";
  document.getElementById("strnum4").value="";
}

/**
 * 根据选择的号码生成数据列表
 * flg 1 直选 2： 组选
 * condtionstype:过滤状态： 0：无指标  1： 有指标
 */
function setListNum(conditionsType) {
    var containerDiv1=document.getElementById("divdata");
    var strdiv=" ";
    var numList = new Array();
    if (conditionsType == 3) 
    {
        //组三
        var zxNumList = document.getElementById("strnum2").value;
        numList = setDataFor3dZuxuan(zxNumList, zxNumList, zxNumList, 2);
    } else if (conditionsType == 6) 
    {
        //组六
        var zxNumList = document.getElementById("strnum3").value;
        numList = setDataFor3dZuxuan(zxNumList, zxNumList, zxNumList, 3);
    }
    for(i=0;i<numList.length;i++)
    {
        var a=numList[i].join('');
        strdiv=strdiv+a+"</br>";
    }
    containerDiv1.innerHTML=strdiv;
}

/**
 * 生成3D组选选号码
 * hundredslNum ：百位号码
 * tensNum ：十位号码
 * onesNum ：个位号码
 * typeFlg ：1:组选 2:组三 3:组六 4:组选+豹子号
 */
function setDataFor3dZuxuan(hundredslNum, tensNum, onesNum, typeFlg) {
    //返回生成数据的数组
    var returnList = new Array();
    var valueList = new Array();
    returnList = setDataFor3dAll(hundredslNum, tensNum, onesNum);
    if (returnList == false) {
        return false;
    }
    for (var i = 0; i < returnList.length; i++) {
        var tempValueList = new Array();
        tempValueList = returnList[i];
        tempValue = tempValueList.sort();
        if (arraySearch(valueList, tempValue) == false) {
            if (typeFlg == 1) {
                //组3组6 
                if (!(tempValue[0] == tempValue[1] && tempValue[0] == tempValue[2])) {
                    valueList.push(tempValue);
                }
            } else if (typeFlg == 2) {
                //组三
                if ((tempValue[0] == tempValue[1] && tempValue[0] != tempValue[2])
                    || (tempValue[1] == tempValue[2] && tempValue[0] != tempValue[2])) {
                    valueList.push(tempValue);
                }
            } else if (typeFlg == 3) {
                //组六
                if (tempValue[0] != tempValue[1] && tempValue[0] != tempValue[2] && tempValue[1] != tempValue[2]) {
                    valueList.push(tempValue);
                }
            } else if (typeFlg == 4) {
                //组选 + 豹子号
                valueList.push(tempValue);
            }
        }
    }
    return valueList;
}
/**
 * 生成3D直选号码
 * hundredslNum ：百位号码
 * tensNum ：十位号码
 * onesNum ：个位号码
 */
function setDataFor3dAll(hundredslNum, tensNum, onesNum) {
    //返回生成数据的数组
    returnList = new Array();
    //判断数据的值
    if (hundredslNum == null || tensNum == null || onesNum == null) {
        return false;
    }
    var index = 0;
    for (i = 0; i < hundredslNum.length; i++) {
        for (j = 0; j < tensNum.length; j++) {
            for (k = 0; k < onesNum.length; k++) {
                var tenmArray = new Array();
                tenmArray[0] = hundredslNum[i];
                tenmArray[1] = tensNum[j];
                tenmArray[2] = onesNum[k];
                returnList[index] = tenmArray;
                index++;
            }
        }
    }
    return returnList;
}

/**
 * 判断一个一维数组是一个二维数组的元素
 * list ：二维数组
 * value ：一维数组
 */
function arraySearch(list, value) {

    if (list == null || list.length <= 0) {
        return false;
    }
    for (var j = 0; j < list.length; j++) {
        if (listCompare(list[j], value) == true) {
            return true;
        }
    }
    return false;
}

/**
 * 判断一个数组是否包含另一个数组
 * oneList ：元数组
 * twoList ：被包含的数组
 */
function listCompare(oneList, twoList) {
    if (oneList == null || twoList == null) {
        return false;
    }
    if (oneList.length != twoList.length) {
        return false;
    }
    for (var i = 0; i < oneList.length; i++) {
        if (oneList[i] != twoList[i]) {
            return false;
        }
    }
    return true;
}