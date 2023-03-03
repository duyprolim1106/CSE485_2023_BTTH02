<?php
include("views/includes/header_admin.php")
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="add_article.php" class="btn btn-success">Thêm mới</a>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>
                            <a href="edit_article.php?ma_bviet=1"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a href="process_components/process_delete_article.php?mabviet=1"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
include("views/includes/footer_admin.php");
?>