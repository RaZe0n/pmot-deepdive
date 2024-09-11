<?php
$hideNav = true;

if (!isAdmin()) {
    header("Location: /");
}

require_once "./controllers/adminController.php";
$adminController = new AdminController();
$product = $_SERVER['REQUEST_METHOD'] === 'GET' ? $adminController->getProduct() : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beheerderspaneel: Product details</title>
</head>

<body class="bg-gray-100">
    <div class="w-1/2 mx-auto flex justify-between items-center mt-20">
        <a class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400" href="/?page=admin">
            Back
        </a>
    </div>
    <div class="w-1/2 mx-auto flex flex-col shadow-lg rounded-lg px-10 py-10 mt-4 bg-white">
        <div class="space-y-4">
            <div class="flex flex-col md:flex-row items-center justify-between p-4 bg-white shadow-md rounded-lg">
                <label class="font-semibold text-lg text-gray-800 md:w-1/3">Name</label>
                <span class="text-gray-600 md:w-2/3"><?php echo $product['name'] ?></span>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between p-4 bg-white shadow-md rounded-lg">
                <label class="font-semibold text-lg text-gray-800 md:w-1/3">Description</label>
                <span class="text-gray-600 md:w-2/3"><?php echo $product['description'] ?></span>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between p-4 bg-white shadow-md rounded-lg">
                <label class="font-semibold text-lg text-gray-800 md:w-1/3">Price</label>
                <span class="text-gray-600 md:w-2/3">€<?php echo $product['price'] ?></span>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between p-4 bg-white shadow-md rounded-lg">
                <label class="font-semibold text-lg text-gray-800 md:w-1/3">Stock</label>
                <span class="text-gray-600 md:w-2/3"><?php echo $product['stock'] ?></span>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between p-4 bg-white shadow-md rounded-lg">
                <label class="font-semibold text-lg text-gray-800 md:w-1/3">ImageURL</label>
                <span class="text-gray-600 md:w-2/3"><?php echo $product['imageURL'] ?></span>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between p-4 bg-white shadow-md rounded-lg">
                <label class="font-semibold text-lg text-gray-800 md:w-1/3">Category</label>
                <span class="text-gray-600 md:w-2/3"><?php echo $product['category'] ?></span>
            </div>
        </div>
    </div>
</body>

</html>