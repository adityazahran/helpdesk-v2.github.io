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
  ],
  theme: {  
    extend: {
      container: {
        center: true,    
      }, 
    },              
  }, 
  
  plugins: [ 
    require('@tailwindcss/forms'),
    require('flowbite/plugin'),
    // ...
  ], 

  variants: {
    extend: {  
    },
  },
};