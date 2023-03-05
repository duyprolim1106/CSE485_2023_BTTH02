<?php
include("services/AuthorService.php");
class AuthorController
{
    public function index()
    {
        if (isset($_GET['act'])) {
            if ($_GET['act'] == 'edit') {
                $authorService = new AuthorService();
                $author = $authorService->getAuthorById();
                include("views/author/edit_author.php");
            } else if ($_GET['act'] == 'add') {
                include("views/author/add_author.php");
            }
        } else {
            $authorService = new AuthorService();
            $authorList = $authorService->getAuthors();
            include("views/author/index.php");
        }
    }
    public function addAuthor()
    {
        $authorService = new AuthorService();
        if ($authorService->addAuthor()) {
            self::index();
        }
    }
    public function updateAuthor()
    {
        $authorService = new AuthorService();
        if ($authorService->updateAuthor()) {
            self::index();
        }
    }
    public function deleteAuthor()
    {
        $authorService = new AuthorService();
        if ($authorService->deleteAuthor()) {
            self::index();
        }
    }
}
