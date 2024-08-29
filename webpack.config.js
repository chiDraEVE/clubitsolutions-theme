const path = require('path'),
	settings = require('./settings');

module.exports = {
	entry: {
		// App: settings.themeLocation + "js/scripts.js"
		App: "./js/scripts.js"
	},
	output: {
		path: path.resolve(__dirname, settings.themeLocation + "js"),
		// path: path.resolve(__dirname, "js"),
		filename: "scripts-bundled.js"
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env']
					}
				}
			}
		]
	},
	mode: 'development'
	// ,
	// resolve: {
	//     extensions:['.js','.jsx']
	// }
};
