<?php
$title = 'Thêm mới bài viết';
include("views/includes/header_admin.php");
?>
<main class="container mt-5 mb-5">


    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
            <form action="index.php?controller=article&action=addArticle" method="post">

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên tiêu đề</span>
                    <input type="text" class="form-control" name="tieude">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                    <input type="text" class="form-control" name="ten_bhat">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên Thể Loại</span>
                    <input type="text" class="form-control" name="ma_tloai">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                    <input type="text" class="form-control" name="tomtat">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Nội dung</span>
                    <input type="text" class="form-control" name="noidung">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên Tác Giả</span>
                    <select class="form-select" name="ma_tgia">
                        <?php
                            foreach($authorList as $author) {
                        ?>
                        <option value="<?= $author['ma_tgia'] ?>"><?= $author['ten_tgia'] ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Hình ảnh</span>
                    <input type="file" name="hinhanh" id="file-upload">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" value="Thêm" class="btn btn-success">
                    <a href="article.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include("views/includes/footer_admin.php");
?>