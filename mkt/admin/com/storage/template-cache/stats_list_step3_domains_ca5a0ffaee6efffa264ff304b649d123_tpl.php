<?php $IEM = $tpl->Get('IEM'); ?><div id="div7" style="display: none">
	<div class="body">
		<br><?php if(isset($GLOBALS['SummaryIntro'])) print $GLOBALS['SummaryIntro']; ?>
		<br><br>
	</div>
	<div>
		<?php if(isset($GLOBALS['Calendar'])) print $GLOBALS['Calendar']; ?>
	</div>

	<table border="0" cellspacing="0" cellpadding="0" width="100%" class="Text">
                <tr>
			<td width="100%" valign="top" align="center">
				<?php if(isset($GLOBALS['DomainChart'])) print $GLOBALS['DomainChart']; ?>
			</td>
		</tr>
		<tr>
			<td width="40%" valign="top">
				<table width="100%" border=0 cellspacing=0 cellpadding=5 class="Text">
					<tr class="Heading3">
						<td nowrap align="left">
							<?php print GetLang('DomainName'); ?>
						</td>
						<td nowrap align="left">
							<?php print GetLang('UnconfirmsCount'); ?>
						</td>
						<td nowrap align="left">
							<?php print GetLang('ConfirmsCount'); ?>
						</td>
						<td nowrap align="left">
							<?php print GetLang('UnsubscribeCount'); ?>
						</td>
						<td nowrap align="left">
							<?php print GetLang('BounceCount'); ?>
						</td>
						<td nowrap align="left">
							<?php print GetLang('ForwardCount'); ?>
						</td>
					</tr>
					<?php if(isset($GLOBALS['DisplayDomainList'])) print $GLOBALS['DisplayDomainList']; ?>
					<tr class="Heading3">
						<td nowrap align="left">
							<?php print GetLang('Total'); ?>
						</td>
						<td nowrap align="left">
							<?php if(isset($GLOBALS['Total_domain_unconfirms'])) print $GLOBALS['Total_domain_unconfirms']; ?>
						</td>
						<td nowrap align="left">
							<?php if(isset($GLOBALS['Total_domain_confirms'])) print $GLOBALS['Total_domain_confirms']; ?>
						</td>
						<td nowrap align="left">
							<?php if(isset($GLOBALS['Total_domain_unsubscribes'])) print $GLOBALS['Total_domain_unsubscribes']; ?>
						</td>
						<td nowrap align="left">
							<?php if(isset($GLOBALS['Total_domain_bounces'])) print $GLOBALS['Total_domain_bounces']; ?>
						</td>
						<td nowrap align="left">
							<?php if(isset($GLOBALS['Total_domain_forwards'])) print $GLOBALS['Total_domain_forwards']; ?>
						</td>
					</tr>
				</table>
			</td>
                </tr>
	</table>

</div>
