<?php
include("models/Article.php");
class ArticleService
{
    public function getAllArticles()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM baiviet";
        $stmt = $conn->query($sql);

        $articles = [];
        while ($row = $stmt->fetch()) {
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($articles, $article);
        }
        
        return $articles;
        $dbConn->closeConnection();
    }

    public function getDetailArticle()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT *
        FROM baiviet
        INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
        INNER JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai";
        $stmt = $conn->query($sql);

        $detailArticles = [];
        while ($row = $stmt->fetch()) {
            $detailArticle = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($detailArticles, $detailArticle);
        }

        return $detailArticles;
    }
    
    public function getArticleById()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if (isset($_GET['id'])) {
            $ma_bviet = $_GET['id'];
        }

        $sql = "SELECT *
        FROM baiviet
        where ma_bviet = $ma_bviet";
        $stmt = $conn->query($sql);

        $row = $stmt->fetch();
        if ($row) {
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            return $article;
        }
    }
    
    public function updateArticle()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "UPDATE baiviet SET tieude = ?, ten_bhat = ?, ma_tloai = ? , tomtat = ?,
        noidung = ? , ma_tgia = ? , ngayviet = ? , hinhanh = ?
   WHERE ma_bviet = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_POST['tieude']);
        $stmt->bindParam(2, $_POST['ten_bhat']);
        $stmt->bindParam(3, $_POST['ma_tloai']);
        $stmt->bindParam(4, $_POST['tomtat']);
        $stmt->bindParam(5, $_POST['noidung']);
        $stmt->bindParam(6, $_POST['ma_tgia']);
        $stmt->bindParam(7, $_POST['ngayviet']);
        $stmt->bindParam(8, $_POST['hinhanh']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function deleteArticle()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            return false;
        }

        $sql = "DELETE FROM baiviet WHERE ma_bviet = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addArticle(){

        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieude = $_POST['tieude'];
            $tenbhat = $_POST['ten_bhat'];
            $matheloai = $_POST['ma_tloai'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];
            $matacgia = $_POST['ma_tgia'];
            $link = $_FILES['file-upload']['name'];
            $hinhanh = $_FILES['file-upload']['name'];

            $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh)
            VALUES ('$tieude','$tenbhat','$matheloai','$tomtat','$noidung', '$matacgia',CURDATE(),'$hinhanh')"; 
            $stmt = $conn->query($sql);
            move_uploaded_file($_FILES['file-upload']['tmp_name'], $link);
            if ($stmt) {
                return true;
            } else { return false; }
        }
    }
}
