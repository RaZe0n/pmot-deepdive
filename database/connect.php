<?php

function dbConnect()
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=deepdive", "bit_academy", "bit_academy");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}
