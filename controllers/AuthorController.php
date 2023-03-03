<?php
include("services/AuthorService.php");
class AuthorController{
    public function index(){
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthors();
        include("views/author/author.php");
    }
}