<?php $IEM = $tpl->Get('IEM'); ?>	<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1">
			<?php print GetLang('Subscribers_Export'); ?>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo">
			<p><?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
				<input type="button" value="<?php print GetLang('DeleteExportFile'); ?>" class="SmallButton" style="width: 120px" onClick="javascript: document.location='index.php?Page=Index&Action=CleanupExport';">
			</p>
		</td>
	</tr>
</table>
