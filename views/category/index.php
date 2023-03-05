<?php
include("views/includes/header_admin.php")
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="index.php?controller=category&act=add" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên thể loại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($categoryList as $category) {
                    ?>
                        <tr>
                            <th scope="row"><?= $category->getMaTloai() ?></th>
                            <td><?= $category->getTenTloai() ?></td>
                            <td>
                                <a href="index.php?controller=category&id=<?= $category->getMaTloai() ?>&act=edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="index.php?controller=category&action=deleteCategory&id=<?= $category->getMaTloai() ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                </tbody>
            <?php
                    }
            ?>
            </table>
        </div>
    </div>
</main>
<?php
include("views/includes/footer_admin.php");
?>