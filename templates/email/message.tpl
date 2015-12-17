Дата сообщения: {$smarty.now|date_format:"%d/%m/%Y %H:%M"} 
 
{if $post.name}Имя: {$post.name}{/if} 
{if $post.phone}Телефон: {$post.phone}{/if} 
{if $post.email}Email: {$post.email}{/if} 
	
{if $post.message}Сообщение: {$post.message}{/if} 