// /** */ @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.ts",
        "./resources/**/*.js",
        "./resources/**/*.css",
    ],
    theme: {
        extend: {
            colors: {
                customRed: '#FD5353',
                customOrange: '#E17626',
                customBlue: '#1D4ED8', //#2492D1
                customPink: '#FD467E',
                customInsta: '#E1306C',
                darkGray: '#222325',
            },
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
                inter: ['Inter', 'sans-serif'],
            },
            animation: {
                'scroll-right': 'scrollRight 40s linear infinite',
            },
            keyframes: {
                scrollRight: {
                    '0%' : { transform: 'translateX(-50%)' },
                    '100%': { transform: 'translateX(0%)' },
                },
            },
        },
    },
    plugins: [],
}
