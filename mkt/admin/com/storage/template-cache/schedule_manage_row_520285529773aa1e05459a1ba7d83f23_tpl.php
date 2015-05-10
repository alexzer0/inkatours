<?php $IEM = $tpl->Get('IEM'); ?><tr class="GridRow">
	<td align="center" valign="top">
		<input type="checkbox" name="jobs[]" value="<?php if(isset($GLOBALS['JobID'])) print $GLOBALS['JobID']; ?>">
	</td>
	<td>
		<img src="images/m_newsletters_queue.gif">
	</td>
	<td>
		<?php if(isset($GLOBALS['NewsletterName'])) print $GLOBALS['NewsletterName']; ?>
		<?php if(isset($GLOBALS['NewsletterSubject'])) print $GLOBALS['NewsletterSubject']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['NewsletterType'])) print $GLOBALS['NewsletterType']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['ListName'])) print $GLOBALS['ListName']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['JobTime'])) print $GLOBALS['JobTime']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['Status'])) print $GLOBALS['Status']; ?><?php if(isset($GLOBALS['AlreadySent'])) print $GLOBALS['AlreadySent']; ?>
		<span id="send_status_<?php if(isset($GLOBALS['JobID'])) print $GLOBALS['JobID']; ?>_<?php if(isset($GLOBALS['RowID'])) print $GLOBALS['RowID']; ?>"></span><?php if(isset($GLOBALS['RefreshLink'])) print $GLOBALS['RefreshLink']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['Action'])) print $GLOBALS['Action']; ?>
	</td>
</tr>
