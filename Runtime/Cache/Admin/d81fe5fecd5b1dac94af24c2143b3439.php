<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add a person</title>
</head>
<body>

<h1>Add a new persion</h1>
<form Method="POST" action="<?php echo U('Admin/Add/highschool');?>">

<hr>
<center>
<h3>Basic info</h3>
Name: <input type="text" name="username" value="must input" /> <br />
gender: <input type="text" name="gender" /> <br />
phone: <input type="text" name="phone" /> <br />
qq: <input type="text" name="qq" /> <br />
email: <input type="text" name="email" /> <br />
comments: <input type="text" name="usercomments" /> <br />
<h3>High School info</h3>
High school: <input type="text" name="highschoolid" value="must input" /><br />
Class: <input type="text" name="class" /> <br />
Graduation date: <input type="text" name="graduation" /> <br />
Comments: <input type="text" name="seniorcomments" /> <br />
<input type="submit" value="submit"/>
</form>


<h3>
hide first ,when the operation of adding high school and basic both succeed, show the two click buttons
<input type="button" value="add college"/>
<input type="button" value="add company"/> 
</h3>
<hr>

<h3>College info</h3>
<form action="<?php echo U('Admin/Add/college');?>" method="post">

College*: <input type="text" name="college" value="NWPU" /><br />
Academy: <input type="text" name="academy" /> <br />
Major: <input type="text" name="major" /> <br />
type*: <input type="text" name="type" value="0"/> <br />
Start time(Year): <input type="text" name="start" /> <br />
End time(Year): <input type="text" name="end" /> <br />
Comments: <input type="text" name="comments" /> <br />
<input type="submit" value="submit"/>
</form>

<hr>


<h3>Company info</h3>
<form action="<?php echo U('Admin/Add/company');?>" method="post">
Company*: <input type="text" name="company" value="CITI" /><br />
Comments: <input type="text" name="comments" /> <br />
<input type="submit" value="submit"/>
</form>
</center>











</body>
</html>