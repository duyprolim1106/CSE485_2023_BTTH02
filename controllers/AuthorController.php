<?php
include("services/AuthorService.php");
class AuthorController{
    public function index(){
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthors();
        include("views/author/index.php");
    }

    public function add() {
        //đổ view add author vào trang web

        include("views/author/add_author.php");
    }

    public function edit($ma_tgia) {
        $authorService = new AuthorService();
        $edit_authors = $authorService->getMaTgia('$ma_tgia');
        include("views/author/edit_author.php");
    }

    public function update(){
        $authorService = new AuthorService();
        $update_authors = $authorService->update_author($_POST['txt_matgia'],$_POST['txt_tentgia']);
        include("views/author/index.php");
    }
}