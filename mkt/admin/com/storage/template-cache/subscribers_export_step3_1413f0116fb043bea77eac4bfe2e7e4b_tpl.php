<?php $IEM = $tpl->Get('IEM'); ?><form method="post" action="index.php?Page=Subscribers&Action=Export&SubAction=Step4" onsubmit="return CheckForm()">
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php if(isset($GLOBALS['Heading'])) print $GLOBALS['Heading']; ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php print GetLang('Subscribers_Export_Step3_Intro'); ?>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
				<?php if(isset($GLOBALS['SubscribersReport'])) print $GLOBALS['SubscribersReport']; ?>
			</td>
		</tr>
		<tr>
			<td>
				<input class="FormButton" type="submit" value="<?php print GetLang('NextButton'); ?>" />
				<input class="FormButton cancel" type="button" value="<?php print GetLang('Cancel'); ?>" />
				<br />
				&nbsp;
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('ExportFileType'); ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('ExportFileType'); ?>
						</td>
						<td>
							<div>
								<input id="SubscriberExportFileTypeCSV" type="radio" name="filetype" value="csv" checked="checked" onClick="ChooseFileType();" />
								<label for="SubscriberExportFileTypeCSV"><?php print GetLang('ExportFileTypeCSV'); ?></label>
								&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ExportFileTypeCSV')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ExportFileTypeCSV')); ?></span></span>
							</div>
							<div>
								<input id="SubscriberExportFileTypeXML" type="radio" name="filetype" value="xml" onClick="ChooseFileType();" />
								<label for="SubscriberExportFileTypeXML"><?php print GetLang('ExportFileTypeXML'); ?></label>
								&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ExportFileTypeXML')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ExportFileTypeXML')); ?></span></span>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="EmptyRow">
							&nbsp;
						</td>
					</tr>
					<tr id="SubscriberExportOptionHeading">
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('ExportOptions'); ?>
						</td>
					</tr>
					<tr id="SubscriberExportOptionIncludeHeader">
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('IncludeHeader'); ?>
						</td>
						<td>
							<select name="includeheader">
								<option value="1"><?php print GetLang('Yes'); ?></option>
								<option value="0"><?php print GetLang('No'); ?></option>
							</select>&nbsp;&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('IncludeHeader')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_IncludeHeader')); ?></span></span>
						</td>
					</tr>
					<tr id="SubscriberExportOptionFieldSeparator">
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('Export_FieldSeparator'); ?>:
						</td>
						<td>
							<input type="text" name="fieldseparator" value="," class="Field250"><span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('Export_FieldSeparator')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_Export_FieldSeparator')); ?></span></span>
						</td>
					</tr>
					<tr id="SubscriberExportOptionEnclosedBy">
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('FieldEnclosedBy'); ?>:
						</td>
						<td>
							<input type="text" name="fieldenclosedby" value='"' class="Field250"><span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('FieldEnclosedBy')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_FieldEnclosedBy')); ?></span></span>
						</td>
					</tr>
					<tr id="SubscriberExportOptionRowSeparator">
						<td colspan="2" class="EmptyRow">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('IncludeFields'); ?>
						</td>
					</tr>
					<?php if(isset($GLOBALS['FieldOptions'])) print $GLOBALS['FieldOptions']; ?>
				</table>
				<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
					<tr>
						<td width="200" class="FieldLabel">&nbsp;</td>
						<td valign="top" height="30">
							<input class="FormButton" type="submit" value="<?php print GetLang('NextButton'); ?>" />
							<input class="FormButton cancel" type="button" value="<?php print GetLang('Cancel'); ?>" />
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

		if (f.fieldseparator.value == '') {
			alert("<?php print GetLang('EnterFieldSeparator'); ?>");
			f.fieldseparator.focus();
			return false;
		}

		return true;
	}

	function ChooseFileType() {
		var elements = ['SubscriberExportOptionHeading',
						'SubscriberExportOptionIncludeHeader',
						'SubscriberExportOptionFieldSeparator',
						'SubscriberExportOptionEnclosedBy',
						'SubscriberExportOptionRowSeparator'];
		for(var i = 0, j = elements.length; i < j; ++i)
			document.getElementById(elements[i]).style.display = document.forms[0].filetype[0].checked? '' : 'none';
	}

	/*
	 * This code is duplicated on all steps. I know, bad practice, but it's
	 * at least better than what was there before.
	 */
	jQuery(function($) {

		$('.cancel').bind('click', function() {
			if (confirm('<?php print GetLang('Subscribers_Export_CancelPrompt'); ?>')) {
				document.location = 'index.php?Page=Subscribers';
			}
		});
		
	});
</script>