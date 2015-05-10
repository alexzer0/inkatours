<?php $IEM = $tpl->Get('IEM'); ?><script>
	$(function() {
		$('input#startImportSubscriber').click(function(event) {
			tb_show('', 'index.php?Page=Subscribers&Action=Import&SubAction=ImportIFrame&keepThis=true&TB_iframe=tue&height=385&width=450&modal=true', '');
			event.preventDefault();
			event.stopPropagation();
		});
	});
</script>
<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1">
			<?php print GetLang('Subscribers_Import_Step4'); ?>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo">
			<p>
				<?php print GetLang('Subscribers_Import_Step4_Intro'); ?>
			<input id="startImportSubscriber" type="button" value="<?php print GetLang('ImportStart'); ?>" class="Field" style="margin-top: 5px;"/>
			</p>
		</td>
	</tr>
</table>