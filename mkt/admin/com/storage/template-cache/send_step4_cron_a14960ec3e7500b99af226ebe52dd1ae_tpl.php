<?php $IEM = $tpl->Get('IEM'); ?><table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1">
			<?php print GetLang('Send_Step4'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php if(isset($GLOBALS['Messages'])) print $GLOBALS['Messages']; ?>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo">
			<?php if(isset($GLOBALS['SentToTestListWarning'])) print $GLOBALS['SentToTestListWarning']; ?>
			<?php if(isset($GLOBALS['ImageWarning'])) print $GLOBALS['ImageWarning']; ?>
			<?php if(isset($GLOBALS['EmailSizeWarning'])) print $GLOBALS['EmailSizeWarning']; ?>
			<?php print GetLang('Send_Step4_CronIntro'); ?>
			<ul style="margin-bottom:-5px">
				<li><?php if(isset($GLOBALS['Send_NewsletterName'])) print $GLOBALS['Send_NewsletterName']; ?></li>
				<li><?php if(isset($GLOBALS['Send_NewsletterSubject'])) print $GLOBALS['Send_NewsletterSubject']; ?></li>
				<li><?php if(isset($GLOBALS['Send_SubscriberList'])) print $GLOBALS['Send_SubscriberList']; ?></li>
				<li><?php if(isset($GLOBALS['Send_TotalRecipients'])) print $GLOBALS['Send_TotalRecipients']; ?></li>
				<li><?php if(isset($GLOBALS['Send_ScheduleTime'])) print $GLOBALS['Send_ScheduleTime']; ?></li>
				<?php if(isset($GLOBALS['ApproximateSendSize'])) print $GLOBALS['ApproximateSendSize']; ?>
				<li><?php print GetLang('Send_Not_Completed'); ?></li>
			</ul>
			<br />
		</td>
	</tr>
	<tr>
		<td class="body" style="padding-top:10px">
			<input type="button" value="<?php print GetLang('ApproveScheduledSend'); ?>" class="SmallButton" style="width: 190px; font-weight:bold" onclick="document.location='index.php?Page=Schedule&A=1';">
			<input type="button" value="<?php print GetLang('Cancel'); ?>" class="FormButton" onclick="if(confirm('<?php print GetLang('ConfirmCancelSchedule'); ?>')) {document.location='index.php?Page=Newsletters';}">
		</td>
	</tr>
</table>
