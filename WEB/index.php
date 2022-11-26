<?php
session_start(); // Inicio mi sesion PHP

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>JYP Shop | AlexCG Design Modified By Ricardo Grimaldo</title>
	<link rel="shortcut icon" href="img\jyp-logo.jpg">
	<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="css/estilos.css">
	<script src="js/jquery-3.6.0.js"></script>
	<script src="js/index.js"></script>
	<script src="js/userMainScript.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<header class="hero" id="home">
		<div class="textos-hero">
			<h1>JYP Shop</h1>
			<p>Kpop a tu alcance</p>
			<a href="" data-bs-toggle="modal" data-bs-target="#miModalLogin">Entrar al website</a>
		</div>
		<div class="svg-hero" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
				<path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
			</svg></div>
	</header>


	<section class="wave-contenedor website">
		<img src="img/JYP4thGenGroups.jpg" alt="">
		<div class="contenedor-textos-main">
			<h2 class="titulo left">Descubre el encanto</h2>
			<p class="parrafo">¿Estas listo para conocer a los mejores artistas?</p>
			<a href="" class="cta">Aprender más</a>
		</div>
	</section>

	<section class="info">
		<div class="contenedor">
			<h2 class="titulo left">JYP Lider en entretenimiento</h2>
			<p>En JYP nos comprometemos a ofrecer el mejor entretenimiento y servicio a nuestros clientes, asi como la
				mejor experiencia para nuestros usuarios. </p>
		</div>
	</section>

	<section class="cards contenedor">
		<h2 class="titulo">En esta página encontraras</h2>
		<div class="content-cards">
			<article class="card">
				<i class="bi bi-journal-album"></i>
				<h3>Álbums</h3>
				<p>Encontraras los álbumes de tus artistas y grupos favoritos</p>
				<a href="" class="cta">Ver más</a>
			</article>
			<article class="card">
				<i class="bi bi-person-badge"></i>
				<h3>Photocards</h3>
				<p>Aqui podras cotizar y comprar todas tus PC's favoritas.</p>
				<a href="" class="cta">Ver más</a>
			</article>
			<article class="card">
				<i class="bi bi-bag"></i>
				<h3>Merchandise general</h3>
				<p>Encontraras multiple variedad de artículos sobre Kpop.</p>
				<a href="" class="cta">Ver más</a>
			</article>
		</div>
	</section>

	<section class="galeria">
		<div class="contenedor">
			<h2 class="titulo">Nuestros artistas</h2>
			<article class="galeria-cont">
				<img src="img/artista1.jpg" alt="">
				<img src="img/artista2.jpg" alt="">
				<img src="img/artista3.png" alt="">
				<img src="img/artista5.jpg" alt="">
				<img src="img/artista6.jpg" alt="">
				<img src="img/artista7.jpg" alt="">
				<img src="img/artista8.jpg" alt="">
				<img src="img/artista9.jpg" alt="">
				<img src="img/artista10.jpg" alt="">
				<img src="img/artista11.jpg" alt="">
				<img src="img/artista12.jpg" alt="">
			</article>
		</div>
	</section>

	<section class="info-last">

		<div class="contenedor last-section">
			<div class="contenedor-textos-main">
				<h2 class="titulo left">JYP Shop</h2>
				<p class="parrafo">JYP Shop es la tienda en linea que te brinda los mejores productos de todos tus
					artistas favoritos, JYP shop no tiene exclusividad con solo artistas pertenecientes a la empresa,
					hemos firmado un acuerdo con empresas afines para brindar mas variedad de productos a nuestros
					clientes.</p>
				<a href="" class="cta">Leer Más</a>
			</div>
			<img src="img/ilustracion.svg" alt="">
		</div>

		<div class="svg-wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
				<path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #4282ca;"></path>
			</svg></div>
	</section>

	<footer id="contacto">
		<div class="contenedor">
			<a class="titulo" href="#home" id="ReturnHome">
				<h2>Regresar</h2>
			</a>

		</div>
	</footer>


	<!--  >MODAL WINDOW LOGIN<-->
	<div class="modal fade" id="miModalLogin" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="modalTitle">Inicia sesión</h4>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="php/user_API.php">
					<div class="separador"></div>
					<div class="row modalTexto">
						Nombre de usuario o correo
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
						<input type="text" class="form-control" id="username" name="username" placeholder="Usuario o Correo" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div class="separador"></div>
					<div class="row modalTexto">
						Contraseña
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
						<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" aria-label="password" aria-describedby="basic-addon1">
					</div>
					<div class="row">
						<a href="miModal" data-bs-toggle="modal" data-bs-target="#miModal" data-bs-dismiss="modal">¿Aún
							no tienes una cuenta? Registrate Aquí</a>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" id="ButtonLogIn">Iniciar Sesión</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

				</div>
				</form>
			</div>
		</div>

	</div>
	<!--  >MODAL WINDOW REGISTER<-->
	<div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="modalTitle">Regístrate</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">

					<div class="row">
						<div class="col-12">
							<h5>Ingresa los siguientes datos:</h5>
						</div>
					</div>
					<form method="POST">
						<div class="row modalTexto">
							Correo Electrónico
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">@</span>
							<input type="text" class="form-control" id="email" name="email" placeholder="Correo Electrónico" aria-label="Username" aria-describedby="basic-addon1">
						</div>


						<div class="row modalTexto">
							Nombre(s)
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="bi bi-file-person"></i></span>
							<input type="text" class="form-control" id="names" name="names" placeholder="Nombre(s)" aria-label="Username" aria-describedby="basic-addon1">
						</div>


						<div class="row modalTexto">
							Apellido Paterno
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"> <i class="bi bi-file-person-fill"></i></span>
							<input type="text" class="form-control" id="lastNameP" name="lastNameP" placeholder="Apellido Paterno" aria-label="Username" aria-describedby="basic-addon1">
						</div>

						<div class="row modalTexto">
							Apellido Materno
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"> <i class="bi bi-file-person-fill"></i></span>
							<input type="text" class="form-control" id="lastNameM" name="lastNameM" placeholder="Apellido Materno" aria-label="Username" aria-describedby="basic-addon1">
						</div>

						<div class="row modalTexto">
							Nombre de usuario
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"> <i class="bi bi-person"></i></span>
							<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario" aria-label="Username" aria-describedby="basic-addon1">
						</div>

						<div class="row modalTexto">
							Contraseña
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"> <i class="bi bi-key"></i></span>
							<input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<p style="font-size: small;">La contraseña debe de incluir 8 caracteres al menos, y debe incluir
							una mayúscula, un carácter especial, y un número al menos.
						<p>

						<div class="row modalTexto">
							Confirmar Contraseña
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"> <i class="bi bi-key"></i></span>
							<input type="password" class="form-control" id="confirmar_contrasenia" name="confirmar_contrasenia" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
						</div>

						<div class="row modalTexto">
							Fecha de nacimiento
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"> <i class="bi bi-calendar"></i></span>
							<input type="date" class="form-control" id="Birthday" name="Birthday" placeholder="Fecha de nacimiento" aria-label="Fecha de nacimiento" aria-describedby="basic-addon1">
						</div>

						<div class="row modalTexto">
							Sexo:
						</div>
						<div class="input-group mb-3">
							<div class="dropdown input-group-text" id="basic-addon1">
								<button class="btn dropdown-toggle text-black-50" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
									Selecciona aquí:
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a href=" " class="dropdown-item SexoUsuario">Hombre</a></li>
									<li><a href=" " class="dropdown-item SexoUsuario">Mujer</a></li>
									<li><a href=" " class="dropdown-item SexoUsuario">Otro</a></li>
								</ul>
							</div>
							<input type="text" class="form-control" name="gender-user" id="gender-user" placeholder="Sexo" aria-label="Sexo" aria-describedby="basic-addon1">
						</div>

						<div class="row modalTexto">
							Foto de perfil
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"> <i class="bi bi-camera"> </i></span>
							<input type="file" onchange="vista_preliminar2(event)" class="form-control" id="userIMG" name="userIMG" placeholder="Foto de perfil" aria-label="Username" aria-describedby="basic-addon1">


						</div>
						<div class="d-flex justify-content-center"><img src="" alt="" id="img-foto2" width="250px" height="250px"></div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-bs-dismiss="modal" id="ButtonRegistro">Registrar comprador</button>
					<button type="button" class="btn btn-success" data-bs-dismiss="modal" id="ButtonRegistroVendedor">Registrar vendedor</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
				</div>
				</form>
			</div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>