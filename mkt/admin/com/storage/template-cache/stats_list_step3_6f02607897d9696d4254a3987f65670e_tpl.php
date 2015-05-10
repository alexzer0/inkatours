<?php $IEM = $tpl->Get('IEM'); ?><table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td>

<div class="Heading1"><?php print GetLang('Stats_ListStatistics'); ?></div>

<script>
	var TabSize = 7;
</script>

<div>
	<br>
	<ul id="tabnav">
		<li><a href="#" class="active" onClick="ShowTab(1)" id="tab1"><?php print GetLang('ListStatistics_Snapshot'); ?></a></li>
		<li><a href="#" onClick="ShowTab(7)" id="tab7"><?php print GetLang('ListStatistics_Snapshot_PerDomain'); ?></a></li>
		<li><a href="#" onClick="ShowTab(2)" id="tab2"><?php print GetLang('ListStatistics_Snapshot_OpenStats'); ?></a></li>
		<li><a href="#" onClick="ShowTab(3)" id="tab3"><?php print GetLang('ListStatistics_Snapshot_LinksStats'); ?></a></li>
		<li><a href="#" onClick="ShowTab(4)" id="tab4"><?php print GetLang('ListStatistics_Snapshot_BounceStats'); ?></a></li>
		<li><a href="#" onClick="ShowTab(5)" id="tab5"><?php print GetLang('ListStatistics_Snapshot_UnsubscribeStats'); ?></a></li>
		<li><a href="#" onClick="ShowTab(6)" id="tab6"><?php print GetLang('ListStatistics_Snapshot_ForwardsStats'); ?></a></li>
	</ul>
</div>


<div id="div1">
	<div class="body pageinfo">
		<br /><?php if(isset($GLOBALS['SummaryIntro'])) print $GLOBALS['SummaryIntro']; ?><br />&nbsp;
	</div>
	<div>
		<?php if(isset($GLOBALS['Calendar'])) print $GLOBALS['Calendar']; ?>
	</div>

	<br>

<table width="100%" border="0" class="Text">
	<tr>
		<td valign=top width="250" rowspan="2">
			<div class="MidHeading" style="width:100%"><img src="images/m_stats.gif" width="20" height="20" align="absMiddle">&nbsp;<?php echo GetLang('List_Summary_Graph'); ?></div>
				<UL class="Text">
					<LI><?php print GetLang('ListStatsTotalConfirms'); ?><?php if(isset($GLOBALS['Total_confirms'])) print $GLOBALS['Total_confirms']; ?></li>
					<LI><?php print GetLang('ListStatsTotalUnconfirms'); ?><?php if(isset($GLOBALS['Total_unconfirms'])) print $GLOBALS['Total_unconfirms']; ?></li>
					<LI><?php print GetLang('ListStatsTotalUnsubscribes'); ?><?php if(isset($GLOBALS['Total_unsubscribes'])) print $GLOBALS['Total_unsubscribes']; ?></li>
					<LI><?php print GetLang('Stats_TotalBounces'); ?><?php if(isset($GLOBALS['Total_bounces'])) print $GLOBALS['Total_bounces']; ?></li>
					<LI><?php print GetLang('ListStatsTotalForwards'); ?><?php if(isset($GLOBALS['Total_forwards'])) print $GLOBALS['Total_forwards']; ?></li>
				</UL>
		</td>
		<td align="center">
			<?php if(isset($GLOBALS['SummaryChart'])) print $GLOBALS['SummaryChart']; ?>
		</td>
	</tr>
</table>

<table width="100%" border="0">
	<tr>
		<td width="100%" valign="top">

				<table border="0" width="100%" class="Text" cellpadding="5" cellspacing="0">
				<tr class="Heading3">
						<td nowrap align="left">
							<?php print GetLang('DateTime'); ?>
						</td>
						<td nowrap align="left">
							<?php print GetLang('Unconfirms'); ?>
						</td>
						<td nowrap align="left">
							<?php print GetLang('Confirms'); ?>
						</td>
						<td nowrap align="left">
							<?php print GetLang('Unsubscribes'); ?>
						</td>
						<td nowrap align="left">
							<?php print GetLang('Bounces'); ?>
						</td>
						<td nowrap align="left">
							<?php print GetLang('Forwards'); ?>
						</td>
					</tr>
					<?php if(isset($GLOBALS['DisplayList'])) print $GLOBALS['DisplayList']; ?>
					<tr class="Heading3">
						<td nowrap align="left">
							<?php print GetLang('Total'); ?>
						</td>
						<td nowrap align="left">
							<?php if(isset($GLOBALS['Total_unconfirms'])) print $GLOBALS['Total_unconfirms']; ?>
						</td>
						<td nowrap align="left">
							<?php if(isset($GLOBALS['Total_confirms'])) print $GLOBALS['Total_confirms']; ?>
						</td>
						<td nowrap align="left">
							<?php if(isset($GLOBALS['Total_unsubscribes'])) print $GLOBALS['Total_unsubscribes']; ?>
						</td>
						<td nowrap align="left">
							<?php if(isset($GLOBALS['Total_bounces'])) print $GLOBALS['Total_bounces']; ?>
						</td>
						<td nowrap align="left">
							<?php if(isset($GLOBALS['Total_forwards'])) print $GLOBALS['Total_forwards']; ?>
						</td>
					</tr>
				</table>
			</td>
	</table>

</div>

%%TPL_DomainPage%%

%%TPL_OpensPage%%
%%TPL_LinksPage%%
%%TPL_BouncesPage%%
%%TPL_UnsubscribesPage%%
%%TPL_ForwardsPage%%

		</td>
	</tr>
</table>