<?php
session_start(); // Iniciar la sesión para poder usar variables de sesión

// Inicializar el array
$_SESSION['numeros'] = array(10, 20, 30); // Array inicial con 3 valores numéricos

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el índice y el nuevo valor del formulario
    if (isset($_POST["indice"]) && isset($_POST["nuevo_valor"])) {
        $indice = $_POST["indice"]; // Índice del array a modificar
        $nuevo_valor = $_POST["nuevo_valor"]; // Nuevo valor para el índice especificado

        // Modificar el valor en la posición especificada
        if (isset($_SESSION['numeros'][$indice])) {
            $_SESSION['numeros'][$indice] = $nuevo_valor; // Actualizar el valor en el array
        }
    }
}

// Calcular el valor medio si se ha solicitado
$valor_medio = null;
if (isset($_POST["calcular_media"])) {
    $valor_medio = array_sum($_SESSION['numeros']) / count($_SESSION['numeros']); // Calcular el valor medio del array
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Modificar Array</title>
</head>

<body>
    <h2>Modificar Valor del Array</h2>
    <!-- Formulario para modificar un valor del array -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="indice">Índice:</label>
        <input type="number" id="indice" name="indice" min="0" max="2" required>
        <br><br>
        <label for="nuevo_valor">Nuevo Valor:</label>
        <input type="number" id="nuevo_valor" name="nuevo_valor" required>
        <br><br>
        <input type="submit" value="Modificar">
    </form>

    <!-- Formulario para calcular el valor medio del array -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="calcular_media" value="1">
        <input type="submit" value="Calcular Valor Medio">
    </form>

    <h3>Array Actualizado:</h3>
    <pre><?php print_r($_SESSION['numeros']); // Mostrar el array actualizado ?></pre>

    <?php if ($valor_medio !== null): ?>
        <h3>Valor Medio:</h3>
        <p><?php echo $valor_medio; // Mostrar el valor medio calculado ?></p>
    <?php endif; ?>
</body>

</html>