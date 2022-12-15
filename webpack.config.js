const path = require('path');

module.exports = {
    resolve: {
        alias: {
            // Para referencias objetos o clases en Vue
            '@': path.resolve('resources/js'),
        },
    },
};
