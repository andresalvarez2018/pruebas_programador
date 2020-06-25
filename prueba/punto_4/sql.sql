SELECT 
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
ORDER BY apellido ASC;