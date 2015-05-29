<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Search someone</title>
</head>
<body>
<center>
<h1>搜索用户</h1>
<hr>
<h2>精确搜索</h2>
<div >
<center>
<form  action="<?php echo U('Admin/Search/specific');?>">
<h3>用户基本信息</h3>
Name: <input type="text" name="name"  /> <br />
highschoolid: <input type="text" name="highschoolid"  /> <br />
gender: <input type="text" name="gender"  /> <br />
phone: <input type="text" name="phone"  /> <br />
qq: <input type="text" name="qq"  /> <br />
email: <input type="text" name="email"  /> <br />
graduation(year): <input type="text" name="graduation"  /> <br />
class: <input type="text" name="class"  /> <br />



<h3>College info</h3>

College*: <input type="text" name="college"  /><br />
Academy: <input type="text" name="academy" /> <br />
Major: <input type="text" name="major" /> <br />
type*: <input type="text" name="type" /> <br />



<h3>Company info</h3>

Company*: <input type="text" name="company"  /><br />

<input type="submit" value="submit"/>
</form>
</center>
	
</div>

<div id="result" >


</div>


</center>

<script src="http://code.jquery.com/jquery.js"></script>
<script>
			function search(){
				alert("asdad");
			$.post("<?php echo U('Admin/Search/specific');?>",
					{
						username:$("#username").val(),
						highschoolid:$("#highschoolid").val(),
						graduation:$("#graduation").val(),
						class:$("#class").val(),
						college:$("#college").val(),
						major:$("#major").val(),
						company:$("#company").val(),
						
					},
					function(data){
						if(data!=null){
							var html="";
							$.each(data,function(index,item){
								html+='<div  id="people" onclick="showDetail('+item.id+')" >'+item.id+'</div><br/>'
								
							});

							$("#result").html(html);
						}
					}

					);
			$("#result").fadeIn();
			
		};


		function showDetail(id){

			location.href="<?php echo U('Admin/Detail/index');?>?id="+id;
		}
		

</script>


</body>
</html>