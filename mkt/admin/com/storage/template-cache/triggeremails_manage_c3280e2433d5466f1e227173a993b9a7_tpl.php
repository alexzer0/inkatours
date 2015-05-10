<?php $IEM = $tpl->Get('IEM'); ?><script>
	Application.Page.TriggerEmailsManage = {
		eventDOMReady: function(event) {
			$(document.frmPageAction).submit(Application.Page.TriggerEmailsManage.eventSubmitBulkAction);

			if (document.frmPageAction.cmdAddList)
				$(document.frmPageAction.cmdAddList).click(Application.Page.TriggerEmailsManage.eventAddList);

			if (document.frmPageAction.cmdAddNewsletter)
				$(document.frmPageAction.cmdAddNewsletter).click(Application.Page.TriggerEmailsManage.eventAddNewsletter);

			if (document.frmPageAction.cmdAddTrigger)
				$(document.frmPageAction.cmdAddTrigger).click(Application.Page.TriggerEmailsManage.eventAddTrigger);

			if($('#triggeremails_record_list').size() != 0) {
				Application.Ui.CheckboxSelection(	'table#triggeremails_record_list',
													'input.UICheckboxToggleSelector',
													'input.UICheckboxToggleRows');

				$(	'#triggeremails_record_list .TriggerEmails_Row_Action_DisableTrigger'
					+ ', #triggeremails_record_list .TriggerEmails_Row_Action_EnableTrigger'
					+ ', #triggeremails_record_list .TriggerEmails_Row_Action_Delete'
					+ ', #triggeremails_record_list .TriggerEmails_Row_Action_Copy').click(Application.Page.TriggerEmailsManage.eventActionRow);
			}
		},

		eventAddList: function(event) {
			document.location.href = 'index.php?Page=Lists&Action=Create';
		},

		eventAddNewsletter: function(event) {
			document.location.href = 'index.php?Page=Newsletters&Action=Create';
		},

		eventAddTrigger: function(event) {
			document.location.href = 'index.php?Page=TriggerEmails&Action=Create';
		},

		eventActionRow: function(event) {
			event.stopPropagation();
			event.preventDefault();

			var id = this.href.match(/id=(\d+)$/)[1];
			var url = this.href.replace(/&{0,1}id=(\d+)$/, '');
			var action = this.href.match(/Action=(\w+)/)[1];

			if (action == 'Delete') {
				if (!confirm('<?php echo GetLang('TriggerEmails_Manage_PromptDelete_One'); ?>')) return;
			}

			Application.Util.submitPost(url, {'id':id});
		},

		eventSubmitBulkAction: function(event) {
			event.stopPropagation();
			event.preventDefault();

			if(this.ChangeType.selectedIndex == 0) {
				alert("<?php echo GetLang('PleaseChooseAction'); ?>");
				return false;
			}

			var selectedIDs = [];
			var selectedRows = $('#triggeremails_record_list input.UICheckboxToggleRows').filter(':checked');
			var action = $(this.ChangeType).val();
			for(var i = 0, j = selectedRows.size(); i < j; ++i) selectedIDs.push(selectedRows.get(i).value);

			if (selectedIDs.length == 0) {
				alert("<?php echo GetLang('TriggerEmails_Manage_PromptChoose'); ?>");
				return false;
			}

			if (action == 'delete') {
				if (!confirm('<?php echo GetLang('TriggerEmails_Manage_PromptDelete'); ?>')) return;
			}

			Application.Util.submitPost(this.action, {	'Which': action,
														'IDs': selectedIDs});
		}
	};

	Application.init.push(Application.Page.TriggerEmailsManage.eventDOMReady);
