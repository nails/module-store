var path = require('path');

module.exports = {
    entry: './assets/js/admin.store.js',
    output: {
        filename: 'admin.store.min.js',
        path: path.resolve(__dirname, 'assets/js/')
    },
    mode: 'production'
};
