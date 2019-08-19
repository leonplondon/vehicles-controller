# Ejercicio Opcional

## Enunciado

Crear una aplicación web en PHP utilizando el framework Laravel que permita realizar las siguientes acciones:

1. **Acceder a la zona de inicio:** para acceder a la zona de inicio se debe enviar por la URL el código:
A765. En caso de que el código sea válido se desplegarán 3 enlaces:
    * Registrar vehículos
    * Listar vehículos
    * Estadísticas vehículos.
En caso contrario deberá desplegar un mensaje que diga zona prohibida (Se cambió a "No esta autorizado a acceder esta sección!").

2. **Registrar vehículos:** Cree un sistema que permita registrar tanto vehículos como dueños al mismo tiempo. En un mismo formulario recoja todos los datos y registre los datos de las 2 tablas.
    
    **Nota:** se recomienda registrar primero los datos de los dueños para evitar problemas de claves foráneas inexistentes. Registre 2 vehículos y 2 dueños. Verifique únicamente que la marca sea válida.

3. **Listar vehículos:** Liste todos los vehículos con los siguientes datos: placa y marca; para los vehículos tipo Mazda muestre al lado de la placa un mensaje en verde que diga (“Los de Mazda son los mejores”) y para los vehículos tipo Toyota muestra la placa en rojo y negrilla.

4. **Estadísticas vehículos:** Muestre cuántos vehículos de cada tipo existen registrados en el sistema(por ejemplo: 3 Mazda, 2 Toyota, 0 Chevrolet).

## Despliegue

La aplicación se encuentra alojada en un servidor de Heroku y se puede acceder a través de este [link](http://vehicle-controller.herokuapp.com/A765)

## Explicación solución

#### URL base de la aplicación

Dependiendo de cómo se ejecute la aplicación, de aquí en adelante no hablaremos de la url completa, nos referiremos únicamente al path de la sección que se esté hablando y para probarse se deberá agregar una url base de las mencionadas a continuación:

* **Local**: [http://localhost:8000/](http://localhost:8000/)
* **Heroku**: [http://vehicle-controller.herokuapp.com/](http://vehicle-controller.herokuapp.com/)

### Diagrama de base de datos

Además de las tablas `users`, `password_resets` y `migrations` creadas por el framework, para implementar la solución se crearon:

* `people`: Tabla para almacenar la información de los propietarios de vehículos.
* `brands`: Tabla para almacenar la información de las marcas de vehículos a registrar.
* `vehicules`: Tabla para almacenar los distintos vehículos que se registren en el sistema.
* `authorized_codes`: Tabla para almacenar los códigos válidos para realizar `Login` en la aplicación.

![Diagrama base de datos](/DB%20diagram.png)

#### Seeders

Se crearon los seeders [BrandSeed](/database/seeds/BrandSeed.php) y [AuthorizedCodeSeed](/database/seeds/AuthorizedCodeSeed.php) para cargar las marcas de vehículos y códigos de login respectivamente mencionados en el enunciado del problema.
Estos seeders crean registros en la base de datos, únicamente si las tablas asociadas no contienen registros.

### Acceso zona de inicio

Para acceder a la zona de inicio se debe ingresar a `/{code}`, reemplazando el placeholder por un valor válido que exista en la DB para poder loguearse; el controlador [VehicleController](/app/Http/Controllers/VehicleController.php) en su método `index` se encarga de hacer las validaciones, crear la sesión del usuario si este envíó un código correcto o enviandolo a la pantalla de **Acceso prohíbido**

![Zona de inicio](Zona%20inicio.png)

### Registro de vehículos

Si el usuario está logueado, podrá acceder a esta sección desde **Zona de inicio** o a través de la URL `/register`. La pantalla presentará un formulario solicitando los datos del propietario y del vehículo que se desean registrar. Las reglas de registro de los datos se manejan a través de un request en el método `store` del controlador [VehicleController](/app/Http/Controllers/VehicleController.php)

![Registro de vehículos](/Registro%20vehículos.png)

### Listado de vehículos

Si el usuario está logueado, podrá acceder a esta sección desde **Zona de inicio** o a través de la URL `/vehicles`. Si el usuario no ha hecho log-in en la aplicación será redireccionado a la pantalla de **Acceso prohíbido**

![Listado de vehículos](/Lista%20de%20vehículos.png)

### Estadísticas de vehículos

Si el usuario está logueado, podrá acceder a esta sección desde **Zona de inicio** o a través de la URL `/stats`. Si el usuario no ha hecho log-in en la aplicación será redireccionado a la pantalla de **Acceso prohíbido**

![Estadísticas de vehículos](/Estadísticas%20vehículo.png)

### Acceso prohíbido

Pantalla que se muestra cuando el usuario intenta acceder a una sección de la aplicación sin haber realizado log-in.

![Acceso prohíbido](/Zona%20prohíbida.png)

## Elementos importantes

### Controladores

La lógica de las diferentes secciones de la aplicación es manejada por un único controlador: [VehicleController](/app/Http/Controllers/VehicleController.php)

### Middlewares

El middleware [AuthenticatedUserMiddleware](/app/Http/Middleware/AuthenticatedUserMiddleware.php) se encarga de validar que el usuario haya realizado previamente login en la aplicación para poder acceder a cualquier sección de esta.

### Base de datos

* Local
    * **MySQL** -> 5.7
* Heroku
    * **PostgreSQL** -> 11.5


## Ejecutar la aplicación de manera local

### Requisitos

* PHP 7.2+
* Composer
* MySQL 5.2+

Para poner el proyecto en ejecución se deben seguir una serie de pasos que se detallan a continuación, a modo de ejemplo todos los snippets de comandos se ejecutan en el directorio `/tmp` del OS.

Clonar el repositorio:
```console
user@host:/tmp/$ git clone git@github.com:leonplondon/vehicles-controller.git
```

Entrar en el directorio de la app ejecutar:
```console 
user@host:/tmp$ cd vehicles-controller
user@host:/tmp/vehicles-controller$ composer i
```
Cear archivo de variables de entorno y actualizar las que tienen como prefijo `DB_` con los valores deseados:
```console
user@host:/tmp/vehicles-controller$ cp .env.example .env
```

Generar id de la aplicación:
```console
user@host:/tmp/vehicles-controller$ php artisan key:generate
```

Ejecutar la aplicación:
```console
user@host:/tmp/vehicles-controller$ php artisan migrate
user@host:/tmp/vehicles-controller$ php artisan db:seed
user@host:/tmp/vehicles-controller$ php artisan serve
```
