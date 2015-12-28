var CheckHDays = function (config) {
	config = config || {};
	CheckHDays.superclass.constructor.call(this, config);
};
Ext.extend(CheckHDays, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('checkhdays', CheckHDays);

CheckHDays = new CheckHDays();