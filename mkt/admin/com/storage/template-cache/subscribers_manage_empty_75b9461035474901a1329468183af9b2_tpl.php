<?php $IEM = $tpl->Get('IEM'); ?><script>
	Application.Page.Subscriber_Manage = {
		_defaultIntroText: '<?php print GetLang('SubscriberQuickSearch_Description'); ?>',
		_stateIntro: false,

		_displayIntro: function() {
			var elm = document.ActionSearchContacts.emailaddress;
			if(elm.value.trim() == '') {
				$(elm).css('color', '#999999');
				elm.value = Application.Page.Subscriber_Manage._defaultIntroText;
				Application.Page.Subscriber_Manage._stateIntro = true;
			}
		},

		eventDocumentReady: function() {
			Application.Ui.Menu.PopDown('.PopDownMenu_Resize', {maxHeight: 370});
			$(document.ActionMembersForm).submit(Application.Page.Subscriber_Manage.eventActionFormSubmit);
			$(document.ActionMembersForm.cmdAddContact).click(Application.Page.Subscriber_Manage.eventAddContactCommandClick);
			$(document.ActionSearchContacts.emailaddress).focus(Application.Page.Subscriber_Manage.eventQuickSearchFocus);
			$(document.ActionSearchContacts.emailaddress).blur(Application.Page.Subscriber_Manage.eventQuickSearchBlur);

			if(document.ActionSearchContacts.emailaddress.value.trim() != '') $('#AdvanceSearchClearLink').show();
			Application.Page.Subscriber_Manage._displayIntro();
			$(document.ActionSearchContacts.emailaddress).blur();
		},
		eventAddContactCommandClick: function(event) {
			document.location.href='<?php if(isset($GLOBALS['AddButtonURL'])) print $GLOBALS['AddButtonURL']; ?>';
		},
		eventActionFormSubmit: function(event) {
			event.stopPropagation();
			event.preventDefault();
		},
		eventQuickSearchFocus: function(event) {
			if(Application.Page.Subscriber_Manage._stateIntro) {
				this.value = '';
			}
			$(this).css('color', '');
			this.select();
			Application.Page.Subscriber_Manage._stateIntro = false;
		},
		eventQuickSearchBlur: function(event) { Application.Page.Subscriber_Manage._displayIntro(); }
	};

	Application.init.push(Application.Page.Subscriber_Manage.eventDocumentReady);
</script>
<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td>
			 <div style="margin: 10px 5px 0 0; float: right;">
			 	<div style="text-align: left;">
				 	<form name="ActionSearchContacts" method="post" action="index.php?Page=Subscribers&Action=Manage&SubAction=SimpleSearch<?php if(isset($GLOBALS['URLQueryString'])) print $GLOBALS['URLQueryString']; ?>">
				 		<input type="text" class="Field250" size="20" value="<?php if(isset($GLOBALS['Search'])) print $GLOBALS['Search']; ?>" name="emailaddress" title="<?php print GetLang('Subscribers_SimpleSearch_Title'); ?>" />
						<input type="image" border="0" src="images/searchicon.gif" id="SearchButton" style="padding-left: 10px; vertical-align: top;" name="SearchButton" />
				 	</form>
					<a href="index.php?Page=Subscribers&Action=Manage&SubAction=AdvancedSearch"><?php print GetLang('AdvancedSearch'); ?></a>
					&nbsp;
					<a href="index.php?Page=Subscribers&Action=Manage&Lists=any" id="AdvanceSearchClearLink" style="display:none;"><?php print GetLang('SubscriberQuickSearch_ClearSearch'); ?></a>
				</div>
			 </div>
			 <div class="Heading1">
				<?php print GetLang('View'); ?>:
				<a href="#" id="SubscriberViewPickerButton" class="PopDownMenu_Resize">
					<span id="SubscriberViewPicker_Caption"><?php if(isset($GLOBALS['SubscribersManage'])) print $GLOBALS['SubscribersManage']; ?></span>
					<img width="8" height="5" border="0" src="images/arrow_blue.gif" />
				</a>
			</div>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo"><p><?php print GetLang('Help_SubscribersManage'); ?></p></td>
	</tr>
	<tr>
		<td>
			<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
		</td>
	</tr>
	<tr>
		<td class="body">
		</td>
	</tr>
	<tr>
		<td style="display:<?php if(isset($GLOBALS['AddButtonDisplay'])) print $GLOBALS['AddButtonDisplay']; ?>">
			<form name="ActionMembersForm" action="">
				<input type="button" name="cmdAddContact" value="<?php print GetLang('Subscribers_Add_Button'); ?>" class="Text" />
			</form>
		</td>
	</tr>
</table>
<?php if(isset($GLOBALS['SubscriberViewPickerMenu'])) print $GLOBALS['SubscriberViewPickerMenu']; ?>

<script>
$(document).ready(function() {
	document.ActionSearchContacts.emailaddress.select();
});
</script>
