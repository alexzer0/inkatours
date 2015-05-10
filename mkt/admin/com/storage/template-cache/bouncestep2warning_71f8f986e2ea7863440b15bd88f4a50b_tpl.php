<?php $IEM = $tpl->Get('IEM'); ?><?php $tpl->Assign('step', "2"); ?>
<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("bounce_navigation");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>

<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1">
			<?php echo GetLang('Bounce_Step2'); ?>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo">
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
				<tr valign="top">
					<td>
						<input class="Field150" type="button" value="<?php echo GetLang('Bounce_Review_Settings'); ?>" onclick="window.location.href='index.php?Page=Bounce&Action=BounceStep2';">
									<?php echo GetLang('OR'); ?>
						<a href="index.php?Page=Bounce" onclick='return confirm("<?php echo GetLang('Bounce_CancelPrompt'); ?>");'><?php echo GetLang('Cancel'); ?></a>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<div class="Heading1" style="color:#676767; padding:15px 0px 10px 0px;">
							<?php echo $tpl->Get('problem_name'); ?>
						</div>
						<?php if($tpl->Get('problem_type') == 'unknown'): ?>
							<?php echo GetLang('Bounce_Help_PossibleSolutions_Unknown'); ?>
						<?php else: ?>
							<?php echo GetLang('Bounce_Help_PossibleSolutions'); ?>
						<?php endif; ?>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<ul>
							<?php $array = $tpl->Get('problem_advice'); if(is_array($array)): foreach($array as $title=>$article): $tpl->Assign('title', $title, false); $tpl->Assign('article', $article, false);  ?>
								<li><a href="#" onclick="LaunchHelp(<?php echo $tpl->Get('article'); ?>)"><?php echo $tpl->Get('title'); ?></a></li>
							 <?php endforeach; endif; ?>
						</ul>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<!--

Error Report
============

<?php echo $tpl->Get('error_report'); ?>

-->
