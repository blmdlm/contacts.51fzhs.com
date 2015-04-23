<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>welcome to admin page</title>
</head>
<body>
<center>


<h1>
	welcome <?php echo (session('aname')); ?>
</h1>

<h2><a href="<?php echo U('Admin/Index/logout');?>">log out</a></h2>


<h2>
<a href="<?php echo U('Admin/Add/index');?>">add a person</a> 
</h2>

<h2>
<a href="<?php echo U('Admin/Search/index');?>">Search someone</a> 
</h2>
</center>




</body>
</html>