<?php $IEM = $tpl->Get('IEM'); ?><tr class="ImportRow">
	<td width="200" class="FieldLabel ImportColFromFile">
		<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>"<?php if(isset($GLOBALS['FieldName'])) print $GLOBALS['FieldName']; ?>" Maps to:
	</td>
	<td class="ImportColAvailable">
		<select name="<?php if(isset($GLOBALS['OptionName'])) print $GLOBALS['OptionName']; ?>">
			<?php if(isset($GLOBALS['OptionList'])) print $GLOBALS['OptionList']; ?>
		</select>
		&nbsp;&nbsp;<?php if(isset($GLOBALS['HLP_MappingOption'])) print $GLOBALS['HLP_MappingOption']; ?>
	</td>
</tr>