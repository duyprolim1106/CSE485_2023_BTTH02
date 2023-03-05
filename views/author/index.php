<?php
include("views/includes/header_admin.php")
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="index.php?controller=author&act=add" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên tác giả</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($authorList as $author) {
                    ?>
                        <tr>
                            <th scope="row"><?= $author->getMaTgia() ?></th>
                            <td><?= $author->getTenTgia() ?></td>
                            <td>
                                <a href="index.php?controller=author&id=<?= $author->getMaTgia() ?>&act=edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="index.php?controller=author&action=deleteAuthor&id=<?= $author->getMaTgia() ?>"><i class="fa-solid fa-trash"></i></a>
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