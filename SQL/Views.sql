USE BDMM_PROYECTO;

/*--------------------------------------------------------------------------------USUARIOS--------------------------------------------------------------------------*/
DROP VIEW IF EXISTS userLoginID;

CREATE VIEW userLoginID AS
SELECT Usuario_id AS ID, nickUsuario AS usuario, userPassword AS pass
FROM Usuario;


DROP VIEW IF EXISTS userData;

CREATE VIEW userData AS
SELECT Usuario_id as ID,correo as email,nickUsuario as username,userPassword as pass,rolUsuario as userRol,fotoPerfil as PFP,CONCAT(nombreUsuario,' ',apellidoPaterno,' ',apellidoMaterno) as nombreCompleto,fechaNacimiento,sexo,esPrivado 
FROM Usuario;
