<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>


	<?php

if(isset($_POST["register"])){


if(!empty($_POST['usuario']) && !empty($_POST['nombre_usuario']) && !empty($_POST['password'])) {
	
	$server = "172.30.13.23";
		$user = "user";
		$pass = "password";
		$bd = "practica";
	$conexion = mysqli_connect($server, $user, $pass,$bd) 
			or die("Ha sucedido un error inexperado en la conexion de la base de datos");
			
	$usuario=$_POST['usuario'];
	$nombre_usuario=$_POST['nombre_usuario'];
	$password=$_POST['password'];
		
	$sql="SELECT * FROM usuarios WHERE usuario='".$usuario."'";
	$result = mysqli_query($conexion,$sql);
	$numrows=mysqli_num_rows($result);
	
	if($numrows==0)
	{
	$sql="INSERT INTO usuarios
			(usuario, nombre_usuario,password,fecha_creacion) 
			VALUES('$usuario','$nombre_usuario', '$password', now())";

	$result=mysqli_query($conexion,$sql);


	if($result){
	 $message = "Cuenta Correctamente Creada";
	} else {
	 $message = "Error al ingresar datos de la informacion!";
	}

	} else {
	 $message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
	}

} else {
	 $message = "Todos los campos no deben de estar vacios!";
}
}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
	
<div class="container mregister">
			<div id="login">
	<h1>Registrar</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
	<p>
		<label for="user_login">Usuario<br />
		<input type="text" name="usuario" id="usuario" class="input" size="32" value=""  /></label>
	</p>
	
	
	<p>
		<label for="user_pass">Nombre Completo<br />
		<input type="text" name="nombre_usuario" id="nombre_usuario" class="input" value="" size="32" /></label>
	</p>
	
	<p>
		<label for="user_pass">Password<br />
		<input type="password" name="password" id="password" class="input" value="" size="20" /></label>
	</p>
	

		<p class="submit">
		<input type="submit" name="register" id="register" class="button" value="Registrar" />
	</p>
	
	<p class="regtext">Ya tienes una cuenta? <a href="index.php" >Entra Aquí!</a>!</p>
</form>
	
	</div>
	</div>
	
	
	
	<?php include("includes/footer.php"); ?>