{foreach $publication as $item}		

	<tr>
		<td align="center">idpublic: {$item->idpublic}</td>
		<td align="center">Name: {$item->name}</td>
		<td align="center">Dia Chi:{$item->diachi}</td>
	</tr>
					
{/foreach}