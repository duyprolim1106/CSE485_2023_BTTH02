<?php
require("services/ArticleService.php");
class HomeController {
    public function index() {
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        include("views/home/index.php");
    }

    public function detail() {
        $ma_bviet = $_GET['ma_bviet'];
        $articleService = new ArticleService();
        $detailArticle = $articleService->getDetailArticle($ma_bviet);
        include("views/home/detail.php");   
    }

    public function login() {
        include("views/home/login.php");
    }

    public function loginWithAcc() {
        // if ($_SERVER['REQUEST_METHOD'] = 'POST') {
        //     $user_name = $_POST['user_name'];
        //     $user_pass = $_POST['user_pass'];
        //     $sql = "SELECT * FROM users WHERE tai_khoan='$user_name' AND mat_khau ='$user_pass';";
        // }
        include("views/admin/index.php");
    }
}