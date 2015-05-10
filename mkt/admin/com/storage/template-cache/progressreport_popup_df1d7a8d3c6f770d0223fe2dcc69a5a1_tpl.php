<?php $IEM = $tpl->Get('IEM'); ?><style type="text/css" media="all">
	#ProgressReportContainer {
		padding: 0px;
		margin: 0px;
		width: auto;
	}

	#ProgressReportProgress {
		margin: 0px;
		text-align: center;
	}

	#ProgressReportProgressBar {
		padding: 0px;
		height: 20px;
		margin: auto;
		width: 300px;
		border: 1px solid #CCCCCC;
		background: url(images/progressbar.gif) no-repeat -300px 0px;
		text-align: center;
		font-weight: bold;
	}

	#ProgressReportStatus {
		text-align: center;
	}

	#ProgressReportWindow_Close {
		float: right;
		cursor: pointer;
		display: none;
	}
</style>
<div id="ProgressReportContainer">
	<div id="ProgressReportWindow_Close">
		<a href="#" id="ProgressReportWindow_CloseButton"><?php print GetLang('PopupCloseWindow'); ?></a>
	</div>
	<div id="ProgressReportTitle" class="Heading1"><?php if(isset($GLOBALS['ProgressTitle'])) print $GLOBALS['ProgressTitle']; ?></div>
	<br />
	<div id="ProgressReportMessage" class="body pageinfo"><p><?php if(isset($GLOBALS['ProgressMessage'])) print $GLOBALS['ProgressMessage']; ?></p></div>
	<br />
	<div id="ProgressReportReport" class="body"><?php if(isset($GLOBALS['ProgressReport'])) print $GLOBALS['ProgressReport']; ?></div>
	<br />
	<div id="ProgressReportProgress">
		<div id="ProgressReportProgressBar">&nbsp;</div>
		<div id="ProgressReportProgressNumber">&nbsp;</div>
	</div>
	<div id="ProgressReportStatus" class="intro"><?php if(isset($GLOBALS['ProgressStatus'])) print $GLOBALS['ProgressStatus']; ?></div>
</div>
<!-- iframe which does all of the work -->
<iframe id="fmeWorker" width="1" height="1" frameborder="0" border="0"></iframe>
<script>
	setTimeout(function() {
		var e = document.getElementById('fmeWorker');
		e.src = '<?php if(isset($GLOBALS['ProgressURLAction'])) print $GLOBALS['ProgressURLAction']; ?>';
	}, 150);

	function UpdateStatus(status, percentage)
	{
		var f = document.getElementById('ProgressReportProgressBar');
		f.style.background = 'url(images/progressbar.gif) no-repeat -' + (300 - (percentage * 3)) + 'px 0px';
		f.innerHTML = parseInt(percentage) + "%";
		document.getElementById('ProgressReportStatus').innerHTML = status;
	}

	function UpdateStatusReport(report)
	{
		document.getElementById('ProgressReportReport').innerHTML = report;
	}

	$('#ProgressReportWindow_CloseButton').click(function(event) {
		parent.tb_remove();
	});
</script>
