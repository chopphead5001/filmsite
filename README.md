# filmsite

gracias por leerme

prerequisitos:

xampp instalado (al menos apache y mysql)
composer instalado
laravel instalado

para poner en funcionamiento el sitio debera:

primero crear una base de datos con los sigientes parametros...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=filmsite
DB_USERNAME=root
DB_PASSWORD=

luego crearemos el archivo .env y le pondremos los datos ya presentados

una vez echo esto abriremos nuestra consola y nos hubicaremos en /film-site

aqui ejecutaremos los sigientes comandos...

1.composer install

2.php artisan storage:link 

(anted de seguir:en el folder storage que se acaba de crear dentro de film-site/public creamos un nuevo folder llamado images y aqui agregaremos una imagen png con el nombre default(esto sera para las peliculas que no tengan una imagen, eliga una acorde a la tematica), esto quedara tal que asi film-site/public/storage/images/default.png)

3.php artisan migrate:fresh

4.php artisan db:seed

5.php artisan key:generate

6.php artisan serve

disfruta de tu pagina a travez de la direccion dada por el ultimo comando ingresado

aqui te dejo el usuario administrador y un usuario comun para que puedas probar la pagina, aunque tambien puedes crear tus propios usuarios de prueba...

admin: 

email: admin@test.com
password: 1234

user:
    
email: user@test.com
password: 1234

recuerda cambiar las claves una vez terminada la fase de pruebas

