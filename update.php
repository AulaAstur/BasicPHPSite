<?php
include("datosconex.php");
$id=$_POST['id'];
$name=$_POST['name'];
$location=$_POST['location'];
$phone=$_POST['phone'];
$mysqli= new mysqli($host,$user,$pass,$db);
if ($mysqli->connect_errno){
	printf ("Error de conexion:%s\n",mysqli_connect_error());
exit();
}
$stmt =$mysqli->prepare("UPDATE department SET name=?,location=?,phone=? WHERE id=?");
$stmt->bind_param("ssii",$name,$location,$phone,$id);
$stmt ->execute();
if($stmt->affected_rows>0){
		echo "Operación realizada correctamente: han sido modificados del departamento:".$id."\n";
	}
	else{
		echo "No hay departamentos con ese ID, o no se ha modificado ningún dato.";
	}
	$stmt->close();
?>
