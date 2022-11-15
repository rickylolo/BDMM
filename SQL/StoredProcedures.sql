USE BDMM_PROYECTO;
/*--------------------------------------------------------------------------------USUARIOS--------------------------------------------------------------------------*/
DROP PROCEDURE IF EXISTS sp_GestionUsuario;
DELIMITER //
CREATE PROCEDURE sp_GestionUsuario
(
Operacion CHAR(1),
sp_Usuario_id INT(6),
sp_correo VARCHAR(30),
sp_nickUsuario VARCHAR(30),
sp_userPassword VARCHAR(30),
sp_rolUsuario VARCHAR(30),
sp_fotoPerfil VARCHAR(30),
sp_nombreUsuario VARCHAR(30),
sp_apellidoMaterno  VARCHAR(30),
sp_apellidoPaterno  VARCHAR(30),
sp_fechaNacimiento  VARCHAR(30),
sp_sexo VARCHAR(10),
sp_esPrivado BIT
)

BEGIN
   IF Operacion = 'I' /*INSERT USUARIO*/
   THEN  
		INSERT INTO Usuario(correo ,nickUsuario ,userPassword ,rolUsuario ,fotoPerfil ,nombreUsuario ,apellidoMaterno ,apellidoPaterno ,fechaNacimiento ,sexo,fechaRegistro) 
			VALUES (sp_correo,sp_nickUsuario,sp_userPassword,sp_rolUsuario,sp_fotoPerfil,sp_nombreUsuario,sp_apellidoMaterno,sp_apellidoPaterno,sp_fechaNacimiento,sp_sexo,CURRENT_TIMESTAMP);
   END IF;
	IF Operacion = 'E'  /*EDIT USUARIO*/
    THEN 
    	SET sp_correo=IF(sp_correo='',NULL,sp_correo),
			sp_nickUsuario=IF(sp_nickUsuario='',NULL,sp_nickUsuario),
			sp_userPassword=IF(sp_userPassword='',NULL,sp_userPassword),
			sp_rolUsuario=IF(sp_rolUsuario='',NULL,sp_rolUsuario),
            sp_fotoPerfil=IF(sp_fotoPerfil='',NULL,sp_fotoPerfil),
			sp_nombreUsuario=IF(sp_nombreUsuario='',NULL,sp_nombreUsuario),
			sp_apellidoMaterno=IF(sp_apellidoMaterno='',NULL,sp_apellidoMaterno),
            sp_apellidoPaterno=IF(sp_apellidoPaterno='',NULL,sp_apellidoPaterno),
            sp_fechaNacimiento=IF(sp_fechaNacimiento='',NULL,sp_fechaNacimiento),
            sp_sexo=IF(sp_sexo='',NULL,sp_sexo);
		UPDATE Usuario 
			SET correo = IFNULL(sp_correo,correo), 
			nickUsuario=  IFNULL(sp_nickUsuario,nickUsuario), 
			userPassword= IFNULL(sp_userPassword,userPassword), 
			rolUsuario= IFNULL(sp_rolUsuario,rolUsuario), 
			fotoPerfil= IFNULL(sp_fotoPerfil,fotoPerfil), 
			nombreUsuario= IFNULL(sp_nombreUsuario,nombreUsuario), 
			apellidoMaterno= IFNULL(sp_apellidoMaterno,apellidoMaterno),
            apellidoPaterno= IFNULL(sp_apellidoPaterno,apellidoPaterno),
            fechaNacimiento= IFNULL(sp_fechaNacimiento,fechaNacimiento),
            sexo= IFNULL(sp_sexo,sexo)
     
		WHERE Usuario_id=sp_Usuario_id;
   END IF;
    IF Operacion = 'D' THEN /*DELETE USUARIO*/
          DELETE FROM Usuario WHERE  Usuario_id = sp_Usuario_id;
   END IF;
      IF Operacion = 'P' THEN /*UPDATE PRIVACIDAD*/
          UPDATE Usuario SET esPrivado = sp_esPrivado WHERE Usuario_id = sp_Usuario_id;
   END IF;
    IF Operacion = 'L' THEN /*LOG IN USUARIO*/
	SELECT ID,username,fotoPerfil,nombreCompleto FROM userLogin WHERE nickUsuario = sp_nickUsuario AND userPassword = sp_userPassword;
   END IF;
      IF Operacion = 'G' THEN /*GET DATOS USUARIOS*/
	SELECT Usuario_id,correo,nickUsuario,userPassword,rolUsuario,fotoPerfil,nombreUsuario,apellidoMaterno,apellidoPaterno,fechaNacimiento,sexo,esPrivado FROM Usuario WHERE Usuario_id = sp_Usuario_id;
   END IF;
     IF Operacion = 'A' THEN /*GET DATOS USUARIO*/
	SELECT DISTINCT Usuario_id,fotoPerfil,nickUsuario,CONCAT(nombreUsuario,' ',apellidoPaterno,' ',apellidoMaterno) AS Nombre,correo
    FROM Usuario; 
   END IF;
END //
/*
CALL sp_GestionUsuario('I', #Operacion
NULL, #Id Usuario
'ricky_lolo29@hotmail.com', #Correo
'rickylolo', #Nickname
'123', #Contraseña
1, #Rol de usuario
NULL, #PFP
'Ricardo Alberto', # Nombre(s)
'Grimaldo', # Apellido Paterno
'Estévez', # Apellido Materno
'2001-06-29', # Fecha de nacimiento
'Hombre', # Genero
1); # Flag Perfil Privado

CALL sp_GestionUsuario('A', #Operacion
NULL, #Id Usuario
NULL, #Correo
NULL, #Nickname
NULL, #Contraseña
NULL, #Rol de usuario
NULL, #PFP
NULL, # Nombre(s)
NULL, # Apellido Paterno
NULL, # Apellido Materno
NULL, # Fecha de nacimiento
NULL, # Genero
NULL); # Flag Perfil Privado
*/
