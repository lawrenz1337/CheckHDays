Ext.onReady(function() {
	CheckHDays.config.connector_url = OfficeConfig.actionUrl;

	var grid = new CheckHDays.panel.Home();
	grid.render('office-checkhdays-wrapper');

	var preloader = document.getElementById('office-preloader');
	if (preloader) {
		preloader.parentNode.removeChild(preloader);
	}
});