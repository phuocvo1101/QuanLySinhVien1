<script src="view/templates/js/jquery-1.11.2.js"></script>
<script type="text/javascript">
	$(function(){
		$('#submitbutton').click(function(){
			var title=$('#title').val();
			var author= $('#author').val();
			var description= $('#description').val();
			var id = $('#id').val();
			$.ajax({
				url: "index.php?controller=book&action=updateajax",
				type: "post",
				dataType: "json",
				data: {
					title:title,
					author:author,
					description:description,
					id:id
				},
				success: function(result){
					//console.log(result);
					if(result.ketqua==1){
						$('#result').html('Ban da cap nhat thanh cong <a href="?controller=book&action=viewphantrang">Quay ve</a> ');
					}else{
						$('#result').html('Ban da cap nhat khong thanh cong')};
				}
			});
		});
			
		
	});
	
</script>
<form>
	<table>
		<tr>
			<td>Title:</td>
			<td><input type="text" id="title" name="title" value="{$title}"/></td>
		</tr>
		<tr>
			<td>Author:</td>
			<td><input type="text" id="author" name="author" value="{$author}"/></td>
		</tr>
		
		<tr>
			<td>Description:</td>
			<td><input type="text" id="description" name="description" value="{$description}"/></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="button" id="submitbutton" name="submitbutton" value="Update"/>
				<input type="hidden" id="id" name="id" value="{$id}"/>
			</td>
		</tr>
	</table>
</form>
<div id="result">

</div> 