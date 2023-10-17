/** @type {import('tailwindcss').Config} */
export default {
  content: [      
      "./views/**/*.{php,js,ts,jsx,tsx}"
  ],
  theme: {
    extend: {
      colors: {
        primary: '#facc15', // Define a primary color
        secondary: '#3490dc', // Define a secondary color
      }
    },
  },
  plugins: [],
}

