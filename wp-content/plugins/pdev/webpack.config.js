const path = require('path');
 
module.exports = {
    entry: "./pdev.src.js",
    mode: "development",
 
    output: {
        filename: "pdev.build.js",
        path: path.resolve(__dirname, "")
    },
 
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: [
                            "@babel/preset-env",
                            "@babel/preset-react"
                        ]
                    }
                }
            }
        ]
    }
};