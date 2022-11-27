/*

Tailwind - The Utility-First CSS Framework

*/
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './views/**/*.{php,js}',
        './web/js/**/*.js',
    ],
    safelist: [
        'form-group',
        'help-block',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: [
                    'Montserrat',
                    '-apple-system',
                    'BlinkMacSystemFont',
                    'Segoe UI',
                    'Roboto',
                    'Oxygen',
                    'Ubuntu',
                    'Cantarell',
                    'Fira Sans',
                    'Droid Sans',
                    'Helvetica Neue',
                    'sans-serif'
                ],
            },
        },
        borderWidth: {
            DEFAULT: '1px',
            '0': '0',
            '2': '2px',
            '3': '3px',
            '4': '4px',
            '8': '8px'
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: '#000000',
            white: '#ffffff',
            blue: '#003AD8',
            green: '#4CAF50',
            body: '#323232',
            red: '#f30000',
        },
        fontSize: {
            xsm: ['0.75rem'], //12
            xs: ['0.75rem'], //12
            sm: ['0.875rem'], //14
            base: ['1rem'], //16
            lg: ['1.15rem'], //18
            xl: ['1.25rem'], //20
            "2xl": ['1.875rem'], //30
        },
        screens: {
            sm: '480px',
            l:  '640px',
            md: '768px',
            lg: '992px',
            xl: '1279px',
        },
    },

    plugins: [
        require('@tailwindcss/line-clamp'),
    ],

    variants: {
        extend: {
            opacity: ['disabled'],
            visibility: ['hover', 'group-hover'],
        }
    },

    corePlugins: {
        container: false,
    }
};