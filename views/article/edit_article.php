<?php
$titles = "Sửa thông tin bài viết";
include("views/includes/header_admin.php");
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
            <form action="index.php?controller=article&action=updateArticle" method="post">
                <input type="text" class="form-control" name="ma_bviet">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Tiêu đề</span>
                    <input type="text" class="form-control" name="tieude" readonly value="<?= $article->getTieuDe() ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                    <input type="text" class="form-control" name="ten_bhat" readonly value="<?= $article->getTenBhat() ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Thể loại</span>
                    <input type="text" class="form-control" name="ma_tloai" readonly value="<?= $article->getTenTloai() ?>">
                </div>
                
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Tóm tắt</span>
                    <input type="text" class="form-control" name="tomtat" readonly value="<?= $article->getTomtat() ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Nội dung</span>
                    <input type="text" class="form-control" name="noidung" readonly value="<?= $article->getNoidung() ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên Tác Giả</span>
                    <input type="text" class="form-control" name="ten_tgia" readonly value="<?= $article->getTenTgia() ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span style="padding: 0px 20px 0px 20px" class="input-group-text" id="lblCatName">Ngày viết</span>
                    <input type="text" id="date-input" name="date-input" name="Y-m-d H:i:s" readonly value="<?= $article->getNgayviet() ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Hình ảnh</span>
                    <input type="text" class="form-control" name="hinhanh" readonly value="<?= $article->getHinhanh() ?>">
                </div>
                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="category.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include("views/includes/footer_admin.php");
?>




