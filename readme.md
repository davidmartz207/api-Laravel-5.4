##Aplicación de prueba
-Consideraciones:
	Realizar la descarga de la aplicación, configurar las migraciones "php artisan migrate" para generar las tablas.
    Las rutas estan definidas para trabajar por lotes debido a la forma del json de la cual se alimenta, por lo general los id se generan automáticamente pero , el json de ejemplo supone que es un array de arrays , por lo que se considera la aplicación del proceso en lotes, utilizando como parámetros el json sugerido. "[{datos}{datos}{datos}]". De igual modo fué construido el update, para trabajar por lotes, el proceso de eliminación si es individualmente, ya que considero poco segura una eliminación en lotes. Tomando en cuenta dicho proceso se tienen las rutas:
    
    --CREATE : localhost:8000/usuarios    
    --READ   : localhost:8000/usuarios
    --UPDATE : localhost:8000/usuarios
    --DELETE : localhost:8000/usuarios/ID


    

