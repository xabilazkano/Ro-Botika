<p align="center"><img src="public/img/logo.png" width="400"></p>

<p align="center">
	<b>Xabi Lazkano. Ander Gonzalez. Ekain Susperregi.</b>
</p>

## Ro-Botika
Ro-Botika es un prototipo de un carro de medicinas automata con gestion de pacientes. Gestion de pacientes, asistencias y medicinas mediante interfaz tactil. Asistencias automaticas a pacientes. Recorrido de carro automatizado.

## Informacion para despliegue en local

#### Fichero de configuración
En el archivo *.env* editamos las siguientes lineas:
###### Base de datos
```html
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_bbdd
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

------------


### Usuarios
A continuacion se muestran los usuarios con sus respectivos roles:

| Rol | Usuario | Contraseña |
| ------------ | ------------ | ------------ |
| Administrador(a) | admin@robotika.com | secret |
| Enfermer@| nurse@robotika.com | secret |
