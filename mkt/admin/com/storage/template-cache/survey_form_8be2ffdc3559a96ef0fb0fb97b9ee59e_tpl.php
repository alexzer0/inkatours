<?php $IEM = $tpl->Get('IEM'); ?><script src="includes/js/jquery/ui.js"></script>
<script src="includes/js/jquery/form.js"></script>
<script src="includes/js/jquery/plugins/jquery.form.js"></script>
<script src="includes/js/jquery/plugins/jquery.plugin.js"></script>
<script src="includes/js/jquery/plugins/jquery.bond.js"></script>
<script src="includes/js/jquery/plugins/jquery.fill.js"></script>
<script src="includes/js/jquery/plugins/jquery.exampleField.js"></script>
<script src="includes/js/jquery/plugins/jquery.float.js"></script>
<script src="includes/js/jquery/plugins/jquery.jFrame.js"></script>
<script src="includes/js/jquery/plugins/jquery.keys.js"></script>
<script src="includes/js/jquery/plugins/jquery.metadata.js"></script>
<script src="includes/js/jquery/plugins/jquery.tableSelector.js"></script>
<script src="includes/js/jquery/plugins/jquery.template.js"></script>
<script src="includes/js/jquery/plugins/jquery.utils.js"></script>


<script type="text/javascript">//<!--
		// set registry variables
			jFrame.registry.set('lang', 
			{"Addon_Surveys_WidgetValueField":"Option #"});
		
		// form module jFrame instance
		new jFrame({
			controllerPath : 'addons/surveys/js/',
			cache          : false
		}, 'moduleForm');

	jFrame.getInstance('moduleForm').dispatch('edit.form');	
	
	
	$(document).ready(function() {
		jQuery.fn.errorMessage = function(error, arrMsgs) {
				var val = '';
				var whichTab = 0;
				
				if(arrMsgs && arrMsgs.length > 0){
					val = error+"<ul>";
					for(i=0;i<arrMsgs.length;i++){
						val += '<li>' + arrMsgs[i] + '</li>';
						if ( arrMsgs[i] == "<?php echo GetLang('Addon_Surveys_ErrorMessage_mustHaveWidgets_numberRange'); ?>") {
								whichTab = 1;
						}
					}
					val += "</ul>";
				}else{
					val = error;
				}
				$(this).html('<table cellspacing="0" cellpadding="0" width="100%" id="MessageTable" ><tr><td><table border="0" cellspacing="0" cellpadding="0"><tr><td class="Message" width="20" valign="top"><img  id="MessageImage" src="images/error.gif"  hspace="10" vspace="5"></td><td class="Message" width="100%" style="padding-top: 8px;padding-bottom: 5px;" id="MessageText">'+val+'</td></tr>    </table></td></tr></table>');
				if($(this).css('display') == 'none'){
					$(this).show('slow');
				}
				$('#'+$(this).attr('id') + ' .Message').animate({ backgroundColor: '#FFAEAE' }).animate({ backgroundColor: '#F4F4F4' });

				var $tabs = $('.ui-tabs').tabs();
				if ( whichTab == '1') {
						$tabs.tabs('select', '#tab-survey-designers');		
				} else {
					$tabs.tabs('select', '#tab-survey-options');
				}
				
			}
			
		jQuery.fn.successMessage = function(msg) {
	
			$(this).html('<table cellspacing="0" cellpadding="0" width="100%" id="MessageTable" ><tr><td ><table border="0" cellspacing="0" cellpadding="0"><tr><td class="Message" width="20" valign="top"><img  id="MessageImage" src="images/success.gif"  hspace="10" vspace="5"></td><td class="Message" width="100%" style="padding-top: 8px;padding-bottom: 5px;" id="MessageText">'+msg+'</td></tr>    </table></td></tr></table>');
			if($(this).css('display') == 'none'){
				$(this).show('slow');
			}
			$('#'+$(this).attr('id') + ' .Message').animate({ backgroundColor: '#99FF66' }).animate({ backgroundColor: '#F4F4F4' });
		}
			
	});
	
	
	
	$(function() {
			
		$('.CancelButton').click(function() {
			if(confirm("<?php echo GetLang('Addon_surveys_ConfirmCancel'); ?>")) { document.location="index.php?Page=Addons&Addon=surveys" } 
		});
		$('.SaveButton').click(function() { 
			document.frmSurvey.action = 'index.php?Page=Addons&Addon=surveys&Action=Save&ajax=1'; 
			$(document.frmSurvey).submit(); 
		});
		
		$('.SaveExitButton').click(function() { 
			document.frmSurvey.action = 'index.php?Page=Addons&Addon=surveys&Action=Save&exit=1&ajax=1'; 
			$(document.frmSurvey).submit(); 
		});
	
		$('#show-headertext-container').hide();
		$('#show-headerlogo-container').hide();
		$('#show-aftersubmit-message-container').hide();
		$('#show-aftersubmit-uri-container').hide();
		
		if ( $('input[name="form[surveys_header]"]:checked').val() == 'headertext' ) {
			$('#show-headertext-container').show();
		} else {
			$('#show-headerlogo-container').show();
		}
		
		if ( $('input[name="form[after_submit]"]:checked').val() == 'show_message' ) {
			$('#show-aftersubmit-message-container').show();
		} else { 
			$('#show-aftersubmit-uri-container').show();
		}
	
		//$('#show-headerlogo-container').hide();
		//$('#show-aftersubmit-uri-container').hide();
	
		$('input[name="form[surveys_header]"]').click(function()  { 
	 		if ( $('input[name="form[surveys_header]"]:checked').val() == 'headertext' ) {
				$('#show-headertext-container').show();
				$('#show-headerlogo-container').hide();
			} else if ( $('input[name="form[surveys_header]"]:checked').val() == 'headerlogo' ) { 
				$('#show-headerlogo-container').show();
				$('#show-headertext-container').hide();
			}
		});
			
		$('input[name="form[after_submit]"]').click(function()  { 
	 		if ( $('input[name="form[after_submit]"]:checked').val() == 'show_message' ) {
				$('#show-aftersubmit-message-container').show();
				$('#show-aftersubmit-uri-container').hide();
			} else if ( $('input[name="form[after_submit]"]:checked').val() == 'show_uri' ) { 
				$('#show-aftersubmit-message-container').hide();
				$('#show-aftersubmit-uri-container').show();
			}
		});
	});
	
