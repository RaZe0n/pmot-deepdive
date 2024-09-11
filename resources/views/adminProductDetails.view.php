<?php
$hideNav = true;

if (!isAdmin()) {
    header("Location: /");
}

require_once "./controllers/adminController.php";
$adminController = new AdminController();
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
        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
            Back
        </button>
    </div>
    <div class="w-1/2 mx-auto flex flex-col shadow-lg rounded-lg px-10 py-10 mt-4 bg-white">
               <div class="space-y-4">
            <div class="flex flex-col md:flex-row items-center justify-between p-4 bg-white shadow-md rounded-lg">
                <label class="font-semibold text-lg text-gray-800 md:w-1/3">Label 1:</label>
                <span class="text-gray-600 md:w-2/3">Text for label 1 goes here</span>
            </div>
        
            <div class="flex flex-col md:flex-row items-center justify-between p-4 bg-white shadow-md rounded-lg">
                <label class="font-semibold text-lg text-gray-800 md:w-1/3">Label 2:</label>
                <span class="text-gray-600 md:w-2/3">Text for label 2 goes here</span>
            </div>
        
            <div class="flex flex-col md:flex-row items-center justify-between p-4 bg-white shadow-md rounded-lg">
                <label class="font-semibold text-lg text-gray-800 md:w-1/3">Label 3:</label>
                <span class="text-gray-600 md:w-2/3">Text for label 3 goes here</span>
            </div>
        </div>
    </div>
</body>

</html>