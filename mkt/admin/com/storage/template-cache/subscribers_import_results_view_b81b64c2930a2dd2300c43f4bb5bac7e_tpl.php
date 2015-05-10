<?php $IEM = $tpl->Get('IEM'); ?><table width="100%" cellspacing="0" cellpadding="4" border="0">
	<tr>
		<td class="Heading1">
			<?php if(isset($GLOBALS['Heading'])) print $GLOBALS['Heading']; ?>
		</td>
		<td align="right">
			<a href="javascript: window.opener.focus(); window.close();"><?php print GetLang('PopupCloseWindow'); ?></a>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="body pageinfo">
			<p>
				<?php if(isset($GLOBALS['Intro'])) print $GLOBALS['Intro']; ?>
			</p>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="body">
			<textarea name="list" rows="15" class="Field" style="width:100%; height: 300px;"><?php if(isset($GLOBALS['EmailList'])) print $GLOBALS['EmailList']; ?></textarea>
		</td>
	</tr>
</table>
