const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/assets/scss/app.scss', 'public/css')
   .scripts([
       'node_modules/jquery/dist/jquery.js',
       'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
       'resources/assets/js/app.js'
   ],'public/js/all.js','./')
   .browserSync({
       'proxy': 'http://localhost:8000/'
   });
   //.styles(['a.css','b.css','c.css'],'public/css/d.css','public/css');
