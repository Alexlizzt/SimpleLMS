# 🎓 Simple LMS - Drupal 11 Full Stack Project

Mini plataforma de cursos online desarrollada con Drupal 11.
El proyecto demuestra habilidades en arquitectura backend, desarrollo frontend en Drupal, gestion de contenedores con DDEV y buenas prácticas de desarrollo.

---

## 🚀 Tecnologías utilizadas

- Drupal 11
- PHP 8.4
- MariaDB 10.11
- Nginx
- DDEV (Docker based)
- Docker & Docker Compose
- Composer
- SCSS
- JavaScript
- Mailpit

---

## 🧩 Funcionalidades principales

### 👤 Usuarios
- Registro y login
- Inscripción a cursos
- Dashboard personalizado
- Seguimiento de progreso

### 📚 Cursos
- Creación de cursos
- Relación curso → lecciones
- Control de acceso por inscripción
- Generación de certificado de finalización en pdf

### 📊 Progreso
- Cálculo automático de porcentaje completado
- Barra de progreso dinámica
- Lógica desacoplada mediante servicios

---
## 📝 Requisitos
- [Docker](https://docs.docker.com/engine/install/)
- [DDEV](https://docs.ddev.com/en/stable/users/install/ddev-installation/)
---
## ▶️ Ejecución del proyecto
### 1. Clonar repositorio y levantar el proyecto
~~~bash
git clone https://github.com/Alexlizzt/SimpleLMS.git
cd SimpleLMS
ddeb start
~~~

### 2. Instalación
~~~bash
ddev composer install
~~~
en la release se adjunta un backup de la [base de datos](https://github.com/Alexlizzt/SimpleLMS/releases/download/1.0/backup.sql), con ella usas:
~~~bash
ddev import-db --file=backup.sql
~~~


### 3. Acceso
**Sitio web**

Ejecutar:
~~~bash
ddev launch
~~~
tendras acceso a:

https://simplelms.ddev.site

**Mailpit**
~~~bash
ddev launch -m
~~~

**Base de datos**
Para ver las credenciales
~~~bash
ddev describe
~~~

Para conectar su gestor favorito
~~~bash
ddev sequelace
~~~
o
~~~bash
ddev tableplus
~~~

### 🗃️ Guia para desarrolladores:
Este proyecto utiliza Configuration Management. Si realizas cambios en la estructura (campos, vistas, tipos de contenido), debes exportarlos:

~~~bash
ddev drush cex # Exportar configuración
ddev drush cim # Importar configuración
ddev drush cr # Limpiar caché
~~~
antes de hacer commit.

## Gestión de dependencias
Para añadir nuevos modulos o librerías, utiliza siempre el comando de ddev para asegurar la compatibilidad de versiones:

~~~bash
ddev composer require drupal/<<nombre_del_modulo>>
~~~

## 📌 Objetivo del proyecto
Este proyecto es desarrollado como parte de mi portafolio.

## 🗺️ Roadmap
- [ ] API REST personalizada.
