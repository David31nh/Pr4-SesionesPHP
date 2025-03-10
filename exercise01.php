<?php // to process the form
session_start();

if (isset($_SESSION['softdrink'])) {
    $_SESSION['softdrink'] = 0;
}
if (isset($_SESSION['milk'])) {
    $_SESSION['milk'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $worker = $_POST['worker'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    $_SESSION["worker"] = $worker;

    if (isset($_POST["add"])) {
        switch ($product) {
            case 'milk':
                $_SESSION['milk'] += $quantity;
                break;
            case 'softdrink':
                $_SESSION['softdrink'] += $quantity;
                break;
            default:
                echo "No se ha encontrado el producto";
        }

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 01</title>
</head>

<!-- to interact with user -->
<!DOCTYPE html>


<body>
    <h1>Exercise 01</h1>
    <h1>Supermarket Management:</h1>
    <form action="" method="Post">

        <label for="">Worker name:</label>
        <input type="name" name="worker">

        <h2>Choose product</h2>
        <select name="product" id="">
            <option value="softdrink">Soft Drink</option>
            <option value="milk">Milks</option>
        </select>

        <h2>Product quantity</h2>
        <input type="number" id="quantity" name="quantity" min="1"><br><br>

        <input type="submit" value="add" name="add">
        <input type="submit" value="remove" name="remove">
        <input type="reset" value="reset">
    </form>

    <h2>Inventary:</h2>
    <p>Worker: <?php echo isset($worker) ? $worker : ''; ?></p>
    <p>Units milk: <?php echo isset($_SESSION['milk']) ? $_SESSION['milk'] : ''; ?></p>
    <p>Unit softdrink: <?php echo isset($_SESSION['softdrink']) ? $_SESSION['softdrink'] : ''; ?></p>
</body>

</html>