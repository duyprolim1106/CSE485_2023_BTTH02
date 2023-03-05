<?php
include("configs/DBConnection.php");
include("services/ArticleService.php");
include("services/AuthorService.php");
include("services/CategoryService.php");
class ArticleController
{
    public function index() {
        if (isset($_GET['act'])) {
            if ($_GET['act'] == 'edit') {
                $articleService = new ArticleService();
                $authorService = new AuthorService();
                $categoryService = new CategoryService();
                $article = $articleService->getDetailArticle('$ma_bviet');
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
            $articleList = $articleService->getAllArticles();
            include("views/article/index.php");
        }
    }

    public function updateArticle()
    {
        $articleService = new ArticleService();
        if ($articleService->updateArticle()) {
            self::index();
        }
    }

    public function deleteArticle()
    {
        $articleService = new ArticleService();
        if ($articleService->deleteArticle()) {
            self::index();
        }
    }
    public function addArticle()
    {
        $articleService = new ArticleService();
        if ($articleService->addArticle()) {
            self::index();
        }
    }
}
