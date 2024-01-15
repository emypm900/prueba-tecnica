#Prueba tecnica

## Descripción
La Biblioteca Virtual es un gestor de biblioteca en línea que permite a los usuarios organizar, explorar y compartir su colección personal de libros. Cada usuario tiene la capacidad de agregar, editar y eliminar libros, así como escribir y gestionar sus propias reseñas. Además, incluso los usuarios no registrados pueden explorar la biblioteca, buscar libros y acceder a las reseñas de otros usuarios.

## Características Principales

- **Gestión de Libros:** Cada usuario puede agregar, editar y eliminar libros de su propia biblioteca personal.
- **Reseñas Personalizadas:** Los usuarios pueden escribir y gestionar reseñas para los libros que han agregado a su colección.
- **Exploración Pública:** Los usuarios no registrados pueden explorar la biblioteca, buscar libros por medio de un filtro y leer las reseñas de otros usuarios.
- **Privacidad:** Solo los propios usuarios pueden editar o eliminar los libros y reseñas que han agregado.

## Instrucciones de Uso

1. **Registro de Usuario:** Para aprovechar al máximo las funciones, regístrate para obtener una cuenta en la Biblioteca Virtual.
2. **Gestión de Libros:** Agrega tus libros favoritos, edita la información y elimina libros que ya no deseas.
3. **Reseñas Personalizadas:** Escribe reseñas para compartir tus opiniones sobre cada libro en tu colección.
4. **Exploración Pública:** Incluso si no estás registrado, utiliza la función de búsqueda para encontrar libros y leer reseñas de otros usuarios.

## Instalacion de entorno
1. Clonar repositorio
2. en la ruta del proyecto, en un CMD, ejecutar composer install
3. ejecutar npm install
4. ejecutar copy .env.example .env
5. agregar el nombre de la DB en DB_DATABASE
6. levantar los servicios del servidor web local (Xampp, Mampp, Lampp)
7. crear la base de datos library en phpmyadmin
8. ejecutar php artisan migrate
9. ejecutar  php artisan db:seed --class=UsersTableSeeders
10. ejecutar php artisan db:seed --class=booksTableSeeder
11. ejecutar php artisan db:seed --class=reviewsTableSeeder
12. ejecutar php artisan key:generate
13. ejecutar php artisan serve
14. ejecutar npm run dev