</script>
<div class="PageBodyContainer">
	<div class="Page_Header">
		<div class="Heading1"><?php echo GetLang('TriggerEmails_Manage'); ?></div>
		<div class="Intro"><?php echo GetLang('TriggerEmails_Intro'); ?></div>
		<?php if(trim($tpl->Get('PAGE','messages')) != ''): ?>
			<div style="margin-top:5px;"><?php echo $tpl->Get('PAGE','messages'); ?></div>
		<?php endif; ?>

		<div class="Page_Action">
			<div style="<?php if(trim($tpl->Get('PAGE','messages')) == ''): ?>padding-top: 10px;<?php endif; ?> padding-bottom: 10px;">
				
				<?php if($tpl->Get('listCount') != 0 && $tpl->Get('newsletterCount') != 0): ?>
					<?php if($tpl->Get('permissions','create')): ?>
						<form name="frmCreateTrigger" action="index.php" method="GET">
							<input type="hidden" name="Page" value="TriggerEmails" />
							<input type="hidden" name="Action" value="Create" />
							<input type="submit" value="<?php echo GetLang('TriggerEmails_Manage_AddButton'); ?>" class="SmallButton" style="width:auto;" />
						</form>
					<?php endif; ?>

				
				<?php else: ?>
					<?php if($tpl->Get('listCount') == 0 && $tpl->Get('permissions','createList')): ?>
						<form name="frmCreateList" action="index.php" method="GET">
							<input type="hidden" name="Page" value="Lists" />
							<input type="hidden" name="Action" value="Create" />
							<input type="submit" value="<?php echo GetLang('TriggerEmails_Manage_AddListButton'); ?>" class="SmallButton" style="width:auto;" />
						</form>
					<?php endif; ?>
					<br />
					<?php if($tpl->Get('newsletterCount') == 0 && $tpl->Get('permissions','createNewsletter')): ?>
						<form name="frmCreateNewsletter" action="index.php" method="GET">
							<input type="hidden" name="Page" value="Newsletters" />
							<input type="hidden" name="Action" value="Create" />
							<input type="submit" value="<?php echo GetLang('TriggerEmails_Manage_AddCampaignButton'); ?>" class="SmallButton" style="width:auto;" />
						</form>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<form name="frmPageAction" action="index.php?Page=TriggerEmails&Action=BulkAction">
				<div class="Page_Action_Top"></div>

				
				<?php if(count($tpl->Get('records')) != 0): ?>
					
						<div>
							<select name="ChangeType">
								<option value="" selected="selected"><?php echo GetLang('ChooseAction'); ?></option>
								<?php if($tpl->Get('permissions','delete')): ?><option value="delete"><?php echo GetLang('TriggerEmails_Manage_BulkAction_Delete'); ?></option><?php endif; ?>
								<?php if($tpl->Get('permissions','activate')): ?>
									<option value="activate"><?php echo GetLang('TriggerEmails_Manage_BulkAction_Activate'); ?></option>
									<option value="deactivate"><?php echo GetLang('TriggerEmails_Manage_BulkAction_Deactivate'); ?></option>
								<?php endif; ?>
							</select>
							<input type="submit" name="cmdChangeType" class="Text" value="<?php echo GetLang('Go'); ?>" />
						</div>
					

					<div><?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Paging");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?></div>
				<?php endif; ?>

				<div class="Page_Action_Bottom"></div>
			</form>
		</div>
	</div>

	<div class="Page_Contents">
		<?php if(count($tpl->Get('records')) != 0): ?>
			
			<table id="triggeremails_record_list" border="0" cellspacing="0" cellpadding="2" width="100%" class="Text">
				<tr class="Heading3">
					<td width="5" nowrap align="center"><input type="checkbox" class="UICheckboxToggleSelector" /></td>
					<td width="5">&nbsp;</td>
					<td width="55%"><?php echo GetLang('TriggerEmails_Manage_Column_TriggerName'); ?>&nbsp;<a href="index.php?Page=TriggerEmails&SortBy=Name&Direction=Up"><img src="images/sortup.gif" border="0" /></a>&nbsp;<a href="index.php?Page=TriggerEmails&SortBy=Name&Direction=Down"><img src="images/sortdown.gif" border="0" /></a></td>
					<td width="12%" style="white-space:nowrap;"><?php echo GetLang('TriggerEmails_Manage_Column_CreateDate'); ?>&nbsp;<a href="index.php?Page=TriggerEmails&SortBy=CreateDate&Direction=Up"><img src="images/sortup.gif" border="0" /></a>&nbsp;<a href="index.php?Page=TriggerEmails&SortBy=CreateDate&Direction=Down"><img src="images/sortdown.gif" border="0" /></a></td>
					<td width="12%" style="white-space:nowrap;"><?php echo GetLang('TriggerEmails_Manage_Column_TriggeredBy'); ?>&nbsp;<a href="index.php?Page=TriggerEmails&SortBy=TriggerType&Direction=Up"><img src="images/sortup.gif" border="0" /></a>&nbsp;<a href="index.php?Page=TriggerEmails&SortBy=TriggerType&Direction=Down"><img src="images/sortdown.gif" border="0" /></a></td>
					<td width="12%" style="white-space:nowrap;"><?php echo GetLang('TriggerEmails_Manage_Column_TriggerHours'); ?>&nbsp;<a href="index.php?Page=TriggerEmails&SortBy=TriggerHours&Direction=Up"><img src="images/sortup.gif" border="0" /></a>&nbsp;<a href="index.php?Page=TriggerEmails&SortBy=TriggerHours&Direction=Down"><img src="images/sortdown.gif" border="0" /></a></td>
					<td width="8%" align="center" style="white-space:nowrap;"><?php echo GetLang('TriggerEmails_Manage_Column_Status'); ?>&nbsp;<a href="index.php?Page=TriggerEmails&SortBy=Active&Direction=Up"><img src="images/sortup.gif" border="0" /></a>&nbsp;<a href="index.php?Page=TriggerEmails&SortBy=Active&Direction=Down"><img src="images/sortdown.gif" border="0" /></a></td>
					<td width="130"><?php echo GetLang('Action'); ?></td>
				</tr>
				<?php $array = $tpl->Get('records'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
					<?php ob_start(); ?><?php echo intval($tpl->Get('each','triggeremailsid')); ?><?php $tpl->Assign("recordID", ob_get_contents()); ob_end_clean(); ?>
					<?php ob_start(); ?><?php echo $tpl->Get('each','name'); ?><?php $tpl->Assign("recordName", ob_get_contents()); ob_end_clean(); ?>
					<tr class="GridRow">
						<td align="center">
							<input type="checkbox" class="UICheckboxToggleRows" value="<?php echo $tpl->Get('recordID'); ?>" title="<?php echo $tpl->Get('recordName'); ?>" />
						</td>
						<td><img src="images/m_triggeremails.gif" /></td>
						<td><?php echo $tpl->Get('recordName'); ?></td>
						<td><?php echo $tpl->Get('each','procstr_createdate'); ?></td>
						<td>
							<?php if($tpl->Get('each','triggertype') == 'f'): ?>
								<?php echo GetLang('TriggerEmails_Manage_Column_TriggeredBy_CustomField'); ?>
							<?php elseif($tpl->Get('each','triggertype') == 'n'): ?>
								<?php echo GetLang('TriggerEmails_Manage_Column_TriggeredBy_CampaignOpen'); ?>
							<?php elseif($tpl->Get('each','triggertype') == 'l'): ?>
								<?php echo GetLang('TriggerEmails_Manage_Column_TriggeredBy_LinkClicked'); ?>
							<?php elseif($tpl->Get('each','triggertype') == 's'): ?>
								<?php echo GetLang('TriggerEmails_Manage_Column_TriggeredBy_StaticDate'); ?>
							<?php else: ?>
								-
							<?php endif; ?>
						</td>
						<td>
							<?php ob_start(); ?><?php echo abs($tpl->Get('each','triggerhours')); ?><?php $tpl->Assign("temp", ob_get_contents()); ob_end_clean(); ?>
							<?php if($tpl->Get('each','triggerhours') == 0): ?>
								<?php echo GetLang('TriggerEmails_Manage_Column_TriggerDays_Immediate'); ?>
							<?php elseif($tpl->Get('each','triggerhours') == -1): ?>
								<?php echo GetLang('TriggerEmails_Manage_Column_TriggerDays_OneHourBefore'); ?>
							<?php elseif($tpl->Get('each','triggerhours') < -1): ?>
								<?php echo sprintf(GetLang('TriggerEmails_Manage_Column_TriggerDays_HoursBefore'), $tpl->Get('temp')); ?>
							<?php elseif($tpl->Get('each','triggerhours') == 1): ?>
								<?php echo GetLang('TriggerEmails_Manage_Column_TriggerDays_OneHourAfter'); ?>
							<?php elseif($tpl->Get('each','triggerhours') < 1): ?>
								<?php echo sprintf(GetLang('TriggerEmails_Manage_Column_TriggerDays_HoursAfter'), $tpl->Get('temp')); ?>
							<?php else: ?>
								<?php echo GetLang('N/A'); ?>
							<?php endif; ?>
						</td>
						<td align="center">
							<?php if($tpl->Get('each','active') == 1): ?>
								<?php if($tpl->Get('permissions','activate')): ?><a href="index.php?Page=TriggerEmails&Action=Disable&id=<?php echo $tpl->Get('recordID'); ?>" class="TriggerEmails_Row_Action_DisableTrigger" title="<?php echo GetLang('TriggerEmails_Manage_Tips_DisableTrigger'); ?>"><?php endif; ?>
									<img src="images/tick.gif" alt="<?php echo GetLang('Status_Active'); ?>" alt="<?php echo GetLang('TriggerEmails_Manage_Tips_DisableTrigger'); ?>" border="0" />
								<?php if($tpl->Get('permissions','activate')): ?></a><?php endif; ?>
							<?php else: ?>
								<?php if($tpl->Get('permissions','activate')): ?><a href="index.php?Page=TriggerEmails&Action=Enable&id=<?php echo $tpl->Get('recordID'); ?>" class="TriggerEmails_Row_Action_EnableTrigger" title="<?php echo GetLang('TriggerEmails_Manage_Tips_EnableTrigger'); ?>"><?php endif; ?>
									<img src="images/cross.gif" alt="<?php echo GetLang('Status_Inactive'); ?>" alt="<?php echo GetLang('TriggerEmails_Manage_Tips_EnableTrigger'); ?>" border="0" />
								<?php if($tpl->Get('permissions','activate')): ?></a><?php endif; ?>
							<?php endif; ?>
						</td>
						<td style="white-space:nowrap;">
							<?php if($tpl->Get('permissions','edit')): ?><a href="index.php?Page=TriggerEmails&Action=Edit&id=<?php echo $tpl->Get('recordID'); ?>"><?php echo GetLang('Edit'); ?></a><?php endif; ?>
							<?php if($tpl->Get('permissions','create')): ?>&nbsp;<a href="index.php?Page=TriggerEmails&Action=Copy&id=<?php echo $tpl->Get('recordID'); ?>" class="TriggerEmails_Row_Action_Copy"><?php echo GetLang('Copy'); ?></a><?php endif; ?>
							<?php if($tpl->Get('permissions','delete')): ?>&nbsp;<a href="index.php?Page=TriggerEmails&Action=Delete&id=<?php echo $tpl->Get('recordID'); ?>" class="TriggerEmails_Row_Action_Delete"><?php echo GetLang('Delete'); ?></a><?php endif; ?>
						</td>
					</tr>
				 <?php endforeach; endif; ?>
			</table>
		<?php endif; ?>
	</div>

	<div class="Page_Footer">
		
		<?php if(count($tpl->Get('records')) != 0): ?><?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Paging_Bottom");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?><?php endif; ?>
	</div>
</div>