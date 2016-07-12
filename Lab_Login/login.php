<?php

if (isset($_GET["logout"]))
{
	setcookie("userName", "Guest", time() - 3600);
	header("Location: index.php");
	exit();
}


if(isset($_POST["btnHome"]))
{
  header("location:index.php");
  exit();
}

if(isset($_POST["btnOK"]))
{   //判斷btnOK裡的資料是否存在
  if($_POST["txtUserName"] != "")
  {    
    setcookie("userName",$_POST["txtUserName"]); //取得txtUserName的內容放入userName
    if(isset($_COOKIE["lastPage"]))     //如果cookie紀錄的是lastPage則回lastPage
      header("location: ". $_COOKIE["lastPage"]);
    else
      header("location: index.php");      //或是回首頁
    exit();
  }
}


?>


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lab - Login</title>
</head>
<body>
  <!--action不寫，就會自己post給自己-->
<form id="form1" name="form1" method="post" >  
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 登入</font></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">帳號</td>
      <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" /></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">密碼</td>
      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="btnOK" id="btnOK" value="登入" />
      <input type="reset" name="btnReset" id="btnReset" value="重設" />
      <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>