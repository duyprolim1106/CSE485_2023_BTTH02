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
}