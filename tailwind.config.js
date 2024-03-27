/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        'ks-orange': "rgb(255 174 0 / <alpha-value>)",
        'ks-green': "rgb(55 179 74 / <alpha-value>)",
        'ks-black': "rgb(10 10 10 / <alpha-value>)",
        'ks-grey': "rgb(10 10 10 / <alpha-value>)",
        'ks-white': '#rgb(69 66 65 / <alpha-value>)',
      },
    },
  },
  plugins: [],
}