<?php
include("configs/DBConnection.php");
include("models/Author.php");
class AuthorService
{

    public function getAllAuthors()
    {
        $dbConn = new DbConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * 
            FROM tacgia";
        $stmt = $conn->query($sql);

        $authors = [];
        while ($row = $stmt->fetch()) {
            $author = new Author($row['ma_tgia'], $row['ten_tgia']);
            array_push($authors, $author);
        }
        return $authors;
    }

    public function getMaTgia($ma_tgia)
    {
        $dbConn = new DbConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * 
                FROM tacgia
                Where ma_tgia = '" . $ma_tgia . "'";
        $stmt = $conn->query($sql);
        $edit_authors = [];
        while ($row = $stmt->fetch()) {
            $edit_author = new Author($row['ma_tgia'], $row['ten_tgia']);
            array_push($edit_authors, $edit_author);
        }
        return $edit_authors;
    }

    public function add_author($ten_tgia)
    {
        $dbConn = new DbConnection();
        $conn = $dbConn->getConnection();
    }
    public function update_author($ma_tgia, $ten_tgia)
    {
        $dbConn = new DbConnection();
        $conn = $dbConn->getConnection();


        $sql = "Update tacgia SET `ten_tgia` = '$ten_tgia' WHERE `ma_tgia` = '$ma_tgia'";
        $stmt = $conn->query($sql);

        $sql = "SELECT * From tacgia ";
        $stmt = $conn->query($sql);
        $update_authors = [];
        while ($row = $stmt->fetch()) {
            $update_author = new Author($row['ma_tgia'], $row['ten_tgia']);
            array_push($update_authors, $update_author);
        }
        return $update_authors;
    }
}
