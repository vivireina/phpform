<?php
session_start();
?>

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<?php

if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: intropage.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$server = "172.30.13.23";
        $user = "user";
        $pass = "password";
        $bd = "practica";
        	
		$conexion = mysqli_connect($server, $user, $pass,$bd) 
			or die("Ha sucedido un error inexperado en la conexion de la base de datos");
	//echo "CONEXION".$conexion;
    $username=$_POST['username'];
    $password=$_POST['password'];
	$sql = "SELECT * FROM usuarios WHERE usuario='".$username."' AND password='".$password."'";
	
    $result =mysqli_query($conexion,$sql);

    $numrows=mysqli_num_rows($result);
    if($numrows!=0)

    {
    while($row=mysqli_fetch_assoc($result))
    {
    $dbusername=$row['usuario'];
    $dbpassword=$row['password'];
    $id=$row['id'];
    }

    if($username == $dbusername && $password == $dbpassword)

    {


    $_SESSION['session_username']=$username;
    $_SESSION['id']=$id;

    /* Redirect browser */
    header("Location: intropage.php");
    }
    } else {

 $message =  "Nombre de usuario ó contraseña invalida!";
    }

} else {
    $message = "Todos los campos son requeridos!";
}
}
?>




    <div class="container mlogin">
            <div id="login">
    <h1>Inicio Sesion</h1>
<form name="loginform" id="loginform" action="" method="POST">
    <p>
        <label for="user_login">Nombre De Usuario<br />
        <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
    </p>
    <p>
        <label for="user_pass">Contraseña<br />
        <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
    </p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Entrar" />
    </p>
        <p class="regtext">No estas registrado? <a href="register.php" >Registrate Aquí</a>!</p>
</form>

    </div>

    </div>
	
	<?php include("includes/footer.php"); ?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	