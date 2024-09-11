<?php


// Producten ophalen, zodat een overzicht getoond kan worden

class adminController {
    private $db;

    public function __construct() {
        require_once('./unitils/connection.php');
        $this->db = $db;
    }

    public function getProducts() {
        $query = "SELECT id,name,description,price,stock,imageURL,category FROM products";
        try {
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            throw new PDOException('Er is iets fout gegaan bij het uitvoeren van de database query', 0, $e);
        }
        exit;
    }

    public function getOrders() {
        $query = "SELECT orderOwner, status, orderDate, totalPrice FROM orders";
        try {
            $statement = $this->db->prepare($query);
            $statement->execute();
            $data = $statement->fetchAll();

            foreach ($data as $key => $value) {
                $query2 = "SELECT firstname,lastname FROM customers Where id = :id";
                $statement2 = $this->db->prepare($query2);
                $statement2->bindParam(':id', $value['orderOwner']);
                $statement2->execute();
                $name = $statement2->fetch();
                if ($name) {
                    $data[$key]['orderOwner'] = $name['firstname'] . ' ' . $name['lastname'];
                } else {
                    $data[$key]['orderOwner'] = 'Onbekend';
                }
            }
            return $data;
        } catch (PDOException $e) {
            throw new PDOException('Er is iets fout gegaan bij het uitvoeren van de database query', 0, $e);
        }
        exit;
    }
    public function getGebruikers() {
        $query = "SELECT firstname,lastname,email,country FROM customers";
        try {
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();

        } catch (PDOException $e) {
            throw new PDOException('Er is iets fout gegaan bij het uitvoeren van de database query', 0, $e);
        }
        exit;
    }
    public function deleteProduct() {
        $query = "DELETE FROM products WHERE id = :id";
        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':id', $_POST['id']);
            $statement->execute();
        } catch (PDOException $e) {
            throw new PDOException('Er is iets fout gegaan bij het uitvoeren van de database query', 0, $e);
        }
        header('Location: /?page=admin');
    }
}