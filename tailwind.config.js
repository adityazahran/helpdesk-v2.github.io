module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/views/**/*.blade.php',
    './resources/views/tasks/**/*.blade.php',
    './resources/views/admin/**/*.blade.php',
    './resources/layouts/**/*.blade.php', 
    './resources/js/**/*.vue',
    "./node_modules/flowbite/**/*.js",
    './node_modules/tw-elements/dist/js/**/*.js'
  ],
  theme: {  
    extend: {
      container: {
        center: true,    
      }, 
      backgroundImage: {
      },   
    },
           
  }, 
  
  plugins: [ 
    require('@tailwindcss/forms'),
    require('flowbite/plugin'),
    require('tw-elements/dist/plugin')  
    // ...
  ], 

  variants: {
    extend: {  
    },
  },
};