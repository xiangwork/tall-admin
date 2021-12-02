// font-family: 'Bitter', serif;
// font-family: 'Poppins', sans-serif;
// font-family: 'Righteous', cursive;
// font-family: 'Work Sans', sans-serif;
const colors = require('tailwindcss/colors')
module.exports = {
    purge: {
        content: [
            './resources/**/*.blade.php',
            './resources/**/*.js',
            './resources/**/*.vue',
            './resources/**/*.css',
            './vendor/wire-elements/modal/resources/views/*.blade.php',
            './storage/framework/views/*.php',
        ],
        options: {
            safelist: [
                'sm:max-w-sm',
                'sm:max-w-md',
                'sm:max-w-lg',
                'sm:max-w-xl',
                'sm:max-w-2xl',
                'sm:max-w-3xl',
                'sm:max-w-4xl',
                'sm:max-w-5xl',
                'sm:max-w-6xl',
                'sm:max-w-7xl'
            ]
        }
    },
    darkMode: 'class', // or 'media' or 'class'
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            blue: colors.blue,
            green: colors.teal,
            white: colors.white,
            gray: colors.blueGray,
            indigo: colors.indigo,
            red: colors.red,
            yellow: colors.amber,
        },
        fontFamily: {
            'display': ['"Righteous", sans-serif'],
            'serif': ['"Bitter", serif'],
            'body': ['"Work Sans", sans-serif'],
            'sans': ['"Poppins",  sans-serif'],
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}

