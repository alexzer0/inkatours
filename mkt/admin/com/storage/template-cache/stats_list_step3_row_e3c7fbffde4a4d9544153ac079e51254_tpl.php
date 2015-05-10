<?php $IEM = $tpl->Get('IEM'); ?><tr class="GridRow">
		<td nowrap height="22">
			&nbsp;<?php if(isset($GLOBALS['Name'])) print $GLOBALS['Name']; ?>
		</td>
		<td nowrap>
			<?php if(isset($GLOBALS['unconfirms'])) print $GLOBALS['unconfirms']; ?>
		</td>
		<td nowrap>
			<?php if(isset($GLOBALS['confirms'])) print $GLOBALS['confirms']; ?>
		</td>
		<td nowrap>
			<?php if(isset($GLOBALS['unsubscribes'])) print $GLOBALS['unsubscribes']; ?>
		</td>
		<td nowrap>
			<?php if(isset($GLOBALS['bounces'])) print $GLOBALS['bounces']; ?>
		</td>
		<td nowrap>
			<?php if(isset($GLOBALS['forwards'])) print $GLOBALS['forwards']; ?>
		</td>
	</tr>
