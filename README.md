<p align="center"><img src="public/img/logo.png" width="400"></p>

<p align="center">
	Xabi Lazkano. Ander Gonzalez. Ekain Susperregi.
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
###### Correo electronico
```html
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=ro.botika.zubiri@gmail.com
MAIL_PASSWORD=ro.botika19
MAIL_ENCRYPTION=tls
```

------------


### Usuarios
A continuacion se muestran los usuarios con sus respectivos roles:

| Rol | Usuario | Contraseña |
| ------------ | ------------ | ------------ |
| Administrador | admin@robotika.com | secret |
| Enfermero| nurse@robotika.com | secret |
