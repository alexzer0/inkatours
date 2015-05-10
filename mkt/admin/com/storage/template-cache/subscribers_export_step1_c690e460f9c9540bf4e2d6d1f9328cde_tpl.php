<?php $IEM = $tpl->Get('IEM'); ?><form method="post" action="index.php?Page=Subscribers&Action=Export&SubAction=Step2" onsubmit="return CheckForm();">
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php print GetLang('Subscribers_Export'); ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php print GetLang('Subscribers_Export_Intro'); ?>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<input class="FormButton" type="submit" value="<?php print GetLang('Next'); ?>" />
				<input class="FormButton cancel" type="button" value="<?php print GetLang('Cancel'); ?>" />
				<br />
				&nbsp;
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel" <?php if(isset($GLOBALS['FilterOptions'])) print $GLOBALS['FilterOptions']; ?>>
					<tr <?php if(isset($GLOBALS['FilterOptions'])) print $GLOBALS['FilterOptions']; ?>>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('FilterOptions_Subscribers'); ?>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('ShowFilteringOptionsLabel'); ?>
						</td>
						<td>
							<table width="100%" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<input type="checkbox" name="ShowFilteringOptions" id="ShowFilteringOptions" value="1" />
										<label for="ShowFilteringOptions"><?php print GetLang('ShowFilteringOptionsExplanation'); ?></label>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel" id="FilteringOptions" <?php if(isset($GLOBALS['FilteringOptions_Display'])) print $GLOBALS['FilteringOptions_Display']; ?>>
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('MailingListDetails'); ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('MailingList'); ?>:&nbsp;
						</td>
						<td>
							<select id="lists" name="lists[]" multiple="multiple" class="ISSelectReplacement ISSelectSearch" onDblClick="this.form.submit()">
								<?php if(isset($GLOBALS['SelectList'])) print $GLOBALS['SelectList']; ?>
							</select>
							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('MailingList')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_MailingList')); ?></span></span>
						</td>
					</tr>
				</table>
				<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
					<tr>
						<td width="200" class="FieldLabel">&nbsp;</td>
						<td valign="top" height="30">
							<input class="FormButton" type="submit" value="<?php print GetLang('Next'); ?>" />
							<input class="FormButton cancel" type="button" value="<?php print GetLang('Cancel'); ?>" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">

	function CheckForm() {
		var f = document.forms[0];
		var listbox = document.getElementById('lists');
		if (listbox.selectedIndex < 0) {
			alert("<?php print GetLang('SelectList'); ?>");
			listbox.focus();
			return false;
		}
		return true;
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