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

    public function getDetailArticle($ma_bviet)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT *
        FROM baiviet
        INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
        INNER JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai
        WHERE ma_bviet = '" . $ma_bviet . "'";
        $stmt = $conn->query($sql);

        $detailArticles = [];
        while ($row = $stmt->fetch()) {
            $detailArticle = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($detailArticles, $detailArticle);
        }

        return $detailArticles;
    }
    
    public function updateArticle()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "UPDATE baiviet SET tieude = ?, ten_bhat = ?, ma_tloai = ? , tomtat = ?,
        noidung = ? , ten_tgia = ? , ngayviet = ? , hinhanh = ?
   WHERE ma_bviet = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_POST['tieude']);
        $stmt->bindParam(2, $_POST['ten_bhat']);
        $stmt->bindParam(3, $_POST['ma_tloai']);
        $stmt->bindParam(4, $_POST['tomtat']);
        $stmt->bindParam(5, $_POST['noidung']);
        $stmt->bindParam(6, $_POST['ten_tgia']);
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

    public function addArticle()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if (isset( $_POST['tieude']) &&
            isset($_POST['ten_bhat']) && isset($_POST['ma_tloai'])
            && isset($_POST['tomtat']) && isset($_POST['noidung'])
            && isset($_POST['ma_tgia'])
            && isset($_POST['file-upload'])
        ) {
            $tieude = $_POST['tieude'];
            $tenbhat = $_POST['ten_bhat'];
            $matheloai = $_POST['ma_tloai'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];
            $matacgia = $_POST['ma_tgia'];
            $hinhanh = $_POST['file-upload'];
        } else {
            return false;
        }

        // $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh)
        //  VALUES (?,?,?,?,?,CURDATE(),?)"; 
        $sql_test = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh)
         VALUES ('$tieude','$tenbhat','$matheloai','$tomtat','$noidung', '$matacgia',CURDATE(),'$hinhanh')"; 
        $stmt = $conn->prepare($sql_test);
        // $stmt->bindParam(1, $tieude);
        // $stmt->bindParam(2, $tenbhat);
        // $stmt->bindParam(3, $matheloai);
        // $stmt->bindParam(4, $tomtat);
        // $stmt->bindParam(5, $noidung);
        // $stmt->bindParam(6, $matacgia);
        // $stmt->bindParam(7, $hinhanh);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
