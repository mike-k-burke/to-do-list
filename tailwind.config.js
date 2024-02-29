/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/modules/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        plugin(function({ addBase }) {
            addBase({
                'html': { fontSize: "16px" },
                'body': { fontSize: "16px" }
            })
        }),
        require('@tailwindcss/forms')
    ],
};
