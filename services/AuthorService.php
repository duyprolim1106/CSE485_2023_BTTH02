<?php
include("models/Author.php");
class AuthorService
{
    public function getAuthors()
    {
        $dbConn = new DbConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * 
            FROM tacgia";
        try {
            $stmt = $conn->query($sql);
            $authors = [];
            while ($row = $stmt->fetch()) {
                $author = new Author($row['ma_tgia'], $row['ten_tgia']);
                array_push($authors, $author);
            }
            return $authors;
        } catch (PDOException $e) {
            // Handle the exception here, e.g. log the error message
            return false;
        }
    }

    public function getAuthorById()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM tacgia WHERE ma_tgia =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_GET['id']);
        $stmt->execute();

        $row = $stmt->fetch();
        if ($row) {
            $author = new Author($row['ma_tgia'], $row['ten_tgia']);
            return $author;
        }
        $dbConn->closeConnection();
    }
    public function addAuthor()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if (isset($_POST['ten_tgia'])) {
            $ten_tgia = $_POST['ten_tgia'];
        } else {
            return false;
        }

        $sql = "INSERT INTO tacgia ( ten_tgia) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $ten_tgia);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateAuthor()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "UPDATE tacgia SET ten_tgia =?WHERE ma_tgia =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_POST['ten_tgia']);
        $stmt->bindParam(2, $_POST['ma_tgia']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteAuthor()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            return false;
        }

        $sql = "DELETE FROM tacgia WHERE ma_tgia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
