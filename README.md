# 🐾 API de Registro de Mascotas (PHP - MVC)

Esta es una API sencilla para registrar, obtener, editar y eliminar mascotas. Está desarrollada en PHP usando el patrón MVC y Programación Orientada a Objetos. OJO: No utiliza base de datos, sino datos mockeados en memoria.

---

## 🚀 Requisitos

- PHP instalado (preferiblemente PHP 8+)
- No necesitas instalar XAMPP o servidores externos
- Compatible con Windows (se incluye un archivo `.bat` para ejecución fácil)

---

## ⚙️ Cómo ejecutar el proyecto

1. Clona o descarga este repositorio.
2. Asegúrate de tener PHP agregado al `PATH` del sistema.
3. Haz doble clic sobre el archivo `start-server.bat`.

Este archivo ejecuta un servidor embebido de PHP que levanta tu API en el puerto `8000`.

---

## 🌐 URL base de la API

- http://localhost:8000

---

## 📂 Estructura del Proyecto

```
📁 Controllers/      # Controladores (lógica de las rutas)
📁 Models/           # Modelos (Mascota, Respuesta)
📁 Repositories/     # Repositorio para acceder al mockData
📁 Services/         # Servicios intermedios entre el controlador y repositorio
📁 Mock/             # Archivo JSON con las mascotas
📁 Routes/           # Archivo que define las rutas
📁 Public/           # Punto de entrada de la aplicación (index.php)
```

---

## 🔀 Rutas Disponibles

Todas las respuestas siguen esta estructura:

```json
{
  "status": "OK",
  "codeStatus": 200,
  "message": {} // puede ser un array, objeto, string, número, etc.
}
```

---

### 📌 Obtener todas las mascotas

- **Método:** GET  
- **URL:** `/mascotas`  
- **Ejemplo de respuesta:**

```json
{
  "status": "OK",
  "codeStatus": 200,
  "message": [
    {
      "id": "mascota1",
      "nombre": "Max",
      "tipo": "Perro",
      "edad": 5
    },
    {
      "id": "mascota2",
      "nombre": "Luna",
      "tipo": "Gato",
      "edad": 3
    }
  ]
}
```

---

### 📌 Obtener una mascota por ID

- **Método:** GET  
- **URL:** `/mascotas/{id}`  
- **Ejemplo:** `/mascotas/mascota2`  
- **Ejemplo de respuesta:**

```json
{
  "status": "OK",
  "codeStatus": 200,
  "message": {
    "id": "mascota2",
    "nombre": "Luna",
    "tipo": "Gato",
    "edad": 3
  }
}
```

---

### 📌 Crear una nueva mascota

- **Método:** POST  
- **URL:** `/mascotas`  
- **Body (JSON):**

```json
{
  "nombre": "Firulais",
  "tipo": "Perro",
  "edad": 3,
  "raza": "Labrador",
  "vacunado": true
}
```

- **Respuesta:**

```json
{
  "status": "OK",
  "codeStatus": 201,
  "message": {
    "id": "auto-generado",
    "nombre": "Firulais",
    "tipo": "Perro",
    "edad": 3,
    "raza": "Labrador",
    "vacunado": true
  }
}
```

---

### 📌 Editar una mascota

- **Método:** PUT  
- **URL:** `/mascotas/{id}`  
- **Body (JSON):**

```json
{
  "nombre": "Firulais actualizado",
  "edad": 4
}
```

- **Respuesta:**

```json
{
  "status": "OK",
  "codeStatus": 200,
  "message": {
    "id": "mascota_id",
    "nombre": "Firulais actualizado",
    "tipo": "Perro",
    "edad": 4
  }
}
```

---

### 📌 Eliminar una mascota

- **Método:** DELETE  
- **URL:** `/mascotas/{id}`  
- **Ejemplo:** `/mascotas/mascota1`  
- **Respuesta:**

```json
{
  "status": "OK",
  "codeStatus": 200,
  "message": "Mascota eliminada correctamente"
}
```

