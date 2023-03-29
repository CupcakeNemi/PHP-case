/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/public/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'sans-serif']
      },
      colors: {
        upperPink: '#dd306f',
        lowerPink: '#7d1f36',
        button: '#892542',
        background: '#333034',
        lightFont: '#FFE3FE',
        darkFont: '#170613',
        posts: '#524D53'
      }
    },
  },
  plugins: [],
}
