# Aplicación de gestión de usuarios

Esta es una aplicación de gestión de usuarios que utiliza PHP para interactuar con una API RESTful. Permite crear, leer, actualizar y eliminar usuarios a través de formularios web.

## Requisitos previos

- Servidor web local (por ejemplo, Apache)
- PHP instalado en el servidor
- Conexión a Internet para acceder a la API RESTful externa

## Instrucciones de instalación

1. Clona o descarga el repositorio en tu servidor local.
2. Asegúrate de que tu servidor web pueda acceder a los archivos y directorios de la aplicación.
3. Abre el archivo `index.php` en tu editor de código.
4. Dentro del archivo, actualiza la variable `$apiUrl` con la URL de tu API RESTful.
5. Guarda los cambios en el archivo `index.php`.
6. Abre un navegador web y navega hasta la URL de tu servidor local para acceder a la aplicación.

## Uso de la aplicación

La aplicación consta de un formulario y una tabla para gestionar los usuarios. Estas son las funcionalidades principales:

- Crear un usuario: Ingresa la información del usuario en el formulario y haz clic en el botón "✅" para guardarlo.
- Buscar un usuario: Ingresa el número de cédula en el campo correspondiente y haz clic en el botón "🔎". Si existe un usuario con esa cédula, se mostrará su información en el formulario.
- Subir un usuario: Haz clic en la flecha hacia arriba "⬆️" junto a un usuario. Esto mostrará la información de ese usuario en el formulario.
- Editar un usuario: Primero tendrás que buscar el usuario que quieras modificar ya sea por cédula o con la flecha. Modifica los campos necesarios y haz clic en el botón "✏️" para guardar los cambios.
- Eliminar un usuario: Primero tendrás que buscar el usuario que quieras modificar ya sea por cédula o con la flecha.  Haz clic en el botón "❌" junto al usuario que deseas eliminar. Esto eliminará permanentemente al usuario de la base de datos.
- La tabla muestra la lista de usuarios existentes en la base de datos. Cada fila muestra información sobre un usuario, y los botones permiten realizar acciones específicas en cada usuario.

## Notas adicionales

- Asegúrate de tener una conexión a Internet activa para poder acceder y interactuar con la API RESTful externa.
- Este código se proporciona solo con fines educativos y puede requerir modificaciones adicionales para adaptarlo a tus necesidades específicas.

¡Disfruta usando la aplicación de gestión de usuarios!