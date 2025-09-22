/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

export default {
  content: [
    "./**/*.php",
    "./*.php",
    "./src/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        'onest': ['Onest', 'system-ui', 'sans-serif'],
      },
      colors: {
        dark: {
          default: 'rgb(11,36,42)',
          lighter: 'rgb(15,39,45)',
          lightest: 'rgb(17,44,51)',
        },
        black: {
          theme: 'rgb(0,31,48)',
        },
        blue: {
          theme: 'rgb(88,200,233)',
        },
        green: {
          theme: 'rgb(90,199,155)',
        },
        purple: {
          theme: 'rgb(143,135,197)',
        },
      },
      keyframes: {
        gradientShift: {
          '0%': { 'background-position': '0% 50%' },
          '50%': { 'background-position': '100% 50%' },
          '100%': { 'background-position': '0% 50%' },
        },
      },
      animation: {
        'gradient-shift': 'gradientShift 3s ease infinite',
      },
    },
  },
  plugins: [],
}