<?php

require_once('unitils/connection.php');
require_once('./database/connect.php');
function addToShoppingcart()
{

    $conn = dbConnect();

    $product = $conn->prepare("SELECT * FROM products WHERE id = " . $_GET['id']);
    $product->execute();
    $customer = $conn->prepare("SELECT * FROM customers WHERE id = " . $_GET['id']);
    $customer->execute();
}
function getProductsByAccount()
{
    $conn = dbConnect();

    $statement = $conn->query('SELECT * FROM products ');
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $products;
}

function addToCart()
{
    $customerid = $_SESSION['customerid'];
    $productid = $_POST['productid'];
    $conn = dbConnect();

    $stmt = $conn->prepare("INSERT INTO cart (customerid, productid) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $customerid, $productid);
    $stmt->execute();
}
