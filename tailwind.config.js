/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#D4AF37',
        secondary: '#1a1a1a',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
