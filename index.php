<?php
require_once 'Coche.php';

$GLOBALS["databaseName"] = "pruebas_tecnicas";
$GLOBALS["usuario"] = 'root';
$GLOBALS["contraseña"] = '';

echo "Hola, mundo!";
echo "<br/>";
echo "<h3>Suma 5 + 3</h3>";

function sumar($val1, $val2): float
{
    return intval($val1) + intval($val2);
}

echo sumar(5, 3);


echo "<br/>";
echo "<h3>Get a usuarios donde edad >= 18</h3>";
function getUsersByAge($edad)
{
    try {
        $dsn = 'mysql:host=localhost;dbname=' . $GLOBALS["databaseName"];

        $conexion = new PDO($dsn, $GLOBALS["usuario"], $GLOBALS["contraseña"]);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "SELECT * FROM usuarios WHERE edad >= $edad";
        $statement = $conexion->prepare($consulta);
        $statement->execute();

        while ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
            print_r($fila);
            echo "<br/>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

getUsersByAge(18);


echo "<br/>";

function getArrayOfNumbers()
{
    $random_numbers = array();

    for ($i = 0; $i < 10; $i++) {
        $random_numbers[] = random_int(1, 100);
    }

    return $random_numbers;
}
$listOfNumbers = getArrayOfNumbers();
echo "<h3>Números pares de la lista ";
echo implode(", ", $listOfNumbers);
echo "</h3>";

function printPairNumbers($listOfNumbers = [])
{
    $pairNumbers = [];
    foreach ($listOfNumbers as $key => $number) {
        if ($number % 2 === 0) {
            $pairNumbers[] = $number;
        }
    }

    echo "Numeros pares de la lista: " . implode(", ", $pairNumbers);
}

printPairNumbers($listOfNumbers);

echo "<h3>¿Cuál es la diferencia entre una variable global y una local</h3>";
echo "<p style=\"
max-width: 650px;
display: flex;
flex-direction: column;
text-align: justify;
\">
<strong>
Variable global:
</strong>
<br />
La variable global es aquella que es definida afuera de cualquier funcion o método  puede ser accedida y modificada desde cualquier parte del script, tiene la caracteristica  de que debe llevar la palabra global o en su defecto estar dentro de \$GLOBALS.
<br />
<strong>
Variable Local:
</strong>
<br />
ES la variable que se encuentra dentro de funciones, loops, segmentos de codigo,  solo pueden ser accedidos desde el interior de la funcion donde fueron creados,  cada llamada al metodo genera una variable distinta, no comparte valor con ejecuciones anteriores.
</p>";


echo "<h3>Abrir archivo datos.txt</h3>";

function openFile($fileName)
{
    $file = fopen($fileName, "r") or die("No se pudo abrir el archivo!");

    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }

    fclose($file);
}

echo "<code>";
openFile("datos.txt");
echo "</code>";

echo "<h3>Actualizar campo nombre </h3>";

function updateUser($userId, $nuevoNombre)
{
    try {
        $dsn = 'mysql:host=localhost;dbname=' . $GLOBALS["databaseName"];

        $conexion = new PDO($dsn, $GLOBALS["usuario"], $GLOBALS["contraseña"]);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "UPDATE productos
SET nombre = $nuevoNombre
WHERE id = $userId";
        echo "consulta resultante: ";
        echo "<strong>";
        echo $consulta;
        echo "</strong>";
        echo "<br/>";
        $statement = $conexion->prepare($consulta);
        $statement->execute();

        while ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
            print_r($fila);
            echo "<br/>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

updateUser(5, "Nuevo Producto");

echo "<h3>Clase tipo \"Coche\"</h3>";

$miCoche = new Coche("Toyota", "Corolla");
$miCoche->mostrarInformacion();
