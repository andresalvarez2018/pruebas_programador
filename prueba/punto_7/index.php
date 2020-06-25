<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "P@ss0102";
$bd = "prueba";


$conexion = mysqli_connect($server, $user, $pass,$bd)
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


 $sql = "SELECT 
 appx_employee.lastname AS apellido,
 appx_educationlevel.description
     FROM
         appx_employee
             INNER JOIN
         appx_department ON appx_employee.department_id = appx_department.id
             INNER JOIN
         appx_educationlevel ON appx_educationlevel.id = appx_employee.educationlevel_id
     WHERE
         appx_employee.salary > 300000
     ORDER BY apellido ASC";
     
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$registros = array(); //creamos un array

while($row = mysqli_fetch_array($result))
{
    $apellido=$row['apellido'];
    $description=$row['description'];
    
    $registros[] = array('apellido'=> $apellido,'description'=> $description);

}


$close = mysqli_close($conexion)
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");



header("HTTP/1.1 200 OK");
echo json_encode($registros);


?>


