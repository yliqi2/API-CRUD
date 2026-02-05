# API Laravel - Personas y Animales

API REST sencilla en Laravel para gestionar **Personas** y sus **Animales** de manera eficiente.

## Características

- CRUD completo de Personas
- CRUD completo de Animales
- Relación entre Personas y Animales (un animal pertenece a una persona)
- Validación de datos
- Manejo de errores

## Requisitos

- PHP 8.0+
- Composer
- MySQL 5.7+

## Instalación

1. **Instalar dependencias:**
   ```bash
   composer install
   ```

2. **Configurar variable de entorno:**
   - Copia `.env.example` a `.env`
   - Actualiza los datos de conexión a MySQL

3. **Ejecutar migraciones:**
   ```bash
   php artisan migrate
   ```

## Estructura del proyecto

- **Modelos:** [app/Models/](app/Models/) - `Person.php` y `Animals.php`
- **Migraciones:** [database/migrations/](database/migrations/)
- **Rutas API:** [routes/api.php](routes/api.php)
- **Controladores:** [app/Http/Controllers/](app/Http/Controllers/)

## Endpoints de Personas

### GET - Obtener todas las personas
![Get All Persons](screenshots/Persona/GetAllPersons.png)

### GET - Obtener persona por ID
![Get Person by ID](screenshots/Persona/GetPersonByID.png)

### POST - Crear nueva persona
![Create Person](screenshots/Persona/PostCreatePerson.png)

### PUT - Actualizar persona
![Update Person](screenshots/Persona/PutUpdatePersonByID.png)

### DELETE - Eliminar persona
![Delete Person](screenshots/Persona/DeletePersonByID.png)

### Errores
![Person Errors](screenshots/Persona/Error.png)

---

## Endpoints de Animales

### GET - Obtener todos los animales
![Get All Animals](screenshots/Animals/GetAllAnimals.png)

### GET - Obtener animal por ID
![Get Animal by ID](screenshots/Animals/GetAnimalsByID.png)

### POST - Crear nuevo animal
![Create Animal](screenshots/Animals/PostCreateAnimals.png)

### PUT - Actualizar animal
![Update Animal](screenshots/Animals/PutAnimalsByID.png)

### DELETE - Eliminar animal por ID
![Delete Animal](screenshots/Animals/DeleteAnimalsByID.png)

### Errores
![Animal Errors](screenshots/Animals/Errors.png)

---
