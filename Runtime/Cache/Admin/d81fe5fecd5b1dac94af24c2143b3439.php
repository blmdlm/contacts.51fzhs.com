<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add a person</title>
</head>
<body>

<h1>Add a new persion</h1>
<form  action="<?php echo U('Admin/Add/userBasicInfo');?>">
<h3>用户基本信息</h3>
Name: <input type="text" name="name"  /> <br />
highschoolid: <input type="text" name="highschoolid"  /> <br />
gender: <input type="text" name="gender"  /> <br />
phone: <input type="text" name="phone"  /> <br />
qq: <input type="text" name="qq"  /> <br />
email: <input type="text" name="email"  /> <br />
graduation(year): <input type="text" name="graduation"  /> <br />
class: <input type="text" name="class"  /> <br />
Comments: <input type="text" name="comments"  /> <br />
<input type="submit" value="增加用户"/>
</form>


<h3>College info</h3>
<form action="<?php echo U('Admin/Add/userCollegeInfo');?>" >
userid:   <input type="text" name="userid"  /><br />
College*: <input type="text" name="college"  /><br />
Academy: <input type="text" name="academy" /> <br />
Major: <input type="text" name="major" /> <br />
type*: <input type="text" name="type" /> <br />
Start time(Year): <input type="text" name="start" /> <br />
End time(Year): <input type="text" name="end" /> <br />
Comments: <input type="text" name="comments" /> <br />
<input type="submit" value="submit"/>
</form>

<hr>


<h3>Company info</h3>
<form action="<?php echo U('Admin/Add/userCompanyInfo');?>">
userid:   <input type="text" name="userid"  /><br />
Company*: <input type="text" name="company"  /><br />
Start*: <input type="text" name="start"  /><br />
Comments: <input type="text" name="comments" /> <br />
<input type="submit" value="submit"/>
</form>
</center>











</body>
</html>