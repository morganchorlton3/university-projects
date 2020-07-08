module.exports = {
  plugins: [
    require('tailwindcss-spinner')(),
    require('tailwindcss-plugins/pagination'),
  ],
  theme: {
    extend: {
        width: {
            '96': '24rem',
        },
        colors:{
          'blue-gray': {
            '100': '#CFD8DC',
            '200': '#B0BEC5',
            '300': '#90A4AE',
            '400': '#78909C',
            '500': '#607D8B',
            '600': '#546E7A',
            '700': '#455A64',
            '800': '#37474F',
            '900': '#263238',
            '1000': '#13191c',
          },
          'gray': {
            '100': '#F7FAFC',
            '200': '#EDF2F7',
            '300': '#E2E8F0',
            '400': '#CBD5E0',
            '500': '#A0AEC0',
            '600': '#718096',
            '700': '#4A5568',
            '800': '#2D3748',
            '900': '#1A202C',
            '1000': '#11141c',
          }
        }
    },
    spinner: (theme) => ({
      default: {
        color: '#dae1e7', // color you want to make the spinner
        size: '1em', // size of the spinner (used for both width and height)
        border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
        speed: '500ms', // the speed at which the spinner should rotate
      },
    }),
    pagination: theme => ({
      // Customize the color only. (optional)
      color: theme('colors.gray.900'),   
      link: 'bg-gray-900 p-3 text-white no-underline',
      linkActive: 'bg-gray-1000',
      linkHover: 'bg-gray-700',
      linkFirst: null,
      linkLast: 'border-0',
      linkDisabled: 'bg-gray-900'
  
    })
  },
  variants: {
    transitionDuration: ['responsive', 'hover', 'focus'],
  },
}