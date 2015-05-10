<?php $IEM = $tpl->Get('IEM'); ?><div>
	<strong><em><?php echo $tpl->Get('heading'); ?></em></strong>
	<br /><br />
	<?php echo $tpl->Get('message'); ?>
	<div style="text-align:center; padding-top:1.2em;">
		<input type="button" id="popup_close" value="&nbsp;<?php echo GetLang('OK'); ?>&nbsp;" />
	</div>
	<script>
	$('#popup_close').click(function() {
		parent.tb_remove();
	});
	</script>
</div>
