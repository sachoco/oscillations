const pkg = require('./package.json');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
// const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
// const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
// const StyleLintPlugin = require('stylelint-webpack-plugin');


module.exports = {
	// Project Identity
	appName: 'oscillations', // Unique name of your project
	type: 'theme', // Plugin or theme
	slug: 'oscillations', // Plugin or Theme slug, basically the directory name under `wp-content/<themes|plugins>`
	// Used to generate banners on top of compiled stuff
	bannerConfig: {
		name: 'oscillations',
		author: 'Satoshi Shiraishi',
		license: 'UNLICENSED',
		link: 'UNLICENSED',
		version: pkg.version,
		copyrightText:
			'This software is released under the UNLICENSED License\nhttps://opensource.org/licenses/UNLICENSED',
		credit: true,
	},
	// Files we need to compile, and where to put
	files: [
		// If this has length === 1, then single compiler
		{
			name: 'theme',
			entry: {
				// mention each non-interdependent files as entry points
		     // The keys of the object will be used to generate filenames
		     // The values can be string or Array of strings (string|string[])
		     // But unlike webpack itself, it can not be anything else
		     // <https://webpack.js.org/concepts/#entry>
		     // You do not need to worry about file-size, because we would do
		     // code splitting automatically. When using ES6 modules, forget
		     // global namespace pollutions 😉
				// vendor: './src/app/vendor.js', // Could be a string
				main: ['./src/js/main.js', './src/sass/style.scss'], // Or an array of string (string[])
			},
			// Extra webpack config to be dynamically created
			webpackConfig: undefined,
			// webpackConfig: {
			// 	module: {
			// 		rules: [
			// 			{
			// 				test: /\.worker\.js$/,
			// 		        use: { loader: "worker-loader" }
			// 			},
			// 		],
			// 	},
			// },
		},
		// If has more length, then multi-compiler
	],
	// Output path relative to the context directory
	// We need relative path here, else, we can not map to publicPath
	outputPath: 'dist',
	// Project specific config
	// Needs react(jsx)?
	hasReact: true,
	// Disable react refresh
	disableReactRefresh: false,
	// Needs sass?
	hasSass: true,
	// Needs less?
	hasLess: false,
	// Needs flowtype?
	hasFlow: false,
	// Externals
	// <https://webpack.js.org/configuration/externals/>
	externals: {
		jquery: 'jQuery',
	},
	// Webpack Aliases
	// <https://webpack.js.org/configuration/resolve/#resolve-alias>
	alias: undefined,
	// Show overlay on development
	errorOverlay: true,
	// Auto optimization by webpack
	// Split all common chunks with default config
	// <https://webpack.js.org/plugins/split-chunks-plugin/#optimization-splitchunks>
	// Won't hurt because we use PHP to automate loading
	optimizeSplitChunks: true,
	// Usually PHP and other files to watch and reload when changed
	watch: './inc|includes/**/*.php',
	// Files that you want to copy to your ultimate theme/plugin package
	// Supports glob matching from minimatch
	// @link <https://github.com/isaacs/minimatch#usage>
	packageFiles: [
		'inc/**',
		'vendor/**',
		'dist/**',
		'*.php',
		'*.md',
		'readme.txt',
		'languages/**',
		'layouts/**',
		'LICENSE',
		'*.css',
	],
	// Path to package directory, relative to the root
	packageDirPath: 'package',
};
