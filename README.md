# Descripción

Este proyecto es un ejemplo diseñado para ilustrar la metodología de trabajo en proyectos desarrollados con Laravel. 

En particular, se muestra el uso de autenticación OAuth2, en Laravel Passport, un paquete para dicho sistema de autenticación.

El proyecto muestra como interpreto dicho paquete para la creation de REST API para la communion entre sistemas, sin intervention humana.

## Metodologías y patrones utilizados

Se han implementado capas lógicas para el uso de las diferentes tecnologías de Laravel.

### Enums

Los enums son constantes que comparten lógicas y reglas, siempre vinculadas a un modelo principal, y hacen referencia a una tabla que contiene la misma información.


### Logs

Los logs están implementados de dos maneras:

1. Los logs estándar de Laravel, utilizando su *facade* con el canal `database`.
2. Logs a partir del modelo, donde todos los modelos tienen la capacidad de utilizarlos a través de la clase `BaseModel`.

Ambos enfoques permiten una gestión eficaz de los registros en la base de datos.

### Modelos

Además del modelo de prueba incluido en este proyecto, existen modelos base esenciales para las funcionalidades principales, como:

- Gestión de logs.
- Manejo de acciones.
- Clase abstracta que sirve como base para todos los modelos.

Estos modelos proporcionan una estructura sólida para las operaciones del proyecto.

### Repositorios

Los repositorios son una capa adicional sobre los modelos, encargada de manejar la lógica relacionada con la base de datos en torno a un modelo.

Se utiliza una clase principal que sirve como base, de la cual las clases hijas pueden heredar y sobrescribir la lógica cuando sea necesario. Este patrón permite una separación clara de responsabilidades y facilita el mantenimiento del código.

### Servicios

Los servicios forman una capa encargada de manejar la lógica de negocio que se encuentra entre los controladores y los modelos.

Se implementa una clase principal que define los métodos clave y gestiona los repositorios, permitiendo una organización más clara de la lógica de negocio y facilitando su reutilización en distintas partes del sistema.

## Iniciar el proyecto

El proyecto está configurado en Docker utilizando Laravel Sail. Incluye un seeder de prueba, por lo que, para ejecutar el proyecto, es necesario:

1. Descargar las dependencias con Composer.
2. Ejecutar `./vendor/bin/sail up -d`.
3. Ejecutar `./vendor/bin/sail artisan migrate:fresh --seed`.

## Probar funcionalidades

Dentro del proyecto se encuentra una colección de endpoints (exportada desde Postman) que permite su importación y prueba.

## Paquetes utilizados

- [Passport](https://github.com/laravel/passport) para la autenticación.
- [Laravel Lang](https://github.com/Laravel-Lang/common) para las traducciones.
- [Laravel Sail](https://github.com/laravel/sail) para la gestión del entorno de pruebas.
