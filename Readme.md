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

![Zona de inicio](Zona%20inicio.png)

### Registro de vehículos

![Registro de vehículos](/Registro%20vehículos.png)

### Listado de vehículos

![Listado de vehículos](/Lista%20de%20vehículos.png)

### Estadísticas de vehículos

![Estadísticas de vehículos](/Estadísticas%20vehículo.png)

### Acceso prohíbido

![AAcceso prohíbido](/Zona%20prohíbida.png)

