<?php $IEM = $tpl->Get('IEM'); ?><tr class="GridRow">
	<td valign="top"><img src="images/m_stats.gif"></td>
	<td>
		<?php if(isset($GLOBALS['MailingList'])) print $GLOBALS['MailingList']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['CreateDate'])) print $GLOBALS['CreateDate']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['SubscribeCount'])) print $GLOBALS['SubscribeCount']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['UnsubscribeCount'])) print $GLOBALS['UnsubscribeCount']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['StatsAction'])) print $GLOBALS['StatsAction']; ?>
	</td>
</tr>
