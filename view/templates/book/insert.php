<?php
$title='';
$author='';
$description=''; 
if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['description']))
{
	$title=$_POST['title'];
	$author=$_POST['author'];
	$description=$_POST['description'];
}
/*if($result!=null)
{
	echo "Ban da them thanh cong";
}*/
?>
<form>
<div><h1>Thuc Hien Them Sach</h1></div>
	<table>
		<tr>
			<td>Tilte:</td><td><input type="text" id='title' name='title' value="<?php echo $title; ?>"/></td>
		</tr>
		<tr>
			<td>Author:</td><td><input type="text" id='author' name='author' value="<?php echo $author;?>"/></td>
		</tr>
		<tr>
			<td>Desciption:</td><td><textarea rows="3" cols="40" name="description" id="description" value="<?php echo $description;?>"></textarea></td>
		</tr>
		<tr><td colspan="2" align="center"><input type="submit" value="Dong Y"/></td></tr>
	</table>
</form>



