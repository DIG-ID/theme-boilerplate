/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './inc/**/*.php',
    './page-templates/*.php',
    './template-parts/**/*.php',
    './src/js/**/*.{js,jsx,ts,tsx}'
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
