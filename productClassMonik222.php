<?php
session_start();
require_once 'Product.php';
require_once 'Session.php';
$session = isset($_SESSION['session']) ? unserialize($_SESSION['session']) : new Session();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'])) 
{
    $product = new Product($_POST['name'], $_POST['price']);
    $session->addToCart($product);
    $_SESSION['session'] = serialize($session);
}
$products = [
    new Product('Product 1', 100),
    new Product('Product 2', 200),
    new Product('Product 3', 300)
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Products</h1>
<ul>
    <?php foreach ($products as $product) { ?>
        <li>
            <?php echo $product->getName() . " - $" . $product->getPrice(); ?>
            <form method="post">
                <input type="hidden" name="name" value="<?php echo $product->getName(); ?>">
                <input type="hidden" name="price" value="<?php echo $product->getPrice(); ?>">
                <button type="submit" name="product" value="add">Add To Cart</button>
            </form>
        </li>
    <?php } ?>
</ul>
<a href="minikCart.php">Go To Cart</a>
</body>
</html>
