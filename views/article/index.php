<?php
include("views/includes/header_admin.php")
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="index.php?controller=article&act=add" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên Tiêu Đề</th>
                        <th scope="col">Tên Bài Hát</th>
                        <th scope="col">Tên Tác Giả</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($articleList as $article) {
                    ?>
                        <tr>
                            <th scope="row"><?= $article->getMaBviet() ?></th>
                            <td><?= $article->getTieude() ?></td>
                            <td><?= $article->getTenBhat() ?></td>
                            <td><?= $article->getTenTgia() ?></td>
                            <td>
                            <a href="index.php?controller=article&id=<?= $article->getMaBviet() ?>&act=edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="index.php?controller=article&action=deleteArticle&id=<?= $article->getMaBviet() ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
include("views/includes/footer_admin.php");
?>