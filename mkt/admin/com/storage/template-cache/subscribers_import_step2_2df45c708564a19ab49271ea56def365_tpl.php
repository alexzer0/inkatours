<?php $IEM = $tpl->Get('IEM'); ?><form method="post" action="index.php?Page=Subscribers&Action=Import&SubAction=Step3" onsubmit="return CheckForm();" enctype="multipart/form-data">
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php print GetLang('Subscribers_Import_Step2'); ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
			<p>
				<?php print GetLang('Subscribers_Import_Step2_Intro'); ?>&nbsp;<a href="#" onClick="LaunchHelp('<?php print $IEM['InfoTips']; ?>','817'); return false;"><?php print GetLang('ImportTutorialLink'); ?></a>
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
				<input class="FormButton" type="submit" value="<?php print GetLang('NextButton'); ?>">
				<input class="FormButton" type="button" value="<?php print GetLang('Cancel'); ?>" onClick='if(confirm("<?php print GetLang('Subscribers_Import_CancelPrompt'); ?>")) { document.location="index.php?Page=Subscribers&Action=Import" }'>
				<br />
				&nbsp;
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('ImportDetails'); ?>
						</td>
					</tr>
					<tr style="display:none">
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('ImportStatus'); ?>:
						</td>
						<td>
							<select name="status">
								<option value="active" SELECTED><?php print GetLang('Active'); ?>
							</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ImportStatus')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ImportStatus')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('ImportConfirmedStatus'); ?>:
						</td>
						<td>
							<select name="confirmed">
								<option value="confirmed" SELECTED><?php print GetLang('Confirmed'); ?>
								<option value="unconfirmed"><?php print GetLang('Unconfirmed'); ?>
							</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ImportConfirmedStatus')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ImportConfirmedStatus')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('ImportFormat'); ?>:
						</td>
						<td>
							<select name="format" onchange="ChangeOptions();">
								<?php if(isset($GLOBALS['ListFormats'])) print $GLOBALS['ListFormats']; ?>
							</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ImportFormat')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ImportFormat')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('OverwriteExistingSubscriber'); ?>:
						</td>
						<td>
							<label for="overwrite"><input type="checkbox" name="overwrite" id="overwrite" value="1">&nbsp;<?php print GetLang('YesOverwriteExistingSubscriber'); ?></label> <span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('OverwriteExistingSubscriber')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_OverwriteExistingSubscriber')); ?></span></span>
						</td>
					</tr>
					<tr style="display:<?php if(isset($GLOBALS['ShowAutoresponderImport'])) print $GLOBALS['ShowAutoresponderImport']; ?>">
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('IncludeAutoresponder'); ?>:
						</td>
						<td>
							<label for="autoresponder"><input type="checkbox" name="autoresponder" id="autoresponder" value="1">&nbsp;<?php print GetLang('YesIncludeAutoresponder'); ?></label> <span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('IncludeAutoresponder')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_IncludeAutoresponder')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="EmptyRow">
							&nbsp;
						</td>
					</tr>
					<tr style="display:none">
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('ImportType'); ?>
						</td>
					</tr>
					<tr style="display:none">
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('ImportType'); ?>:&nbsp;
						</td>
						<td>
							<select name="importtype">
								<?php if(isset($GLOBALS['ImportTypes'])) print $GLOBALS['ImportTypes']; ?>
							</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ImportType')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ImportType')); ?></span></span>
						</td>
					</tr>
					<tr style="display:none">
						<td colspan="2" class="EmptyRow">
							&nbsp;
						</td>
					</tr>
					<!-- here we go for importing of files. //-->
						<div id="importinfo_file">
						<tr>
							<td colspan="2" class="Heading2">
								&nbsp;&nbsp;<?php print GetLang('ImportFileDetails'); ?>
							</td>
						</tr>
						<tr>
							<td width="200" class="FieldLabel">
								<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
								<?php print GetLang('ContainsHeaders'); ?>:
							</td>
							<td>
								<label for="headers"><input type="checkbox" name="headers" id="headers" value="1">&nbsp;<?php print GetLang('YesContainsHeaders'); ?></label> <span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ContainsHeaders')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ContainsHeaders')); ?></span></span>
							</td>
						</tr>
						<tr>
							<td width="200" class="FieldLabel">
								<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
								<?php print GetLang('FieldSeparator'); ?>:
							</td>
							<td>
								<input type="text" name="fieldseparator" class="Field250" value="<?php if(isset($GLOBALS['fieldseparator'])) print $GLOBALS['fieldseparator']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('FieldSeparator')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_FieldSeparator')); ?></span></span>
							</td>
						</tr>
						<tr id="fieldenclosed_info" style="display: <?php if(isset($GLOBALS['ShowFieldEnclosed'])) print $GLOBALS['ShowFieldEnclosed']; ?>">
							<td width="200" class="FieldLabel">
								<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
								<?php print GetLang('FieldEnclosed'); ?>:
							</td>
							<td>
								<input type="text" name="fieldenclosed" class="Field250" value="<?php if(isset($GLOBALS['fieldenclosed'])) print $GLOBALS['fieldenclosed']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('FieldEnclosed')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_FieldEnclosed')); ?></span></span>
							</td>
						</tr>
						<tr>
							<td width="200" class="FieldLabel">
								<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
								<?php print GetLang('ImportFile'); ?>:
							</td>
							<td>
								<div>
									<input id="SubscriberImportUseUpload" type="radio" name="useserver" value="0" checked="checked" onClick="FileSourceFromServer(false);" />
									<label for="SubscriberImportUseUpload"><?php print GetLang('ImportFile_SourceUpload'); ?></label>
									&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ImportFile')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ImportFile')); ?></span></span>
								</div>
								<div id="SubscriberImportUploadField" style="margin-left: 25px;">
									<input type="file" name="importfile" class="Field250" />
								</div>
							</td>
						</tr>
						<tr>
							<td width="200" class="FieldLabel">&nbsp;</td>
							<td>
								<div>
									<input id="SubscriberImportUseServer" type="radio" name="useserver" value="1" onClick="FileSourceFromServer(true);" />
									<label for="SubscriberImportUseServer"><?php print GetLang('ImportFile_SourceServer'); ?></label>
									&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ImportFileFromServer')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ImportFileFromServer')); ?></span></span>
								</div>
								<div id="SubscriberImportServerField" style="margin-left: 25px; display:none;">
									<select name="serverfile" class="Field250" disabled="disabled">
										<?php if(isset($GLOBALS['fieldServerFiles'])) print $GLOBALS['fieldServerFiles']; ?>
									</select>
								</div>
								<div id="SubscriberImportServerNoList" style="margin: 5px 0 0 25px; display:none; width:300px; font-style: italic;">
									<?php print GetLang('ImportFile_ServerFileEmptyList'); ?>
								</div>
							</td>
						</tr>
					</div>
					<!-- end of importing files //-->
				</table>
				<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
					<tr>
						<td width="200" class="FieldLabel">&nbsp;</td>
						<td valign="top" height="30">
							<input class="FormButton" type="submit" value="<?php print GetLang('NextButton'); ?>">
							<input class="FormButton" type="button" value="<?php print GetLang('Cancel'); ?>" onClick='if(confirm("<?php print GetLang('Subscribers_Import_CancelPrompt'); ?>")) { document.location="index.php?Page=Subscribers&Action=Import" }'>
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
		var import_index = f.importtype.selectedIndex;
		var importtype = f.importtype.options[import_index].value;

		if (importtype == 'file') {
			if (f.fieldseparator.value == '') {
				alert('<?php print GetLang('ImportFile_FieldSeparatorEmpty'); ?>');
				f.fieldseparator.focus();
				return false;
			}
			if(f.useserver[1].checked) {
				if (f.localfile.value == '') {
					alert('<?php print GetLang('ImportFile_ServerFileEmpty'); ?>');
					f.serverfile.focus();
					return false;
				}
			} else {
				if (f.importfile.value == '') {
					alert('<?php print GetLang('ImportFile_FileEmpty'); ?>');
					f.importfile.focus();
					return false;
				}
			}
			return true;
		}
	}

	function ChangeOptions() {
		var Options = Array('file');
		var f = document.forms[0];
		var import_index = f.importtype.selectedIndex;
		var importtype = f.importtype.options[import_index].value;
		for (var option in Options) {
			if (option == importtype) {
				document.getElementById('importinfo_' + option).display.style = '';
			} else {
				document.getElementById('importinfo_' + option).display.style = 'none';
			}
		}
	}

	function FileSourceFromServer(value) {
		var frm = document.forms[0];
		frm.importfile.disabled = value;
		document.getElementById('SubscriberImportUploadField').style.display = value? 'none' : '';
		frm.serverfile.disabled = !value;
		document.getElementById(frm.serverfile.options.length == 0? 'SubscriberImportServerNoList' : 'SubscriberImportServerField').style.display = value? '' : 'none';
	}

	function ImportTutorial()
	{
		window.open('index.php?Page=Subscribers&Action=Import&SubAction=ViewTutorial', "importWin", "left=" + (((screen.availWidth) / 2) - 225) + ", top="+ (((screen.availHeight) / 2) - 300) +", width=450, height=600, toolbar=0, statusbar=0, scrollbars=1");
	}
</script>
