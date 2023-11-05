# SigaDocs Cliente - Gestion Documental

[![SigaDocs](https://sigadocs.com/teams/download/logo/cc92cbb6-7cc6-40a1-be31-a7324bb992ec "SigaDocs")](https://sigadocs.com/accounts/login/)

Aplicación enfocada a facilitar el proceso de gestión de documentos solicitados por la DGT a los
gestores administrativos en conjunto con la
plataforma [SigaDocs](https://sigadocs.com/accounts/login/).

## Features

- Gestion de acceso basado en roles `ADMIN`, `GESTOR`, `CLIENTE` --> ok
- Gestión de clientes por parte de los gestores
    - Alta, baja o modificación de cliente en sus propios espacios
- Especificación de documentos a ser solicitados basados en los requerimientos de la DGT
- Pre-aprovación de documentos antes de publicar los documentos en ...
- Seguimiento del proceso de publicación de los documentos en la
  plataforma [SigaDocs](https://sigadocs.com/accounts/login/) para la gestión documental
- ...

## 🚀 Entorno de desarrollo

## Instalar dependencias

```shell
composer install 
```

```shell
npm install 
```

### Montar DB y carga de datos

La siguiente instrucción realiza la carga de tablas en base de datos y la carga de datos de prueba
para ser utilizados en desarrollo

```shell
php artisan migrate && php artisan db:seed
```

### Quitar últimos cambios en DB

Si se requiere quitar los últimos cambios realizados en base de datos a través de migraciones, se
debe ejecutar el siguiente comando en terminal

```shell
php artisan migrate:rollback
```

> Para ejecutar todos estos cambios en un solo comando podemos utilizar el modulo **refresh** de las
> migraciones con la opcion **--seed**
> ```shell
> php artisan migrate:refresh --seed
> ```

## Ejecutar el servidor integrado en Laravel

### Levantamos el servidor PHP integrado en Laravel

```shell 
php artisan serve
```

# Ejecutamos el compilador de desarrollo para los assets como javascript o css

```shell 
npm run dev
```

> Todos los comandos de artisan tienen la flag "**-h**" para obtener el detalle y ayuda
> correspondiente

## Datos de prueba

Tenemos una colección de datos con los que poder hacer pruebas, todos ellos cargados por medio de
seeders.
En este caso podemos utilizar tres roles de usuario disponibles a continuación:

+ Administrador
    + **email**: `admin@test.net`
    + **password**: `admin`
+ Gestor
    + **email**: `agent@test.net`
    + **password**: `agent`
+ Cliente
    + **email**: `client@test.net`
    + **password**: `client`

# ⚓ Enlaces de interes

- [Laravel Documentation](https://laravel.com/docs/10.x)
- [TailwindCSS](https://tailwindcss.com/docs/installation)
- [Faker](https://fakerphp.github.io/)
- [Debug bar](https://github.com/barryvdh/laravel-debugbar)

<br>


[![Siga98](https://www.gestores.net/assets/images/logo-siga.png "Siga98")](https://www.gestores.net/)

