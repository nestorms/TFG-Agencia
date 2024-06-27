# Agencia de Noticias - Aplicación Web

## Descripción del Proyecto

Este proyecto es una aplicación web desarrollada como trabajo de fin de grado, destinada a la gestión de una agencia de noticias. La aplicación está diseñada para atender las necesidades de tres tipos de usuarios: medios de comunicación, redactores y administradores.

## Funcionalidades Principales

### Usuarios
1. **Redactores**: Publican noticias que son visibles para todos los usuarios de la web.
2. **Medios de Comunicación**: Tienen la opción de guardar las noticias publicadas por los redactores en su sección personal para publicarlas en sus propias páginas.
3. **Administradores**: Gestionan todas las entidades de la agencia, incluyendo la creación, modificación y eliminación de noticias, usuarios y otros recursos.

### Publicación y Gestión de Noticias
- **Publicación de Noticias**: Los redactores pueden escribir y publicar noticias, las cuales son visibles para todos los usuarios.
- **Descarga de Noticias**: Las noticias pueden ser descargadas en formatos PDF o JSON.
- **Mensajes Internos**: Comunicación interna entre redactores y medios de comunicación.

### Sistema de Recomendación
- **Recomendación Automática**: Utiliza Elasticsearch para recomendar noticias a los medios de comunicación basándose en las noticias que ya han guardado.
- **Notificaciones**: Los medios son notificados automáticamente cuando hay una nueva noticia recomendada.

### Clasificación Automática de Noticias
- **Clasificador de Machine Learning**: Los redactores pueden utilizar un modelo de machine learning para clasificar automáticamente las noticias en categorías adecuadas.

### Filtrado y Clustering
- **Filtrado de Noticias**: Los medios pueden filtrar noticias por categorías, fecha, más guardados, etc.
- **Clustering de Noticias**: Utiliza algoritmos de clustering para agrupar noticias y mostrar un mapa de calor, facilitando la visualización de los diferentes bloques de noticias seleccionadas.

### Otras Funcionalidades
- **CRUD Básico**: Funcionalidades básicas de creación, lectura, actualización y eliminación para todas las entidades de la agencia.
- **Comentarios**: Los medios pueden hacer comentarios en las noticias.
- **Buscador**: Filtrado de noticias por texto.
- **Notificaciones**: Recibe notificaciones en base a las noticias recomendadas.
- **Descarga de noticias**: Posibilidad de descargar las noticias en formato PDF y JSON.

## Motivación

La motivación detrás de este proyecto es mejorar la gestión y distribución de noticias en una agencia, proporcionando herramientas avanzadas de recomendación, clasificación y filtrado que faciliten el trabajo de los medios de comunicación y los redactores. Además, busca aprovechar técnicas de machine learning y clustering para optimizar y personalizar la experiencia del usuario.

## Objetivos

1. **Facilitar la Gestión de Noticias**: Proveer una plataforma eficiente para que los redactores publiquen y gestionen noticias.
2. **Mejorar la Distribución de Contenidos**: Ayudar a los medios de comunicación a encontrar y distribuir las noticias de manera más efectiva.
3. **Automatización e Inteligencia**: Utilizar machine learning y técnicas avanzadas para clasificar y recomendar noticias, mejorando la personalización y relevancia de los contenidos.
4. **Interacción y Colaboración**: Fomentar la comunicación y colaboración entre redactores y medios de comunicación a través de mensajes y comentarios.
5. **Visualización Avanzada**: Implementar herramientas de visualización, como mapas de calor, para una mejor comprensión y análisis de las noticias.

## Tecnologías Utilizadas

- **Frontend**: [Tecnologías usadas para el frontend, en este caso HTML, CSS y JavaScript]
- **Backend**: [Tecnologías usadas para el backend, se ha utilizado el framework PHP Laravel]
- **Base de Datos**: [Tecnologías usadas para la base de datos, en este caso MySQL]
- **Machine Learning**: [Librerías y herramientas de machine learning, como Scikit-learn, numpy etc.]
- **Elasticsearch**: Para el sistema de recomendación y búsqueda avanzada.
- **Herramientas de Clustering**: [Librerías y herramientas usadas para clustering, como SciPy, etc.]

## Contribuciones

Las contribuciones son bienvenidas. Por favor, sigue los siguientes pasos para contribuir:

1. **Fork el repositorio**.
2. **Crear una nueva rama**:
    ```bash
    git checkout -b feature-nueva-funcionalidad
    ```
3. **Realizar los cambios y commitear**:
    ```bash
    git commit -m "Añadida nueva funcionalidad"
    ```
4. **Hacer push a la rama**:
    ```bash
    git push origin feature-nueva-funcionalidad
    ```
5. **Crear un Pull Request**.

## Licencia

Este proyecto está licenciado bajo la Licencia GPL-3.0. Ver el archivo [LICENSE](LICENSE) para más detalles.

## Contacto

Para preguntas o soporte, por favor contacta a [nestormartinez@correo.ugr.es](mailto:nestormartinez@correo.ugr.es).

---

¡Gracias por usar mi aplicación de gestión de noticias!
