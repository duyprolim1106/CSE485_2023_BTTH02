<?php
include("configs/DBConnection.php");
include("services/ArticleService.php");
include("services/AuthorService.php");
include("services/CategoryService.php");
class ArticleController
{
    public function index()
    {
        if (isset($_GET['act'])) {
            if ($_GET['act'] == 'edit') {
                $articleService = new ArticleService();
                $categoryService = new CategoryService();
                $authorService = new AuthorService();
                $article = $articleService->getArticleById();
                $authorList = $authorService->getAuthors();
                $categoryList = $categoryService->getCategories();
                include("views/article/edit_article.php");
            } else if ($_GET['act'] == 'add') {
                $authorService = new AuthorService();
                $categoryService = new CategoryService();
                $authorList = $authorService->getAuthors();
                $categoryList = $categoryService->getCategories();
                include("views/article/add_article.php");
            }
        } else {
            $articleService = new ArticleService();
            $articleList = $articleService->getDetailArticle();
            include("views/article/index.php");
        }
    }
    public function addArticle(){
        $articleService = new ArticleService();
        if ($articleService->addArticle()) {
            self::index();
        }
    }
    public function deleteArticle() {
        $userService = new ArticleService();
        if ($userService->deleteArticle()) {
            self::index();
        }
    }
}
