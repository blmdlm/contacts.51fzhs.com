<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Search someone</title>
</head>
<body>
<center>
<h1>Search Someone</h1>
<hr>
<h2>Specific Search</h2>
<form action="<?php echo U('Admin/Search/specific');?>" method="post">
	UserName: <input type="text" name="username" /> <br />
	Highschool: <input type="text" name="highschool" /> <br />
	highschool graduate: <input type="text" name="graduate" /> <br />
	highschool class: <input type="text" name="class" /> <br />
	<br/>
	College: <input type="text" name="college" /> <br />
	Major: <input type="text" name="major" /> <br />
	<br/>
	Company: <input type="text" name="company" /> <br />
	<input type="submit" value="search">
	
</form>




</center>
</body>
</html>