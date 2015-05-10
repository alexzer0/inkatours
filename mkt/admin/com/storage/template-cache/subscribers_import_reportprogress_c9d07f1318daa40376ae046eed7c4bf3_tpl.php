<?php $IEM = $tpl->Get('IEM'); ?><table cellspacing="0" cellpadding="2">
	<tr>
		<td class="Heading1">
			<?php print GetLang('ImportResults_InProgress'); ?>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo">
			<p>
				<?php if(isset($GLOBALS['ImportResults_Message'])) print $GLOBALS['ImportResults_Message']; ?>
			</p>
		</td>
	</tr>
	<tr>
		<td class="body">
			<?php if(isset($GLOBALS['Report'])) print $GLOBALS['Report']; ?>
		</td>
	</tr>
</table>
