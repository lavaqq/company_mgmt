const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    './resources/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        danger: colors.rose,
        primary: {
          DEFAULT: '#388A84',
          50: '#A1D9D5',
          100: '#92D3CE',
          200: '#75C7C1',
          300: '#58BBB4',
          400: '#44A7A0',
          500: '#388A84',
          600: '#28625E',
          700: '#183A38',
          800: '#071211',
          900: '#000000',
          950: '#000000'
        },
        success: colors.green,
        warning: colors.yellow,
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}