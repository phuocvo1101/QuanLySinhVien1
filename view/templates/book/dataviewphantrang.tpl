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
  			</table>
  		</td>
  		 {assign var="stt" value=$stt+1}
  	
  	{if $stt%3==0}
  		</tr>
  	{/if}
  {/foreach}