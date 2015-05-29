<?php if (!defined('THINK_PATH')) exit();?><html>
<body>

<form action="<?php echo U('Admin/Delete/company');?>"> 

<input type="text" name="id"/>
<input type="submit" value="删除公司byid">
</form>

<form action="<?php echo U('Admin/Delete/college');?>"> 

<input type="text" name="id"/>
<input type="submit" value="删除大学byid">
</form>

</body>


</html>