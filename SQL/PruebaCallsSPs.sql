USE BDMM_PROYECTO;

/*--------------------------------------------------------------------------------USUARIOS--------------------------------------------------------------------------*/
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
/*--------------------------------------------------------------------------------PRODUCTOS--------------------------------------------------------------------------*/
CALL sp_GestionProducto('I', #Operacion
NULL,
8,
"Album Twice Cheer Up",
"Fallen Version Limited Edition",
0,
899.99,
500
);

CALL sp_GestionProducto('N', #Operacion
NULL,
8,
"Album Twice Cheer Up",
"Fallen Version Limited Edition",
0,
899.99,
500
);

CALL sp_GestionProducto('E', #Operacion
1,
8,
"Album Twice Cheer Up",
"Fallen Version Limited Edition",
0,
899.98,
500
);