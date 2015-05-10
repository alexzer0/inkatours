<?php $IEM = $tpl->Get('IEM'); ?><?php $tpl->Assign('step', "2"); ?>
<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("bounce_navigation");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>

<script src="includes/js/jquery/form.js"></script>
<script>

	$(function() {

		// Make sure this is hidden if coming back from a future step.
		if (!$('#autobounceoption').attr('checked')) {
			showManual();
		} else {
			showAuto();
		}

		$('#autobounceoption').click(function() {
			showAuto();
		});

		$('#bounce_process').click(function() {
			showManual();
		});

		// Set up help popups.
		var topics = ['auto_explain', 'manual_explain'];
		$(topics).each(function(i, e) {
			$('#' + e).click(function(event) {
				showHelp(e);
				// Don't actually change the option when they click the 'why?' link.
				event.stopPropagation();
				return false;
			});
		});

	});

	function showAuto()
	{
		$('#BounceButton').val('<?php echo GetLang('Bounce_Auto_Button'); ?>').unbind();
		$('#BounceButton').click(function() {
			window.location.href = 'index.php?Page=Settings&Tab=4';
		})
		$('.YesProcessBounce').hide();
		$('#auto_settings').show();
	}

	function showManual()
	{
		$('#BounceButton').val('<?php echo GetLang('Bounce_Test_Conn_Cont'); ?>').unbind();
		$('#BounceButton').click(function() {
			if (Application.Page.BounceInfo.validateFields()) {
				TestBounceDetails();
			}
		})
		$('#auto_settings').hide();
		$('.YesProcessBounce').show();
	}

	function TestBounceDetails()
	{
		var x = 'index.php?Page=Bounce&Action=PopupBounceTest' + Application.Page.BounceInfo.getBounceParameters() + '&keepThis=true&TB_iframe=true&height=240&width=400&modal=true&random=' + new Date().getTime();
		tb_show('', x, '');
	}

	function showHelp(topic)
	{
		var url = 'index.php?Page=Bounce&Action=Help&Topic=' + topic + '&keepThis=true&TB_iframe=true&height=200&width=400&random=' + new Date().getTime();
		tb_show('<?php echo GetLang('BounceProcessHelp'); ?>', url, '');
	}

</script>

<form method="post" action="index.php?Page=Bounce&Action=BounceStep3">
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php echo GetLang('Bounce_Step1'); ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php echo GetLang('Bounce_Step1_Intro'); ?>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $tpl->Get('message'); ?>
			</td>
		</tr>
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0">
					<tr valign="top" style="background-color:#F9F9F9;">
						<td style="width:100%;background-color:#FFFFFF;padding-right:15px;border-right: 1px #EAEAEA solid;">
							<table border="0" cellspacing="0" cellpadding="0" width="100%" class="Panel">
								<tr>
									<td colspan="2" class="Heading2">
										&nbsp;&nbsp;<?php echo GetLang('SelectAContactList'); ?>
									</td>
								</tr>
								<tr>
									<td width="200" class="FieldLabel">
										<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
										<?php echo GetLang('BounceIWouldLikeTo'); ?>:&nbsp;
									</td>
									<td>
										<label for="autobounceoption">
											<input type="radio" name="bounceoption" value="auto" id="autobounceoption"<?php if(!$tpl->Get('show_manual')): ?> checked="checked"<?php endif; ?> />
											<?php echo GetLang('Bounce_Auto_Process'); ?>
										</label>
									</td>
								</tr>
								<tr id="auto_settings" style="display:;">
									<td class="FieldLabel">
										&nbsp;
									</td>
									<td>
										<span style="background: url('images/nodejoin.gif') no-repeat center left;padding: 5px 0px 5px 30px;display:block;">
											<?php echo GetLang('Bounce_Auto_Process_Steps'); ?>:
										</span>
										<ol style="margin:0; padding-left:4.5em; line-height:2;">
											<li><?php echo sprintf(GetLang('Bounce_Auto_Process_Step1'), $tpl->Get('list_url'), $tpl->Get('list_name')); ?></li>
											<li><?php echo GetLang('Bounce_Auto_Process_Step2'); ?></li>
											<li><?php echo GetLang('Bounce_Auto_Process_Step3'); ?></li>
											<li><?php echo sprintf(GetLang('Bounce_Auto_Process_Step4'), $tpl->Get('cron_url')); ?></li>
											<li><?php echo GetLang('Bounce_Auto_Process_Step5'); ?></li>
										</ol>
									</td>
								</tr>
								<tr>
									<td width="200" class="FieldLabel">
									</td>
									<td>
										<label for="bounce_process">
											<input type="radio" name="bounceoption" value="manual" id="bounce_process"<?php if($tpl->Get('show_manual')): ?> checked="checked"<?php endif; ?> />
											<?php echo GetLang('Bounce_Manual_Process'); ?>
										</label>
									</td>
								</tr>

								<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("bounce_details");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>

								<tr>
									<td>
										&nbsp;
									</td>
									<td  style="padding-top:10px;">
										<input class="Field150 SubmitButton" id="BounceButton" type="button" value="<?php echo GetLang('Bounce_Auto_Button'); ?>">
										<?php echo GetLang('OR'); ?>
										<a href="index.php?Page=Bounce" onclick='return confirm("<?php echo GetLang('Bounce_CancelPrompt'); ?>");'><?php echo GetLang('Cancel'); ?></a>
									</td>
								</tr>
							</table>
						</td>
						<td style="padding:0px 4px 0px 15px;"  bgcolor="#FFFFFF">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("bounce_help");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
