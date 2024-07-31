<?php
session_start();
require_once 'Product.php';
require_once 'Session.php';
$session = isset($_SESSION['session']) ? unserialize($_SESSION['session']) : new Session();
$cartItems = $session->getCart();
$currentDateTime = new DateTime();
if (!$session->isSessionLive($currentDateTime)) 
{
    unset($_SESSION['session']);
    $cartItems = [];
}
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
<h1>Your Cart</h1>
<ul>
    <?php foreach ($cartItems as $item) { ?>
        <li><?php echo $item->getName() . " - $" . $item->getPrice(); ?></li>
    <?php } ?>
</ul>
<a href="productClassMonik222.php.php">Back to Products</a>
</body>
</html>
