# 🎓 Simple LMS - Drupal 11 Full Stack Project

Mini plataforma de cursos online desarrollada con Drupal 11.
El proyecto demuestra conocimientos de desarrollo backend y frontend en Drupal, Docker y buenas prácticas.

---

## 🚀 Tecnologías utilizadas

- Drupal 11
- PHP 8.4
- MariaDB 10.11
- Nginx
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

## ▶️ Ejecución del proyecto
### 1. Clonar repositorio
~~~bash
git clone https://github.com/Alexlizzt/SimpleLMS.git
cd SimpleLMS
chmod +x scripts/setup.sh
~~~

### 2. Instalación Automática
~~~bash
./scripts/setup.sh
~~~

### 3. Acceso
Abrir en el navegador:

http://localhost:8080

<details> 
<summary>Detalles técnicos de base de datos</summary>

- Host: drupal_db
- Nombre: drupal
- Usuario: drupal_user
- Password: drupal_password

*NOTA: Se incluye un fichero **.env** en caso que se desee cambiar las credenciales*
</details>
Usuario:
admin/admin

### Nota para desarrolladores:
Este proyecto utiliza Config Sync. Si realizas cambios en la estructura (campos, vistas, etc.), recuerda exportarlos con: 
~~~bash
docker compose exec app vendor/bin/drush cex 
~~~
antes de hacer commit.

### 📬 Mailpit

Interfaz disponible en:

http://localhost:8025


## 📌 Objetivo del proyecto
Este proyecto es desarrollado como parte de mi portafolio.

## 🗺️ Roadmap
- [ ] API REST personalizada.