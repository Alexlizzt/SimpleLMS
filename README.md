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
~~~

### 2. Levantar contenedores
~~~bash
docker compose up -d --build
~~~

### 3. Instalar dependencias / Configurar proyecto
~~~bash
docker compose exec app bash ./scripts/setup.sh
~~~

### 4. Acceso
Abrir en el navegador:

http://localhost:8080

Configuración de base de datos:

- Host: drupal_db
- Nombre: drupal
- Usuario: drupal_user
- Password: drupal_password

*NOTA: Se incluye un fichero **.env** en caso que se desee cambiar las credenciales*

Usuario:
admin/admin

### 📬 Mailpit

Interfaz disponible en:

http://localhost:8025


## 📌 Objetivo del proyecto
Este proyecto es desarrollado como parte de mi portafolio.

## 🗺️ Roadmap
- [ ] API REST personalizada.