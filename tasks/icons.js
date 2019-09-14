const webfontsGenerator = require('webfonts-generator');
const fs = require('fs');

const iconDir = './source/_assets/icons/';
const destinationDir = './source/assets/build/css/';
const isSVG = new RegExp('.*\.svg$');

module.exports = {
    generate: {
        apply(compiler) {
            // Specify the event hook to attach to
            compiler.hooks.emit.tapAsync(
                'FontCompile',
                (compilation, callback) => {

                    var files = fs.readdirSync(iconDir);
                    var icons = files.filter(function (file) {
                        return isSVG.test(file);
                    }).map(function (file) {
                        return iconDir + file;
                    })

                    webfontsGenerator({
                        files: icons,
                        dest: destinationDir,
                    }, function (error) {
                        if (error) {
                            console.log('Fail!', error);
                        }
                        callback();
                    })

                    
                }
            );
        }
    }
}

