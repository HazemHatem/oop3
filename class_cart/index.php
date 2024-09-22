<?php

require_once "Cart.php";

$cart = new ShoppingCart();
$cart->addItem(1, "منتج 1", 10.00, 2);
$cart->addItem(2, "منتج 2", 15.00, 1);
$cart->displayCart();

$cart->updateQuantity(1, 3);
$cart->removeItem(2);
$cart->displayCart();
