<?php $IEM = $tpl->Get('IEM'); ?><form method="post" action="index.php?Page=Subscribers&Action=Banned&SubAction=Ban" enctype="multipart/form-data" onsubmit="return CheckForm();">
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php print GetLang('Subscribers_Banned_Add'); ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php print GetLang('Subscribers_Banned_Add_Intro'); ?>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
			</td>
		</tr>
		<tr>
			<td>
				<input class="FormButton" type="submit" value="<?php print GetLang('Save'); ?>">
				<input class="FormButton" type="button" value="<?php print GetLang('Cancel'); ?>" onClick='if(confirm("<?php print GetLang('Subscribers_Banned_CancelPrompt'); ?>")) { document.location="index.php?Page=Subscribers&Action=Banned" }'>
				<br />
				&nbsp;
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('BannedEmailDetails'); ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('BannedEmailsChooseList'); ?>:&nbsp;
						</td>
						<td>
							<select name="list" style="width:350px">
								<?php if(isset($GLOBALS['SelectList'])) print $GLOBALS['SelectList']; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('BannedEmails'); ?>:&nbsp;
						</td>
						<td style="padding:0px; margin:0px; height:15px">
							<input id="listRadio" name="bannedType" type="radio"> <label for="listRadio"><?php print GetLang('Banned_AddEmailsUsingForm'); ?></label><br />
						</td>
					</tr>
					<tr style="display:none" id="trList">
						<td>&nbsp;</td>
						<td style="padding-left:20px" valign="top">
							<img src="images/nodejoin.gif" style="float:left" />&nbsp; <textarea name="BannedEmailList" style="width:250px" rows="5"></textarea>
							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('BannedEmails')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_BannedEmails')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td style="padding:0px; margin:0px; height:15px">	
							<input id="fileRadio" name="bannedType" type="radio"> <label for="fileRadio"><?php print GetLang('Add_Banned_From_File'); ?></label>
						</td>
					</tr>
					<tr style="display:none" id="trFile">
						<td>&nbsp;</td>
						<td style="padding-left:20px" valign="top">
							<img src="images/nodejoin.gif" style="float:left" />&nbsp; <input type="file" style="width:200px" name="BannedFile" class="Field">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('BannedFile')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_BannedFile')); ?></span></span>
						</td>
					</tr>
				</table>
				<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
					<tr>
						<td width="200" class="FieldLabel"></td>
						<td>
							<input class="FormButton" type="submit" value="<?php print GetLang('Save'); ?>" />
							<input class="FormButton" type="button" value="<?php print GetLang('Cancel'); ?>" onClick='if (confirm("<?php print GetLang('Subscribers_Banned_CancelPrompt'); ?>")) { document.location="index.php?Page=Subscribers&Action=Banned" }' />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
<script>

	function CheckForm() {
		var f = document.forms[0];

		if(!f.listRadio.checked && !f.fileRadio.checked) {
			alert('<?php print GetLang('Banned_Choose_Action'); ?>');
			return false;
		}

		if (f.BannedEmailList.value == "" && f.listRadio.checked) {
			alert("<?php print GetLang('Banned_Add_EmptyList'); ?>");
			f.BannedEmailList.focus();
			return false;
		}

		if (f.BannedFile.value == "" && f.fileRadio.checked) {
			alert("<?php print GetLang('Banned_Add_EmptyFile'); ?>");
			f.BannedFile.focus();
			return false;
		}

		if (f.list.selectedIndex == -1) {
			alert("<?php print GetLang('Banned_Add_ChooseList'); ?>");
			f.list.focus();
			return false;
		}
		return true;
	}

	$('#listRadio').click(function() {
		$('#trList').show();
		$('#trFile').hide();

	});

	$('#fileRadio').click(function() {
		$('#trList').hide();
		$('#trFile').show();

	});

</script>