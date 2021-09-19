module.exports = {
  important: true,
  purge: {
    enabled: false,
    content: [
      './src/**/*.html',
      './*.html',
      './partials/*.php',
      './partials/*.php',
      './mountainbreeze/*.php',
      './woocommerce/*.php',
      './woocommerce/**/*.php',
      './templates/*.php',
      './templates/**/*.php'
    ],
  },
  theme: {
    container: {
      center: true,
    },
    minHeight: {
     '0': '0',
     '1/4': '25%',
     '1/2': '50%',
     '3/4': '75%',
     'full': '100%',
    },
    backgroundSize: {
      'auto': 'auto',
      'cover': 'cover',
      'contain': 'contain',
      '210%': '210%',
    },
    rotate: {
     '-180': '-180deg',
      '-90': '-90deg',
     '-45': '-45deg',
      '0': '0',
      '45': '45deg',
      '90': '90deg',
     '135': '135deg',
      '180': '180deg',
     '270': '270deg',
    },
    minHeight: {
     '0': '0',
     '1/4': '25%',
     '1/2': '50%',
     '3/4': '75%',
     'full': '100%',
     'screen': '75vh',
    },
    extend: {
      colors: {
          'azuloscuro'    : '#172e5a',
          'gris'          : '#737b7d',
          'gris2'         : '#333333',
          'gris3'         : '#4F4F4F',
          'gris4'         : '#BDBDBD',
          'gris5'         : '#E0E0E0',
          'gris6'         : '#f2f2f2',
          'gris7'         : '#E8E8E8',
          'azul'          : '#0c6aba',
          'verde'         : '#498931',
          'naranjo'       : '#f69618',
          'rosado'        : '#feaca1',
          'beige'         : '#fffbef',
          'negro'         : '#2c2c2c',
          'blanco'        : '#ffffff',
          'fondooscuro'   : '#161616' 
      },
      lineHeight: {
        '12' : '3rem',
        '16' : '4rem',
      }
    },
    fontFamily: {
      'sans'      : ['Apercu Pro', 'sans-serif'],
      'festivo6'  : ['festivo6', 'sans-serif'],
      'festivo8'  : ['festivo8', 'sans-serif'],
      'festivo19' : ['festivo19', 'sans-serif'],
    },
    rotate: {
      '25' : '25deg',
    },
  },
  variants: {},
  plugins: [
    require('tailwindcss-absolute-center')(
    {
        variants: ['responsive'],
    },
  ),
  ],
}
