# Página web para la lista de counters de Overwatch

## Capturas de pantalla

### Pantalla principal
![Pantalla Principal](./Capturas%20de%20Pantalla/Principal.png)
### Modal de los Counters
![Counters](./Capturas%20de%20Pantalla/Modal.png)
### Pantalla Principal en Movil
![Pantalla Principal Movil](./Capturas%20de%20Pantalla/MovilP.png)
### Modal de counters en Movil
![Counters en Movil](./Capturas%20de%20Pantalla/MovilM.png)


## Espacio de Trabajo

### PHP y Composer
El proyecto usa PHP 8.2.12 (Se usó la versión de php que viene en [XAMPP](https://www.apachefriends.org/es/index.html)) y [Composer](https://getcomposer.org) para la administración de los paquetes.
### Paquetes usados
1. Laravel (framework de PHP)
2. Livewire (Lógica interna de los componentes)
3. Bootstrap 5.3 (Frontend)
### SQLite
Para almacenar datos y hacer las relaciones se usa SQLite, no debería ser necesario instalarlo ya que esta incluido en Composer. Si se amplía el scope del proyecto tal vez necesitemos la migración a MySQL que debería ser solo cambiar el archivo de entorno.
#### Migración a MySQL
Para usar MySQL es necesario cambiar el archivo .env alrededor de la línea 22:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Counters
DB_USERNAME=root
DB_PASSWORD=
```
### Editor de código
Desarrollado en VScode

## Preparar espacio de trabajo
1. Clonar el repositorio.
2. Abrir una terminal en el directorio raíz.
3. Escribir `composer install` para instalar todos los paquetes.
4. Para preparar el entorno escribe `cp .env.example .env` esto creará un archivo .env para la conexión a base de datos
5. Para crear y rellenar la base de datos usar: `php artisan migrate --seed`
6. Para generar la clave de encriptado usar: `php artisan key:generate`
7. Finalmente, para probar que todo funciona correctamente usar `php artisan serve` para iniciar el servidor local, esto debería mostrar en consola una dirección local (ejemplo: http://127.0.0.1:8000 ) escribe esa dirección en un navegador y todo debería funcionar correctamente.
## Problemas con composer
Al momento de ejecutar `composer install` puede mostrar un error de que no se encontró la extensión ZIP, esto se puede solucionar usando el servidor de XAMPP.

1. Abrir XAMPP
2. Con los servicios apagados seleccionar en la fila de "Apache" seleccionar el botón "Config" y en el desplegable "PHP(php.ini)" esto abrirá un archivo en el bloc de notas u otro editor de texto.
3. En el archivo de texto busca (ctrl+b) ";extension=zip" y borra el ";" delante de "extension=zip", haz lo mismo con ";extension=gd."
4. Guarda y cierra el archivo de texto.

Si hay algún otro problema usa `composer diagnose` en el terminal para arreglar posibles corrupciones.
