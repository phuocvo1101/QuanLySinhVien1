<table>
	<thead>
		<tr>
			<td>title</td>
			<td>author</td>
			<td>description</td>
		</tr>
	</thead>
	<tbody>
	{foreach $books as $item}
		<tr>
			<td>{$item->title}</td>
			<td>{$item->author}</td>
			<td>{$item->description}</td>
		</tr>
	{/foreach}
		
	</tbody>
</table>