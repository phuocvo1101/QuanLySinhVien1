
	{if $book!=null}
	<table border="1px">
	
	<tbody>
		<tr>
			<td>title</td>
			<td>{$book->title}</td>
			
		</tr>
		<tr>
			
			<td>author</td>
			<td>{$book->author}</td>
		</tr>
		<tr>
			
			<td>description</td>
			<td>{$book->description}</td>
		</tr>
	</tbody>
</table>
	{else}
		Khong ton tai book nay
	{/if}
	<div><a href="?controller=book&action=viewphantrang&id={$book->id}">Quay Ve</a></div>
