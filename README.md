# Proyecto iFixitTutorialsCatala

Este es un proyecto basado en *Laravel* que permite gestionar y traducir tutoriales de reparación de dispositivos electrónicos en catalán, integrando la API de *iFixit*.

Aquí puedes ver una demostración del mismo:
[Ver el video](./videos/iFixitTutorialsCatala.mp4)

## Requisitos

Antes de comenzar, asegúrate de tener instalados los siguientes requisitos:

- **PHP 8.1+**
- **Composer**
- **Node.js & npm** (para manejar dependencias frontend si es necesario)
- **MariaDB / MySQL** (u otro gestor de base de datos compatible)
- **Laravel 10+**

## Instalación

Clona el repositorio e instala las dependencias:

```sh
# Clonar el repositorio
git clone https://github.com/mateoabrah/iFixitTutorialsCatala.git
cd iFixitTutorialsCatala

# Instalar dependencias de Laravel
composer install

# Instalar dependencias de frontend (si es necesario)
npm install && npm run dev
```

## Configuración

1. Copia el archivo de configuración de entorno:
   ```sh
   cp .env.example .env
   ```

2. Genera la clave de la aplicación:
   ```sh
   php artisan key:generate
   ```

3. Configura tu base de datos en el archivo `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ifixit_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Ejecuta las migraciones para generar las tablas:
   ```sh
   php artisan migrate
   ```

5. Opcionalmente, si el proyecto incluye datos de prueba, puedes ejecutar:
   ```sh
   php artisan db:seed
   ```

## ▶Ejecución

Inicia el servidor de desarrollo con:

```sh
php artisan serve
```

Si estás usando Docker, puedes levantar los servicios con:

```sh
docker-compose up -d
```

## API de iFixit
Este proyecto se integra con la API de iFixit para importar tutoriales de reparación. Para configurarla:

1. Regístrate en *iFixit* y obtén tu clave API.
2. Configúrala en tu `.env`:
   ```env
   IFIXIT_API_KEY=tu_clave_api
   ```

## Comandos Útiles

- **Ejecutar pruebas:**
  ```sh
  php artisan test
  ```
- **Limpiar caché:**
  ```sh
  php artisan cache:clear
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```
- **Compilar assets de frontend (si se usa Vite o Mix):**
  ```sh
  npm run build
  ```

## Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo `LICENSE` para más detalles.

---

### Contribuciones
Si deseas contribuir, abre un *issue* o envía un *pull request*. Toda ayuda es bienvenida.

