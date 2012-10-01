require('./lib/sencha-touch-2.1.0-beta3/sencha-touch-all-debug.js')
// enable Ext autoloader
Ext.Loader.setConfig({
	enabled: true
});

Ext.application({
	name: 'OpenLayersApp',

	statusBarStyle: 'black',
	viewport: {
		// hide navigation bar of browser
		autoMaximize: true
	},
	
	views: [
		'Main'
	],
	controllers: [
		'Map'
	],
	
	// launch function is called as soon as app is ready
	launch: function() {
        Ext.Viewport.add(Ext.create('OpenLayersApp.view.Main'));
	}
});
