<?php $IEM = $tpl->Get('IEM'); ?><style type="text/css">@import url(includes/styles/ui.datepicker.css);</style>
<script src="includes/js/jquery/ui.js"></script>
<script type="text/javascript">
	<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("ui.datepicker.custom_iem");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>

	Application.Page.TriggerEmailsForm = {
		_language: {	trigger_name_empty: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerName_Error')); ?>',
						triggertype_error_not_selected: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerType_Error')); ?>',

						triggertype_datecustomfields_not_vailable: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerType_DateCustomField_NotAvailable')); ?>',
						triggertype_datecustomfields_customfield_not_selected: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerType_DateCustomField_Error_ChooseCustomField')); ?>',
						triggertype_datecustomfields_list_not_selected: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerType_DateCustomField_Error_ChooseList')); ?>',
						triggertype_datecustomfields_creation_prompt: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerType_DateCustomField_Prompt_CreateCustomField')); ?>',
						triggertype_datecustomfields_instruction: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerType_DateCustomField_ChooseCustomField_Instruction')); ?>',

						triggertype_staticdate_empty_date: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerType_StaticDate_Error')); ?>',
						triggertype_staticdate_empty_listid: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerType_StaticDate_List_Error')); ?>',

						triggertype_linkclicked_error_choosenewsletter: '<?php echo GetLang('TriggerEmails_Form_Field_TriggerType_LinkClicked_Error_ChooseNewsletter'); ?>',
						triggertype_linkclicked_error_chooseanothernewsletter: '<?php echo GetLang('TriggerEmails_Form_Field_TriggerType_LinkClicked_Error_ChooseAnotherNewsletter'); ?>',
						triggertype_linkclicked_not_available: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerType_LinkClicked_NotAvailable')); ?>',

						triggertype_newsletteropen_error_choosenewsletter: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerType_NewsletterOpened_Error_ChooseNewsletter')); ?>',

						triggertime_invalid_time: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_When_Error_InvalidTime')); ?>',

						triggeractions_not_choosen: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerActions_Not_Choosen')); ?>',

						triggeractions_send_field_newsletterid: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Error')); ?>',
						triggeractions_send_field_fromname_empty: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FromName_Error')); ?>',
						triggeractions_send_field_fromemail_empty: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FromEmail_EmptyError')); ?>',
						triggeractions_send_field_replyemail_empty: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_ReplyEmail_EmptyError')); ?>',
						triggeractions_send_field_bounceemail_empty: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_BounceEmail_EmptyError')); ?>',

						triggeractions_addlist_empty_listid: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_AddList_Error')); ?>',

						triggeractions_removefromlist_label_generic: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_RemoveList')); ?>',
						triggeractions_removefromlist_label_datecustomfield: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_RemoveList_f')); ?>',
						triggeractions_removefromlist_label_staticdate_one: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_RemoveList_s_One')); ?>',
						triggeractions_removefromlist_label_staticdate_many: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_RemoveList_s_Many')); ?>',
						triggeractions_removefromlist_label_linkclicked: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_RemoveList_l')); ?>',
						triggeractions_removefromlist_label_newsletteropen: '<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_RemoveList_n')); ?>'},

		_optionsDatePickerStaticDate: {	yearRange:'-100:+100',
										dateFormat: 'yy-mm-dd',
										altField: 'div.TriggerType_s_options input[type=text]',
										altFormat: 'DD, d M yy'},


		_cacheList: <?php echo GetJSON($tpl->Get('availableLists')); ?>,
		_cacheListCustomfields: <?php echo GetJSON($tpl->Get('availableCustomFields')); ?>,
		_cacheNewsletterLinks: <?php echo GetJSON($tpl->Get('availableLinks')); ?>,

		_currentlySelectedLinkID_Newsletter: [],



		eventDOMReady: function(event) {
			$('ul#tabnav a').click(Application.Page.TriggerEmailsForm.eventChangeTab);
			$(document.frmTriggerForm).submit(Application.Page.TriggerEmailsForm.eventSubmitForm);
			$('.cancelButton', document.frmTriggerForm).click(Application.Page.TriggerEmailsForm.eventClickCancel);
			$("input[name='record[triggertype]']", document.frmTriggerForm).click(Application.Page.TriggerEmailsForm.eventChangeTriggerType);
			$(document.frmTriggerForm['record[data][listid]']).change(Application.Page.TriggerEmailsForm.eventChangeList);
			$(document.frmTriggerForm['record[data][linkid_newsletterid]']).change(Application.Page.TriggerEmailsForm.eventChangeTriggerLinkNewsletter);
			$(document.frmTriggerForm['record[data][newsletterid]']).change(Application.Page.TriggerEmailsForm.eventChangeTriggerNewsletterOpen);
			$(document.frmTriggerForm['toprocess[when]']).change(Application.Page.TriggerEmailsForm.eventChangeTimeWhen);
			$(document.frmTriggerForm['record[triggeractions][send][enabled]']).click(Application.Page.TriggerEmailsForm.eventClickSendTriggerActions);
			$(document.frmTriggerForm['record[triggeractions][addlist][enabled]']).click(Application.Page.TriggerEmailsForm.eventClickAddListTriggerActions);
			$('#hrefPreview').click(Application.Page.TriggerEmailsForm.eventPreviewCampaign);

			$(document.frmTriggerForm['record[data][staticdate]']).datepicker(Application.Page.TriggerEmailsForm._optionsDatePickerStaticDate);

			$('input[type=text]', document.frmTriggerForm).focus(Application.Page.TriggerEmailsForm.eventTextFocus);



			var temp = $('div.TriggerType_s_options input#record_data_staticdate_display', document.frmTriggerForm);
			if (temp.val().trim() == '') {
				var tempDate = new Date();

				temp.val($.datepicker.formatDate('DD, d M yy', tempDate));
				$(document.frmTriggerForm['record[data][staticdate]']).val($.datepicker.formatDate('yy-mm-dd', tempDate));

				delete tempDate;
			} else temp.val($.datepicker.formatDate('DD, d M yy', $.datepicker.parseDate('yy-mm-dd', temp.val())));
			temp.click(Application.Page.TriggerEmailsForm.eventClickStaticDataDisplay);
			delete temp;

			var temp = document.frmTriggerForm['toprocess[time]'].value;
			var tempUnit = '1';
			if (temp != 0) {
				if ((temp % 168) == 0) {
					temp = temp / 168;
					tempUnit = '168';
				} else if ((temp % 24) == 0) {
					temp = temp / 24;
					tempUnit = '24';
				}
			}

			if (tempUnit != 'hours') {
				document.frmTriggerForm['toprocess[time]'].value = temp;
				$('option[value=' + tempUnit + ']', document.frmTriggerForm['toprocess[timeunit]']).attr('selected', true);
			}
			delete tempUnit;
			delete temp;



			document.frmTriggerForm['record[name]'].focus();
		},


		eventSubmitForm: function(event) {
			try { if(Application.Page.TriggerEmailsForm.checkForm()) return true; } catch(e) { alert(e); }
			event.stopPropagation();
			event.preventDefault();
			return false;
		},

		eventClickCancel: function(event) {
			if(confirm('<?php echo GetLang('TriggerEmails_Form_Prompt_Cancel'); ?>'))
				Application.Util.submitGet('index.php', {Page: 'TriggerEmails'});
		},

		eventChangeTriggerType: function(event) {
			var triggerType = this.value;

			$('tr#TriggerTime_Row div#TriggerTime_Choosen').show();
			$('tr#TriggerTime_Row div#TriggerTime_NotChoosen').hide();

			var tempShowOptionSelector = 'div.TriggerType_' + triggerType + '_options, tr.TriggerType_' + triggerType + '_options';
			$('div.TriggerType_options, tr.TriggerType_options', document.frmTriggerForm).filter(':not(' + tempShowOptionSelector + ')').hide();
			$(tempShowOptionSelector, document.frmTriggerForm).show();
			delete tempShowOptionSelector;

			Application.Page.TriggerEmailsForm.populateTriggerTimeWhen(triggerType);
			Application.Page.TriggerEmailsForm.populateTriggerTimeInterval(triggerType);
			Application.Page.TriggerEmailsForm.changeRemoveFromListLabel();
		},

		eventChangeTab: function(event) {
			event.stopPropagation();
			event.preventDefault();
			ShowTab(this.id.match(/tab(\d+)/)[1]);
		},

		eventChangeList: function(event) {
			var selectedIndex = this.selectedIndex;
			var selectedList = this.options[selectedIndex].value;

			if (selectedIndex == 0) $('div#TriggerType_f_data_customfield').hide();
			else {
				Application.Page.TriggerEmailsForm.populateDateCustomfields(selectedList);
				Application.Page.TriggerEmailsForm.changeRemoveFromListLabel();
				$('div#TriggerType_f_data_customfield').show();
			}
		},

		eventChangeTriggerLinkNewsletter: function(event) {
			var selectedIndex = this.selectedIndex;
			var selectedNewsletter = this.options[selectedIndex].value;

			if (selectedIndex == 0) $('div#TriggerType_l_data_links').hide();
			else if(Application.Util.isDefined(Application.Page.TriggerEmailsForm._cacheNewsletterLinks[selectedNewsletter])) {
				Application.Page.TriggerEmailsForm.populateLinks(selectedNewsletter);
				$('div#TriggerType_l_data_links').show();
			} else {
				Application.Page.TriggerEmailsForm._currentlySelectedLinkID_Newsletter.unshift(selectedNewsletter);
				$('img#TriggerType_l_data_links_loading').show();
				$.ajax({	type: "POST",
							dataType: 'json',
							url: "index.php?Page=TriggerEmails&Action=ajax",
							data: {	ajaxType:		'listlinksfornewsletters',
									newsletterid:	selectedNewsletter},
							error: Application.Page.TriggerEmailsForm.callbackRequestLinkError,
							success: Application.Page.TriggerEmailsForm.callbackRequestLinkSuccess,
							complete: Application.Page.TriggerEmailsForm.callbackRequestLinkComplete});
			}

			Application.Page.TriggerEmailsForm.changeRemoveFromListLabel();
		},

		eventChangeTriggerNewsletterOpen: function(event) {
			Application.Page.TriggerEmailsForm.changeRemoveFromListLabel();
		},

		eventClickSendTriggerActions: function(event) {
			var showSending = this.checked;
			$('div#triggeremails_triggeractions_send_options')[showSending? 'show' : 'hide']();
			$('a#tab2')[showSending? 'show' : 'hide']();
		},

		eventClickAddListTriggerActions: function(event) {
			$('div#triggeremails_triggeractions_addlist_options')[this.checked? 'show' : 'hide']();
		},

		eventPreviewCampaign: function(event) {
			var baseurl = "index.php?Page=Newsletters&Action=Preview&id=";
			var campaignListObject = document.frmTriggerForm['record[triggeractions][send][newsletterid]'];

			if (campaignListObject.selectedIndex < 1) {
				alert("<?php echo addslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_PreviewAlert')); ?>");
				campaignListObject.focus();
				return false;
			}

			window.open(baseurl + $(campaignListObject).val() , "pp");
			return false;
		},

		eventChangeTimeWhen: function(event) {
			if (this.value == 'on') {
				$('span#TriggerTime_TimeUnit').hide();
				return;
			}

			$('span#TriggerTime_TimeUnit_Postfix').html(this.options[this.selectedIndex].text.toLowerCase());
			$('span#TriggerTime_TimeUnit').show();
		},

		eventClickStaticDataDisplay: function(event) {
			$(document.frmTriggerForm['record[data][staticdate]']).datepicker('show');
		},

		eventTextFocus: function(event) {
			this.select();
		},


		callbackRequestLinkError: function(request, textStatus, errorThrown) {
			alert('Unable to make request');
		},

		callbackRequestLinkSuccess: function(data, textStatus) {
			if (!data.status) return;
			for (var newsletterid in data.data) {
				if (Application.Util.isArray(data.data[newsletterid])) {
					Application.Page.TriggerEmailsForm._cacheNewsletterLinks[newsletterid] = false;
					continue;
				}

				Application.Page.TriggerEmailsForm._cacheNewsletterLinks[newsletterid] = data.data[newsletterid];
			}
		},

		callbackRequestLinkComplete: function(request, textStatus) {
			var newsletterid = Application.Page.TriggerEmailsForm._currentlySelectedLinkID_Newsletter.shift();

			if (Application.Page.TriggerEmailsForm._currentlySelectedLinkID_Newsletter.length == 0) {
				Application.Page.TriggerEmailsForm.populateLinks(newsletterid);
				Application.Page.TriggerEmailsForm.changeRemoveFromListLabel();
				$('img#TriggerType_l_data_links_loading').hide();
				$('div#TriggerType_l_data_links').show();
			}
		},


		checkForm: function() {
			var f = document.frmTriggerForm;
			var triggerType = $("input[name='record[triggertype]']:checked", f).val();
			var triggerActions = [];
			var triggerhours = 0;

			if ($.trim(f['record[name]'].value) == '') return this.checkFormInvalid(f['record[name]'], this._language.trigger_name_empty);
			if (!triggerType) return this.checkFormInvalid(f['record[triggertype]'][0], this._language.triggertype_error_not_selected);
			switch(triggerType) {
				case 'f':
					if (f['record[data][listid]'].selectedIndex == 0) return this.checkFormInvalid(f['record[data][listid]'], this._language.triggertype_datecustomfields_list_not_selected);
					if ($(f['record[data][customfieldid]']).val() == '') return this.checkFormInvalid(f['record[data][customfieldid]'], this._language.triggertype_datecustomfields_creation_prompt, 1, 'index.php?Page=CustomFields&Action=Create');
					if ($(f['record[data][customfieldid]']).val() == '0') return this.checkFormInvalid(f['record[data][customfieldid]'], this._language.triggertype_datecustomfields_customfield_not_selected);
				break;

				case 's':
					if ($.trim(f['record[data][staticdate]'].value) == '') return this.checkFormInvalid($(f['record[data][staticdate]']).prev().get(0), this._language.triggertype_staticdate_empty_date);
					if($('option:selected', f['record[data][staticdate_listids][]']).size() == 0)
						return this.checkFormInvalid(f['record[data][staticdate_listids][]'], this._language.triggertype_staticdate_empty_listid);
				break;

				case 'l':
					if (f['record[data][linkid_newsletterid]'].selectedIndex == 0) return this.checkFormInvalid(f['record[data][linkid_newsletterid]'], this._language.triggertype_linkclicked_error_choosenewsletter);
					if ($('option', f['record[data][linkid]']).length == 0 || $(f['record[data][linkid]']).val() == 0) return this.checkFormInvalid(f['record[data][linkid]'], this._language.triggertype_linkclicked_error_chooseanothernewsletter);
				break;

				case 'n':
					if (f['record[data][newsletterid]'].selectedIndex == 0) return this.checkFormInvalid(f['record[data][newsletterid]'], this._language.triggertype_newsletteropen_error_choosenewsletter);
				break;
			}

			if ($(f['toprocess[when]']).val() != 'on') {
				triggerhours = Math.abs(parseInt($.trim(f['toprocess[time]'].value)));
				if (triggerhours != f['toprocess[time]'].value) return this.checkFormInvalid(f['toprocess[time]'], this._language.triggertime_invalid_time);
			}

			var temp = $('input[type=checkbox].triggeractions:checked', f);
			for(var i = 0, j = temp.size(); i < j; ++i) triggerActions.push(temp.get(i).name.match(/record\[triggeractions\]\[(\w+)\]/)[1]);
			temp = null;
			delete temp;

			if (triggerActions.length == 0) {
				return this.checkFormInvalid(f['record[triggeractions][send][newsletterid]'], this._language.triggeractions_not_choosen);
			}

			if ($.inArray('send', triggerActions) != -1) {
				if(f['record[triggeractions][send][newsletterid]'].value == 0) return this.checkFormInvalid(f['record[triggeractions][send][newsletterid]'], this._language.triggeractions_send_field_newsletterid);
				if($.trim(f['record[triggeractions][send][sendfromname]'].value) == '') return this.checkFormInvalid(f['record[triggeractions][send][sendfromname]'], this._language.triggeractions_send_field_fromname_empty, 2);
				if($.trim(f['record[triggeractions][send][sendfromemail]'].value) == '') return this.checkFormInvalid(f['record[triggeractions][send][sendfromemail]'], this._language.triggeractions_send_field_fromemail_empty, 2);
				if($.trim(f['record[triggeractions][send][replyemail]'].value) == '') return this.checkFormInvalid(f['record[triggeractions][send][replyemail]'], this._language.triggeractions_send_field_replyemail_empty, 2);
				if(f['record[triggeractions][send][bounceemail]'] && $.trim(f['record[triggeractions][send][bounceemail]'].value) == '') return this.checkFormInvalid(f['record[triggeractions][send][bounceemail]'], this._language.triggeractions_send_field_bounceemail_empty, 2);
			}

			if ($.inArray('addlist', triggerActions) != -1) {
				if($('option:selected', f['record[triggeractions][addlist][listid][]']).size() == 0)
					return this.checkFormInvalid(f['record[triggeractions][addlist][listid][]'], this._language.triggeractions_addlist_empty_listid);
			}

			f['record[triggerhours]'].value = triggerhours * ($(f['toprocess[when]']).val() == 'before'? -1 : 1) * ($(f['toprocess[timeunit]']).val());

			return true;
		},

		populateTriggerTimeWhen: function(triggerType) {
			var options = '';
			var time = parseInt(document.frmTriggerForm['toprocess[time]'].value);

			if (triggerType == 'f' || triggerType == 's') options = '<option value="before"><?php echo GetLang('TriggerEmails_Form_Field_When_Context_Before'); ?></option>';
			options += '<option value="on" ' + (time? '' : 'selected="selected" ') + '>'
			options += (triggerType == 'f' || triggerType == 's')? '<?php echo GetLang('TriggerEmails_Form_Field_When_Context_On'); ?>' : '<?php echo GetLang('TriggerEmails_Form_Field_When_Context_When'); ?>'
			options += '</option>';
			options += '<option value="after" ' + ((time && triggerType != 'f')? 'selected="selected" ' : '') + '><?php echo GetLang('TriggerEmails_Form_Field_When_Context_After'); ?></option>';

			$(document.frmTriggerForm['toprocess[when]']).html(options).triggerHandler('change');
		},

		populateTriggerTimeInterval: function(triggerType) {
			var selector = '';

			switch(triggerType) {
				case 'f': case 's': selector = 'TriggerTime_TimeUnit_Interval_Date'; break;
				case 'l': selector = 'TriggerTime_TimeUnit_Interval_Link'; break;
				case 'n': selector = 'TriggerTime_TimeUnit_Interval_EmailOpen'; break;
			}

			if (selector == '') return;

			$('span.TriggerTime_TimeInterval', document.frmTriggerForm).filter('not:(span#' + selector + ')').hide();
			$('span#' + selector).show();
		},

		populateDateCustomfields: function(selectedList) {
			var obj = document.frmTriggerForm['record[data][customfieldid]'];

			if (!this._cacheListCustomfields[selectedList] || !this._cacheListCustomfields[selectedList].date) {
				var temp = this._language.triggertype_datecustomfields_not_vailable.replace('%s', this._cacheList[selectedList].name);
				$(obj).html('<option value="">' + temp + '</option>').hide();
				$('div#TriggerType_f_data_customfield span').html(temp).show();
			} else {
				var options = '<option value="0">' + this._language.triggertype_datecustomfields_instruction + '</option>';
				for(var fieldid in this._cacheListCustomfields[selectedList].date)
					options += '<option value="' + fieldid + '">' + this._cacheListCustomfields[selectedList].date[fieldid].name + '</option>';
				$('div#TriggerType_f_data_customfield span').hide();
				$(obj).html(options).show();
			}
		},

		populateLinks: function(selectedNewsletter) {
			var obj = document.frmTriggerForm['record[data][linkid]'];
			if (!this._cacheNewsletterLinks[selectedNewsletter]) {
				var temp = this._language.triggertype_linkclicked_not_available;
				$(obj).html('<option value="0">' + temp + '</option>').hide();
				$('div#TriggerType_l_data_links span').html(temp).show();
			} else {
				var options = '';
				for(var linkid in this._cacheNewsletterLinks[selectedNewsletter])
					options += '<option value="' + linkid + '" title="' + this._cacheNewsletterLinks[selectedNewsletter][linkid] + '">' + this._cacheNewsletterLinks[selectedNewsletter][linkid] + '</option>';
				$('div#TriggerType_l_data_links span').hide();
				$(obj).html(options).show();
			}
		},

		checkFormInvalid: function(element, errorMsg, tab, redirect) {
			if(redirect) {
				if(confirm(errorMsg.replace(/\\n/g, '\n'))) {
					document.location.href = redirect;
					return false;
				}
			}

			if(!tab) tab = 1;

			ShowTab(tab);
			if (!redirect) alert(errorMsg);
			try { element.focus(); } catch(e) { }
			return false;
		},

		changeRemoveFromListLabel: function() {
			var f = document.frmTriggerForm;
			var triggerType = $("input[name='record[triggertype]']:checked", f).val();
			var label = this._language.triggeractions_removefromlist_label_generic;

			switch (triggerType) {
				case 'f':
					var temp = f['record[data][listid]'].selectedIndex;
					if (temp != 0) label = this._language.triggeractions_removefromlist_label_datecustomfield.replace(/%s/, f['record[data][listid]'].options[temp].text);
				break;

				case 's':
					var selectedListText = [];

					var obj = f['record[data][staticdate_listids][]'];
					for (var i = 0, j = obj.options.length; i < j; ++i)
						if (obj.options[i].selected) selectedListText.push(obj.options[i].text);
					delete obj;

					switch (selectedListText.length) {
						case 0: break;
						case 1: label = this._language.triggeractions_removefromlist_label_staticdate_one.replace(/%s/, selectedListText[0]); break;
						default: label = this._language.triggeractions_removefromlist_label_staticdate_many.replace(/%s/, '<ul style="margin-top:5px; margin-bottom:5px; color: auto;"><li>' + selectedListText.join('</li><li>') + '</li></ul>'); break;
					}
				break;

				case 'n':
					var temp = f['record[data][newsletterid]'].selectedIndex;
					if (temp != 0) label = this._language.triggeractions_removefromlist_label_newsletteropen.replace(/%s/, f['record[data][newsletterid]'].options[temp].text);
				break;

				case 'l':
					var temp = f['record[data][linkid_newsletterid]'].selectedIndex;
					if (temp != 0) label = this._language.triggeractions_removefromlist_label_linkclicked.replace(/%s/, f['record[data][linkid_newsletterid]'].options[temp].text);
				break;
			}

			$('label#triggeremails_triggeractions_removelist_enabled_label', f).html(label);
		}
	};

	Application.init.push(Application.Page.TriggerEmailsForm.eventDOMReady);
