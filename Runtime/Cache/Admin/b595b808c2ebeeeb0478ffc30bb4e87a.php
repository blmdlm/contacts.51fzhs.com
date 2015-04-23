<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>login</title>
</head>
<body>
<center>

  <form action="<?php echo U('admin/login/index');?>" method="post" >

<h3>admin login</h3>

Name: 

<input type="text" name="name" />

<br />

Password: 

<input type="text" name="password" />

<input type="submit" />

</form>

</center>

</body>
</html>