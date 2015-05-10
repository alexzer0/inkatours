<?php $IEM = $tpl->Get('IEM'); ?><script src="includes/js/jquery.js"></script>
<script>
	$(function() {
		$('#PreviewEmail_CloseButton').click(function(event) {
			self.parent.closePopup();
		});
	});

	$(function() {
		var temp = '';
		if(!(temp = <?php if(isset($GLOBALS['JavaScriptParameters'])) print $GLOBALS['JavaScriptParameters']; ?>)) temp = '';
		$('#PreviewEmail_Message').load('<?php if(isset($GLOBALS['URLAction'])) print $GLOBALS['URLAction']; ?>', temp);
	});
</script>
<style type="text/css" media="all">
	#PreviewEmail_Container {
		padding: 0px;
		margin: 0px;
		width: auto;
	}

	#PreviewEmail_Close {
		float: right;
		cursor: pointer;
	}

	#PreviewEmail_MessageContainer {
		height: 105px;
		overflow: auto;
	}

	* html div #PreviewEmail_MessageContainer {
		height: 115px;
		h\eight: 105px;
	}

	#PreviewEmail_Message {
		padding-left: 10px;
		padding-right: 10px;
	}


	#PreviewEmail_Loading {
		text-align: center;
	}
</style>
<div id="PreviewEmail_Container">
	<div id="PreviewEmail_Close">
		<a href="#" id="PreviewEmail_CloseButton"><?php print GetLang('PopupCloseWindow'); ?></a>
	</div>
	<div class="Heading1"><?php print GetLang('TestEmailAddress'); ?></div>
	<br />
	<div id="PreviewEmail_MessageContainer" class="message">
		<div id="PreviewEmail_Message" class="message">
			<div id="PreviewEmail_Loading"><img src="images/loading.gif" alt="loading..." /></div>
			<br />
			<?php print GetLang('Loading_SendingPreview'); ?>
		</div>
	</div>
	<br />
</div>