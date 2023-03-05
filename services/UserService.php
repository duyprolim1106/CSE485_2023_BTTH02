<?php
require_once("configs/DBConnection.php");
include("models/User.php");

class UserService
{
    public function getUsers()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM users";
        try {
            $stmt = $conn->query($sql);
            $users = [];
            while ($row = $stmt->fetch()) {
                $user = new Users($row['id_ngdung'], $row['tai_khoan'], $row['mat_khau'], $row['quyen_han']);
                array_push($users, $user);
            }
            return $users;
        } catch (PDOException $e) {
            // Handle the exception here, e.g. log the error message
            return false;
        }
    }


    public function getUserById()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM users WHERE id_ngdung =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_GET['id']);
        $stmt->execute();

        $row = $stmt->fetch();
        if ($row) {
            $user = new Users($row['id_ngdung'], $row['tai_khoan'], $row['mat_khau'], $row['quyen_han']);
            return $user;
        }
    }

    public function updateUser()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "UPDATE users SET tai_khoan =?, mat_khau =?, quyen_han =? WHERE id_ngdung =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_POST['tai_khoan']);
        $stmt->bindParam(2, $_POST['mat_khau']);
        $stmt->bindParam(3, $_POST['quyen_han']);
        $stmt->bindParam(4, $_POST['id_ngdung']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            return false;
        }

        $sql = "DELETE FROM users WHERE id_ngdung = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function addUser()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if (isset($_POST['tai_khoan']) && isset($_POST['mat_khau']) && isset($_POST['quyen_han'])) {
            $tai_khoan = $_POST['tai_khoan'];
            $mat_khau = $_POST['mat_khau'];
            $quyen_han = $_POST['quyen_han'];
        } else {
            return false;
        }

        $sql = "INSERT INTO users (tai_khoan, mat_khau, quyen_han) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $tai_khoan);
        $stmt->bindParam(2, $mat_khau);
        $stmt->bindParam(3, $quyen_han);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
