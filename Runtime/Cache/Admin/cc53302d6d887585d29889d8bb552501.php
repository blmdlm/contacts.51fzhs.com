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
<div >
	UserName: <input type="text" id="username" /> <br />
	Highschool: <input type="text" id="highschoolid" /> <br />
	highschool graduate: <input type="text" id=graduation /> <br />
	highschool class: <input type="text" id="class" /> <br />
	<br/>
	College: <input type="text" id="college" /> <br />
	Major: <input type="text" id="major" /> <br />
	<br/>
	Company: <input type="text" id="company" /> <br />
	<input  onclick="search()" type="button"  value="search">
	
</div>

<div id="result" >


</div>


</center>

<script src="http://code.jquery.com/jquery.js"></script>
<script>
			function search(){
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