</script>

<link rel="stylesheet" type="text/css" href="addons/surveys/styles/edit.form.css" />
<link rel="stylesheet" href="addons/surveys/styles/surveys.css" type="text/css">

<div id="MainMessage"><?php echo $tpl->Get('FlashMessages'); ?></div>

<form id="form-canvas" enctype="multipart/form-data" name="frmSurvey" method="post">
<input type="hidden" name="form[id]"<?php if($tpl->Get('form','id')): ?>value="<?php echo $tpl->Get('form','id'); ?>"<?php endif; ?> />
<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1">
			<?php echo $tpl->Get('Heading'); ?>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo">
			<p>
				<?php echo $tpl->Get('Intro'); ?>
			</p>
		</td>
	</tr>
	<tr>
		<td id="message">
			<?php echo $tpl->Get('Message'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<input type="button" value="<?php print GetLang('Addon_surveys_ButtonSaveAndContinue'); ?>" class="Field SaveButton" value="1" style="width:130px; margin:0; padding: 0;"> &nbsp;
			<input type="button" value="<?php print GetLang('Addon_surveys_ButtonSaveAndExit'); ?>" class="Field SaveExitButton" value="1" style="width: 100px; margin:0; padding: 0;"> &nbsp;
			<input type="button" value="<?php print GetLang('Addon_surveys_ButtonCancel'); ?>" class="Field CancelButton" style="margin:0; padding: 0;">
			<br />
		</td>
	</tr>

	<tr>
		<td>
		<br />
		<div class="form-menu ui-tabs">
			<ul class="tabnav">
				<li><a href="#tab-survey-designers"><?php echo GetLang('Addon_Surveys_tabSurveysDesigner'); ?></a></li>
				<li id="tab-tabnav-options"><a href="#tab-survey-options"><?php echo GetLang('Addon_Surveys_tabSurveysSettings'); ?></a></li>
			</ul>

			<div id="tab-survey-designers">
				
				<div class="tab-survey-designers-panel">
				<ul>  
					<li id="form-element-text" class="{type: 'text'}"><?php echo GetLang('Addon_Surveys_Menu_Text'); ?></li>
					<li id="form-element-textarea" class="{type: 'textarea'}"><?php echo GetLang('Addon_Surveys_Menu_TextArea'); ?></li>
					<li id="form-element-radio" class="{type: 'radio'}"><?php echo GetLang('Addon_Surveys_Menu_Radio'); ?></li>
					<li id="form-element-checkbox" class="{type: 'checkbox'}"><?php echo GetLang('Addon_Surveys_Menu_Checkbox'); ?></li>
					<li id="form-element-select" class="{type: 'select'}"><?php echo GetLang('Addon_Surveys_Menu_Select'); ?></li>
					<li id="form-element-select-country" class="{type: 'select-country'}"><?php echo GetLang('Addon_Surveys_Menu_SelectCountries'); ?></li>
					<li id="form-element-file" class="{type: 'file'}"><?php echo GetLang('Addon_Surveys_Menu_File'); ?></li>
					<li id="form-element-section-break" class="{type: 'section-break'}"><?php echo GetLang('Addon_Surveys_Menu_SectionBreak'); ?></li>
				</ul>
				</div>
				
				
				<div class="FloatLeft">
				<div id="canvas">
					<h2 style="margin: 0;"><input id="form-title" class="edit-in-place example-field" type="text" name="form[name]" value="<?php echo $tpl->Get('form','name'); ?>" title="<?php echo GetLang('Addon_Surveys_DefaultName'); ?>" style="width: 98.2%;" /></h2>
					<p style="margin: 2px 0 0 0;"><input class="edit-in-place example-field" type="text" name="form[description]" value='<?php echo $tpl->Get('form','description'); ?>' title="<?php echo GetLang('Addon_Surveys_DefaultDescription'); ?>" style="width: 98.2%;" /></p>
					<div class="hr"></div>
					<ul>
						<?php if($tpl->Get('widgetTemplates')): ?>
							<?php $array = $tpl->Get('widgetTemplates'); if(is_array($array)): foreach($array as $__key=>$widgetTemplate): $tpl->Assign('__key', $__key, false); $tpl->Assign('widgetTemplate', $widgetTemplate, false);  ?>
								<?php echo $tpl->Get('widgetTemplate'); ?>
							 <?php endforeach; endif; ?>
						<?php endif; ?>
					</ul>
					<div id="canvas-empty">
						<?php echo GetLang('Addon_Surveys_canvasEmptyText'); ?>
					</div>
				</div>
				</div>
				
			<div style="clear: both;"></div>
			</div>
			<div id="tab-survey-options">
					<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('Addon_Surveys_Heading_DisplayFeedbackOption'); ?>
						</td>
					</tr>
					<tr>
						<td width="10%" class="FieldLabel">
							<img src="images/blank.gif" width="205" height="1" /><br />
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('Addon_Surveys_DisplayHeaderTextLogo'); ?>:
						</td>
						<td width="90%">
								<div id="show-headertext-container-top" style="clear: both;">
							    <input type="radio" id="form-display-text" name="form[surveys_header]" value="headertext" checked="checked" />
								<label for="form-display-text"><?php echo GetLang('Addon_Surveys_DisplayHeaderText'); ?>:</label>
								<img class="tooltip" style="position: relative; top: 2px;" src="images/help.gif" alt="<?php echo GetLang('Addon_Surveys_TooltipTitleHeaderText'); ?>" title="<?php echo GetLang('Addon_Surveys_TooltipHeaderDescription'); ?>" />
								<div id="show-headertext-container">
									<img src="images/nodejoin.gif"  />
									<input name="form[surveys_header_text]" type="text" value="<?php echo $tpl->Get('form','surveys_header_text'); ?>" style="width: 250px;" />
								</div>
								</div>
								<input type="radio" id="form-display-logo" name="form[surveys_header]" value="headerlogo" <?php if($tpl->Get('form','surveys_header') == 'headerlogo'): ?>"checked="checked"<?php endif; ?> />
								<label for="form-display-logo"><?php echo GetLang('Addon_Surveys_DisplayHeaderLogo'); ?>:</label>
								<img class="tooltip" style="position: relative; top: 2px;" src="images/help.gif" alt="<?php echo GetLang('Addon_Surveys_TooltipTitleHeaderLogo'); ?>" title="<?php echo GetLang('Addon_Surveys_TooltipHeaderLogoDescription'); ?>" />								
								<div id="show-headerlogo-container">
								<?php if($tpl->Get('form','surveys_header_logo') != ""): ?>
											<br />
											<img src="temp/surveys/<?php echo $tpl->Get('form','id'); ?>/<?php echo $tpl->Get('form','surveys_header_logo'); ?>" />
											<br />
								<?php else: ?>
									<img src="images/nodejoin.gif"  />
								<?php endif; ?>
									<input name="form[surveys_header_logo]" type="file" value="<?php echo $tpl->Get('form','surveys_header_logo'); ?>" style="width: 250px;" />
									<input name="form[surveys_header_logo_filename]" type="hidden" value="<?php echo $tpl->Get('form','surveys_header_logo'); ?>" style="width: 250px;" />
								</div>
							<div class="space"></div>
						</td>
					</tr>
			
					<tr>
						<td width="10%" class="FieldLabel">
							<img src="images/blank.gif" width="205" height="1" /><br />
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('Addon_Surveys_WhenSurveyCompleted'); ?>
						</td>
						<td width="90%">
								<div id="show-aftersubmit-message-container-top">		
								<input type="radio" id="form-show-message" name="form[after_submit]" value="show_message" checked="checked" />
								<label for="form-show-message"><?php echo GetLang('Addon_Surveys_ShowMessageLabel'); ?></label>
								<img class="tooltip" style="position: relative; top: 2px;" src="images/help.gif" alt="<?php echo GetLang('Addon_Surveys_TooltipTitleShowMessage'); ?>" title="<?php echo GetLang('Addon_Surveys_TooltipDescriptionShowMessage'); ?>" />
								<div id="show-aftersubmit-message-container">
									<img src="images/nodejoin.gif" style="vertical-align: top;" />
									<textarea name="form[show_message]" class="Field250"><?php echo $tpl->Get('form','show_message'); ?></textarea>
								</div>
								</div>
								<input type="radio" id="form-show-page" name="form[after_submit]" value="show_uri" <?php if($tpl->Get('form','after_submit') == 'show_uri'): ?>checked="checked"<?php endif; ?> />
								<label for="form-show-page"><?php echo GetLang('Addon_Surveys_ShowPageLabel'); ?></label>
								<img class="tooltip" style="position: relative; top: 2px;" src="images/help.gif" alt="<?php echo GetLang('Addon_Surveys_TooltipTitleShowUri'); ?>" title="<?php echo GetLang('Addon_Surveys_TooltipDescriptionShowUri'); ?>" />
								<div id="show-aftersubmit-uri-container">
									<img src="images/nodejoin.gif" />
									<input name="form[show_uri]" type="text" value="<?php echo $tpl->Get('form','show_uri'); ?>" style="width: 250px;" />
								</div>
						
						</td>
					</tr>
					
					<tr>
						<td width="10%" class="FieldLabel">
							<img src="images/blank.gif" width="205" height="1" /><br />
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('Addon_Surveys_EmailFeedbackLabel'); ?>?
						</td>
						<td width="90%">
							<input type="checkbox" id="email-feedback" name="form[email_feedback]" value="1" <?php if($tpl->Get('form','email_feedback') == 1): ?>checked="checked"<?php endif; ?> />
								<label for="email-feedback"><?php echo GetLang('Addon_Surveys_EmailFeedbackConfirm'); ?></label>
								<img class="tooltip" style="position: relative; top: 2px;" src="images/help.gif" alt="<?php echo GetLang('Addon_Surveys_TooltipTitleEmailFeedback'); ?>" title="<?php echo GetLang('Addon_Surveys_TooltipDescriptionEmailFeedback'); ?>" />
								<div id="email-feedback-to-container">
									<img src="images/nodejoin.gif" />
									<input id="email-feedback-to" name="form[email]" type="text" value="<?php echo $tpl->Get('form','email'); ?>" style="width: 250px;"/>
								</div>				
							<div class="space"></div>
						</td>
						
					</tr>
				
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('Addon_Surveys_Heading_AdvancedOption'); ?>
						</td>
					</tr>
					
					<tr>
						<td width="10%" class="FieldLabel">
							<img src="images/blank.gif" width="250" height="1" /><br />
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
								<label for="form-show-message"><?php echo GetLang('Addon_Surveys_ErrorMessageLabel'); ?>:</label>		
						</td>
						<td width="90%">
							<textarea name="form[error_message]" style="width: 270px; height: 100px;" class="Field250"><?php echo $tpl->Get('form','error_message'); ?></textarea>
							<img class="tooltip" style="position: relative; top: 2px;" src="images/help.gif" alt="<?php echo GetLang('Addon_Surveys_TooltipTitleErrorMessage'); ?>" title="<?php echo GetLang('Addon_Surveys_TooltipDescriptionErrorMessage'); ?>" />
						</td>
					</tr>
					
					<tr>
						<td width="10%" class="FieldLabel">
							<img src="images/blank.gif" width="250" height="1" /><br />
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
								<label for="form-show-message"><?php echo GetLang('Addon_Surveys_SubmitButtonTextLabel'); ?>:</label>			
						</td>
						<td width="90%">
							<input type="text" name="form[submit_button_text]" style="width: 270px;" class="Field250" value="<?php echo $tpl->Get('form','submit_button_text'); ?>" />
							<img class="tooltip" style="position: relative; top: 2px;" src="images/help.gif" alt="<?php echo GetLang('Addon_Surveys_TooltipTitleSubmitButtonText'); ?>" title="<?php echo GetLang('Addon_Surveys_TooltipDescriptionSubmitButtonText'); ?>" />
						</td>
					</tr>

				</table>
			</div>
		</div>
		
		
		</td>

</tr>
</table>

</form>



<div id="__template__form-element-drag-helper" style="display: none;">
	<div class="form-element-drag-helper" style="width: 220px; height: 70px;">
		#{img}
		<p>#{text}</p>
	</div>
</div>


<div id="__template__form-element-sort-helper" style="display: none;">
	<div class="form-element-sort-helper" style="width: 700px; height: 70px;"></div>
</div>
