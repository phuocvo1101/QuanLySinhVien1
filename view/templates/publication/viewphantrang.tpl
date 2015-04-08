<script src="/view/templates/js/jquery-1.11.2.js"></script>
<script type="text/javascript">
	$(function(){
		$('#create').click(function(){
			window.location = "index.php?controller=publication&action=create";
		});
	});
	function getBooks(pages,start,limit)
	{
		$.ajax({
			url: "index.php?controller=publication&action=viewphantrangajax",
			type:"post",
			dataType:"json",
			data:{
				pages:pages,
				start:start,
				limit:limit
			},
			success: function(result){
				$('#data').html(result.data);
				$('#phantrang').html(result.phantrang);
			}
		});
	}
	
</script>
<div>
	<table align="center">
		<tr>
			<td>Them Sach:  </td>
			<td>
				<a href="javascript:void(0);" id="create">Create</a>
			</td>
		</tr>
	</table>
</div>
<table border="1px" width="700px" align="center">
	<tr>
		<td colspan="3"><h1 align="center">Thong Tin Nha Xuat Ban</h1></td>
	</tr>
	<tbody id="data">
	{foreach $publication as $item}		

		<tr>
		<td align="center">idpublic: {$item->idpublic}</td>
		<td align="center">Name: {$item->name}</td>
		<td align="center">Dia Chi:{$item->diachi}</td>
		</tr>
					
	{/foreach}
	</tbody>	
</table>
<div id="phantrang">
	<table align="center">
		<tr>
			<td>
				{$listPage}
				
			</td>
		</tr>
	</table>
</div>
