<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>


	<?php
	session_start();
if(isset($_POST["registro"])){


if(!empty($_POST['duracion_llamada'])) {
	
	$server = "172.30.13.23";
		$user = "user";
		$pass = "password";
		$bd = "practica";
	$conexion = mysqli_connect($server, $user, $pass,$bd) 
			or die("Ha sucedido un error inexperado en la conexion de la base de datos");
			
	$duracion_llamada=$_POST['duracion_llamada'];
		
	$sql="INSERT INTO tiempo_tmo
			(id_usuario, duracion_llamada,fecha_llamada,fecha_hora_llamada) 
			VALUES('".$_SESSION['id']."','$duracion_llamada', now(), now())";

	$result=mysqli_query($conexion,$sql);


	if($result){
	 $message = "Datos almacenados correctamente";
	} else {
	 $message = "Error al ingresar la llamada";
	}

} else {
	 $message = "Todos los campos no deben de estar vacios!";
}
}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
	
<div class="container mregistro">
			<div id="login">
	<h1>Registrar Llamada TMO</h1>
<form name="registroform" id="registroform" action="registro.php" method="post">
	<p>
		<label for="user_login">Duracion Llamada<br />
		<input type="text" name="duracion_llamada" id="duracion_llamada" class="input" size="32" value=""  /></label>
	</p>
	

		<p class="submit">
		<input type="submit" name="registro" id="registro" class="button" value="Registrar" />
	</p>
	<p class="regtext"><a href="index.php" >Regresar</a></p>
	
</form>
	
	</div>
	</div>
	
	
	
	<?php include("includes/footer.php"); ?>