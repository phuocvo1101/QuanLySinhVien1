<script src="/view/templates/js/jquery-1.11.2.js"></script>
<script type="text/javascript">
	$(function(){
		$('#submitbutton').click(function(){
		
			var name= $('#name').val();
			var diachi= $('#diachi').val();
			$.ajax({
	            url : "index.php?controller=publication&action=createajax",
	            type : "post",
	            dataType:"json",
	            data : {
					name:name,
					diachi:diachi
	            },
	            beforeSend :function() {
		            
		        },
	            success : function (result){
	            
					if(result.ketqua==1){
						$('#result').html('Ban da tao thanh cong <a href="?controller=publication&action=viewphantrang">Quay Ve</a>');
					}else{
						$('#result').html('Ban da tao khong thanh cong');
					}
	            }
	        });
			
		
		});
	});
</script>
<form>
<table>
	<tr>
		<td>Name:</td>
		<td><input type="text" id="name" name="name"/></td>
	</tr>
	<tr>
		<td>Dia Chi:</td>
		<td><input type="text" id="diachi" name="diachi"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="button" id="submitbutton" name="submit" value="create"/></td>
	</tr>
</table>
</form>
<div id="result"></div>