<?php $IEM = $tpl->Get('IEM'); ?><tr>
	<td width="200" class="FieldLabel">
		<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
		<?php if(isset($GLOBALS['FieldName'])) print $GLOBALS['FieldName']; ?>:
	</td>
	<td>
		<select name="<?php if(isset($GLOBALS['OptionName'])) print $GLOBALS['OptionName']; ?>">
			<?php if(isset($GLOBALS['OptionList'])) print $GLOBALS['OptionList']; ?>
		</select>&nbsp;&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('IncludeField')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_IncludeField')); ?></span></span>
	</td>
</tr>

