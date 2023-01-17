const path = require("path")

module.exports = {
	entry: {
		index: "./src/index.js",
		style: "./src/style.js"
	},
	output: {
		filename: "[name].js",
		path: path.resolve(__dirname, "assets"),
		clean: true
	}
}
