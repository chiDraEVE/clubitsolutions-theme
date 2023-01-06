const path = require("path")

module.exports = {
	entry: {
		index: "./src/index.js",
		customizer: "./src/customizer.js",
		navigation: "./src/navigation.js"
	},
	output: {
		filename: "[name].js",
		path: path.resolve(__dirname, "assets"),
		clean: true
	}
}
