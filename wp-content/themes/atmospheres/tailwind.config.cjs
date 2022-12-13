// https://tailwindcss.com/docs/configuration
const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    fontFamily: {
      serif: 'Bellede Mai',
      ...defaultTheme.fontFamily.serif,
      sans: 'acumin-pro',
      ...defaultTheme.fontFamily.mono,
    },
    extend: {
      colors: {}, // Extend Tailwind's default colors
    },
  },
  plugins: [],
};
