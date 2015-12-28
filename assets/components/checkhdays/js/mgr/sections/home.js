CheckHDays.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'checkhdays-panel-home', renderTo: 'checkhdays-panel-home-div'
		}]
	});
	CheckHDays.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(CheckHDays.page.Home, MODx.Component);
Ext.reg('checkhdays-page-home', CheckHDays.page.Home);