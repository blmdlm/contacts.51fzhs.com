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
<ul>
<li><a href="<?php echo U('Admin/Query/allHighSchools');?>">查询所有的高中</a> </li>

<li>
<form action="<?php echo U('Admin/Query/collegeInfo');?>">
	查询一条大学经历<input type="text" name="id"/>
	<input type="submit" value="submit"/>
</form>	
</li>
<li>
<form action="<?php echo U('Admin/Query/companyInfo');?>">
	查询一条公司经历<input type="text" name="id"/>
	<input type="submit" value="submit"/>
</form>	
</li>
<li>
<form action="<?php echo U('Admin/Query/userBasicInfo');?>">
	查询一个用户的基本信息<input type="text" name="id"/>
	<input type="submit" value="submit"/>
</form>	
</li>
<li>
<form action="<?php echo U('Admin/Query/userAllCollegeInfo');?>">
	查询一个用户的所有大学背景<input type="text" name="id"/>
	<input type="submit" value="submit"/>
</form>	
</li>
<li>
<form action="<?php echo U('Admin/Query/userAllCompanyInfo');?>">
	查询一个用户的所有工作经历<input type="text" name="id"/>
	<input type="submit" value="submit"/>
</form>	
</li>
<li>
<form action="<?php echo U('Admin/Query/userDetailInfo');?>">
	查询一个用户的详细信息<input type="text" name="id"/>
	<input type="submit" value="submit"/>
</form>	
</li>

<li>
<form action="<?php echo U('Admin/Delete/collegeInfo');?>">
	删除大学背景<input type="text" name="id"/>
	<input type="submit" value="submit"/>
</form>	
</li>
<li>
<form action="<?php echo U('Admin/Delete/companyInfo');?>">
	删除公司背景<input type="text" name="id"/>
	<input type="submit" value="submit"/>
</form>	
</li>

<form action="<?php echo U('Admin/Delete/user');?>">
	删除用户<input type="text" name="id"/>
	<input type="submit" value="submit"/>
</form>	
</li>



<h2>
<a href="<?php echo U('Admin/Add/index');?>">增加一个用户</a> 
</h2>
<h2>
<a href="<?php echo U('Admin/Modify/index');?>">修改一个用户</a> 
</h2>

<h2>
<a href="<?php echo U('Admin/Search/index');?>">搜索用户</a> 
</h2>
</center>




</body>
</html>