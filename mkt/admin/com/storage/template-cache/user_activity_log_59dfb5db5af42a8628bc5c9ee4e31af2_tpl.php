<?php $IEM = $tpl->Get('IEM'); ?><link rel="stylesheet" href="includes/styles/useractivitylog.css" type="text/css">

<?php if(!$tpl->Get('IEM','User')->Get('infotips')): ?>
	<style>
		div#lastViewed {
			margin-bottom: 10px;
		}
	</style>
<?php endif; ?>

<script>
	$(function() {
		if (!$.browser.mozilla) {
			$('div#userActivityLogList span.userActivityLogItem').each(function() {
				if($(this).width() > 120) $(this).css('width', '120px');
			});
		}
	});
</script>

<div id="userActivityLogList_Container">
	<div id="userActivityLogList" class="Text">
		<span class="userActivityLogLabel"><?php echo GetLang('UserActivityLogLabel'); ?></span>
		<?php if(!function_exists("foreach_113387")){ function foreach_113387(&$tpl, $array){ $tpl->Assign(array('activityRecord', 'iteration'), 0); $tpl->Assign(array('activityRecord', 'first'), true); $tpl->Assign(array('activityRecord', 'last'), false); $tpl->Assign(array('activityRecord', 'total'), sizeof($array)); if(is_array($array)): foreach($array as $__key=>$record): $tpl->Assign('__key', $__key, false); $tpl->Assign('record', $record, false); $tpl->Assign(array('activityRecord', 'iteration'), $tpl->Get('activityRecord', 'iteration')+1);if( $tpl->Get('activityRecord','total') ===  $tpl->Get('activityRecord','iteration')){ $tpl->Assign(array('activityRecord','last'), true);} ?>
			<span class="userActivityLogItem <?php if($tpl->Get('activityRecord','first')): ?>userActivityLogFirstItem<?php elseif($tpl->Get('activityRecord','last')): ?>userActivityLogLastItem<?php endif; ?>">
				<a href="<?php echo $tpl->Get('record','url'); ?>" title="<?php echo strreplace($tpl->Get('record','text'), '"', '&quot;'); ?>">
					<img src="<?php echo $tpl->Get('record','icon'); ?>" alt="icon" />&nbsp;<?php echo $tpl->Get('record','text'); ?>
				</a>
			</span>
		 <?php $tpl->Assign(array('activityRecord', 'first'), false);endforeach; endif;}} foreach_113387($tpl, $tpl->Get('records')); ?>
		&nbsp;
	</div>
</div>