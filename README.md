# Museum-Of-Art
Symfony Application to visualize data from The Metropolitan Museum of Art, located in New York, this museum is one of the largest museums in the USA.

## Install Application
### Clone Repository
```sh
git clone https://github.com/RyukShi/Museum-Of-Art.git
```
### Install Dependencies
```sh
composer i
```

## Run Application
For Symfony CLI only
```sh
symfony serve
```

## Database
Requirements : Uncomment options **pdo_pgsql** and **pgsql** in **php.ini** to connect to postgresql server.
### Create Database
```sh
php bin/console doctrine:database:create
```
### Creating the Tables/Schema
```sh
php bin/console make:migration
```
### Run All Migration
```sh
php bin/console d:m:m
```
