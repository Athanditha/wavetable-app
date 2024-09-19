/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#000000',      // Black for the primary elements
        secondary: '#ffffff',    // White for contrast
        accent: '#b3b3b3',       // Light gray accent for subtle highlights
        background: '#1a1a1a',   // Very dark gray for the background
        card: '#e0e0e0',         // Light gray for cards
        text: '#f5f5f5',         // Off-white for text for readability
        'text-secondary': '#a6a6a6', // Medium gray for secondary text
        'hover-link': '#cccccc', // Light gray for hover effect on links
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'], 
        heading: ['Poppins', 'sans-serif'],
      },
      borderRadius: {
        'lg': '1rem', 
        'xl': '1.5rem',
      },
      boxShadow: {
        'soft': '0 4px 6px rgba(0, 0, 0, 0.05)',  // Soft shadow for subtle depth
        'hard': '0 10px 15px rgba(0, 0, 0, 0.1)', // Slightly stronger shadow for emphasis
      },
    },
  },
  plugins: [
      
  ],
}
