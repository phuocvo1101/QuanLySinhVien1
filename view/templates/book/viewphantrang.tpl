<script src="/view/templates/js/jquery-1.11.2.js"></script>
<script type="text/javascript">
	$(function(){
		
		$('#create').click(function(){
			window.location="index.php?controller=book&action=create";
		});
		
		//$('#edit').click(function(){
		//	window.location="index.php?action=update";
		//});
		
	});
	
	//function getBooks(pages,start,limit)
	function getBooks(pages,start,limit)
	{
		$.ajax({
            url : "index.php?controller=book&action=viewphantrangajax",
            type : "post",
            dataType:"json",
            data : {
                 pages:pages,
                 start:start,
                 limit:limit
            },
            success : function (result){
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
<table align="center" border='1px' width='700px'>
  <tr>
    <td align="center" colspan="3"><h1>Thong Tin Sach</h1></td>
  </tr>
  <tbody id="data">
  {assign var="stt" value=0}
  {foreach $books1 as $item}
  	{if $stt%3==0}
  		<tr>
  	{/if}
  		<td>
  			<table>
  				<tr><td align="center">Title: {$item->title}</td></tr>
  				<tr><td align="center">Author: {$item->author}</td></tr>
  				<tr><td align="center">Description: {$item->description}</td></tr>
  				<tr><td><a href="index.php?controller=book&action=view&id={$item->id}">View</a></td></tr>
  				<tr><td><a href="index.php?controller=book&action=delete&id={$item->id}">Delete</a></td></tr>		
  				<tr><td><a href="index.php?controller=book&action=update&id={$item->id}">Edit</a></td></tr>
  				<!--<tr><td><a href="javascript:void(0);" id="edit">Edit</a></td></tr>  -->
  			</table>
  		</td>
  		 {assign var="stt" value=$stt+1}
  	
  	{if $stt%3==0}
  		</tr>
  	{/if}
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

