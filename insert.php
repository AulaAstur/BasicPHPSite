<?php
include("datosconex.php");
$id=$_POST['id'];
$name=$_POST['name'];
$location=$_POST['location'];
$phone=$_POST['phone'];
$mysqli= new mysqli($host,$user,$pass,$db);
if ($mysqli->connect_errno){
	printf("Error de conexion:%s\n",mysqli_connect_error());
exit();
}
$stmt =$mysqli->prepare("INSERT INTO department(id,name,location,phone) VALUES (?,?,?,?)");
$stmt->bind_param("issi",$id,$name,$location,$phone);
$stmt ->execute();
if($stmt->affected_rows>0){
		echo "Operación realizada correctamente: Los datos han sido insertados.";
	}
	else{
		echo "Has introducido un dato de manera errónea";
	}
	$stmt->close();
?>
