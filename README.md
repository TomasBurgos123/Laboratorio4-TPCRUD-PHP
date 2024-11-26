# 🚀 Proyecto Laravel
## Integrantes:
Burgos Tomás 28251

Sanchez Chandia Lautaro 27998

Medina Andrea Lourdes 28240

Villacorta Gonzalo 28146

Veppo Adrian 28247

---

Este es un proyecto desarrollado con Laravel. A continuación, encontrarás las instrucciones sobre cómo clonar, configurar y ejecutar el proyecto en tu máquina local.

---

## 📥 1. Clonar el Repositorio de GitHub

Para clonar este repositorio, sigue estos pasos:

1. Abre la terminal o línea de comandos.
2. Navega a la carpeta donde deseas clonar el proyecto.
3. Ejecuta el siguiente comando:

   ```bash
   git clone https://github.com/TuUsuario/TuRepositorio.git

  ## ⚙️ 2. Configuración Después de Clonar el Repositorio
Una vez que el repositorio esté clonado en tu máquina local, sigue estos pasos para configurarlo correctamente.

## 📝 2.1 Crear el Archivo .env
El archivo .env contiene la configuración de tu entorno. Laravel incluye un archivo de ejemplo llamado .env.example. Deberás copiar este archivo y renombrarlo como .env:

```bash
cp .env.example .env
```

## 🔧 2.2 Modificar el Nombre de la Base de Datos
Abre el archivo .env con tu editor de texto favorito.

Busca las siguientes líneas en el archivo ".env":


```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```
Modifica los valores de DB_DATABASE, DB_USERNAME, y DB_PASSWORD para que coincidan con la configuración de tu base de datos.

Ejemplo:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mi_base_de_datos
DB_USERNAME=root
DB_PASSWORD=
```
## 🔑 2.3 Generar la Key de Laravel
Laravel requiere una clave para el proyecto. Para generarla, ejecuta el siguiente comando en la terminal:

```
php artisan key:generate
```
Este comando generará una nueva clave y la almacenará en el archivo .env.

## 🏗️ 2.4 Ejecutar las Migraciones
Para crear las tablas en la base de datos, ejecuta las migraciones con el siguiente comando:


```
php artisan migrate
```
Este comando creará las tablas definidas en los archivos de migración de tu proyecto.

## 🛠️ 3. Configuración de XAMPP
Para ejecutar tu proyecto, necesitas tener un servidor local y una base de datos en funcionamiento. XAMPP es una de las opciones más comunes.

## 3.1 Abrir XAMPP
Abre XAMPP en tu computadora.
Asegúrate de que Apache y MySQL estén habilitados. Haz clic en "Start" junto a ambos servicios.
## 3.2 Levantar el Servidor y la Base de Datos
En el panel de XAMPP, haz clic en "Start" junto a Apache para iniciar el servidor web.
Haz clic en "Start" junto a MySQL para iniciar la base de datos.
## 🚀 4. Ejecutar el Proyecto Laravel
Con el servidor y la base de datos levantados, puedes ejecutar el proyecto Laravel de la siguiente manera:

## 4.1 Levantar el Servidor de Desarrollo de Laravel
En la terminal, dentro del directorio de tu proyecto, ejecuta el siguiente comando para iniciar el servidor local de Laravel:

```
php artisan serve
```
Este comando iniciará el servidor y te dará una URL como esta:
```
Starting Laravel development server: http://127.0.0.1:8000
```
## 4.2 Acceder al Proyecto
Abre tu navegador y accede a la URL proporcionada (por ejemplo, http://127.0.0.1:8000). ¡Tu proyecto Laravel ya debería estar en funcionamiento!
