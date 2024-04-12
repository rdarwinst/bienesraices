# Bienes Raices con MVC
Este es la version final del proyecto de Bienes Raices desarrollada en anteriores repositorios como:
[BienesRaicesFront](https://github.com/rdarwinst/bienes-raices-front) y [BienesRaicesBack](https://github.com/rdarwinst/bienesraices-back)

En esta versión todo el proyecto fue convertido al modelo MVC. Y se agregaron algunas funciones nuevas para la optimización y mejoras en el desarrollo.

## Adiciones
* Se agregó Composer
* Se tiene un autoload de clases
* Se utiliza Intervention Imagen para manipular y guardar imagenes.
* Se crea un master page para el MVC
* Se agregaron algunas validaciones JavaScript para los formularios
* Se hizo dinamico la parte del blog

  En el repositorio se incluyen los archivos de instalación y configuracion de Node.js y Composer
  Para ejecutar la instalacion de los modulos de node, usar el siguiente comando:
  ```bash
  npm install
  ```
  Para la instalacion de Composer
  ```bash
  composer install // para instalar las dependencias de composer
  composer update // para actualizar   
  ```
  *_En cuanto a la creacion del CRUD_*
  Recuerdar crear la base de datos y los campos segun el modelo.