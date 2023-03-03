<?php
include("../services/AuthorService.php");
class AuthorController{
    public function author(){
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthors();
        include("../views/author/author.php");
    }
}