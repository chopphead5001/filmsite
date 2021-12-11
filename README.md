# filmsite
gracias por leerme

para poner en funcionamiento el sitio debera:

primero crear una base de datos con los sigientes parametros...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=filmsite
DB_USERNAME=root
DB_PASSWORD=

o directamente ir al archivo .env y cambiarlo por su base de pruebas de preferencia(no recomendado).

una vez echo esto abriremos nuestra consola y nos hubicaremos en /film-site

aqui ejecutaremos los sigientes comandos...

1.php artisan migrate:fresh

2.php artisan db:seed

3.php artisan serve

una vez echo esto ya podremos utilizar la pagina entrando en nuestro navegador favorito por la ruta proporcioada por el comando numero 3.

aqui te dejo el usuario administrador y un usuario comun para que puedas probar la pagina, aunque tambien puedes crear tus propios usuarios de prueba...

admin: 
    email: admin@test.com
    password: 1234

user:
    email: user@test.com
    password: 1234

recuerda cambiar las claves una vez terminada la fase de pruebas


