<script src="/view/templates/js/jquery-1.11.2.js"></script>
<script type="text/javascript">
	$(function(){
		
		$('#submitbutton').click(function(){
			var title = $('#title').val();
			var author = $('#author').val();
			var description = $('#description').val();
			if(title=="") {
				alert('title khong duoc trong');
				return;
			}

			if(author=="") {
				alert('author khong duoc trong');
				return;
			}

			if(description=="") {
				alert('description khong duoc trong');
				return;
			}

			$.ajax({
	            url : "index.php?controller=book&action=createajax",
	            type : "post",
	            dataType:"json",
	            data : {
	                 title:title,
	                 author:author,
	                 description:description
	            },
	            success : function (result){
		            if(result.ketqua==1) {
			            $('#result').html('ban da tao thanh cong <a href="index.php?action=viewphantrang">quay ve<a/>');
			         } else{
			        	  $('#result').html('ban da tao khong thanh cong');
				    }
	             
	            }
	        });
		});
		
	});
	
</script>
<form>
	<table>
		<tr>
			<td>Title:</td>
			<td><input type="text" id="title" name="title"/></td>
		</tr>
		<tr>
			<td>Author:</td>
			<td><input type="text" id="author" name="author"/></td>
		</tr>
		
		<tr>
			<td>Description:</td>
			<td><input type="text" id="description" name="description"/></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="button" id="submitbutton" name="submitbutton" value="Create"/>
			</td>
		</tr>
	</table>
</form>
<div id="result">
	
</div> 