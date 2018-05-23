<div class="popupLogin">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">X</div>
        <h1>Login</h1>
        <p class="logError"></p>
        <form class="formulario pLogin" action="procesarLogin.php" method="POST">
        	<p>Usuario:</p>
        	<input name="user" type="text" placeholder="Introduce nombre de usuario" required>
        	<p>Contraseña:</p>
        	<input name="pass" type="password" placeholder="Introduce la contraseña" required>
        	<button type="submit">Entrar</button>
        	<span class="info">Todavía no tienes cuenta? <a class="reg">Registrate</a></span>
        </form>
    </div>
</div>
<div class="popupReg">
    <span class="helper"></span>
    <div class="regCont">
        <div class="popupCloseButton">X</div>
        <h1>Registro</h1>
        <p class="regError"></p>
        <p id="correoNoValido" hidden> Correo inválido </p>
        <form class="formulario peReg" action="procesarRegistro.php" method="POST">
            <p>Nombre:</p>
            <input type="text" name="nom" placeholder="Introduce nombre" required>
            <p>Apellido:</p>
            <input type="text" name="ape" placeholder="Introduce apellido" required>
            <p>Nombre de Usuario:</p>
            <input type="text" name="userReg" placeholder="Introduce nickname" required>
            <p>Correo electrónico:</p>
            <input type="text" id="mail" name="mail" placeholder="Introduce email" required> 
            <p>Contraseña:</p>
            <input type="password" name="passReg" placeholder="Introduce contraseña" required>
            <p>Repite Contraseña:</p>
            <input type="password" name="passReg2" placeholder="Repite la contraseña" required>
            <button type="submit">Enviar</button>
            <span class="info">Ya tienes cuenta? <a class="login">Login</a></span>
        </form>
    </div>
</div>

<div class="cabecera">
	<div class="logo"><img class="logoImg" src="img/logotipo.png"></div>
	<div class="buscar">
		<form action="procesarBusqueda.php" class="formulario buscNombre" method="POST">
			<input name="buscNom" type="text" placeholder="Busca aquí lo que quieras">
			<button type="submit">Buscar</button>
		</form>
	</div>

	<div id="log">
	<?php
  if (isset($_SESSION["login"]) and $_SESSION["login"]) {
		echo "<p>Bienvenido <a class='perfil' href='perfil.php'>".$_SESSION["nombre"]."</a>. <a href='logout.php'>Logout</a></p>";
        ?>
        <?php
        
	}
	else {
  ?>
		<button class="login">Login</button>
		<button class="reg">Registro</button>
	<?php
  }
  ?>
	</div>
</div>
