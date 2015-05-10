<?php $IEM = $tpl->Get('IEM'); ?><table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1"><?php print GetLang('Stats_List_Step1_Heading'); ?></td>
	</tr>
	<tr>
		<td class="body pageinfo"><p><?php print GetLang('Stats_List_Step1_Intro'); ?></p></td>
	</tr>
	<tr>
		<td>
			<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
		</td>
	</tr>
	<tr>
		<td class="body">
			<table width="100%" border="0">
				<tr>
					<td align="right">
						%%TPL_Paging%%
					</td>
				</tr>
			</table>
			<form>
				<table border=0 cellspacing="0" cellpadding="2" width=100% class="Text">
					<tr class="Heading3">
						<td width="5"></td>
						<td width="50%">
							<?php print GetLang('MailingList'); ?>&nbsp;<a href='index.php?Page=Stats&Action=List&SubAction=Step1&SortBy=Name&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=List&SubAction=Step1&SortBy=Name&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="10%">
							<?php print GetLang('Created'); ?>&nbsp;<a href='index.php?Page=Stats&Action=List&SubAction=Step1&SortBy=Date&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=List&SubAction=Step1&SortBy=Date&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="15%">
							<?php print GetLang('Subscribers'); ?>&nbsp;<a href='index.php?Page=Stats&Action=List&SubAction=Step1&SortBy=Subscribers&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=List&SubAction=Step1&SortBy=Subscribers&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="15%">
							<?php print GetLang('UnsubscribeCount'); ?>&nbsp;<a href='index.php?Page=Stats&Action=List&SubAction=Step1&SortBy=Unsubscribes&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=List&SubAction=Step1&SortBy=Unsubscribes&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="100">
							<?php print GetLang('Action'); ?>
						</td>
					</tr>
				%%TPL_Stats_Lists_Manage_Row%%
				</table>
			%%TPL_Paging_Bottom%%
		</td>
	</tr>
</table>

<script>

	function DeleteSelectedStats(formObj) {
		stats_found = 0;
		for (var i=0;i < formObj.length;i++)
		{
			fldObj = formObj.elements[i];
			if (fldObj.type == 'checkbox')
			{
				if (fldObj.checked) {
					stats_found++;
				}
			}
		}

		if (stats_found <= 0) {
			alert("<?php print GetLang('ChooseStatsToDelete'); ?>");
			return false;
		}

		if (confirm("<?php print GetLang('DeleteStatsPrompt'); ?>")) {
			return true;
		}
		return false;
	}

	function ConfirmDelete(StatsID) {
		if (!StatsID) {
			return false;
		}

		if (confirm("<?php print GetLang('DeleteStatsPrompt'); ?>")) {
			document.location='index.php?Page=Stats&Action=Autoresponders&SubAction=Delete&id=' + StatsID;
		}
	}
</script>
