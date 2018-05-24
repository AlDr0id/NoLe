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
        <p class="regError" id="general"></p>
        <form class="formulario peReg" action="procesarRegistro.php" method="POST">
            <p>Nombre:</p>
            <input type="text" name="nom" placeholder="Introduce nombre" required>
            <p>Apellido:</p>
            <input type="text" name="ape" placeholder="Introduce apellido" required>
            <p>Nombre de Usuario:</p>
            <input type="text" name="userReg" placeholder="Introduce nickname" required>
            <p>Correo electrónico:</p> <p class="regError" id="errMail">(Introduzca un correo válido)</p>
            <input type="text" id="mail" name="mail" placeholder="Introduce email" required>
            <p>Contraseña:</p>
            <input type="password" id="passReg" name="passReg" placeholder="Introduce contraseña" required>
            <p>Repite Contraseña:</p> <p class="regError" id="errPass">(Las contraseñas no coinciden)</p>
            <input type="password" id="passReg2" name="passReg2" placeholder="Repite la contraseña" required>
            <button type="submit" id="regSubmit">Enviar</button>
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
  if (isset($_SESSION["login"]) and $_SESSION["login"]) 
        {
        require_once('include/UsuarioSA.php');
        $sa = new UsuarioSA();
        $tra = new usuarioTransfer($_SESSION["nombre"],"","","","",0,0,"");

        $user = $sa->mostrarUsuario($tra);
        echo '<script>console.log("'.$user->getNickname().'")</script>';
        $nombre = $user->getNombre();
        $apellido = $user->getApellido();
        $nickname = $_SESSION["nombre"];?>

        <a href="perfil.php?opt=verProdPuja" class="opts">Mis Productos</a>
        <a href="perfil.php?opt=verProdSolic" class="opts">Mis Solicitudes</a>
        <div class="dropdown">
        <button class="dropbtn"><i class='fa fa-user'></i> <?php echo $nickname; ?></i></button>
        <div class="dropdown-content">
            <a href="perfil.php">
                <div class="perfilCabe">
                    <div><img onerror='this.src="img/error/no-image.png"' class='imgPerfil' src=<?php echo "'img/".$nickname.".png'"; ?>></div>
                    <div><p><?php echo $nombre.' '.$apellido; ?></p><p><?php echo $nickname; ?></p></div>
                </div>
            </a>
            <!--<a href="perfil.php?opt=actividadReciente">Historial</a>-->
            <a href="perfil.php?opt=verProds">Inventario</a>
            <a href="perfil.php?opt=verPujas">Mis Pujas</a>
            <a href="perfil.php?opt=anadProd"><i class="fa fa-plus" aria-hidden="true"></i>Añadir Producto</a>
            <a href="perfil.php?opt=solicitarProd"><i class="fa fa-eye" aria-hidden="true"></i>Solicitar Producto</a>
            <a href='logout.php' class="logout"><i class="fa fa-sign-out"></i>Cerrar sesión</a>
            </div>
        </div>
        
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
