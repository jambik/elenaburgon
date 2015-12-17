{include file="_header.tpl"}

{if $page.error}<div class="error">{$page.error}</div>{/if}
{if $page.info}<div class="info">{$page.info}</div>{/if}

<fieldset style="margin:0 0 10px 0;">
	<legend>Настройки</legend>
	<form action="" method="post" name="form_settings" id="form_settings">
		<table style="width: 100%;">
			<tr>
				<td style="width: 80px;">Email</td>
				<td><input type="text" name="email_request" value="{$settings.email_request}" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit_settings" value="Сохранить" /></td>
			</tr>
		</table>
	</form>
</fieldset>

{include file="_footer.tpl"}