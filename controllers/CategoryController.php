<?php
include("configs/DBConnection.php");
include("services/CategoryService.php");
class CategoryController{
    public function index()
    {
        if (isset($_GET['act'])) {
            if ($_GET['act'] == 'edit') {
                $categoryService = new CategoryService();
                $category = $categoryService->getCategoryById();
                include("views/category/edit_category.php");
            } else if ($_GET['act'] == 'add') {
                include("views/category/add_category.php");
            }
        } else {
            $categoryService = new CategoryService();
            $categoryList = $categoryService->getCategories();
            include("views/category/index.php");
        }
    }
    public function addCategory()
    {
        $categoryService = new CategoryService();
        if ($categoryService->addCategory()) {
            self::index();
        }
    }
    public function updateCategory()
    {
        $categoryService = new CategoryService();
        if ($categoryService->updateCategory()) {
            self::index();
        }
    }
    public function deleteCategory()
    {
        $categoryService = new CategoryService();
        if ($categoryService->deleteCategory()) {
            self::index();
        }
    }
}