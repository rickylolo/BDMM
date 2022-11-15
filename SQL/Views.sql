USE BDMM_PROYECTO;

/*--------------------------------------------------------------------------------USUARIOS--------------------------------------------------------------------------*/
DROP VIEW IF EXISTS userLogin;

CREATE VIEW userLogin AS
SELECT Usuario_id as ID,nickUsuario as username,fotoPerfil,CONCAT(nombreUsuario,' ',apellidoPaterno,' ',apellidoMaterno) as nombreCompleto
FROM Usuario;


DROP VIEW IF EXISTS userData;

CREATE VIEW userData AS
SELECT Usuario_id as ID,correo as email,nickUsuario as username,userPassword as pass,rolUsuario as userRol,fotoPerfil as PFP,CONCAT(nombreUsuario,' ',apellidoPaterno,' ',apellidoMaterno) as nombreCompleto,fechaNacimiento,sexo,esPrivado 
FROM Usuario;
