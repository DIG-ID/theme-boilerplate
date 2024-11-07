/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './**/*.php',
    './assets/js/**/*.js',
    './assets/sass/**/*.sass',
  ],
  theme: {
    fontFamily: {
      sans: ['Open Sans', 'sans-serif'],
    },
    extend: {
      colors: {
        'primary': '#00CCCC',
        'secondary': '#12232B',
        'accent': '#EA526C'
      },
    },
  },
  plugins: [],
}
