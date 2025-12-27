/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'bengali': ['Noto Sans Bengali', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