</script>
<style>
	.PanelRow {
		display: block;
		clear: both;
	}

	.PanelRowFieldTitle {
		float: left;
		width: 250px;
	}
</style>
<div class="PageBodyContainer">
	<div class="Heading1"><?php echo $tpl->Get('PAGE','heading'); ?></div>
	<div class="Intro" <?php if(trim($tpl->Get('PAGE','messages')) == ''): ?>style="margin-bottom:3px;"<?php endif; ?>><?php echo GetLang('TriggerEmails_Intro'); ?></div>
	<?php if(trim($tpl->Get('PAGE','messages')) != ''): ?><div style="margin-top:5px;"><?php echo $tpl->Get('PAGE','messages'); ?></div><?php endif; ?>

	<form name="frmTriggerForm" action="index.php?Page=TriggerEmails&Action=Save" method="POST">
		<input type="hidden" name="ProcessThis" value="1" />
		<input type="hidden" name="record[triggeremailsid]" value="<?php echo $tpl->Get('record','triggeremailsid'); ?>" />
		<table cellspacing="0" cellpadding="3" width="100%" align="center">
			<tr>
				<td>
					<input class="FormButton submitButton" type="submit" value="<?php echo GetLang('Save'); ?>" />
					<input class="FormButton cancelButton" type="button" value="<?php echo GetLang('Cancel'); ?>" />
					<br />&nbsp;

					
						<div style="margin-bottom:10px;">
							<ul id="tabnav">
								<li>
									<a href="#" class="active" id="tab1">
										<span><?php echo GetLang('TriggerEmails_Tab_General'); ?></span>
									</a>
								</li>
								<li>
									<a href="#" id="tab2" <?php if(!$tpl->Get('record','triggeractions','send','enabled')): ?>style="display:none;"<?php endif; ?>>
										<span><?php echo GetLang('TriggerEmails_Tab_SendingOptions'); ?></span>
									</a>
								</li>
							</ul>
						</div>
					


					
						<div id="div1">
							<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
								<tr>
									<td colspan="2" class="Heading2">
										&nbsp;&nbsp;<?php echo GetLang('TriggerEmails_Form_Header_TriggerDetails'); ?>
									</td>
								</tr>

								
								<tr>
									<td class="FieldLabel" width="10%">
										<img src="images/blank.gif" width="200" height="1" /><br />
										<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
										<?php echo GetLang('TriggerEmails_Form_Field_TriggerName'); ?>:&nbsp;
									</td>
									<td width="90%">
										<input type="text" name="record[name]" class="Field250" value="<?php echo $tpl->Get('record','name'); ?>" />
										<br />
										<span class="aside"><?php echo GetLang('TriggerEmails_Form_Field_TriggerName_Description'); ?></span>
									</td>
								</tr>

								
									<tr>
										<td class="FieldLabel">
											<img src="images/blank.gif" width="200" height="1" /><br />
											<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
											<?php echo GetLang('TriggerEmails_Form_Field_TriggerType_Title'); ?>:&nbsp;
										</td>
										<td>
											
												<div>
													<input	type="radio"
															name="record[triggertype]"
															id="TriggerTypeDateCustomFieldEvent"
															class="TriggerType"
															value="f"
															<?php if($tpl->Get('record','triggertype') == 'f'): ?>checked="checked"<?php endif; ?> />
													<label for="TriggerTypeDateCustomFieldEvent"><?php echo GetLang('TriggerEmails_Form_Field_TriggerType_DateCustomField'); ?></label>

													<div class="TriggerType_f_options TriggerType_options" <?php if($tpl->Get('record','triggertype') != 'f'): ?>style="display:none;"<?php endif; ?>>
														<div>
															<img width="20" height="20" src="images/nodejoin.gif" />
															<select name="record[data][listid]" class="Field250">
																<option value="0"><?php echo GetLang('TriggerEmails_Form_Field_TriggerType_DateCustomField_ChooseList_Instruction'); ?></option>
																<?php $array = $tpl->Get('availableLists'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
																	<option value="<?php echo $tpl->Get('each','listid'); ?>" <?php if($tpl->Get('record','data','listid') == $tpl->Get('each','listid')): ?>selected="selected"<?php endif; ?>><?php echo $tpl->Get('each','name'); ?></option>
																 <?php endforeach; endif; ?>
															</select>
														</div>
														<div id="TriggerType_f_data_customfield" <?php if(!$tpl->Get('record','data','listid')): ?>style="display:none;"<?php endif; ?>>
															<?php ob_start(); ?>
																<?php $array = $tpl->Get('availableCustomFields'); if(is_array($array)): foreach($array as $listid=>$customFieldLists): $tpl->Assign('listid', $listid, false); $tpl->Assign('customFieldLists', $customFieldLists, false);  ?>
																	<?php if($tpl->Get('record','data','listid') == $tpl->Get('listid')): ?>
																		<?php $array = $tpl->Get('customFieldLists','date'); if(is_array($array)): foreach($array as $customFieldKey=>$customFieldRecord): $tpl->Assign('customFieldKey', $customFieldKey, false); $tpl->Assign('customFieldRecord', $customFieldRecord, false);  ?>
																			<option value="<?php echo $tpl->Get('customFieldKey'); ?>"<?php if($tpl->Get('record','data','customfieldid') == $tpl->Get('customFieldKey')): ?> selected="selected"<?php endif; ?>>
																				<?php echo $tpl->Get('customFieldRecord','name'); ?>
																			</option>
																		 <?php endforeach; endif; ?>
																	<?php endif; ?>
																 <?php endforeach; endif; ?>
															<?php $tpl->Assign("processedDateCustomFields", trim(ob_get_contents())); ob_end_clean(); ?>
															<img width="20" height="20" src="images/blank.gif" />
															<span <?php if($tpl->Get('processedDateCustomFields') != ''): ?>style="display:none;"<?php endif; ?>><?php echo sprintf(GetLang('TriggerEmails_Form_Field_TriggerType_DateCustomField_NotAvailable'), $tpl->Get('record','listname')); ?></span>
															<select name="record[data][customfieldid]" <?php if($tpl->Get('processedDateCustomFields') == ''): ?>style="display:none;"<?php endif; ?>>
																<option value="<?php if($tpl->Get('processedDateCustomFields') == ''): ?><?php else: ?>0<?php endif; ?>"><?php echo GetLang('TriggerEmails_Form_Field_TriggerType_DateCustomField_ChooseCustomField_Instruction'); ?></option>
																<?php echo $tpl->Get('processedDateCustomFields'); ?>
															</select>
														</div>
													</div>
												</div>
											

											
												<div>
													<input	type="radio"
															name="record[triggertype]"
															id="TriggerTypeStaticDateEvent"
															class="TriggerType"
															value="s"
															<?php if($tpl->Get('record','triggertype') == 's'): ?>checked="checked"<?php endif; ?> />
													<label for="TriggerTypeStaticDateEvent"><?php echo GetLang('TriggerEmails_Form_Field_TriggerType_StaticDate'); ?></label>

													<div class="TriggerType_s_options TriggerType_options" <?php if($tpl->Get('record','triggertype') != 's'): ?>style="display:none;"<?php endif; ?>>
														<div>
															<img width="20" height="20" src="images/nodejoin.gif" />
															<input type="text" class="Field150" id="record_data_staticdate_display" value="<?php echo $tpl->Get('record','data','staticdate'); ?>" readonly="readonly"  />
															<input type="hidden" name="record[data][staticdate]" value="<?php echo $tpl->Get('record','data','staticdate'); ?>" />
														</div>
													</div>
												</div>
											

											
												<div>
													<input	type="radio"
															name="record[triggertype]"
															id="TriggerTypeLinkClickedEvent"
															class="TriggerType"
															value="l"
															<?php if($tpl->Get('record','triggertype') == 'l'): ?>checked="checked"<?php endif; ?> />
													<label for="TriggerTypeLinkClickedEvent"><?php echo GetLang('TriggerEmails_Form_Field_TriggerType_LinkClicked'); ?></label>
													<div class="TriggerType_l_options TriggerType_options" <?php if($tpl->Get('record','triggertype') != 'l'): ?>style="display:none;"<?php endif; ?>>
														<div>
															<img width="20" height="20" src="images/nodejoin.gif" />
															<select name="record[data][linkid_newsletterid]">
																<option value="0"><?php echo GetLang('TriggerEmails_Form_Field_TriggerType_LinkClicked_ChooseNewsletter_Instruction'); ?></option>
																<?php $array = $tpl->Get('availableNewsletters'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
																	<option value="<?php echo $tpl->Get('each','newsletterid'); ?>" <?php if($tpl->Get('record','data','linkid_newsletterid') == $tpl->Get('each','newsletterid')): ?>selected="selected"<?php endif; ?>><?php echo $tpl->Get('each','name'); ?></option>
																 <?php endforeach; endif; ?>
															</select>
														</div>

														<div id="TriggerType_l_data_links" <?php if(!$tpl->Get('record','data','linkid_newsletterid')): ?>style="display:none;"<?php endif; ?>>
															<?php ob_start(); ?>
																<?php $array = $tpl->Get('availableLinks'); if(is_array($array)): foreach($array as $newsletterid=>$linkList): $tpl->Assign('newsletterid', $newsletterid, false); $tpl->Assign('linkList', $linkList, false);  ?>
																	<?php if($tpl->Get('record','data','linkid_newsletterid') == $tpl->Get('newsletterid')): ?>
																		<?php $array = $tpl->Get('linkList'); if(is_array($array)): foreach($array as $linkid=>$linkURL): $tpl->Assign('linkid', $linkid, false); $tpl->Assign('linkURL', $linkURL, false);  ?>
																			<option value="<?php echo $tpl->Get('linkid'); ?>" <?php if($tpl->Get('record','data','linkid') == $tpl->Get('linkid')): ?> selected="selected"<?php endif; ?>>
																				<?php echo $tpl->Get('linkURL'); ?>
																			</option>
																		 <?php endforeach; endif; ?>
																	<?php endif; ?>
																 <?php endforeach; endif; ?>
															<?php $tpl->Assign("processedLinks", trim(ob_get_contents())); ob_end_clean(); ?>
															<img width="20" height="20" src="images/blank.gif" alt=" " />
															<span <?php if($tpl->Get('processedLinks') != ''): ?>style="display:none;"<?php endif; ?>><?php echo GetLang('TriggerEmails_Form_Field_TriggerType_LinkClicked_NotAvailable'); ?></span>
															<select name="record[data][linkid]" <?php if($tpl->Get('processedLinks') == ''): ?>style="display:none;"<?php endif; ?>><?php echo $tpl->Get('processedLinks'); ?></select>
															<img id="TriggerType_l_data_links_loading" src="images/loading.gif" alt="loading..." style="display:none;" />
														</div>
													</div>
												</div>
											

											
												<div>
													<input	type="radio"
															name="record[triggertype]"
															id="TriggerTypeNewsletterOpenedEvent"
															class="TriggerType"
															value="n"
															<?php if($tpl->Get('record','triggertype') == 'n'): ?>checked="checked"<?php endif; ?> />
													<label for="TriggerTypeNewsletterOpenedEvent"><?php echo GetLang('TriggerEmails_Form_Field_TriggerType_NewsletterOpened'); ?></label>
													<div class="TriggerType_n_options TriggerType_options" <?php if($tpl->Get('record','triggertype') != 'n'): ?>style="display:none;"<?php endif; ?>>
														<div>
															<img width="20" height="20" src="images/nodejoin.gif" style="float:left;" />
															&nbsp;
															<select name="record[data][newsletterid]">
																<option value="0"><?php echo GetLang('TriggerEmails_Form_Field_TriggerType_NewsletterOpened_ChooseNewsletter_Instruction'); ?></option>
																<?php $array = $tpl->Get('availableNewsletters'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
																	<option value="<?php echo $tpl->Get('each','newsletterid'); ?>" <?php if($tpl->Get('record','data','newsletterid') == $tpl->Get('each','newsletterid')): ?>selected="selected"<?php endif; ?>>
																		<?php echo $tpl->Get('each','name'); ?>
																	</option>
																 <?php endforeach; endif; ?>
															</select>
														</div>
													</div>
												</div>
											
										</td>
									</tr>
								


								
									<tr class="TriggerType_s_options TriggerType_options" <?php if($tpl->Get('record','triggertype') != 's'): ?>style="display:none;"<?php endif; ?>>
										<td class="FieldLabel" width="10%">
											<img src="images/blank.gif" width="200" height="1" /><br />
											<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
											<?php echo GetLang('TriggerEmails_Form_Field_TriggerType_StaticDate_ListTitle'); ?>:
										</td>
										<td>
											<select name="record[data][staticdate_listids][]" id="record_data_staticdate_listids" multiple="multiple" class="ISSelectReplacement ISSelectSearch" onchange="Application.Page.TriggerEmailsForm.changeRemoveFromListLabel();">
												<?php $array = $tpl->Get('availableLists'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
													<?php if($tpl->Get('each','listid') != $tpl->Get('record','listid')): ?>
														<option value="<?php echo $tpl->Get('each','listid'); ?>"
															<?php if((is_array($tpl->Get('record','data','staticdate_listids')) && in_array($tpl->Get('each','listid'), $tpl->Get('record','data','staticdate_listids'))) || ($tpl->Get('record','data','staticdate_listids') == $tpl->Get('each','listid'))): ?>
																selected="selected"
															<?php endif; ?>>
															<?php echo $tpl->Get('each','name'); ?>
														</option>
													<?php endif; ?>
												 <?php endforeach; endif; ?>
											</select>
										</td>
									</tr>
								


								
									<tr id="TriggerTime_Row">
										<td class="FieldLabel" width="10%">
											<img src="images/blank.gif" width="200" height="1" /><br />
											<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
											<?php echo GetLang('TriggerEmails_Form_Field_When_Title'); ?>:
										</td>
										<td>
											<input type="hidden" name="record[triggerhours]" value="<?php echo $tpl->Get('record','triggerhours'); ?>" />
											<div id="TriggerTime_Choosen" <?php if(!$tpl->Get('record','triggeremailsid')): ?>style="display:none;"<?php endif; ?>>
												<select name="toprocess[when]" class="Field250" style="width:auto;">
													<?php if($tpl->Get('record','triggertype') == 'f' || $tpl->Get('record','triggertype') == 's'): ?>
														<option value="before" <?php if($tpl->Get('record','triggerhours') < 0): ?>selected="selected"<?php endif; ?>>
															<?php echo GetLang('TriggerEmails_Form_Field_When_Context_Before'); ?>
														</option>
													<?php endif; ?>
													<option value="on" <?php if($tpl->Get('record','triggerhours') == 0): ?>selected="selected"<?php endif; ?>><?php echo GetLang('TriggerEmails_Form_Field_When_Context_On'); ?></option>
													<option value="after" <?php if($tpl->Get('record','triggerhours') > 0): ?>selected="selected"<?php endif; ?>><?php echo GetLang('TriggerEmails_Form_Field_When_Context_After'); ?></option>
												</select>
												<span id="TriggerTime_TimeUnit" <?php if(!$tpl->Get('record','triggerhours')): ?>style="display:none;"<?php endif; ?>>
													&nbsp;&nbsp;&nbsp;
													<input type="text" name="toprocess[time]" class="Field50" style="width:auto;" size="4" maxlength="4" value="<?php echo abs($tpl->Get('record','triggerhours')); ?>" />
													<select name="toprocess[timeunit]" class="Field250" style="width:auto;">
														<option value="1" selected="selected"><?php echo GetLang('TriggerEmails_Form_Field_When_Unit_Hours'); ?></option>
														<option value="24"><?php echo GetLang('TriggerEmails_Form_Field_When_Unit_Days'); ?></option>
														<option value="168"><?php echo GetLang('TriggerEmails_Form_Field_When_Unit_Weeks'); ?></option>
													</select>
													<span id="TriggerTime_TimeUnit_Postfix"><?php if($tpl->Get('record','triggerhours') < 0): ?><?php echo GetLang('TriggerEmails_Form_Field_When_Context_Before'); ?><?php elseif($tpl->Get('record','triggerhours') > 0): ?><?php echo GetLang('TriggerEmails_Form_Field_When_Context_After'); ?><?php endif; ?></span>
												</span>
												<span id="TriggerTime_TimeUnit_Interval_Date" class="TriggerTime_TimeInterval" <?php if($tpl->Get('record','triggertype') != 'f' && $tpl->Get('record','triggertype') != 's'): ?>style="display:none;"<?php endif; ?>>
													<select name="record[triggerinterval]" class="Field250" style="width:auto;">
														<option value="0" <?php if($tpl->Get('record','triggerinterval') == 0): ?>selected="selected"<?php endif; ?>><?php echo GetLang('TriggerEmails_Form_Field_When_Interval_TheDate'); ?></option>
														<option value="1" <?php if($tpl->Get('record','triggerinterval') == 1): ?>selected="selected"<?php endif; ?>><?php echo GetLang('TriggerEmails_Form_Field_When_Interval_TheNextAnniversary'); ?></option>
														<option value="-1" <?php if($tpl->Get('record','triggerinterval') == -1): ?>selected="selected"<?php endif; ?>><?php echo GetLang('TriggerEmails_Form_Field_When_Interval_TheAnniversaryOfTheDate'); ?></option>
													</select>
													<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_When_Help')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_When_Help')); ?></span></span>
												</span>
												<span id="TriggerTime_TimeUnit_Interval_Link" class="TriggerTime_TimeInterval" <?php if($tpl->Get('record','triggertype') != 'l'): ?>style="display:none;"<?php endif; ?>><?php echo GetLang('TriggerEmails_Form_Field_When_Interval_LinkClicked'); ?></span>
												<span id="TriggerTime_TimeUnit_Interval_EmailOpen" class="TriggerTime_TimeInterval" <?php if($tpl->Get('record','triggertype') != 'n'): ?>style="display:none;"<?php endif; ?>><?php echo GetLang('TriggerEmails_Form_Field_When_Interval_OpenNewsletter'); ?></span>
											</div>
											<?php if(!$tpl->Get('record','triggeremailsid')): ?>
												<div id="TriggerTime_NotChoosen"><span class="aside"><?php echo GetLang('TriggerEmails_Form_Field_When_Instruction'); ?></span></div>
											<?php endif; ?>
										</td>
									</tr>
								

								
									<tr>
										<td class="FieldLabel">
											<img src="images/blank.gif" width="200" height="1" /><br />
											<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
											<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction'); ?>:&nbsp;
										</td>
										<td>
											
											<div>
												<div>
													<input type="checkbox" name="record[triggeractions][send][enabled]" id="triggeremails_triggeractions_send_enabled" class="triggeractions" value="1" <?php if($tpl->Get('record','triggeractions','send','enabled')): ?>checked="checked"<?php endif; ?> />
													<label for="triggeremails_triggeractions_send_enabled">
														<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send'); ?>
													</label>
												</div>
												<div id="triggeremails_triggeractions_send_options" <?php if(!$tpl->Get('record','triggeractions','send','enabled')): ?>style="display:none;"<?php endif; ?>>
													<img width="20" height="20" src="images/nodejoin.gif" />
													<select name="record[triggeractions][send][newsletterid]" class="Field250">
														<option value="0"><?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Instruction'); ?></option>
														<?php $array = $tpl->Get('availableNewsletters'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
															<option value="<?php echo $tpl->Get('each','newsletterid'); ?>" <?php if($tpl->Get('record','triggeractions','send','newsletterid') == $tpl->Get('each','newsletterid')): ?>selected="selected"<?php endif; ?>><?php echo $tpl->Get('each','name'); ?></option>
														 <?php endforeach; endif; ?>
													</select>
													<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Help')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Help')); ?></span></span>
													<a href="#" id="hrefPreview"><img border="0" src="images/magnify.gif"/>&nbsp;<?php echo GetLang('Preview'); ?></a>
												</div>
											</div>

											
											<div>
												<div>
													<input type="checkbox" name="record[triggeractions][addlist][enabled]" id="triggeremails_triggeractions_addlist_enabled" class="triggeractions" value="1" <?php if($tpl->Get('record','triggeractions','addlist','enabled')): ?>checked="checked"<?php endif; ?> />
													<label for="triggeremails_triggeractions_addlist_enabled">
														<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_AddList'); ?>
													</label>
												</div>
												<div id="triggeremails_triggeractions_addlist_options" <?php if(!$tpl->Get('record','triggeractions','addlist','enabled')): ?>style="display:none;"<?php endif; ?>>
													<table cellpadding="0" cellspacing="0" border="0">
														<tr>
															<td valign="top" width="22"><img width="20" height="20" src="images/nodejoin.gif" /></td>
															<td>
																<select name="record[triggeractions][addlist][listid][]" id="record_triggeractions_addlist_listid" multiple="multiple" class="ISSelectReplacement ISSelectSearch">
																	<?php $array = $tpl->Get('availableLists'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
																		<?php if($tpl->Get('each','listid') != $tpl->Get('record','listid')): ?>
																			<option value="<?php echo $tpl->Get('each','listid'); ?>"
																				<?php if((is_array($tpl->Get('record','triggeractions','addlist','listid')) && in_array($tpl->Get('each','listid'), $tpl->Get('record','triggeractions','addlist','listid'))) || ($tpl->Get('record','triggeractions','addlist','listid') == $tpl->Get('each','listid'))): ?>
																					selected="selected"
																				<?php endif; ?>>
																				<?php echo $tpl->Get('each','name'); ?>
																			</option>
																		<?php endif; ?>
																	 <?php endforeach; endif; ?>
																</select>
																<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_AddList_Help')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_AddList_Help')); ?></span></span>
															</td>
														</tr>
													</table>
												</div>
											</div>

											
											<table cellspacing="0" cellpadding="0">
												<tr>
													<td valign="top">
														<input type="checkbox" name="record[triggeractions][removelist][enabled]" id="triggeremails_triggeractions_removelist_enabled" class="triggeractions" value="1" <?php if($tpl->Get('record','triggeractions','removelist','enabled')): ?>checked="checked"<?php endif; ?> />
														&nbsp;
													</td>
													<td valign="top">
														<label id="triggeremails_triggeractions_removelist_enabled_label" for="triggeremails_triggeractions_removelist_enabled">
															<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_RemoveList'); ?>
														</label>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								

								
									<tr>
										<td class="FieldLabel" width="10%">
											<img src="images/blank.gif" width="200" height="1" /><br />
											<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
											<?php echo GetLang('TriggerEmails_Form_Field_Active_Title'); ?>:
										</td>
										<td>
											<input type="checkbox" name="record[active]" id="triggeremails_active" value="1" <?php if($tpl->Get('record','active')): ?>checked="checked"<?php endif; ?> />
											<label for="triggeremails_active"><?php echo GetLang('TriggerEmails_Form_Field_Active_Instruction'); ?></label>
										</td>
									</tr>
								
							</table>
						</div>
					


					
						<div id="div2" style="display:none;">
							<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
								<tr>
									<td colspan="2" class="Heading2">
										&nbsp;&nbsp;<?php echo GetLang('TriggerEmails_Form_Header_TriggerOptions'); ?>
									</td>
								</tr>

								
								<tr class="SendingOptionsFields">
									<td class="FieldLabel">
										<img src="images/blank.gif" width="200" height="1" /><br />
										<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
										<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FromName'); ?>:&nbsp;
									</td>
									<td>
										<input type="text" name="record[triggeractions][send][sendfromname]" class="Field250 form_text" value="<?php echo $tpl->Get('record','triggeractions','send','sendfromname'); ?>" /><span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FromName')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Field_FromName')); ?></span></span>
									</td>
								</tr>

								
								<tr class="SendingOptionsFields">
									<td class="FieldLabel">
										<img src="images/blank.gif" width="200" height="1" /><br />
										<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
										<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FromEmail'); ?>:&nbsp;
									</td>
									<td>
										<input type="text" name="record[triggeractions][send][sendfromemail]" class="Field250 form_text" value="<?php echo $tpl->Get('record','triggeractions','send','sendfromemail'); ?>" /><span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FromEmail')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Field_FromEmail')); ?></span></span>
									</td>
								</tr>

								
								<tr class="SendingOptionsFields">
									<td class="FieldLabel">
										<img src="images/blank.gif" width="200" height="1" /><br />
										<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
										<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_ReplyEmail'); ?>:&nbsp;
									</td>
									<td>
										<input type="text" name="record[triggeractions][send][replyemail]" class="Field250 form_text" value="<?php echo $tpl->Get('record','triggeractions','send','replyemail'); ?>" /><span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_ReplyEmail')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Field_ReplyEmail')); ?></span></span>
									</td>
								</tr>

								
								<?php if($tpl->Get('allowSetBounceDetails')): ?>
									<tr class="SendingOptionsFields">
										<td class="FieldLabel">
											<img src="images/blank.gif" width="200" height="1" /><br />
											<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
											<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_BounceEmail'); ?>:&nbsp;
										</td>
										<td>
											<input type="text" name="record[triggeractions][send][bounceemail]" class="Field250 form_text" value="<?php echo $tpl->Get('record','triggeractions','send','bounceemail'); ?>" /><span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_BounceEmail')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Field_BounceEmail')); ?></span></span>
										</td>
									</tr>
								<?php endif; ?>

								
								<tr style="display:none;">
									<td class="FieldLabel">
										<img src="images/blank.gif" width="200" height="1" /><br />
										<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
										<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FieldFirstName'); ?>:&nbsp;
									</td>
									<td>
										<select name="record[triggeractions][send][firstnamefield]" class="Field250">
											<option value="0"><?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FieldFirstName_Instruction'); ?></option>
											<?php $array = $tpl->Get('availableNameCustomFields'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
												<option value="<?php echo $tpl->Get('each','fieldid'); ?>" <?php if($tpl->Get('record','triggeractions','send','firstnamefield') == $tpl->Get('each','fieldid')): ?>selected="selected"<?php endif; ?>><?php echo $tpl->Get('each','name'); ?></option>
											 <?php endforeach; endif; ?>
										</select>
										<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FieldFirstName')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Field_FieldFirstName')); ?></span></span>
									</td>
								</tr>

								
								<tr style="display:none;">
									<td class="FieldLabel">
										<img src="images/blank.gif" width="200" height="1" /><br />
										<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
										<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FieldLastName'); ?>:&nbsp;
									</td>
									<td>
										<select name="record[triggeractions][send][lastnamefield]" class="Field250">
											<option value="0"><?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FieldLastName_Instruction'); ?></option>
											<?php $array = $tpl->Get('availableNameCustomFields'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
												<option value="<?php echo $tpl->Get('each','fieldid'); ?>" <?php if($tpl->Get('record','triggeractions','send','lastnamefield') == $tpl->Get('each','fieldid')): ?>selected="selected"<?php endif; ?>><?php echo $tpl->Get('each','name'); ?></option>
											 <?php endforeach; endif; ?>
										</select>
										<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_FieldLastName')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Field_FieldLastName')); ?></span></span>
									</td>
								</tr>

								
								<tr>
									<td class="FieldLabel">
										<img src="images/blank.gif" width="200" height="1" /><br />
										<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
										<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_Multipart'); ?>:&nbsp;
									</td>
									<td>
										<input type="checkbox" name="record[triggeractions][send][multipart]" id="triggeremails_form_record_multipart" class="form_checkbox" value="1"<?php if($tpl->Get('record','triggeractions','send','multipart')): ?> checked="checked" <?php endif; ?>/>
										<label for="triggeremails_form_record_multipart"><?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_Multipart_Label'); ?></label>
										<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_Multipart')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Field_Multipart')); ?></span></span>
									</td>
								</tr>

								
								<tr>
									<td class="FieldLabel">
										<img src="images/blank.gif" width="200" height="1" /><br />
										<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
										<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_TrackOpens'); ?>:&nbsp;
									</td>
									<td>
										<input type="checkbox" name="record[triggeractions][send][trackopens]" id="triggeremails_form_record_trackopens" class="form_checkbox" value="1"<?php if($tpl->Get('record','triggeractions','send','trackopens')): ?> checked="checked" <?php endif; ?>/>
										<label for="triggeremails_form_record_trackopens"><?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_TrackOpens_Label'); ?></label>
										<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_TrackOpens')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Field_TrackOpens')); ?></span></span>
									</td>
								</tr>

								
								<tr>
									<td class="FieldLabel">
										<img src="images/blank.gif" width="200" height="1" /><br />
										<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
										<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_TrackLinks'); ?>:&nbsp;
									</td>
									<td>
										<input type="checkbox" name="record[triggeractions][send][tracklinks]" id="triggeremails_form_record_tracklinks" class="form_checkbox" value="1"<?php if($tpl->Get('record','triggeractions','send','tracklinks')): ?> checked="checked" <?php endif; ?>/>
										<label for="triggeremails_form_record_tracklinks"><?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_TrackLinks_Label'); ?></label>
										<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_TrackLinks')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Field_TrackLinks')); ?></span></span>
									</td>
								</tr>

								
								<?php if($tpl->Get('allowEmbedImages')): ?>
									<tr>
										<td class="FieldLabel">
											<img src="images/blank.gif" width="200" height="1" /><br />
											<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
											<?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_EmbedImages'); ?>:&nbsp;
										</td>
										<td>
											<input type="checkbox" name="record[triggeractions][send][embedimages]" id="triggeremails_form_record_embedimages" class="form_checkbox" value="1"<?php if($tpl->Get('record','triggeractions','send','embedimages')): ?> checked="checked" <?php endif; ?>/>
											<label for="triggeremails_form_record_embedimages"><?php echo GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_EmbedImages_Label'); ?></label>
											<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TriggerEmails_Form_Field_TriggerAction_Send_Field_EmbedImages')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TriggerEmails_Form_Field_TriggerAction_Send_Field_EmbedImages')); ?></span></span>
										</td>
									</tr>
								<?php endif; ?>
							</table>
						</div>
					

					<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
						<tr>
							<td width="200" class="FieldLabel">&nbsp;</td>
							<td valign="top" height="30">
								<input class="FormButton submitButton" type="submit" value="<?php echo GetLang('Save'); ?>" />
								<input class="FormButton cancelButton" type="button" value="<?php echo GetLang('Cancel'); ?>" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
</div>