<?php $IEM = $tpl->Get('IEM'); ?><table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1">
			<?php print GetLang('Send_Resend'); ?>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo">
			<p>
				<?php if(isset($GLOBALS['Send_ResendCount'])) print $GLOBALS['Send_ResendCount']; ?>
				<?php print GetLang('Send_Resend_Intro'); ?>
			</p>
			<ul style="margin-bottom:0px">
				<li><?php if(isset($GLOBALS['Send_NewsletterName'])) print $GLOBALS['Send_NewsletterName']; ?></li>
				<li><?php if(isset($GLOBALS['Send_NewsletterSubject'])) print $GLOBALS['Send_NewsletterSubject']; ?></li>
				<li><?php if(isset($GLOBALS['Send_SubscriberList'])) print $GLOBALS['Send_SubscriberList']; ?></li>
				<li><?php if(isset($GLOBALS['Send_TotalRecipients'])) print $GLOBALS['Send_TotalRecipients']; ?></li>
			</ul>
		</td>
	</tr>
	<tr>
		<td class="body">
			<input type="button" value="Resend Immediately" class="SmallButton" onclick="document.location='index.php?Page=Schedule&job=<?php if(isset($GLOBALS['JobID'])) print $GLOBALS['JobID']; ?>&Action=Resend';">&nbsp;<input type="button" value="<?php print GetLang('Cancel'); ?>" class="FormButton" onclick="document.location='index.php?Page=Newsletters';">
		</td>
	</tr>
</table>

