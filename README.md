# 🌮 Tortas Ahogadas - RESTful API

API RESTful backend construida con **Laravel** y autenticación segura con **Laravel Sanctum** para la administración integral de un restaurante: gestión de catálogo de productos, clientes, administradores y órdenes de venta.

## 🚀 Tecnologías

- **PHP 8.2+**
- **Laravel Framework 11+**
- **Laravel Sanctum** (Autenticación basada en tokens API)
- **MySQL** / MariaDB
- **Eloquent ORM** & API Resources

## 📌 Características Principales

- **Gestión de Catálogo:** Operaciones CRUD completas para productos y categorías.
- **Módulo de Clientes:** Registro, consulta y actualización de perfiles de clientes.
- **Panel Administrativo:** Control de usuarios administradores con roles y permisos protegidos por Sanctum.
- **Arquitectura Limpia:** Uso de ApiResource, Form Requests para validación de datos y controladores dedicados.

## 🛠️ Endpoints de la API

| Método | Endpoint | Descripción | Acceso |
|--------|----------|-------------|--------|
| GET / POST | /api/productos | Listar y crear platillos del menú | Público / Admin |
| GET / PUT / DELETE | /api/productos/{id} | Consultar, actualizar y eliminar producto | Admin |
| GET / POST | /api/clientes | Gestión de clientes registrados | Admin |
| GET / POST | /api/administradores | Administración de usuarios internos | Sanctum Auth |
| GET | /api/user | Obtener información del usuario autenticado | Sanctum Auth |

## ⚙️ Instalación Local

1. **Clonar el repositorio:**
   `ash
   git clone https://github.com/2124200399-ops/tortas-ahogadas-api.git
   cd tortas-ahogadas-api
   `

2. **Instalar dependencias:**
   `ash
   composer install
   `

3. **Configurar variables de entorno:**
   `ash
   cp .env.example .env
   php artisan key:generate
   `

4. **Ejecutar migraciones:**
   `ash
   php artisan migrate
   `

5. **Iniciar el servidor de desarrollo:**
   `ash
   php artisan serve
   `

---
Desarrollado como parte de proyectos de ingeniería de software y desarrollo multiplataforma.