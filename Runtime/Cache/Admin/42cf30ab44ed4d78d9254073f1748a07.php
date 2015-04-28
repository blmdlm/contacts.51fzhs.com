<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<center>
<h1><?php echo ($id); ?></h1>
<hr>

<h1>Basic info</h1>

<div id="basic"></div>


<h1>College info</h1>
<div id="college"></div>
<h1>Company info</h1>
<div id="company"></div>
</center>







<script src="http://code.jquery.com/jquery.js"></script>
<script>

			$(document).ready(function(){
				$.post("<?php echo U('Admin/Query/basic');?>",
						{
							id:<?php echo ($id); ?>,
														
						},
						function(data){
							if(data!=null){
								var html="<b>"+data+"</b>";
						$("#basic").html(html);
							}
						});
			
			
				$.post("<?php echo U('Admin/Query/college');?>",
						{
					id:<?php echo ($id); ?>,
														
						},
						function(data){
							if(data!=null){
								var html="<b>"+data+"</b>";
						$("#college").html(html);
							}
						});
				$.post("<?php echo U('Admin/Query/company');?>",
						{
					id:<?php echo ($id); ?>,
														
						},
						function(data){
							if(data!=null){
								var html="<b>"+data+"</b>";
						$("#company").html(html);
							}
						});
			
				


			});



</script>
</body>
</html>