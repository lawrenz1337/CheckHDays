CheckHDays.window.CreateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'checkhdays-item-window-create';
	}
	Ext.applyIf(config, {
		title: _('checkhdays_item_create'),
		width: 550,
		autoHeight: true,
		url: CheckHDays.config.connector_url,
		baseParams: {
			action: 'checkhdays/processor',
			method: 'item/create',
		},
		fields: this.getFields(config),
		keys: this.getKeys(config),
	});
	CheckHDays.window.CreateItem.superclass.constructor.call(this, config);
	this.on('hide', function() {
		var w = this;
		window.setTimeout(function() {
			w.close();
		}, 200);
	});
};
Ext.extend(CheckHDays.window.CreateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'textfield',
			fieldLabel: _('checkhdays_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('checkhdays_item_description'),
			name: 'description',
			id: config.id + '-description',
			height: 150,
			anchor: '99%'
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('checkhdays_item_active'),
			name: 'active',
			id: config.id + '-active',
			checked: true,
		}];
	},

	getKeys: function(config) {
		return [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}];
	},

});
Ext.reg('checkhdays-item-window-create', CheckHDays.window.CreateItem);


CheckHDays.window.UpdateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'checkhdays-item-window-update';
	}
	Ext.applyIf(config, {
		title: _('checkhdays_item_update'),
		width: 550,
		autoHeight: true,
		url: CheckHDays.config.connector_url,
		baseParams: {
			action: 'checkhdays/processor',
			method: 'item/update',
		},
		fields: this.getFields(config),
		keys: this.getKeys(config),
	});
	CheckHDays.window.UpdateItem.superclass.constructor.call(this, config);
	this.on('hide', function() {
		var w = this;
		window.setTimeout(function() {
			w.close();
		}, 200);
	});
};
Ext.extend(CheckHDays.window.UpdateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'hidden',
			name: 'id',
			id: config.id + '-id',
		}, {
			xtype: 'textfield',
			fieldLabel: _('checkhdays_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('checkhdays_item_description'),
			name: 'description',
			id: config.id + '-description',
			anchor: '99%',
			height: 150,
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('checkhdays_item_active'),
			name: 'active',
			id: config.id + '-active',
		}];
	},

	getKeys: function() {
		return [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}];
	},

});
Ext.reg('checkhdays-item-window-update', CheckHDays.window.UpdateItem);