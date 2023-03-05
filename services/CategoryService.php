<?php
include("configs/DBConnection.php");
include("models/Category.php");
class CategoryService
{
    public function getCategorys()
    {
        $dbConn = new DbConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * 
            FROM theloai";
        try {
            $stmt = $conn->query($sql);
            $categorys = [];
            while ($row = $stmt->fetch()) {
                $category = new Category($row['ma_tloai'], $row['ten_tloai']);
                array_push($categorys, $category);
            }
            return $categorys;
        } catch (PDOException $e) {
            // Handle the exception here, e.g. log the error message
            return false;
        }
    }

    public function getCategoryById()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM theloai WHERE ma_tloai =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_GET['id']);
        $stmt->execute();

        $row = $stmt->fetch();
        if ($row) {
            $category = new Category($row['ma_tloai'], $row['ten_tloai']);
            return $category;
        }
    }
    public function addCategory()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if (isset($_POST['ten_tloai'])) {
            $ten_tloai = $_POST['ten_tloai'];
        } else {
            return false;
        }

        $sql = "INSERT INTO theloai ( ten_tloai) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $ten_tloai);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCategory()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "UPDATE theloai SET ten_tloai =?WHERE ma_tloai =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_POST['ten_tloai']);
        $stmt->bindParam(2, $_POST['ma_tloai']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteCategory()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            return false;
        }

        $sql = "DELETE FROM theloai WHERE ma_tloai = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
