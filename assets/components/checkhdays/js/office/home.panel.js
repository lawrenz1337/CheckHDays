CheckHDays.panel.Home = function (config) {
	config = config || {};
	Ext.apply(config, {
		baseCls: 'modx-formpanel',
		layout: 'anchor',
		/*
		 stateful: true,
		 stateId: 'checkhdays-panel-home',
		 stateEvents: ['tabchange'],
		 getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
		 */
		hideMode: 'offsets',
		items: [{
			xtype: 'modx-tabs',
			defaults: {border: false, autoHeight: true},
			border: false,
			hideMode: 'offsets',
			items: [{
				title: _('checkhdays_items'),
				layout: 'anchor',
				items: [{
					html: _('checkhdays_intro_msg'),
					cls: 'panel-desc',
				}, {
					xtype: 'checkhdays-grid-items',
					cls: 'main-wrapper',
				}]
			}]
		}]
	});
	CheckHDays.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(CheckHDays.panel.Home, MODx.Panel);
Ext.reg('checkhdays-panel-home', CheckHDays.panel.Home);
