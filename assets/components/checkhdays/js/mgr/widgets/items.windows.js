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
		action: 'mgr/item/create',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	CheckHDays.window.CreateItem.superclass.constructor.call(this, config);
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
            xtype: 'textfield',
            fieldLabel: _('checkhdays_item_from'),
            name: 'from',
            id: config.id + '-from',
            anchor: '99%'
        }, {
            xtype: 'textfield',
            fieldLabel: _('checkhdays_item_to'),
            name: 'to',
            id: config.id + '-to',
            anchor: '99%'
        }, {
            xtype: 'textfield',
            fieldLabel: _('checkhdays_item_month'),
            name: 'month',
            id: config.id + '-month',
            anchor: '99%'
        }, {
            xtype: 'textfield',
            fieldLabel: _('checkhdays_item_week'),
            name: 'week',
            id: config.id + '-week',
            anchor: '99%'
        }, {
            xtype: 'textfield',
            fieldLabel: _('checkhdays_item_day'),
            name: 'day',
            id: config.id + '-day',
            anchor: '99%'
        }, {
			xtype: 'xcheckbox',
			boxLabel: _('checkhdays_item_active'),
			name: 'active',
			id: config.id + '-active',
			checked: true,
		}];
	},

	loadDropZones: function() {
	}

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
		action: 'mgr/item/update',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	CheckHDays.window.UpdateItem.superclass.constructor.call(this, config);
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
            xtype: 'textfield',
            fieldLabel: _('checkhdays_item_from'),
            name: 'from',
            id: config.id + '-from',
            anchor: '99%'
        }, {
            xtype: 'textfield',
            fieldLabel: _('checkhdays_item_to'),
            name: 'to',
            id: config.id + '-to',
            anchor: '99%'
        }, {
            xtype: 'textfield',
            fieldLabel: _('checkhdays_item_month'),
            name: 'month',
            id: config.id + '-month',
            anchor: '99%'
        }, {
            xtype: 'textfield',
            fieldLabel: _('checkhdays_item_week'),
            name: 'week',
            id: config.id + '-week',
            anchor: '99%'
        }, {
            xtype: 'textfield',
            fieldLabel: _('checkhdays_item_day'),
            name: 'day',
            id: config.id + '-day',
            anchor: '99%'
        }, {
			xtype: 'xcheckbox',
			boxLabel: _('checkhdays_item_active'),
			name: 'active',
			id: config.id + '-active',
		}];
	},

	loadDropZones: function() {
	}

});
Ext.reg('checkhdays-item-window-update', CheckHDays.window.UpdateItem);