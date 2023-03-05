<?php
   require_once("services/ArticleService.php");
   require_once("services/CategoryService.php");
   require_once("services/AuthorService.php");
   require_once("services/UserService.php");
class AdminController {
    public function index() {

        $categoryService = new CategoryService();
        $categorys = $categoryService->getCategorys();

        $articleService = new ArticleService();
        $articles  = $articleService->getAllArticles();

        $authorService = new AuthorService();
        $authors = $authorService->getAuthors();

        $userService = new UserService();
        $users = $userService->getUsers();
        include("views/admin/index.php");
    }
}