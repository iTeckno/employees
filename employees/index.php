<?php
$amountOfEmployees = 2;
$formTitles = [
  0 => 'Primer Empleado',
  1 => 'Segundo Empleado',
  2 => 'Tercer Empleado'
];
$formNames = [
  0 => 'firstEmployee[]',
  1 => 'secondEmployee[]',
  2 => 'thirdEmployee[]'
];

$employeesList = [
  0 => 'firstEmployee',
  1 => 'secondEmployee',
  2 => 'thirdEmployee'
];
$employees = array();
$wasSubmitted = $_POST['submit'];

for ($employeeIndex = 0; $employeeIndex <= $amountOfEmployees; $employeeIndex++) {
  $employees[$employeesList[$employeeIndex]] = array(
    'name' => (string) $_POST[$employeesList[$employeeIndex]][0],
    'age' => (int) $_POST[$employeesList[$employeeIndex]][1],
    'id' => (string) $_POST[$employeesList[$employeeIndex]][2],
    'salary' => (int) $_POST[$employeesList[$employeeIndex]][3],
    'department' => (string) $_POST[$employeesList[$employeeIndex]][4],
    'workplace' => (string) $_POST[$employeesList[$employeeIndex]][5],
  );
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Empleados</title>
</head>

<body>
  <main>
    <div>
      <?php if (!isset($wasSubmitted)) : ?>
        <h2>
          Página que permite subir la información de <strong>tres</strong> empleados
        </h2>
        <form method='POST' action=<?php echo $_SERVER['PHP_SELF']; ?>>
          <div>
            <?php
            for ($index = 0; $index <= $amountOfEmployees; $index++) {
              echo "<p class='tracking-wider my-3'>$formTitles[$index]</p>";
              echo "<input name='$formNames[$index]'  placeholder='Ingrese el nombre' type='text' required/>";
              echo "<input name='$formNames[$index]'  placeholder='Ingrese la edad' type='number' required/>";
              echo "<input name='$formNames[$index]'  placeholder='Ingrese la cédula' type='number' required/>";
              echo "<input name='$formNames[$index]'  placeholder='Ingrese el salario' type='number' required/>";
              echo "<input name='$formNames[$index]'  placeholder='Ingrese el departamento' type='text' required/>";
              echo "<input name='$formNames[$index]'  placeholder='Ingrese el área de trabajo' type='text' required/>";
            }
            ?>
          </div>
          <button type='submit' name='submit'>Enviar</button>
        </form>
      <?php else : ?>
        <h2>
          Información de los <strong>empleados</strong>
        </h2>
        <pre><?php echo print_r($employees, true); ?></pre>
      <?php endif; ?>

      <p>Nombre - Cedula - N1013</p>

    </div>
  </main>
</body>

</html>