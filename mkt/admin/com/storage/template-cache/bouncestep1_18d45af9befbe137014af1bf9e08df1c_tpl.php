<?php $IEM = $tpl->Get('IEM'); ?><?php $tpl->Assign('step', "1"); ?>
<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("bounce_navigation");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>

<form method="post" action="index.php?Page=Bounce&Action=BounceStep2" id="BounceListChooseForm">
	<table cellspacing="0" cellpadding="0" width="100%" align="center" >
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
										<?php echo GetLang('SelectBounceEmail'); ?>:&nbsp;
									</td>
									<td style="padding-top:5px;">
										<div class="ISSelect" style="width:300px;">
											<ul>
												<?php $tpl->Assign('multiples', "0"); ?>
												<?php $array = $tpl->Get('bounce_server_map'); if(is_array($array)): foreach($array as $key=>$server): $tpl->Assign('key', $key, false); $tpl->Assign('server', $server, false);  ?>
													<li onclick="$('#server_<?php echo $tpl->Get('server','0','id'); ?>').click();" onmouseover="$(this).addClass('ISSelectOptionHover');" onmouseout="$(this).removeClass('ISSelectOptionHover');" style="cursor:pointer;">
														<label for="server_<?php echo $tpl->Get('server','0','id'); ?>">
															<input name="list" value="<?php echo $tpl->Get('server','0','id'); ?>" id="server_<?php echo $tpl->Get('server','0','id'); ?>" type="radio" onclick="$('.SelectedRow').removeClass('SelectedRow'); $(this).parents('li').addClass('SelectedRow');" style="vertical-align:top;" />
															<?php if(substr($tpl->Get('key'), 0, 1) == '~'): ?>
																<?php echo $tpl->Get('server','0','name'); ?>
															<?php else: ?>
																<?php if(count($tpl->Get('server')) > 1): ?>
																	<?php $tpl->Assign('multiples', "1"); ?>
																<?php endif; ?>
																<span class="Bounce_ISSelector_Title">
																	<?php echo $tpl->Get('server','0','username'); ?>@<?php echo $tpl->Get('server','0','server'); ?>
																</span>
																<span class="Bounce_ISSelector_Description">
																	<?php if(!function_exists("foreach_33671")){ function foreach_33671(&$tpl, $array){ if(is_array($array)): foreach($array as $__key=>$list): $tpl->Assign('__key', $__key, false); $tpl->Assign('list', $list, false);  ?>
																		<?php echo $tpl->Get('list','name'); ?><br />
																	 <?php endforeach; endif;}} foreach_33671($tpl, $tpl->Get('server')); ?>
																</span>
															<?php endif; ?>
														</label>
													</li>
												 <?php endforeach; endif; ?>
											</ul>
										</div>
										&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SelectBounceEmail')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SelectBounceEmail')); ?></span></span>
									</td>
								</tr>
								<tr>
									<td>
										&nbsp;
									</td>
									<td>
										<?php if($tpl->Get('multiples')): ?><a href="#" class="whylistgrouped"><?php echo GetLang('WhyListsGrouped'); ?></a><?php endif; ?>
									</td>
								</tr>
								<tr>
									<td>
										&nbsp;
									</td>
									<td>
										<input class="FormButton" type="submit" value="<?php echo GetLang('Next'); ?>">
										<?php echo GetLang('OR'); ?>
										<a href="index.php" onclick='return confirm("<?php echo GetLang('Bounce_CancelPrompt'); ?>");'><?php echo GetLang('Cancel'); ?></a>
										<br /><br />
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

<script>

	$('#BounceListChooseForm').submit(function() {
		var listid = $("input[name='list']:checked").val();
		if (!listid) {
			alert('<?php echo GetLang('Bounce_PleaseChooseList'); ?>');
			return false;
		}
	});

	$('.whylistgrouped').click(function() {
		var url = 'index.php?Page=Bounce&Action=Help&Topic=list_group&keepThis=true&TB_iframe=true&height=200&width=400&random=' + new Date().getTime();
		tb_show('<?php echo GetLang('BounceProcessHelp'); ?>', url, '');
	});

</script>
