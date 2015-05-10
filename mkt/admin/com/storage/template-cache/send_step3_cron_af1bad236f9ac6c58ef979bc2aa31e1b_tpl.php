<?php $IEM = $tpl->Get('IEM'); ?><tr>
	<td colspan="2" class="Heading2">
		&nbsp;&nbsp;<?php print GetLang('CronSendOptions'); ?>
	</td>
</tr>
<tr>
	<td width="200" class="FieldLabel">
		<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
		<?php print GetLang('SendImmediately'); ?>
	</td>
	<td>
		<label for="sendimmediately"><input type="checkbox" name="sendimmediately" id="sendimmediately" value="1" CHECKED onClick="ShowSendTime(this)">&nbsp;<?php print GetLang('SendImmediatelyExplain'); ?></label>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SendImmediately')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SendImmediately')); ?></span></span>
	</td>
</tr>
<tr id="show_senddate" style="display:none;" width="200" class="FieldLabel">
	<td width="200" class="FieldLabel">
		<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
		<?php print GetLang('SendMyEmailCampaignOn'); ?>:&nbsp;
	</td>
	<td style="padding-left:20px" valign="top">
		<table cellspacing="0" cellpadding="0" border="0">
			<tr>
				<td width="20" valign="top"><img src="images/nodejoin.gif" /></td>
				<td valign="top">
					<?php if(isset($GLOBALS['SendTimeBox'])) print $GLOBALS['SendTimeBox']; ?>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SendTime')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SendTime')); ?></span></span>
					<input type="hidden" name="sendtime" id="sendtime" value="" />
					<script>
						function SetSendTime() {
							var h = $('#sendtime_hours').val();
							var m = $('#sendtime_minutes').val();
							var a = $('#sendtime_ampm').val();
							var sendtime = h + ':' + m + a;
							$('#sendtime').val(sendtime);
						}

						SetSendTime();
					</script>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td width="200" class="FieldLabel">
		<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
		<?php print GetLang('NotifyOwner'); ?>
	</td>
	<td>
		<label for="notifyowner"><input type="checkbox" name="notifyowner" id="notifyowner" value="1" CHECKED>&nbsp;<?php print GetLang('NotifyOwnerExplain'); ?></label>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('NotifyOwner')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_NotifyOwner')); ?></span></span>
	</td>
</tr>
<tr>
	<td colspan="2" class="EmptyRow">
		&nbsp;
	</td>
</tr>

