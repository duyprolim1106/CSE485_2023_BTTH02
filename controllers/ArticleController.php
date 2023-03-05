<?php
include("services/ArticleService.php");
include("services/AuthorService.php");
class ArticleController
{
    public function index() {
        if (isset($_GET['act'])) {
            if ($_GET['act'] == 'edit') {
                $articleService = new ArticleService();
                $article = $articleService->getDetailArticle('$ma_bviet');
                    $authorService = new AuthorService();
                    $authorList = $authorService->getAuthors();
                include("views/article/edit_article.php");
            } else if ($_GET['act'] == 'add') {
                $authorService = new AuthorService();
                $authorList = $authorService->getAuthors();
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
            echo 'add';
            // self::index();
        }
    }
}
