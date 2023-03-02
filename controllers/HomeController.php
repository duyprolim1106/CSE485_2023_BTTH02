<?php
include("services/ArticleService.php");
class HomeController {
    public function index() {
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        echo $articles;
        include("views/home/index.php");
    }
}