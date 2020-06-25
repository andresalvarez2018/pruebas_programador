<?php

    $mysql = new mysqli("localhost", "root", "", "prueba");
        if ($mysql->connect_error)
            die("Problemas con la conexión a la base de datos");

    $mysql->set_charset("utf8");
    
    $registros = $mysql->query("SELECT 
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
        ORDER BY apellido ASC") or
                die($mysql->error);      

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto 5</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">        
        <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Apellido</th>
                <th scope="col">Nivel Educación</th>           
            </tr>
        </thead>
        <tbody>
        <?php
            while ($reg = $registros->fetch_array()) {  
        ?>
            <tr>
                <td><?php echo $reg['apellido']; ?></td>
                <td><?php echo $reg['description']; ?></td>                
            </tr>
        <?php
          }
        ?>           
        </tbody>
        </table>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>